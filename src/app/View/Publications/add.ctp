<style>
    .link{
       color: white;
    }
</style>
<script type="text/javascript">
$(function(){
 $("a").click(function (event) {
 event.preventDefault();
 var idElemento = $(this).attr("href");
 var deslocamento = $(idElemento).offset().top;
$('html, body').animate({ scrollTop: deslocamento }, 'slow');
});
  });
</script>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Nova Publicação
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Nova Publicação</li>
          </ol>
        </section>

        <!-- Main content -->
         <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
             <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-body">
                  <div class="form-group">
                  	<?php echo $this->Form->create('Publication',array('action' => 'add')); ?>
                      <label>Título</label>
                    <!-- <input class="form-control" placeholder="Titulo"> -->
                    <?php echo $this->Form->input('title',array('class' => 'form-control','placeholder' => 'Título','label' => false)); ?>
                  </div>
                  <?php
                  if($this->Session->read('Auth.User.role') == 0){ ?>
                  <div class="form-group">
                     <div class="form-group">
                      <label>Disciplina</label>
                      <?php echo $this->Form->input('matter_id',array('type' => 'select','class' => 'form-control','options' => $matters,'label' => false)); ?>
                    </div>
                  </div>
                  <?php }?>
                  <div class="form-group">
                    <label> Texto</label>
                    <?php echo $this->Form->textarea('text_publication',array('class' => 'form-control','rows' => '10','placeholder'=> 'Texto...','label' => false)); ?>
                  </div>
                  <div class="form-group">
                    <label> Tipo</label>
                    <?php echo $this->Form->input('type_id',array('type' => 'select','class' => 'form-control','options' => $types,'label' => false)); ?>
                  </div>
                    <label> Upload de arquivos</label>
                  <div class="form-group">
                    <div class="btn btn-default btn-file">

                      <i class="fa fa-paperclip"></i> Arquivo
                      <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
                </div><!-- /.box-body -->

                  <div class="box-footer">
                    <?php
                        echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-mail-reply')).' Voltar',
                          array('controller' => 'publications', 'action' => 'index'),
                  array('class' => 'btn btn-default pull-right','escape' => false,'div' => 'false'));
                        $options = array('label' => 'Publicar', 'class' => 'btn btn-primary pull-right');
                        echo $this->Form->end($options);
                  ?>
                  </div>


              </div><!-- /. box -->
            </div>
          </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
                                         <?php
            echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>
