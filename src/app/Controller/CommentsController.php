<?php

App::uses('AppController', 'Controller');

/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $helpers = array('Html', 'Form', 'Js' => array('jquery'));
    public $components = array('Paginator', 'RequestHandler');

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
    public function add($publication_id = null) {
        if ($this->request->is('ajax')) {
            $this->Comment->create();
            //Capta horário formatado como datetime do servidor
            $this->request->data['Comment']['schedule'] =  date("Y-m-d h:i:s");
            $this->request->data['Comment']['publication_id'] = $publication_id;
            $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
            $this->Comment->save($this->request->data);

            $this->loadModel('Publication');
            $this->layout = 'ajax';
            $comment = $this->Comment->find('all', array('conditions' => array('Comment.publication_id' => $publication_id)));
            $this->set('comments', $comment);
            $publication = $this->Publication->find('first', array('conditions' => array('Publication.id' => $publication_id)));
            $this->set('publications', $publication);
        }
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
    public function delete($id = null, $publication_id = null) {
        if ($this->request->is('post')) {
            $this->Comment->id = $id;
            if (!$this->Comment->exists()) {
                throw new NotFoundException(__('Invalid comment'));
            }
            // $this->request->allowMethod('post', 'delete','get');
            $this->Comment->delete();
            $this->loadModel('Publication');
            $comment = $this->Comment->find('all', array('conditions' => array('Comment.publication_id' => $publication_id)));
            $this->layout = 'ajax';
            $this->set('comments', $comment);

            $publication = $this->Publication->find('first', array('conditions' => array('Publication.id' => $publication_id)));
            $this->set('publications', $publication);
        }
    }

}
