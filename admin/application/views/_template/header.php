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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/sweetalert2.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/skins/skin-purple-light.min.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
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
  <!-- jQuery 3 -->
  <script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
  <!-- CK Editor -->
  <script src="<?=base_url('assets/bower_components/ckeditor/ckeditor.js');?>"></script>
  <!-- SweetAlert -->
  <script src="<?=base_url('assets/dist/js/sweetalert2.all.min.js');?>"></script>
  <script>
    let base_url = '<?=base_url();?>';
  </script>
</head>
<body class="hold-transition skin-purple-light fixed sidebar-mini <?php if(isset($template)){foreach($template as $view){echo $view." ";}}?>">
<div class="wrapper">
  
  <!-- Header -->
  <?php require_once('_topmenu.php'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once('_sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$subtitle;?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$subtitle;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">