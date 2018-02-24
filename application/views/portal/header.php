<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SyroPortal | <?=$title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/skins/_all-skins.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/own/css/custom.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('dashboard');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Syro</b>Portal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?=base_url('tickets/create');?>"><i class="fa fa-life-ring" aria-hidden="true"></i> Open a Support Ticket</a>
          </li>
          <li>
            <a href="<?=base_url('logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/own/img/profile.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$full_name;?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#services"><i class="fa fa-circle-o"></i> My Services</a></li>
            <li><a href="#order"><i class="fa fa-circle-o"></i> Order New Services</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gbp"></i> <span>Billing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#invoices"><i class="fa fa-circle-o"></i> My Invoices</a></li>
            <li><a href="#quotes"><i class="fa fa-circle-o"></i> My Quotes</a></li>
            <li><a href="#funds"><i class="fa fa-circle-o"></i> Add Funds</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-life-ring"></i> <span>Support</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('tickets');?>"><i class="fa fa-circle-o"></i> My Tickets</a></li>
            <li><a href="#knowledgebase"><i class="fa fa-circle-o"></i> Knowledgebase</a></li>
            <li><a href="#downloads"><i class="fa fa-circle-o"></i> Downloads</a></li>
            <li><a href="#status"><i class="fa fa-circle-o"></i> Network Status</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>My Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#account"><i class="fa fa-circle-o"></i> Edit Account Details</a></li>
            <li><a href="#contacts"><i class="fa fa-circle-o"></i> Contacts/Sub-Accounts</a></li>
            <li><a href="#changepass"><i class="fa fa-circle-o"></i> Change Password</a></li>
            <li><a href="#emailhistory"><i class="fa fa-circle-o"></i> Email History</a></li>
          </ul>
        </li>
        <?php if($admin == true){
        echo "
        <li class=\"header\">ADMIN CENTER</li>
        <li>
            <a href=\"".base_url('admin/dashboard')."\">
                <i class=\"fa fa-user\"></i> <span>Admin Panel</span>
            </a>
        </li>
            "; } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>