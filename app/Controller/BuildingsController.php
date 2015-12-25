<?php

App::uses('AppController', 'Controller');

class BuildingsController extends AppController {

    public $helpers = array('Js');

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
        $this->Building->recursive = 1;
        $this->set('buildings', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Building->exists($id)) {
            throw new NotFoundException(__('Invalid building'));
        }
        $options = array('conditions' => array('Building.' . $this->Building->primaryKey => $id));
        $this->set('building', $this->Building->find('first', $options));
        $building = $this->Building->find('first', $options);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Building->create();
            $this->request->data['Building']['user_id'] = $this->Auth->user('id');
            $data = $this->request->data['Building'];
            if (!$data['building_img']['building_name']) {
                unset($data['building_img']);
            }
            if ($this->Building->save($data)) {
                $this->Session->setFlash(__('The building has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The building could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Building->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        $this->Building->id = $id;
        if (!$this->Building->exists($id)) {
            throw new NotFoundException(__('Invalid building'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data['Building'];
            if (!$data['building_img']['building_name']) {
                unset($data['building_img']);
            }
            if ($this->Building->save($data)) {
                $this->Session->setFlash(__('The building has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The building could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Building.' . $this->Building->primaryKey => $id));
            $this->request->data = $this->Building->find('first', $options);
        }
        $users = $this->Building->User->find('list');
        $this->set(compact('users'));
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
        $this->Building->id = $id;
        if (!$this->Building->exists()) {
            throw new NotFoundException(__('Invalid building'));
        }
        if ($this->Building->delete()) {
            $this->Session->setFlash(__('Building deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Building was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Building->isOwnedBy($postId, $user['id'])) {
                if ($this->Session->read('Auth.User.confirm') == "1") {
                    return true;
                }
            }
        }

        return parent::isAuthorized($user);
    }

}
