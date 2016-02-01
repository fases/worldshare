     <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                
                    <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'img-circle')); ?>
              
            </div>
            <div class="pull-left info">
              <p> <?php foreach ($users as $user):
                                    echo h($user['User']['name']); 	
                                    endforeach; 
                      	
                       ?></span></p>
              <a href="#"> <?php echo ($user['User']['role'] == 0?"<i class='fa  fa-user text-success'></i>Estudante":"<i class='fa fa-graduation-cap text-warning'></i>Professor"); ?> </span></a>
            </div>          
</div>
         <br />
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="treeview">
              <a href="/worldshare/src/publications">
                <i class="fa fa-newspaper-o"></i> <span>Linha do Tempo</span> 
              </a>
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Criar nova publicação...</span> 
              </a>
            </li>
            <li class="header">PERFIL</li>
            <li class="treeview">
              <a href="/worldshare/src/users/edit/ <?php echo ($user['User']['id'])?>">
                <i class="fa fa-list-alt"></i>
                <span>Editar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-lock"></i>
                <span>Alterar Senha</span>
              </a>
            </li>
            <li class="header">PUBLICAÇÕES</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Todas</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-circle text-green"></i>
                <span>Aprovadas</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-circle text-aqua"></i>
                <span>Não avalidas</span>
              </a>
              
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-circle text-red"></i>
                <span>Reprovadas</span>
              </a>
              
            </li>  
            <li class="header">OPÇÕES</li>
            <li class="treeview">
              <a href="/worldshare/src/users/logout">
                <i class="fa  fa-sign-out"></i>
                <span>Sair</span>
              </a>
              
            </li>    
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>