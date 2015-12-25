<?php

App::uses('AppController', 'Controller');

class AssociationsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
       
            $this->Association->recursive = 1;
            $this->set('associations', $this->paginate());
        
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Association->exists($id)) {
            throw new NotFoundException(__('Invalid association'));
        }
        $options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
        $this->set('association', $this->Association->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Association->create();
            $this->request->data['Apartment']['user_id'] = $this->Auth->user('id');
            if ($this->Association->save($this->request->data)) {
                $this->Session->setFlash(__('The association has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The association could not be saved. Please, try again.'), 'flash/error');
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
        $this->Association->id = $id;
        if (!$this->Association->exists($id)) {
            throw new NotFoundException(__('Invalid association'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Association->save($this->request->data)) {
                $this->Session->setFlash(__('The association has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The association could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Association.' . $this->Association->primaryKey => $id));
            $this->request->data = $this->Association->find('first', $options);
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
        $this->Association->id = $id;
        if (!$this->Association->exists()) {
            throw new NotFoundException(__('Invalid association'));
        }
        if ($this->Association->delete()) {
            $this->Session->setFlash(__('Association deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Association was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }
    
    public function isAuthorized($user) {

        // The admin can edit, delete and add
        if (in_array($this->action, array('edit', 'delete', 'add'))) {

            if ($this->Session->check('Auth.User.confirm') == "1") {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
