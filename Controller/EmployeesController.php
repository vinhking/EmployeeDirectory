<?php

App::uses('AppController', 'Controller');

/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class EmployeesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('search');
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Employee->recursive = 0;
        $this->set('employees', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Employee->exists($id)) {
            throw new NotFoundException(__('Invalid employee'));
        }
        $options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
        $this->set('employee', $this->Employee->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Employee->create();
            if ($this->Employee->save($this->request->data)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Employee->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Employee->exists($id)) {
            throw new NotFoundException(__('Invalid employee'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Employee->save($this->request->data)) {
                $this->Flash->success(__('The employee has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
            $this->request->data = $this->Employee->find('first', $options);
        }
        $departments = $this->Employee->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            throw new NotFoundException(__('Invalid employee'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Employee->delete()) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function search() {
        //debug($this->request->data['Employee']['name']);
        if ($this->request->is('post')) {
        $data = $this->Paginator->paginate('Employee', array(
            'Employee.name LIKE' => "%".$this->request->data['Employee']['name']."%"
        ));
        $this->set('employees', $data);
        }
    }

}
