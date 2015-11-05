
<?php

  echo $this->Session->flash('auth');
  echo $this->Form->create('User', array('action' => 'login', 'novalidate' => 'true'));
  echo $this->Form->input('email', array('label' => 'Email'));
  echo $this->Form->input('password', array('label' => 'Senha'));
  echo $this->Form->end('Login');
?>
