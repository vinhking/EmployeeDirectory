<?php

App::uses('AppController', 'Controller');

/**
 * Departments Controller
 *
 * @property Department $Department
 * @property PaginatorComponent $Paginator
 */
class DepartmentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    
    public $layout = 'layout';

    /**
     * index method
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('list_employees');
    }

    public function index() {
        $this->set('title', 'List Department');
        $this->Department->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 10
        );
        $this->set('departments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->set('title', 'Department Detail');
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
        $this->set('department', $this->Department->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->set('title', 'Add Department');
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('The department has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->set('title', 'Edit User');
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('The department has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
            $this->request->data = $this->Department->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Invalid department'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Department->delete()) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function list_employees($id = null) {
        $this->set('title', 'List Employee Of The Department');
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Invalid department'));
        }

        $this->Paginator->settings = array(
            'limit' => 10
        );
        
        $data = $this->Paginator->paginate('Employee',array(
            'Employee.department_id' => $id
        ));
        $this->set('data', $data);
    }

}
