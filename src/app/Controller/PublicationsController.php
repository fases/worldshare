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
		$this->Publication->recursive = 0;
		$this->set('publications', $this->Paginator->paginate());
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
			if ($this->Publication->save($this->request->data)) {
				$this->Flash->success(__('The publication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The publication could not be saved. Please, try again.'));
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
				$this->Flash->success(__('The publication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The publication could not be saved. Please, try again.'));
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
			$this->Flash->success(__('The publication has been deleted.'));
		} else {
			$this->Flash->error(__('The publication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
