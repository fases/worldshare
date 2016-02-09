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
        $this->set('teachers', $this->User->find('all', array('conditions' => array('User.role' => 1))));
    }

    public function students() {
        $this->set('students', $this->User->find('all', array('conditions' => array('User.role' => 0))));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null, $filter = null) {
        $this->layout = 'userpage';
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));

        $this->set('users', $this->User->find('all', array('conditions' => array('User.id' => $this->Auth->user('id')))));

        if ($this->Auth->user('id') == $id) {
            $this->loadModel('Teacher');
            $this->loadModel('Matter');
            $options = array('conditions' => array('Teacher.user_id' => $this->Auth->user('id')));
            $teacher = $this->Teacher->find('first', $options);
            if ($this->Auth->user('role') == 1) {
                $this->set('matter', $this->Matter->find('first', array('conditions' => array('Matter.id' => $teacher['Teacher']['matter_id']))));
            }
            $this->loadModel('Publication');
            //todas as publicações sem filtro
            if ($filter == null) {

                $conditions = array('Publication.user_id' => $this->Auth->user('id'));
                //todas as publicações Não avaliadas
            } else if ($filter == 0) {
                $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 0);

                //todas as publicações Aprovadas
            } else if ($filter == 1) {
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 1);

                //todas as publicações Reprovadas
            } else if ($filter == 2) {
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 2);

                //todas as publicações Impróprias
            } else if ($filter == 3) {
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 3);
            }
        } else {
            $this->Session->setFlash(__('Você não tem permissão para ver o perfil privado dados de outro usuário.'));
            return $this->redirect(array('controller' => 'publications', 'action' => 'index'));
        }
        $this->set('users', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')))));
        
        
        $options = array(
            'conditions' => array( $conditions),
            'order' => array('Publication.registration' => 'DESC'),
            'limit' => 30
        );
        $this->paginate = $options;
        // Consulta com resultados paginados
        $publications = $this->paginate('Publication');
        // Envia os dados pra view
        $this->set('publications', $publications);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['User']['registration'] = date("Y-m-d h:i:s");
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('O usuário foi cadastrado com sucesso!', 'success');
                //Login automático após o cadastro
                $this->Auth->login();
                //Adicionar esse if após a verificação do email
                if (isset($this->data['User']['role'])) {
                    if ($this->data['User']['role'] == 1) {
                        $this->redirect(array('controller' => 'teachers', 'action' => 'add', $this->Auth->user('id')));
                    } else {
                        $this->redirect(array('controller' => 'publications', 'action' => 'index'));
                    }
                }
            }
        }
    }

// localhost/worldshare/src/users/confi/aaaa@ifrn.edu.br/0d5c7838b8bd35d8bb962ea994e8b8bad4fbb7d8d5603db43ac2094f5955787c
    public function confi($email, $codigo_veri = null) {
        if ($codigo_veri == null) {
            $codigo_veri = md5(md5($email) . md5(md5(substr($email, 1, 3))));
            $link = 'localhost/worldshare/src/users/confi/' . $email . '/' . $codigo_veri;
            echo $link;
            echo "Foi mandado um link para seu email.";
            // exit();
            // aqui deve mandar o email com o link
            // exit();
        } else {
            //se vim pra cá é prq é o link mandado pro usuário e ele clicou em confirmar
            $codigo_veri2 = md5(md5($email) . md5(md5(substr($email, 1, 3))));
            if ($codigo_veri == $codigo_veri2) {
                echo "validado com sucesso";
                $this->User->query("UPDATE `users` SET `ativo`=1 WHERE `email` = '" . $email . "';");
                // exit();
                // aqui vai alterar no banco o user com esse email para ativo
            } else {
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
        $this->layout = 'userpage';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash("Usuário escolhido é inválido!");
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('get')) {
            $this->request->data = $this->User->findById($id);
        } else {
            if ($this->Auth->user('id') == $id) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('A edição foi realizada com sucesso!');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('Você não tem permissão para modificar dados de outro usuário.'));
                return $this->redirect(array('action' => 'index'));
            }
        }

        $this->set('users', $this->User->find('all', array('conditions' => array('User.id' => $this->Auth->user('id')))));
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
        if ($this->Auth->user('id') == $id) {
            $this->request->allowMethod('post', 'delete');
            if ($this->User->delete()) {
                $this->Session->setFlash(__('The user has been deleted.'));
            } else {
                $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('Você não tem permissão para apagar outro usuário.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function login() {
        if ($this->Session->check('Auth.User')) {
            $this->redirect($this->Auth->redirect());
        } else {
            if (!$this->request->is('get')) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('Email ou senha invalida.'));
                }
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}
