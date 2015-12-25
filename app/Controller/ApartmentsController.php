<?php

App::uses('AppController', 'Controller');

class ApartmentsController extends AppController {

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
        $this->set('apartments', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Apartment->exists($id)) {
            throw new NotFoundException(__('Invalid comment'));
        }
        $options = array('conditions' => array('Apartment.' . $this->Apartment->primaryKey => $id));
        $this->set('apartment', $this->Apartment->find('first', $options));
        $apartment = $this->Apartment->find('first', $options);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Apartment->create();
            $data = $this->request->data['Apartment'];
            if ($this->Apartment->save($data)) {
                $this->Session->setFlash(__('The apartment has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The apartment could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $tags = $this->Apartment->Tag->find('list');
        $this->set(compact('$tags'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        $this->Apartment->id = $id;
        if (!$this->Apartment->exists($id)) {
            throw new NotFoundException(__('Invalid apartment'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data['Apartment'];
            if ($this->Apartment->save($data)) {
                $this->Session->setFlash(__('The apartment has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The apartment could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Apartment.' . $this->Apartment->primaryKey => $id));
            $this->request->data = $this->Apartment->find('first', $options);
        }
        $tags = $this->Apartment->Tag->find('list');
        $this->set(compact('$tags'));
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
        $this->Apartment->id = $id;
        if (!$this->Apartment->exists()) {
            throw new NotFoundException(__('Invalid comment'));
        }
        if ($this->Apartment->delete()) {
            $this->Session->setFlash(__('Apartment deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Apartment was not deleted'), 'flash/error');
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
