<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Perfil
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Perfil</a></li>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'profile-user-img img-responsive img-circle')); ?>
                  <h3 class="profile-username text-center"><?php echo h($user['User']['name']); ?></h3>
                  <p class="text-muted text-center"><?php echo ($user['User']['role'] == 0?"<i class='fa  fa-user text-success'></i>Estudante":"<i class='fa fa-graduation-cap text-warning'></i>Professor"); ?> </p>
                </div><!-- /.box-body -->


              <!-- About Me Box -->
             <div class="box-body">
                 <?php if($user['User']['role'] == 1){ ?>
                  <strong><i class="fa fa-book margin-r-5"></i> Local de Ensino </strong>
                  <p class="text-muted">

                   <?php echo h($user['Teacher']['institution']);
                    } ?>
                  </p>
                  <hr>
                  <strong><i class="fa fa-envelope margin-r-5"></i> E-mail</strong>
                  <p class="text-muted"><?php echo h($user['User']['email']); ?></p>
                  <hr>
                  <strong><i class="fa fa-calendar"></i> Membro desde </strong>
                  <p class="text-muted">
                    <?php echo h($user['User']['registration']); ?>
                  </p>
                  <hr>
                  <strong><i class="fa fa-graduation-cap"></i> Tipo </strong>
                  <!-- Para aluno  fa-user -->
                  <p class="text-muted">
                   <?php echo ($user['User']['role'] == 0?"Estudante":"Professor"); ?>
                  </p>
                  <hr>
                  <?php if($user['User']['role'] == 1){ ?>
    <strong><i class="fa fa-file-text-o"></i> Matéria </strong>
                  <p class="text-muted">
                    <?php echo $matters['Matter']['name']; ?>
                  </p>
                    <?php    }   ?>
                <?php
                  if(($this->Session->read('Auth.User.id') == $user['User']['id'])){
                 echo $this->Html->link('Alterar Dados', array('controller' => 'users', 'action' => 'edit',$user['User']['id']), array('class' => 'btn btn-success pull-right'));
                  }
                 ?>



                </div><!-- /.box-body -->
                   </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <div class="box box-primary">
                </div><!-- /.box-header -->
                   <div class="box-header with-border">
                  <h3 class="box-title">Minhas Publicações</h3>
                </div><!-- /.box-header -->



                <div class="tab-content">

                  <div class="active tab-pane" id="activity">
                         <!-- Post -->
                       <!-- Box Comment -->
              <div class="box box-widget">
                <?php
                  if(($this->Session->read('Auth.User.id') == $user['User']['id'])){
                ?>
                   <div class='box-header with-border'>
                  <div class='user-block'>

                    <a href='/worldshare/src/users/view/<?php echo h($user['User']['id']); ?>' class=' btn-xs btn-info'>Todas</a>
                      <a href='/worldshare/src/users/view/<?php echo h($user['User']['id']); ?>/0' class=' btn-xs btn-primary'>Não avaliadas</a>
                     <a href='/worldshare/src/users/view/<?php echo h($user['User']['id']); ?>/1' class=' btn-xs btn-success'>Aprovadas</a>
                    <a href='/worldshare/src/users/view/<?php echo h($user['User']['id']); ?>/2' class=' btn-xs btn-warning'>Reprovadas</a>
                       <a href='/worldshare/src/users/view/<?php echo h($user['User']['id']); ?>/3' class=' btn-xs btn-danger'>Impróprias</a>
                  </div><!-- /.user-block -->
                </div><!-- /.box-header -->
                 <?php
                  }
                    ?>
                  <?php foreach ($publications as $publication):

                  ?>
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle' src='dist/img/user1-128x128.jpg' alt='user image'>
                    <span class='username'><a href="#"> <?php echo ($publication['User']['name']); ?></a></span>
                    <span class='description'><?php echo ($publication['Publication']['registration']); ?></span>
                  </div><!-- /.user-block -->
                  <div class='box-tools'>
                      <?php
                          if($publication['Publication']['status'] == 0){
                            echo "<a href='#' class=' label label-primary'>";
                            echo 'Não avaliada';
                          }else if($publication['Publication']['status'] == 1){
                            echo "<a href='#' class=' label label-success'>";
                            echo 'Aprovada';
                          }else if($publication['Publication']['status'] == 2){
                           echo "<a href='#' class=' label label-warning'>";
                           echo 'Reprovada';
                          }else{
                            echo "<a href='#' class=' label label-danger'>";
                            echo 'Imprópria';
                          }
                          ?>

                      </a>
                    <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                    <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class='box-header with-border'>
                    <h4 class="attachment-heading"><td><?php echo h($publication['Publication']['title']); ?>&nbsp;</td></h4>
                  </div>
                <div class='box-body textJustified'>

                  <!-- post text -->
                  <p><td><?php echo h($publication['Publication']['text_publication']); ?>&nbsp;</td></p>


                  <hr>
                  <!-- Social sharing buttons -->
                  <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-share')).'Publicação Completa',
                      array('controller' => 'publications', 'action' => 'view',$publication['Publication']['id']),
              array('class' => 'btn btn-primary btn-xs','escape' => false)); ?>
                  <button class='btn btn-primary btn-xs'><i class='fa fa-thumbs-o-up'></i> Like</button>
                  <span class='pull-right text-muted'>45 likes - 2 comments</span>
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

              </div><!-- /.box -->    <!-- /. Post -->
            <?php endforeach; ?>
                    <?php
            echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>


                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
