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
    public $helpers = array('Html', 'Form', 'Js' => array('jquery'));
    public $components = array('Paginator','RequestHandler');

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
            $this->layout = 'ajax';
            $result = $this->Rating->find('count',array('conditions' => array('Rating.user_id' => $this->Auth->user('id'),
                'Rating.publication_id' => $publication_id)));

            if($result == 0){
            $this->Rating->create();
            $this->request->data['Rating']['publication_id'] = $publication_id;
            $this->request->data['Rating']['user_id'] = $this->Auth->user('id');
            $this->request->data['Rating']['stars'] = 1;
            $this->Rating->save($this->request->data);    
            // }else{
            //     $this->Rating->updateAll(array('Rating.stars' => 0),array('Rating.publication_id' => $publication_id));    
            // }
            $rating = $this->Rating->find('first',array('conditions' => array('Rating.publication_id' => $publication_id)));
            $this->set('ratings',$rating);    
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
