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
            
            // Faz com q as publicações dos professores não precisem ser verificadas     
            if( $this->Auth->user('role') == 1){
                     
                 $this->request->data['Publication']['status'] = 1;
                     
                 }
            
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
        //apenas o proprietário da publicação pode editar tal
        if($this->Auth->user('id') == ['Publication']['User']){    
        
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
        }else{
              $this->Session->setFlash(__('Você não tem permissão para modificar a publicação de outro usuário.'));
				return $this->redirect(array('action' => 'index')); 
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
			// throw new NotFoundException(__('Invalid publication'));
			$this->Session->setFlash(__('The publication is invalid.'));
			$this->redirect(array('action' => 'index'));
		}
        if($this->Auth->user('id') == ['Publication']['User']){  
		$this->request->allowMethod('post','get','delete'); //Permite também a exclusão da publicação via GET[].
		if ($this->Publication->delete()) {
			$this->Session->setFlash(__('The publication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The publication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}else{
              $this->Session->setFlash(__('Você não tem permissão para apagar a publicação de outro usuário.'));
				return $this->redirect(array('action' => 'index')); 
        }
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
                0- Não avaliada ->publication/noavaliable
                1- aprovada -> publication/index
                2- Reprovada -> publication/disapproved
                3- impropria -> delete
            */
         
		if ($this->request->is(array('post', 'put'))) {
			$status = $this->request->data['Publication']['status'];
			if ($this->Publication->save($this->request->data)) {
				if($status == 3){
					return $this->redirect(array('action' => 'delete',$id));
					//return $this->Publication->delete($id);	
				}else{
					$this->Session->setFlash(__('The publication has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
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
        //se for aluno ele traz apanes as não avaliadas do próprio aluno
        if($this->Auth->user('role') != 1){
           $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id'), "Publication.status" => 0))));    
        }else{
            //senão, traz todas as publicações não avaliadas
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 0)))); 
        }
       
    }
    
    public function profile(){
        $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id')))));
    }
    public function disapproved(){
          //se for aluno ele traz apanes as reprovado do próprio aluno
          if($this->Auth->user('role') != 1){
           $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id'), "Publication.status" => 2)))); 
           
        }else{
            //senão, traz todas as publicações reprovadas
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 2)))); 
        }
    }
    
     public function inappropriate(){
         //se for aluno ele traz apanes as impróprias do próprio aluno
          if($this->Auth->user('role') != 1){
           $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id'), "Publication.status" => 3)))); 
         
        }else{
            //senão, traz todas as publicações improprias
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 3)))); 
        }
    }
    
    
}
