<?php

App::uses('AppController', 'Controller');

/**
 * Ratings Controller
 *
 * @property Rating $Rating
 * @property PaginatorComponent $Paginator
 */
class RatingsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Paginator');

    /**
     * index method
     *
     * @return void
     */
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('ajax')) {
            $this->Rating->create();
            if ($this->Rating->save($this->request->data)) {
                $this->Session->setFlash(__('The rating has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The rating could not be saved. Please, try again.'));
            }
        }
        $users = $this->Rating->User->find('list');
        $publications = $this->Rating->Publication->find('list');
        $this->set(compact('users', 'publications'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if ($this->request->is('post')) {
            $this->Rating->id = $id;
            if (!$this->Rating->exists()) {
                throw new NotFoundException(__('Invalid rating'));
            }
            $this->request->allowMethod('post', 'delete');
            if ($this->Rating->delete()) {
                $this->Session->setFlash(__('The rating has been deleted.'));
            } else {
                $this->Session->setFlash(__('The rating could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

}
