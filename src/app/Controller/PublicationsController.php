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
    public $helpers = array('Html', 'Form', 'Js' => array('jquery'));
    public $components = array('Paginator','RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index($filter = null) {
        $this->layout = 'userpage';
        $this->loadModel('Teacher');
        if ($filter == null) {

                $conditions = array('Publication.status' => 1);
                //todas as publicações do usuário logado
            }  else if ($filter == 3) {
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'));
                  $this->Session->setFlash('Estas são suas Publicações', 'info');
                //todas as publicações Não avaliadas
            }  else if ($filter == 0) {
                    if($this->Auth->user('role') == 0){
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 0);
                  $this->Session->setFlash('Estas são suas Publicações Não avaliadas', 'info');
                    }else{
                  $teacher = $this->Teacher->find('first',array('conditions' => array('Teacher.user_id' => $this->Auth->user('id'))));
                  $conditions = array('Publication.matter_id' => $teacher['Teacher']['matter_id'], 'Publication.status' => 0);


                  $this->Session->setFlash('Estas são as publicações disponíveis para avaliação', 'error');
                    }
                //todas as publicações Aprovadas
            } else if ($filter == 1) {
                    if($this->Auth->user('role') == 0){
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 1);
                  $this->Session->setFlash('Estas são suas Publicações Aprovadas', 'success');
                    }else{
                  $teacher = $this->Teacher->find('first',array('conditions' => array('Teacher.user_id' => $this->Auth->user('id'))));
                  $conditions = array('Publication.matter_id' => $teacher['Teacher']['matter_id'], 'Publication.user_id !=' => $this->Auth->user('id'));
                  $this->Session->setFlash('Estas são as publicações referentes a sua área', 'success');
                    }
                //todas as publicações Reprovadas
            } else if ($filter == 2) {
                 $conditions = array('Publication.user_id' => $this->Auth->user('id'), 'Publication.status' => 2);
                $this->Session->setFlash('Estas são suas Publicações Reprovadas', 'error');
            } else {
           // $this->Session->setFlash(__('Não existem essas possibilidades na linha do tempo'));
            return $this->redirect(array('controller' => 'publications', 'action' => 'index'));
        }


        $options = array(
            'conditions' => $conditions,
            'order' => array('Publication.registration' => 'DESC')
        );
        $this->paginate = $options;
        // Consulta com resultados paginados
        $publications = $this->paginate('Publication');
        // Envia os dados pra view
        $this->set('publications', $publications);
        $this->loadModel('User');
        $this->set('users', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')))));
        $this->loadModel('Comment');
        $comment = $this->Comment->find('all');
        $this->set('comments', $comment);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->loadModel('User');
        $this->set('users', $this->User->findById($this->Auth->user('id')));
        $this->layout = 'userpage';
        if (!$this->Publication->exists($id)) {
            throw new NotFoundException(__('Invalid publication'));
        }
        //Enviar variavel do professor (matéria) para a view
        if($this->Auth->user('role') == 1){
            $this->loadModel('Teacher');
            $this->set('teacher',$this->Teacher->find('first',array('conditions' => array('Teacher.user_id' => $this->Auth->user('id')))));
        }
        //Restrição para não mostrar a publicação impropria ou reprovada a outros usuários, senão o dono...
        $options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
        $this->set('publication', $this->Publication->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->layout = 'userpage';
        if ($this->request->is('post')) {
            $this->Publication->create();
            $this->request->data['Publication']['user_id'] = $this->Auth->user('id');
            // Faz com que as publicações dos professores não precisem ser verificadas
            $this->loadModel('Teacher');
            if ($this->Auth->user('role') == 1) {
                $this->request->data['Publication']['status'] = 1;
                //Atribui matéria do professor a publicação criada
                $teacher = $this->Teacher->find('first',array('conditions' => array('Teacher.user_id' => $this->Auth->user('id'))));
                $this->request->data['Publication']['matter_id'] = $teacher['Teacher']['matter_id'];

            } else {
                //Seta status da publicação do aluno como aberta
                $this->request->data['Publication']['status'] = 0;
            }
            $this->request->data['Publication']['registration'] = date('Y-m-d H:i:s');
            if ($this->Publication->save($this->request->data)) {
                $this->Session->setFlash('Publicação criada com sucesso, esperando avaliação de um professor da área', 'success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
            }
        }
        $matters = $this->Publication->Matter->find('list');
        $users = $this->Publication->User->find('list');
        $types = $this->Publication->Type->find('list');
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
        $user = $this->Publication->find('first', array('conditions' => array('Publication.id' => $id)));
        if ($this->Auth->user('id') == $user['Publication']['user_id']) {
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
        } else {
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
    public function delete($id = null, $impropria = false) {
        $this->Publication->id = $id;
        if (!$this->Publication->exists()) {
            // throw new NotFoundException(__('Invalid publication'));
            $this->Session->setFlash(__('The publication is invalid.'));
            $this->redirect(array('action' => 'index'));
        }
        $user = $this->Publication->find('first', array('conditions' => array('Publication.id' => $id)));
        if ($this->Auth->user('id') == $user['Publication']['user_id'] || $impropria == true) {
            $this->request->allowMethod('post', 'get', 'delete'); //Permite também a exclusão da publicação via GET[].
            if ($this->Publication->delete()) {
                if ($impropria == true) {
                    $this->Session->setFlash(__('A publicação foi excluída do sistema.'));
                }
                $this->Session->setFlash(__('The publication has been deleted.'));
            } else {
                $this->Session->setFlash(__('The publication could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('Você não tem permissão para apagar a publicação de outro usuário.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function review($id = null) {
        $this->layout = 'userpage';
        if (!$this->Publication->exists($id)) {
            throw new NotFoundException(__('Publicação Inválida'));
        }
        //Restringe avaliação somente a professores
        if ($this->Auth->user('role') != 1) {
            $this->Session->setFlash(__('Você não tem permissão para acessar essa funcionalidade'));
            return $this->redirect(array('action' => 'index'));
        }else{
        $status = $this->Publication->find('first', array('fields' => array('Publication.status'), 'conditions' => array('Publication.id' => $id)));
        $status_atual = $status['Publication']['status'];
        }
        //Verifica se a publicação já foi avaliada
        if ($status_atual != 0) {
            $this->Session->setFlash(__('A publicação já foi avaliada!'));
            return $this->redirect(array('action' => 'index'));
        }
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
                    $this->Session->setFlash('Publicação avaliada com sucesso.','success');
                    return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Publication.' . $this->Publication->primaryKey => $id));
            $this->request->data = $this->Publication->find('first', $options);
        }
    }

    public function noavaliable() {
        //Se for aluno ele traz apanas as não avaliadas do próprio aluno
        if ($this->Auth->user('role') == 0) {
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id'), "Publication.status" => 0))));
        } else {
            //senão, traz todas as publicações não avaliadas
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 0))));
        }
    }

    public function profile() {
        $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id')))));
    }

    public function disapproved() {
        //se for aluno ele traz apanes as reprovado do próprio aluno
        if ($this->Auth->user('role') != 1) {
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id'), "Publication.status" => 2))));
        } else {
            //senão, traz todas as publicações reprovadas
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 2))));
        }
    }

    public function inappropriate() {
        //se for aluno ele traz apanes as impróprias do próprio aluno
        if ($this->Auth->user('role') != 1) {
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.user_id" => $this->Auth->user('id'), "Publication.status" => 3))));
        } else {
            //senão, traz todas as publicações improprias
            $this->set('publications', $this->Publication->find('all', array('conditions' => array("Publication.status" => 3))));
        }
    }

}
