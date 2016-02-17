 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar Perfil
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Perfil</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            
                    <div class="box box-primary">
                </div><!-- /.box-header -->
              <!-- Profile Image -->
              <div>
               <div class="col-md-8 col-md-offset-2">
             <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"> Alterar Perfil</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <?php echo $this->Form->create('User', array( 'class' => 'form-horizontal')); ?>
	
                
                  <div class="box-body">
                    <div class="form-group">  
                      <label for="inputEmail" class="col-sm-2 control-label">Nome de Usuário</label>
                      <div class="col-sm-10">
                       <?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control', 'id' => 'inputName',  'placeholder' =>'Nome' )); ?> 
                      </div>
                    </div>
                    <div class="form-group">  
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                       <?php echo $this->Form->input('email', array('label' => false, 'type' => 'email' , 'class' => 'form-control', 'id' => 'inputEmail3',  'placeholder' =>'Email' )); ?> 
                      </div>
                    </div>
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
                      <label for="inputAddress3" class="col-sm-2 control-label">Tipo</label>
                      <div class="col-sm-10">
                         <?php echo $this->Form->input('role', array('placeholder' => 'Tipo', 'label' => false, 'class' => 'form-control', 'placeholder' => 'tipo', 'options' => array("Student","Teacher"))); ?>
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
                               <?php 
            echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>
                    
                  </div><!-- /.box-footer -->
                
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
            </div><!--/.col (right) -->
             

                   </div><!-- /.box -->
           
           

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


