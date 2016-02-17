<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
      
    <?php echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->Html->css('bootstrap.min.css'); ?>
    <?php echo $this->Html->css('AdminLTE'); ?>
    <?php echo $this->Html->css('AdminLTE.min'); ?>
    <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'); ?>
    <?php echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'); ?>
    <?php echo $this->Html->css('skins/_all-skins.min.css'); ?> 
    <?php echo $this->Html->css('plugins/iCheck/flat/blue.css'); ?> 
    <?php echo $this->Html->css('plugins/morris/morris.css'); ?> 
    <?php echo $this->Html->css('plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?> 
    <?php echo $this->Html->css('plugins/datepicker/datepicker3.css'); ?> 
    <?php echo $this->Html->css('plugins/daterangepicker/daterangepicker-bs3.css'); ?> 
    <?php echo $this->Html->css('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?> 
      
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php echo $this->element('mainmenu'); ?>
        
    <?php echo $this->element('sidebar'); ?>

      <!-- Content Wrapper. Contains page content -->
      
        <!-- Content Header (Page header) -->
       
       <?php echo $this->fetch('content'); ?>
                
      <!-- /.content-wrapper -->
      <?php echo $this->element('footer'); ?>

    
    </div><!-- ./wrapper -->

      <?php //echo $this->Html->script('plugins/jQuery/jQuery-2.1.4.min.js'); ?> 
    
   
    <?php echo $this->Html->script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->script('bootstrap.min.js');?>
    <?php echo $this->Html->script('jquery'); ?>
    <!-- Morris.js charts -->
    <?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'); ?>
    <?php echo $this->Html->script('plugins/morris/morris.min.js') ?>
    <!-- Sparkline -->
    <?php echo $this->Html->script('plugins/sparkline/jquery.sparkline.min.js') ?>
    <!-- jvectormap -->
    <?php echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>
    <?php echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>
    <!-- jQuery Knob Chart -->
    <?php echo $this->Html->script('plugins/knob/jquery.knob.js') ?>
    <!-- daterangepicker -->
    <?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') ?>
    <?php echo $this->Html->script('plugins/daterangepicker/daterangepicker.js') ?>
    <!-- datepicker -->
    <?php echo $this->Html->script('plugins/datepicker/bootstrap-datepicker.js') ?>
    <!-- Bootstrap WYSIHTML5 -->
    <?php echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>
    <!-- Slimscroll -->
    <?php echo $this->Html->script('plugins/slimScroll/jquery.slimscroll.min.js') ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('plugins/fastclick/fastclick.min.js') ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('app.min.js') ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <?php echo $this->Html->script('pages/dashboard.js') ?>
    <!-- AdminLTE for demo purposes -->
    <?php echo $this->Html->script('demo.js') ?>
  </body>
</html>
