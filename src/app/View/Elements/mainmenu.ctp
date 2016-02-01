   <header class="main-header">
        <!-- Logo -->
        <a href="/worldshare/src/publications" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>W</b>SH</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>World</b>SHARE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
            
            
          <div class="navbar-custom-menu">
              
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->   

                <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
               
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
               
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
             
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'user-image')); ?>
                  <span class="hidden-xs"> 
                      
                       <?php foreach ($users as $user):
                                    echo h($user['User']['name']); 	
                                    endforeach; 
                      	
                       ?></span>
                </a>
                
                  <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      
                    <?php echo $this->Html->image('theme/user2-160x160.jpg' , array('class' =>'img-circle')); ?>
                    
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-12 text-center">
                      <a href="#">Publicações</a>
                    </div>
                      
                  </li>
                  <!-- Menu Footer-->
                  <li class="">
                    <div class="pull-left">
                        
                      <a href="/worldshare/src/users/view/<?php echo $user['User']['id']?>" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="/worldshare/src/users/logout" class="btn btn-default btn-flat"> Sair  </a>
                    </div>
                  </li>
                </ul>
              </li>
                              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
            <div class="col-lg-4">
              <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->  
        
            </div>
        </nav>
      </header>