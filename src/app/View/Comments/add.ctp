    <?php foreach($comments as $comment):?>
                  <div class='box-comment'>
                    <!-- User image -->
                    <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'img-circle')); ?>
                    <div class='comment-text'>
                      <span class="username">
                       <?php echo $this->Html->link($comment['User']['name'],array('controller' => 'users','action' => 'view',$comment['User']['id'])); ?>
                       <div class='box-tools pull-right'>
                    <?php                                          
                                if($comment['Comment']['user_id'] == $this->Session->read('Auth.User.id')){ 
                                 echo $this->Js->submit('Excluir',array('url' => array('controller' => 'comments',
                                            'action' => 'delete',$comment['Comment']['id'],$publications['Publication']['id']),
                                                        'update' => '#'.$publications['Publication']['id'],'class' => 'btn bg-red btn-box-tool')); 
                               }
                    ?>
                  </div><!-- /.box-tools -->
                      </span><!-- /.username -->
                      <?php echo $comment['Comment']['text']; ?>
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->
    <?php endforeach; ?>
    <div class="box-footer">
                  <form class='form-horizontal'>
                        <div class='form-group margin-bottom-none'>
                          <div class='col-sm-9'>
                        <?php 
                            echo $this->Form->create('Comment',array('action' => 'add'));
                            echo $this->Form->input('text', array('class' => 'form-control input-sm', 'label' => false, 'placeholder' => 'Comentário...','value' => '')); 
                                
                        ?>
                        
                          </div>                          
                          <div class='col-sm-3'>
                              <?php
                                 echo $this->Js->submit('Comentar',array('url' => array('controller' => 'comments',
                                            'action' => 'add',$publications['Publication']['id']),
                                                        'update' => '#'.$publications['Publication']['id'],'class' => 'btn btn-success pull-right btn-block btn-sm'));
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
<?php 
            echo $this->Html->script('jquery',array('inline' => 'false'));
            echo $this->Js->writeBuffer(array('cache' => FALSE));
        ?>

