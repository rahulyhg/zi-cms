<?php
$base = str_replace('admin/', '', base_url());
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?> &#8212; Administrator Blog</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/sweetalert2.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/skins/skin-purple-light.min.css');?>">
  <!-- Style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/style.css');?>">

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
  <div class="box-header bg-purple text-center">
    <h4 class="box-title">Sign in to start your session</h4>
  </div>
  <div class="login-box-body">
    <form action="<?=base_url('auth/login');?>" method="post">
      <div class="form-group has-feedback">
        <label for="Username">Username or Email</label>
        <input type="text" name="user" class="form-control" id="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="Password">Password</label>
        <input type="password" name="password" class="form-control" id="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn bg-purple btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>
    <a href="<?=$base;?>"><i class="fa fa-long-arrow-left"></i> Back to Blog</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- SweetAlert -->
<script src="<?=base_url('assets/dist/js/sweetalert2.all.min.js');?>"></script>
<?php if ($this->session->flashdata('msg')): ?>
<script>
  Swal.fire({
    type: 'error',
    title: '<?=$this->session->flashdata('msg');?>'
  })
</script>
<?php endif; ?>
</body>
</html>