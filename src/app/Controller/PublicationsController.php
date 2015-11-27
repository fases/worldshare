<?php
App::uses('AppController', 'Controller');
/**
 * Publications Controller
 *
 * @property Publication $Publication
 * @property PaginatorComponent $Paginator
 */
class PublicationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
//		$this->Publication->recursive = 0;
//		$this->set('publications', $this->Paginator->paginate());
        $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 1))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Publication->exists($id)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		$options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
		$this->set('publication', $this->Publication->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Publication->create();
            $this->request->data['Publication']['user_id'] = $this->Auth->user('id');
            
			if ($this->Publication->save($this->request->data)) {
				$this->Session->setFlash(__('The publication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
			}
		}
		$users = $this->Publication->User->find('list');
		$types = $this->Publication->Type->find('list');
		$matters = $this->Publication->Matter->find('list');
		$teachers = $this->Publication->Teacher->find('list');
		$this->set(compact('users', 'types', 'matters', 'teachers'));
                                                     
        
       
        
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Publication->exists($id)) {
			throw new NotFoundException(__('Invalid publication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Publication->save($this->request->data)) {
				$this->Session->setFlash(__('The publication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
			$this->request->data = $this->Publication->find('first', $options);
		}
		$users = $this->Publication->User->find('list');
		$types = $this->Publication->Type->find('list');
		$matters = $this->Publication->Matter->find('list');
		$teachers = $this->Publication->Teacher->find('list');
		$this->set(compact('users', 'types', 'matters', 'teachers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */  
    
	public function delete($id = null) {
		$this->Publication->id = $id;
		if (!$this->Publication->exists()) {
			throw new NotFoundException(__('Invalid publication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Publication->delete()) {
			$this->Session->setFlash(__('The publication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The publication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
    
    public function review($id = null){
        if (!$this->Publication->exists($id)) {
			throw new NotFoundException(__('Invalid publication'));
		}
        if($this->Auth->user('role') != 1){
           $this->Session->setFlash(__('Você não tem permissão para acessar essa funcionalidade'));
           return $this->redirect(array('action' => 'index'));
        }else{
            
            $this->loadModel('Teacher');
            $options = array('conditions' => array('Teacher.user_id' => $this->Auth->user('id')));
            $teacher = $this->Teacher->find('first', $options);
            $this->request->data['Publication']['teacher_id'] = $teacher['Teacher']['id'];
        
        // Definir STATUS da publicação
            /*
                0- Não avaliada
                1- aprovada
                2- impropria/não aprovada
            */
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Publication->save($this->request->data)) {
				$this->Session->setFlash(__('The publication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
			$this->request->data = $this->Publication->find('first', $options);
		}
        }
		$users = $this->Publication->User->find('list');
		$types = $this->Publication->Type->find('list');
		$matters = $this->Publication->Matter->find('list');
		$teachers = $this->Publication->Teacher->find('list');
		$this->set(compact('users', 'types', 'matters', 'teachers'));
    }
    
    public function noavaliable(){
        $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 0))));
    }
    
    public function profile(){
        $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id')))));
    }
}
