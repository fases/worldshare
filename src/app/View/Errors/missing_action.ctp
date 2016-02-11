<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>World</b>SHARE</a>
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Página não encontrada.</h3>

          <p>
           Não foi possível encontrar a página que você estava procurando. Você pode voltar para as  
            <?php if(isset($this->Session->read('Auth.User.id')){
                echo $this->Html->link('Publicações',array('controller' => 'publications','action' => 'index'));
                echo "ou";
              }
                echo $this->Html->link('Fazer login',array('controller' => 'users','action' => 'login')); 
              ?>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
  <!-- /.lockscreen-item -->
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2015-2016 <b><a href="http://almsaeedstudio.com" class="text-black">IFRN</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>