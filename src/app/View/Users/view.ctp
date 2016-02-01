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

                    }?>  
                   
                   
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
                  <?php if($user['User']['role'] == 0){
                            
                            }else{ ?>
    <strong><i class="fa fa-file-text-o"></i> Matéria </strong>
                  <p class="text-muted">
                    <?php echo h($matter['Matter']['name']); ?>
                  </p>
                  <hr>
                    <?php    }   ?>
                  <strong><i class="fa fa-graduation-cap"></i> Matrícula </strong>
                  <!-- Para aluno  fa-user -->
                  <p class="text-muted">
                   <?php echo ($user['User']['address']); ?>
                  </p>
                 <hr>
                  
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
                   <div class='box-header with-border'>
                  <div class='user-block'>
                      <a href='/worldshare/src/users/view/<?php echo h($user['User']['id']); ?>/0' class=' btn-xs btn-primary'>Não avaliadas</a>
                     <a href='#' class=' btn-xs btn-success'>Aprovadas</a>
                    <a href='#' class=' btn-xs btn-warning'>Reprovadas</a>
                       <a href='#' class=' btn-xs btn-danger'>Impróprias</a>
                  </div><!-- /.user-block -->
                </div><!-- /.box-header -->
                 
                  <?php foreach ($publications as $publication): 
                  
                  
                  ?>
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img class='img-circle' src='dist/img/user1-128x128.jpg' alt='user image'>
                    <span class='username'><a href="#"> <?php echo ($publication['User']['name']); ?></a></span>
                    <span class='description'><?php echo ($publication['Publication']['registration']); ?></span>
                  </div><!-- /.user-block --> 
                  <div class='box-tools'>
                      <a href='#' class=' label label-success'><?php 
                          
                          
                          if($publication['Publication']['status'] == 0){
                            echo 'Não avaliada';
                          }else if($publication['Publication']['status'] == 1){
                            echo 'Aprovada';
                          }else if($publication['Publication']['status'] == 2){
                            echo 'Reprovada';

                          }else{
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
              </div><!-- /.box -->    <!-- /. Post -->
            <?php endforeach; ?>

                 
               
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registration'); ?></dt>
		<dd>
			<?php echo h($user['User']['registration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($user['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th><?php echo __('Schedule'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['publication_id']; ?></td>
			<td><?php echo $comment['schedule']; ?></td>
			<td><?php echo $comment['text']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $comment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Publications'); ?></h3>
	<?php if (!empty($user['Publication'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Registration'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Text Publication'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th><?php echo __('Text Review'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Publication'] as $publication): ?>
		<tr>
			<td><?php echo $publication['id']; ?></td>
			<td><?php echo $publication['registration']; ?></td>
			<td><?php echo $publication['title']; ?></td>
			<td><?php echo $publication['text_publication']; ?></td>
			<td><?php echo $publication['user_id']; ?></td>
			<td><?php echo $publication['type_id']; ?></td>
			<td><?php echo $publication['status']; ?></td>
			<td><?php echo $publication['teacher_id']; ?></td>
			<td><?php echo $publication['text_review']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'publications', 'action' => 'view', $publication['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'publications', 'action' => 'edit', $publication['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'publications', 'action' => 'delete', $publication['id']), array('confirm' => __('Are you sure you want to delete # %s?', $publication['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ratings'); ?></h3>
	<?php if (!empty($user['Rating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th><?php echo __('Stars'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Rating'] as $rating): ?>
		<tr>
			<td><?php echo $rating['id']; ?></td>
			<td><?php echo $rating['user_id']; ?></td>
			<td><?php echo $rating['publication_id']; ?></td>
			<td><?php echo $rating['stars']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ratings', 'action' => 'view', $rating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ratings', 'action' => 'edit', $rating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ratings', 'action' => 'delete', $rating['id']), array('confirm' => __('Are you sure you want to delete # %s?', $rating['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rating'), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Teachers'); ?></h3>
	<?php if (!empty($user['Teacher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Institution'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Matter'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Teacher'] as $teacher): ?>
		<tr>
			<td><?php echo $teacher['id']; ?></td>
			<td><?php echo $teacher['institution']; ?></td>
			<td><?php echo $teacher['place']; ?></td>
			<td><?php echo $teacher['matter']; ?></td>
			<td><?php echo $teacher['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teachers', 'action' => 'view', $teacher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teachers', 'action' => 'edit', $teacher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teachers', 'action' => 'delete', $teacher['id']), array('confirm' => __('Are you sure you want to delete # %s?', $teacher['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
