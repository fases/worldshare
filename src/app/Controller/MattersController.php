<?php
App::uses('AppController', 'Controller');
/**
 * Matters Controller
 *
 * @property Matter $Matter
 * @property PaginatorComponent $Paginator
 */
class MattersController extends AppController {

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
		$this->Matter->recursive = 0;
		$this->set('matters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Matter->exists($id)) {
			throw new NotFoundException(__('Invalid matter'));
		}
		$options = array('conditions' => array('Matter.' . $this->Matter->primaryKey => $id));
		$this->set('matter', $this->Matter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Matter->create();
			if ($this->Matter->save($this->request->data)) {
				$this->Flash->success(__('The matter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The matter could not be saved. Please, try again.'));
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
		if (!$this->Matter->exists($id)) {
			throw new NotFoundException(__('Invalid matter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Matter->save($this->request->data)) {
				$this->Flash->success(__('The matter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The matter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Matter.' . $this->Matter->primaryKey => $id));
			$this->request->data = $this->Matter->find('first', $options);
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
		$this->Matter->id = $id;
		if (!$this->Matter->exists()) {
			throw new NotFoundException(__('Invalid matter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Matter->delete()) {
			$this->Flash->success(__('The matter has been deleted.'));
		} else {
			$this->Flash->error(__('The matter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
