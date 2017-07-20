<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	
    <!-- bootstrap 3.0.2 -->
	<?= link_tag('assets/css/bootstrap.min.css') ?>
    <!-- font Awesome -->
	<?= link_tag('assets/css/font-awesome.min.css') ?>
    <!-- Ionicons -->
	<?= link_tag('assets/css/ionicons.min.css') ?>
    <!-- Morris chart -->
	<?= link_tag('assets/css/morris/morris.css') ?>
    <!-- jvectormap -->
	<?= link_tag('assets/css/jvectormap/jquery-jvectormap-1.2.2.css') ?>
    <!-- Date Picker -->
	<?= link_tag('assets/css/datepicker/datepicker3.css') ?>
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
	<?= link_tag('assets/css/daterangepicker/daterangepicker-bs3.css') ?>
    <!-- iCheck for checkboxes and radio inputs -->
	<?= link_tag('assets/css/iCheck/all.css') ?>
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
	<?= link_tag('assets/css/style.css') ?>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
		
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>	
      </head>

<body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
		
            <a href="<?= base_url('admin/dashboard') ?>" class="logo">
                Chart Dashboard
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <?= anchor('login/logout','Logout') ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

<div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="<?= base_url('admin/dashboard') ?>">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-plus"></i> <span>Products</span>
                                    </a>
                                </li>
<li>
                                    <a href="#">
                                        <i class="fa fa-plus"></i> <span>Orders</span>
                                    </a>
                                </li>
<li>
                                    <a href="#">
                                        <i class="fa fa-plus"></i> <span>Users</span>
                                    </a>
                                </li>
								<!--
								<li>
                                    <a href="<?= base_url('admin/add_article') ?>">
                                        <i class="fa fa-plus"></i> <span>Add Article</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= base_url('admin/view_articles') ?>">
                                        <i class="fa fa-globe"></i> <span>View Articles</span>
                                    </a>
                                </li>
								
                                <li>
                                    <a href="<?= base_url('admin/profile') ?>">
                                        <i class="fa fa-user"></i> <span>Profile</span>
                                    </a>
                                </li>
								-->

                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>