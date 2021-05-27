<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['user_username']);
  $email = ($this->session->userdata['logged_in']['user_email']);
  $photo = ($this->session->userdata['logged_in']['photo']); 
  
} else {
    $page = base_url();
    header("location: ".$page."login");
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/img/logo-white.png">
    <title>Wedding Apps Administrator</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url();?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url();?>assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    
    <!-- morris CSS -->
    <link href="<?php echo base_url();?>assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url();?>assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?php echo base_url();?>assets/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url();?>assets/css/colors/default.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/bower_components/sweetalert/sweetalert.css')?>" rel="stylesheet" type="text/css">

    <!-- DATATABEL -->

    <link href="<?php echo base_url();?>assets/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

 
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo base_url();?>dashboard/index">
                        <!-- Logo icon image, you can use font-icon also -->
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="<?php echo base_url();?>assets/img/logo-white.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="<?php echo base_url();?>assets/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                        </span> </a>
                    </div>
                    <!-- /Logo -->
                    <!-- Search input and Toggle icon -->

                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                                    <?php if ($photo) {?>
                                        <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user-img" width="36" class="img-circle">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url();?>assets/img/logo-white.png" alt="user-img" width="36" class="img-circle">
                                    <?php } ?>

                                    <b class="hidden-xs"> <?php echo $username;?></b><span class="caret"></span> </a>
                                    <ul class="dropdown-menu dropdown-user animated flipInY">
                                        <li>
                                            <div class="dw-user-box">
                                                <div class="u-img">
                                                    <!-- <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user" /> -->
                                                    <?php if ($photo) {?>
                                                        <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user-img">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url();?>assets/img/logo.png" alt="user-img">
                                                    <?php } ?>
                                                </div>
                                                
                                                    <div class="u-text">
                                                        <h4> <?php echo $username;?></h4>
                                                        <p class="text-muted"><?php echo $email;?></p><a href="<?php echo base_url();?>profile/index" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                                    </div>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="<?php echo base_url();?>profile/index"><i class="ti-user"></i> My Profile</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a id="sa-logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                            </ul>
                                            <!-- /.dropdown-user -->
                                        </li>

                                        <!-- /.dropdown -->
                                    </ul>
                                </div>
                                <!-- /.navbar-header -->
                                <!-- /.navbar-top-links -->
                                <!-- /.navbar-static-side -->
                            </nav>
                            <!-- End Top Navigation -->
