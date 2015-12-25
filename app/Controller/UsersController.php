<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('Logout', 'login', 'add', 'confirmEmail');
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->redirect(array(
                                    'controller' => 'buildings',
                                    'action' => 'index'
                )));
            } else {
                $this->Session->setFlash(__("Username or password invalid. Please, try again."));
            }
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
        $this->User->recursive = "1";
        $this->set('users', $this->paginate());
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
            throw new NotFoundException(__('Invalid user'), 'flash/error');
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    public function confirmEmail() {
        $email = $this->request->query['email'];
        $this->User->recursive = "-1";
        $user = $this->User->findByEmail($email);
        //debug($user);die();
        // $user = $this->User->saveField('confirm', '1');
        $data = array('id' => $user['User']['id'], 'confirm' => '1');
        // This will update Recipe with id 10
        $this->User->save($data);
        if ($this->request->is('post')) {

            $this->redirect($this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
            )));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['confirm'] = "0";
            if ($this->Session->read('Auth.User.role') != "admin") {
                $this->request->data['User']['role'] = "utilisateur";
            }
            if ($this->User->save($this->request->data)) {
                $d = $this->request->data;
                $this->send_mail($d);
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
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
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
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
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function send_mail($d) {

        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/confirmEmail?email=" . $d['User']['email'];

        $message = 'Hi,' . $d['User']['username'] . ', Your Password is: ' . $d['User']['password'];
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('aut2014.267@gmail.com');
        $email->to($d['User']['email']);
        $email->subject('Mail Confirmation');
        $email->send($message . " " . $confirmation_link);
    }

}
