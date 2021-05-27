<!DOCTYPE html>  
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/plugins/images/favicon.png">
	<title>Wedding Login Apps</title>
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?php echo base_url(); ?>assets/css/colors/blue.css" id="theme"  rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<style type="text/css">
	/* Login- register pages */
	.login-register {
		background: url(<?php echo base_url(); ?>assets/plugins/images/login-register.jpg) no-repeat center center / cover !important;
		height: 100%;
		position: fixed;
	}
</style>
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
 <section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
      <div >
        <div class="new-login-box">
          <div class="white-box">
            <h3 class="box-title m-b-0">Sign In to Apps</h3>
            <small>Enter your details below</small>

            <div class="form-horizontal new-lg-form" id="loginform">
              <?php echo form_open('login/login_process'); ?>
              <?php
              echo "<div class='error_msg'>";
                if (isset($error_message)) {
                echo $error_message;
              }
              echo validation_errors();
            echo "</div>";
            ?>  
            <div class="form-group  m-t-20">
              <div class="col-xs-12">
                <label>Username</label>
                <input class="form-control" type="text" required="" name="user_username" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <label>Password</label>
                <input class="form-control" type="password" required="" name="user_password" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <div class="checkbox checkbox-info pull-left p-t-0">
                  <input id="checkbox-signup" type="checkbox" disabled="">
                  <label for="checkbox-signup"> Remember me </label>
                </div>
                <a disabled="" href="#" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
              </div>
              <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                  <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" name="submit" type="submit">Log In</button>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
               <!--    <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div> -->
                </div>
              </div>
              <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                  <p>Don't have an account? <a data-toggle="tooltip" data-placement="top" title="If you dont have an account, please contact the Administrator" href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
              </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="index.html">
              <div class="form-group ">
                <div class="col-xs-12">
                  <h3>Recover Password</h3>
                  <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-xs-12">
                  <input class="form-control" type="text" required="" placeholder="Email">
                </div>
              </div>
              <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                  <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </section>
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Menu Plugin JavaScript -->
		<script src="<?php echo base_url(); ?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

		<!--slimscroll JavaScript -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
		<!--Wave Effects -->
		<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
		<!--Style Switcher -->
		<script src="<?php echo base_url(); ?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	</body>
	</html>
