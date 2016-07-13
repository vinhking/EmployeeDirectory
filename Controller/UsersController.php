<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    
    public function isAuthorized($user) {
        // Admin can access every action
//        $action = 'edit';
//        debug($user);
//        debug($this->request->params['action']);
//        debug($this->request);die;
        if ((isset($user['role']) && $user['role'] == 1) || ($this->request->params['action'] == 'edit' && $user['id'] == $this->request->params['pass'][0])){
            return true;
        }
        // Default deny
        return false;
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }

    public function login() {
        //echo Apphash('vinh123456');die;
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();

            if (!empty($this->request->data['User']['upload']['name'])) {
                $file = $this->request->data['User']['upload'];

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\\webimages\\users\\' . $file['name']);
                    //prepare the filename for database entry
                    $this->request->data['User']['avatar'] = WWW_ROOT . 'img\\webimages\\users\\' . $file['name'];
                }
            }

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                $Email = new CakeEmail();
                $Email->config('gmail');
                $Email->from(array('nguyenquangvinh.bkhn@gmail.com' => 'EmployeeDirectory'));
                $Email->to($this->request->data['User']['email']);
                $Email->subject('Thông tin tài khoản EmployeeDirectory');
                $Email->send("Mật khẩu tài khoản EmployeeDirectory của bạn là: " 
                        . $this->request->data['User']['password']
                        ." . Hãy thay đổi password trong lần đăng nhập đầu tiên, Thank you!");
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                    __('The user could not be saved. Please, try again.')
            );
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            if ($this->User->saveField("password", $this->request->data['User']['password'])) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
