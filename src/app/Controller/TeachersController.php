<?php
App::uses('AppController', 'Controller');
/**
 * Teachers Controller
 *
 * @property Teacher $Teacher
 * @property PaginatorComponent $Paginator
 */
class TeachersController extends AppController {

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
		$this->Teacher->recursive = 0;
		$this->set('teachers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Teacher->exists($id)) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
		$this->set('teacher', $this->Teacher->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->loadModel('User');
		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			$this->Session->setFlash('Usuário inválido');
			return $this->redirect(array('controller' => 'publications','action' => 'index'));
		}
		$options = array('conditions' => array('Teacher.user_id' => $this->Auth->user('id')));
		$user = $this->Teacher->find('first',$options);
		if($this->Auth->user('role') == 0){ //Não permite que alunos editem
			return $this->redirect(array('controller' => 'publications','action' => 'index'));
		}
        
		if ($this->request->is('post')) {
			$this->Teacher->create();
            $this->request->data['Teacher']['user_id'] = $this->Auth->user('id');
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		}
		$matters = $this->Teacher->Matter->find('list');
		$users = $this->Teacher->User->find('list');
		$this->set(compact('matters', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists($id)) {
			$this->Session->setFlash('Usuário inválido');
			return $this->redirect(array('controller' => 'publications','action' => 'index'));	
		}
		$options = array('conditions' => array('Teacher.user_id' => $this->Auth->user('id')));
		$user = $this->Teacher->find('first',$options);
		if($this->Auth->user('role') == 0 || is_null($user['Teacher']['user_id']) || $user['Teacher']['user_id'] != $id){ 
		//Não permite que alunos editem, ou outros usuários diferentes
			return $this->redirect(array('controller' => 'publications','action' => 'profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('The teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Teacher.' . $this->Teacher->primaryKey => $id));
			$this->request->data = $this->Teacher->find('first', $options);
		}
		$matters = $this->Teacher->Matter->find('list');
		$users = $this->Teacher->User->find('list');
		$this->set(compact('matters', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Teacher->delete()) {
			$this->Session->setFlash(__('The teacher has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teacher could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
