 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Perfil
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Perfil</a></li>
            <li class="active">Alterar Perfil</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">            
            <!-- right column -->
            <div class="box box-primary">
                </div><!-- /.box-header -->
            <div class="col-md-8 col-md-offset-2">
             <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"> Alterar Perfil</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <?php echo $this->Form->create('User', array( 'class' => 'form-horizontal')); ?>
	
                
                  <div class="box-body">
                    <div class="form-group">  
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                       <?php echo $this->Form->input('email', array('label' => false, 'type' => 'email' , 'class' => 'form-control', 'id' => 'inputEmail3',  'placeholder' =>'Email' )); ?> 
                      </div>
                    </div>
                        <input type="hidden" class="form-control" id="inputAtivo3">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
                      <div class="col-sm-10">
                        <?php echo $this->Form->input('password', array('label' => false, 'type' => 'password' , 'class' => 'form-control', 'id' => 'inputEmaiSenhal3',  'placeholder' =>'Senha' )); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputName3" class="col-sm-2 control-label">Nome</label>
                      <div class="col-sm-10">
                         <?php echo $this->Form->input('name', array('label' => false, 'type' => 'text' , 'class' => 'form-control', 'id' => 'inputName3',  'placeholder' =>'Nome' )); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPhone3" class="col-sm-2 control-label">Telefone</label>
                      <div class="col-sm-10">
                        <?php echo $this->Form->input('phone', array('label' => false, 'type' => 'number' , 'class' => 'form-control', 'id' => 'inputPhone3',  'placeholder' =>'Phone' )); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress3" class="col-sm-2 control-label">Endereço</label>
                      <div class="col-sm-10">
                         <?php echo $this->Form->input('address', array('label' => false, 'type' => 'number' , 'class' => 'form-control', 'id' => 'inputMatricula3',  'placeholder' =>'Matrícula' )); ?> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress3" class="col-sm-2 control-label">Tipo</label>
                      <div class="col-sm-10">
                         <?php echo $this->Form->input('role', array('placeholder' => 'Tipo', 'label' => false, 'class' => 'form-control', 'placeholder' => 'tipo', 'options' => array("Student","Teacher")));  ?>
                        
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="/worldshare/src/publications/" class="btn btn-default pull-right">Cancelar</a>
                    <?php
                   $options = array(
                    'label' => 'Alterar',
                    'class' => 'btn btn-success pull-right',
                    'div' => false   
                    );                                              
                   echo $this->Form->end($options); 
                        ?> 
                     
                    
                  </div><!-- /.box-footer -->
                
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password',array('label' => 'Senha'));
		echo $this->Form->input('name',array('label' => 'Nome'));
		echo $this->Form->input('phone',array('label' => 'Telefone'));
		echo $this->Form->input('address',array('label' =>'Matricula'));
		echo $this->Form->input('registration');
	echo $this->Form->input('role', array('options' => array("Student","Teacher")));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ratings'), array('controller' => 'ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rating'), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
