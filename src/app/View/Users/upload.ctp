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
                 <?php echo $this->Form->create('User', array('type' => 'file', 'novalidate')); ?>
	
                
                  <div class="box-body">
                    <div class="form-group">  
                      <label for="inputEmail" class="col-sm-2 control-label">Foto</label>
                     <div class="form-group has-feedback">
              <?php echo $this->Form->file('photo',array('class' => 'form-control col-md-7 col-xs-12','label' => false,'multiple')); ?> 
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


