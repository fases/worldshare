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
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Linha do tempo
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Linha do Tempo</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<div class="row">
    <?php echo $this->Session->flash(); ?>
	           <?php

    $i = 0;

    foreach ($publications as $publication): ?>
            <div class="col-md-9">
              <!-- Box Comment -->
              <div class="box box-widget">

                <div class='box-header with-border'>
                  <div class='user-block'>
                    <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'img-circle')); ?>
                    <span class='username'>
                        <a href="#"><?php echo $this->Html->link($publication['User']['name'], array('controller' => 'users', 'action' => 'view', $publication['User']['id'])); ?>
                        </a></span>
                    <span class='description'><td><?php echo h($publication['Publication']['registration']); ?>&nbsp;</td></span>
                      <span class='description'><td><?php echo h($publication['Matter']['name']); echo ' - '.h($publication['Type']['name']);?></td></span>

                  </div><!-- /.user-block -->
                  <div class='box-tools'>

                    <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                  <div class='box-header'>
                    <h4 class="attachment-heading pull-left"><td><?php echo h($publication['Publication']['title']); ?>&nbsp;</td></h4>
                     <?php  if($this->Session->read('Auth.User.role') == 1 && $publication['Publication']['status'] == 0){

                       echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil')).'Avaliar', array('controller' => 'publications', 'action' => 'review', $publication['Publication']['id']), array('escape' => false , 'class' => 'btn btn-warning btn-xs pull-right'));

                        }?>
                  </div>
                <div class='box-body textJustified'>

                  <!-- post text -->
                  <p><td><?php echo h($publication['Publication']['text_publication']); ?>&nbsp;</td></p>



                  <!-- Social sharing buttons -->
                  <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-share')).'Publicação Completa',
                      array('controller' => 'publications', 'action' => 'view',$publication['Publication']['id']),
              array('class' => 'btn btn-primary btn-xs','escape' => false)); ?>
                    <div class="pull-right">
                    <div id="<?php echo '#rating'.$publication['Publication']['id']; ?>">
                    <?php
                    echo $this->Js->link('Curtir', array('controller'=>'ratings', 'action'=>'add'),
                      array('update'=>'#rating'.$publication['Publication']['id']));
                    echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
                    ?>
                    </div>
                    </div>
                </div><!-- /.box-body -->


                <div class='box-footer box-comments' >
                <div id='<?php echo $publication['Publication']['id']; ?>'>
                    <?php foreach($comments as $comment): ?>

                    <?php if($publication['Publication']['id'] == $comment['Comment']['publication_id']){ ?>
                  <div class='box-comment'>
                    <!-- User image -->
                  <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'img-circle')); ?>
                    <div class='comment-text'>
                      <span class="username">
                        <?php echo $this->Html->link($comment['User']['name'],array('controller' => 'users','action' => 'view',$comment['User']['id'])); ?>
                           <div class='box-tools pull-right'>
                    <?php
                                if(($this->Session->read('Auth.User.id') == $publication['Publication']['user_id']) ||  ($this->Session->read('Auth.User.id') == $comment['Comment']['user_id'])){
                                 echo $this->Js->submit('Excluir',array('url' => array('controller' => 'comments',
                                            'action' => 'delete',$comment['Comment']['id'],h($publication['Publication']['id'])),
                                                        'update' => '#'.$publication['Publication']['id'],'class' => 'btn bg-red btn-box-tool'));

                         }     ?>
                  </div><!-- /.box-tools -->

                      </span><!-- /.username -->
                      <?php echo $comment['Comment']['text']; ?>
                    </div><!-- /.comment-text -->

                  </div><!-- /.box-comment -->
                    <?php } ?>
    <?php endforeach; ?>
                <div class="box-footer">
                  <form class='form-horizontal'>
                        <div class='form-group margin-bottom-none'>
                          <div class='col-sm-9'>
                        <?php
                            echo $this->Form->create('Comment',array('action' => 'add'));
                            echo $this->Form->input('text', array('class' => 'form-control input-sm', 'label' => false, 'placeholder' => 'Comentário...'));

                        ?>

                          </div>
                          <div class='col-sm-3'>
                              <?php
                                 echo $this->Js->submit('Comentar',array('url' => array('controller' => 'comments',
                                            'action' => 'add',h($publication['Publication']['id'])),
                                                        'update' => '#'.$publication['Publication']['id'],'class' => 'btn btn-success pull-right btn-block btn-sm'));
//                 $options = array(
//                    'label' => 'Comentar',
//                    'class' => 'btn btn-danger pull-right btn-block btn-sm',
//                    'div' => false
//                    );
//                   echo $this->Form->end($options);
                                 ?>

                            </div>
                        </div>
                  </form>
                </div><!-- /.box-footer -->
                </div>
                 </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->



        <?php


            if($i == 0){
             ?>
                  <div class="col-md-3 pull-right">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Ranking</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome</th>
                      <th>Progresso</th>
                      <th style="width: 40px">Média </th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-yellow">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-light-blue">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-green">90%</span></td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->


    <?php  }  $i++; ?>


        <?php endforeach; ?>


          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php
            echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>
