     <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php
              $path = $user['User']['photo'];
              if(is_null($user['User']['photo'])){
                echo $this->Html->image('theme/pessoa-sem-foto.jpg', array('class' => 'img-circle'));   
              }else{
                echo $this->Html->image('anexos/'.$path, array('class' => 'img-circle')); 
              }
                ?>
            </div>
            <div class="pull-left info">
              <p>
                          <?php echo $this->Session->read('Auth.User.name'); ?></span>
              -
               <a href="#"> <?php echo ($this->Session->read('Auth.User.role') == 0?"Aluno":"Prof."); ?> </span></a>  
            </p>
           <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')).'<span>Editar Imagem</span>',
                array('controller' => 'users', 'action' => 'upload',$this->Session->read('Auth.User.id')), array('escape' => false));?>
         
            
          </div>
</div>
         <br />
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="treeview">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-newspaper-o')).'<span>Linha do Tempo</span>',
                array('controller' => 'publications', 'action' => 'index'), array('escape' => false));?>
            </li>
              <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')).'<span>Criar Nova Publicação</span>',
                array('controller' => 'publications', 'action' => 'add'), array('escape' => false));?>
            </li>
            <li class="header">PERFIL</li>
            <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list-alt')).'<span>Editar</span>',
                array('controller' => 'users', 'action' => 'edit',$this->Session->read('Auth.User.id')), array('escape' => false));?>
            </li>
            <li class="treeview">
               <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-user')).'<span>Visualizar Perfil</span>',
                array('controller' => 'users', 'action' => 'view',$this->Session->read('Auth.User.id')), array('escape' => false));?>
            </li>
              <?php if($this->Session->read('Auth.User.role') == 0){ ?>
            <li class="header">MINHAS PUBLICAÇÕES</li>
            <li class="treeview">
               <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-aqua')).'<span>Todas</span>',
                array('controller' => 'publications', 'action' => 'index', 3), array('escape' => false));?>
            </li>
            <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-green')).'<span>Aprovadas</span>',
                array('controller' => 'publications', 'action' => 'index', 1), array('escape' => false));?>
            </li>
            <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-yellow')).'<span>Não avaliadas</span>',
                array('controller' => 'publications', 'action' => 'index' , 0), array('escape' => false));?>
            </li>
             <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-red')).'<span>Reprovadas</span>',
                array('controller' => 'publications', 'action' => 'index',2), array('escape' => false));?>
            </li>
              <?php }else{ ?>
              <li class="header">PUBLICAÇÕES</li>
            <li class="treeview">
               <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-green')).'<span>Todas</span>',
                array('controller' => 'publications', 'action' => 'index'), array('escape' => false));?>
            </li>
            <li class="treeview">
               <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-blue')).'<span>Minhas publicações</span>',
                array('controller' => 'publications', 'action' => 'index', 3), array('escape' => false));?>
            </li>
            <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-yellow')).'<span>Minha Área</span>',
                array('controller' => 'publications', 'action' => 'index', 1), array('escape' => false));?>
            </li>
            <li class="treeview">
              <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-circle text-red')).'<span>Avaliar</span>',
                array('controller' => 'publications', 'action' => 'index' , 0), array('escape' => false));?>
            </li>
              <?php } ?>
            <li class="header">OPÇÕES</li>
            <li class="treeview">
               <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-sign-out')).'<span>Sair</span>',
                array('controller' => 'users', 'action' => 'logout'), array('escape' => false));?>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <?php
              echo $this->Html->script('jquery',array('inline' => 'false'));
              echo $this->Js->writeBuffer(array('cache' => FALSE));
          ?>
