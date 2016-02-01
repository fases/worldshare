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
                  <div class='box-header with-border'>
                    <h4 class="attachment-heading"><td><?php echo h($publication['Publication']['title']); ?>&nbsp;</td></h4>
                  </div>
                <div class='box-body textJustified'>
                    
                  <!-- post text -->
                  <p><td><?php echo h($publication['Publication']['text_publication']); ?>&nbsp;</td></p>

                  
                  <hr>
                  <!-- Social sharing buttons -->
                  <button class='btn btn-default btn-xs'><i class='fa fa-share'></i> Post completo</button>
                  <button class='btn btn-default btn-xs'><i class='fa fa-thumbs-o-up'></i> Like</button>
                  <span class='pull-right text-muted'>45 likes - 2 comments</span>
                </div><!-- /.box-body -->
                <div class='box-footer box-comments'>
                  <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='dist/img/user3-128x128.jpg' alt='user image'>
                    <div class='comment-text'>
                      <span class="username">
                        Maria Gonzales
                        <span class='text-muted pull-right'>8:03 PM Today</span>
                      </span><!-- /.username -->
                      It is a long established fact that a reader will be distracted
                      by the readable content of a page when looking at its layout.
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->
                  <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='dist/img/user5-128x128.jpg' alt='user image'>
                    <div class='comment-text'>
                      <span class="username">
                        Nora Havisham
                        <span class='text-muted pull-right'>8:03 PM Today</span>
                      </span><!-- /.username -->
                      The point of using Lorem Ipsum is that it has a more-or-less
                      normal distribution of letters, as opposed to using
                      'Content here, content here', making it look like readable English.
                    </div><!-- /.comment-text -->
                  </div><!-- /.box-comment -->
                </div><!-- /.box-footer -->
                <div class="box-footer">
                  <form class='form-horizontal'>
                        <div class='form-group margin-bottom-none'>
                          <div class='col-sm-9'>
                            <input class="form-control input-sm" placeholder="Response">
                          </div>                          
                          <div class='col-sm-3'>
                            <button class='btn btn-danger pull-right btn-block btn-sm'>Comentar</button>
                          </div>                          
                        </div>                        
                  </form>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
              
    
        
        <?php 
            
           
            if($i == 0){
             ?>
                  <div class="col-md-3">
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

