<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $this->Comment->recursive = 0;
        $this->set('comments', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Comment->exists($id)) {
            throw new NotFoundException(__('Invalid apartment'));
        }
        $options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
        $this->set('comment', $this->Comment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $associationNames = $this->Comment->Association->getAssociationNames($term);
            $this->set(compact('associationNames'));
            $this->set('_serialize', 'associationNames');
        } else
        if ($this->request->is('post')) {
            $this->Comment->create();
            $oneAssociation = $this->request->data['Comment']['association_id'];
                        $associationFromId = $this->Comment->Association->findByTitle($oneAssociation);
                        if($associationFromId ==null){
                        $associationFromId = $this->Comment->Association->findByTitle('Other');
                        }
                        $this->request->data['Comment']['association_id'] =  $associationFromId['Association']['id'];
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash(__('The comment has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $apartments = $this->Comment->Apartment->find('list');
        $associations = $this->Comment->Association->find('list');
        $this->set(compact('apartments', 'associations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Comment->recursive = 1;
        $this->Comment->id = $id;
        if (!$this->Comment->exists($id)) {
            throw new NotFoundException(__('Invalid apartment'));
        }
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $associationNames = $this->Comment->Association->getAssociationNames($term);
            $this->set(compact('associationNames'));
            $this->set('_serialize', 'associationNames');
        } else
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash(__('The comment has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The comment could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
            $this->request->data = $this->Comment->find('first', $options);
        }
        $apartments = $this->Comment->Apartment->find('list');
        $associations = $this->Comment->Association->find('list');
        $this->set(compact('apartments', 'associations'));
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
        $this->Comment->id = $id;
        if (!$this->Comment->exists()) {
            throw new NotFoundException(__('Invalid apartment'));
        }
        if ($this->Comment->delete()) {
            $this->Session->setFlash(__('Comment deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Comment was not deleted'), 'flash/error');
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
