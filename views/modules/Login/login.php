<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CynLTE | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Cyn</b>LTE
  </div>
  <?php  
    if($this->session->flashdata('login_failed')){
      echo '
      <div class="alert alert-danger alert-dismissible">'. $this->session->flashdata('login_failed').'</h4></div>';
    }else if($this->session->flashdata('wrong input')){
      echo '
      <div class="alert alert-danger alert-dismissible">'. $this->session->flashdata('wrong input').'</h4></div>';
    }
  ?>
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php $attributes = array('id' => 'login_form');?>
    <?php echo form_open('login/login_validate', $attributes); ?>
    <div class="form-group has-feedback">
    <?php 
          $data = array(
            'class' => 'form-control',
            'name'  => 'user_email',
            'id'    => 'usn',
            'placeholder' => 'Username'
          );
          echo form_input($data);
    ?>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <?php 
      $data = array(
        'class' => 'form-control',
        'name'  => 'password',
        'id'    => 'usn',
        'placeholder' => '***********'
      );
      echo form_password($data);
      ?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <?php
                  echo form_checkbox('Remember me', '', '');
              ?> 

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <?php

          $data = array(
          'class' => 'btn btn-primary btn-block btn-flat',
          'name' => 'Submit',
          'id' => 'usn',
          'value' => 'Login'
          );
        echo form_submit($data);

        ?>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close();?>

 
    <?php 
        echo anchor('', 'I forgot my password');
        echo '<br>';
    ?>
    <a href="<?php echo base_url();?>modules/registration" class="text-center">Register</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
