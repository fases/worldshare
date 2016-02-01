
  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('AdminLTE'); ?>
    <?php echo $this->Html->css('AdminLTE.min'); ?>
    <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'); ?>
    <?php echo $this->Html->css('plugins/iCheck/square/blue.css'); ?>

  </head>
  <body class="imgbackground">
    <div class="login-box">
      <div class="login-logo">
        <a><b>World</b>SHARE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
          <?php echo $this->Session->flash('auth'); ?>
        <p class="login-box-msg"> Faça login ou cadastre-se</p>
        
          <div class="form-group has-feedback">
             <?php 
                   echo $this->Form->create('User', array('action' => 'login', 'novalidate' => 'true'));
                   echo $this->Form->input('email', array('label' => false, 'type' => 'email' , 'class' => 'form-control', 'placeholder' => 'Email'));          
              ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <?php echo $this->Form->input('password', array('label' => false, 'type' => 'password' , 'class' => 'form-control', 'placeholder' => 'Senha'));     ?>  
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
                <?php
                 $options = array(
                    'label' => 'Entrar',
                    'class' => 'btn  btn-facebook btn-block btn-flat',
                    'div' => false   
                    );                                              
                   echo $this->Form->end($options); 
                                 ?>
            </div><!-- /.col -->
          </div>
        

        <div class="social-auth-links text-center">
          <p>OU</p>
          <a href="#" class="btn btn-block btn-social btn-facebook"><i class="fa fa-unlock-alt"></i> Recuperar senha</a>
          <a href="add" class="btn btn-block btn-social btn-google"><i class="fa fa-user-plus"></i> Registre-se</a>
        </div><!-- /.social-auth-links -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

?>
