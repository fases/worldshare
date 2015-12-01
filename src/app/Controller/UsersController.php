<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function beforeFilter() {
        //parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
  }


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}


	public function teachers() {
		$this->set('teachers', $this->User->find('all',array('conditions' => array('User.role' => 1))));
	}


	public function students() {
		$this->set('students', $this->User->find('all',array('conditions' => array('User.role' => 0))));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
          if ($this->User->save($this->request->data)) {
              $this->Session->setFlash('Your information has been saved.');
              //Login automático após o cadastro
              $this->Auth->login();
							$this->redirect(array('controller' => 'users', 'action' => 'index'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login() {
	//	debug($this->request->data); die();
		 if($this->Session->check('Auth.User')){
			 $this->redirect($this->Auth->redirect());
		 } else {
			 if (!$this->request->is('get')) {
					if ($this->Auth->login()) {
						 $this->redirect($this->Auth->redirect());
					} else {
						 $this->Session->setFlash(__('Invalid email or password, try again'));
					}
			 }
		 }
	}
	 public function logout() {
			 $this->redirect($this->Auth->logout());
	 }
}
