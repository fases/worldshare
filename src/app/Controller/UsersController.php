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
			/*$infor ='Your information has been saved.';
			$email = $this->request->data['User']['email'];
			$pos = strripos($email, '@');
			$term = substr($email, $pos, strlen($email));
			if($term == "@ifrn.edu.br"){
				$this->request->data['User']['ativo'] = 0;
				$this->request->data['User']['role'] = 1;
				$infor = 'Você se cadastrou como professor, confirme seu email!    localhost/worldshare/src/users/confi/'.$email.'/'.md5(md5($email).md5(md5(substr($email, 1, 3))));
				$this->confi($email); 
			}else{
				$this->request->data['User']['ativo'] = 1;
				$this->request->data['User']['role'] = 0;
				$infor = 'Você se cadastrou como aluno.';

			}*/
          if ($this->User->save($this->request->data)) {
              $this->Session->setFlash('O usuário foi cadastrado com sucesso!');
              //Login automático após o cadastro
              $this->Auth->login();
              if($this->Auth->user('role') == 1){ // Professor
			  	$this->redirect(array('controller' => 'teachers', 'action' => 'add',$this->Auth->user('id')));	
              }
			}
		}
	}
// localhost/worldshare/src/users/confi/aaaa@ifrn.edu.br/0d5c7838b8bd35d8bb962ea994e8b8bad4fbb7d8d5603db43ac2094f5955787c
	public function confi($email, $codigo_veri = null){
		if($codigo_veri == null){
		    $codigo_veri = md5(md5($email).md5(md5(substr($email, 1, 3))));
			$link = 'localhost/worldshare/src/users/confi/'.$email.'/'.$codigo_veri;
			echo $link;
			echo "Foi mandado um link para seu email.";
			// exit();
			// aqui deve mandar o email com o link
			// exit();
		}else{
			//se vim pra cá é prq é o link mandado pro usuário e ele clicou em confirmar
			 $codigo_veri2 = md5(md5($email).md5(md5(substr($email, 1, 3))));
			 if($codigo_veri == $codigo_veri2){
			 	echo "validado com sucesso";
			 	$this->User->query("UPDATE `users` SET `ativo`=1 WHERE `email` = '".$email."';");
			 	// exit();
			 	// aqui vai alterar no banco o user com esse email para ativo
			 }else{
			 	echo "link inválido<br>";
			 	// echo $codigo_veri2.'<br>';
			 	// echo $codigo_veri.'<br>';
			 }
			 // exit();
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
		$this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash("Usuário escolhido é inválido!");
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('get')) {
            $this->request->data = $this->User->findById($id);
        } else {
            if($this->Auth->user('id') == $id){
            	if ($this->User->save($this->request->data)) {
                	$this->Session->setFlash('A edição foi realizada com sucesso!');
                	$this->redirect(array('action' => 'index'));
            	}
        	}else{
           		$this->Session->setFlash(__('Você não tem permissão para modificar dados de outro usuário.'));
				return $this->redirect(array('action' => 'index')); 
        	}
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
        if($this->Auth->user('id') == $id){
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}else{
           $this->Session->setFlash(__('Você não tem permissão para apagar outro usuário.'));
				return $this->redirect(array('action' => 'index')); 
        }
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
