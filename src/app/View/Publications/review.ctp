<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Avaliar
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Publicação</a></li>
            <li class="active"> Avaliar Publicação</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <!-- right column -->
            <div class="col-md-10 col-md-offset-1">
                <!-- Horizontal Form -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Avaliar Publicação</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php echo $this->Form->create('Publication',array('action' => 'review','class' => 'form-horizontal')); ?>
                    <?php  
    echo $this->Form->input('id',array('type' => 'hidden'));
    echo $this->Form->input('registration',array('type' => 'hidden'));
    echo $this->Form->input('title',array('type' => 'hidden'));
    echo $this->Form->input('type_id',array('type' => 'hidden'));
    echo $this->Form->input('user_id',array('type' => 'hidden'));
    echo $this->Form->input('matter_id',array('type' => 'hidden')); ?> 
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputAddress3" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <?php echo $this->Form->input('status',array('type' => 'select','class' => 'form-control','options' => array('Não avaliada','Aprovada','Reprovada','Imprópria'),'label' => false)); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress3" class="col-sm-2 control-label"> Texto da avaliação</label>
                                <div class="col-sm-10">
                                    <?php echo $this->Form->textarea('text_review',array('class' => 'form-control','rows' => '10','placeholder'=> 'Avaliação...','label' => false)); ?>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="btn-group" role="group">
                                    <?php
                                        echo $this->Html->link('Cancelar', 
                          array('controller' => 'publications', 'action' => 'index'), 
                  array('class' => 'btn btn-default','div' => 'false'));
                                    $options = array('label' => 'Avaliar', 'class' => 'btn btn-primary','div' => false);
                        echo $this->Form->end($options);
                                    ?>
                                </div>
                            </div>    
                        </div><!-- /.box-footer -->
                </div><!-- /.box -->
                <!-- general form elements disabled -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
                    <?php 
            echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>
