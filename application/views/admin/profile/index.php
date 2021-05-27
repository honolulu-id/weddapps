
<?php $this->load->view("admin/template/header.php") ?>
<?php $this->load->view("admin/template/sidebar.php") ?>
<?php 
$username = ($this->session->userdata['logged_in']['user_username']);
$photo = ($this->session->userdata['logged_in']['photo']);
?>
<?php $user_info = json_decode(json_encode($user_info), True); ?>

<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profile page</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Profile page</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
             <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="<?php echo base_url();?>assets/plugins/images/large/img1.jpg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)">
                                    <?php if ($photo) {?>
                                        <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user-img" class="thumb-lg img-circle">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url();?>assets/img/logo-white.png" alt="user-img" class="thumb-lg img-circle">
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                           <!--  <div class="user-btm-box">
                               
                           </div> -->
                       </div>
                   </div>
                   <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="active tab">
                                <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="profile">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $user_info['user_username']?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $user_info['user_email']?></p>
                                    </div>
                                </div>
                                <hr>
                                <strong>Additional Info</strong>
                                <p class="m-t-30"><?php echo $user_info['user_info']?></p>

                            </div>

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal form-material" id="form">
                                    <input type="hidden" name="user_id" value="<?php echo $user_info['user_id']; ?>">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input name="user_username" type="text" placeholder="Johnathan Doe" class="form-control form-control-line" value="<?php echo $user_info['user_username']?>"> </div>
                                            <!-- </div> -->

                                            <label class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input name="user_email" type="text" placeholder="support@poladata.com" class="form-control form-control-line" value="<?php echo $user_info['user_email']?>"> </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Additional Info</label>
                                                <div class="col-md-12">
                                                    <textarea name="user_info" rows="5" class="form-control form-control-line"><?php echo $user_info['user_info']?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group" id="photo-preview">
                                             <label class="col-md-12">Photo</label>
                                             <div class="col-md-12">
                                                <!-- <img src="<?php echo base_url();?>upload/user/<?php echo $user_info['photo']?>" class="thumb-lg img-circle" alt="img"> -->
                                                <?php if ($photo) {?>
                                                    <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user-img" class="thumb-lg img-circle">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url();?>assets/img/logo.png" alt="user-img" class="thumb-lg img-circle">
                                                <?php } ?>

                                                <span class="help-block"></span>
                                            </div>
                                        </div> 

                                        <div class="form-group" id="photo-preview">
                                            <label class="col-md-12" style="color:red">If you want to change your photo</label>
                                            <div class="col-md-12">

                                                <input type="file" class="form-control" name="photo" id="recipient-name">
                                                <span class="help-block with-errors">If you change photo, your photo will visible after logout.</span>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" style="color:red">If you want to change your password</label>
                                            <label class="col-md-12">Type Password</label>

                                            <div class="col-md-12">
                                                <input name="user_password" type="password" placeholder="Input password" class="form-control form-control-line"> </div>
                                                <label class="col-md-12">Re-Type Password</label>

                                                <div class="col-md-12">
                                                    <input name="user_password_2" type="password" placeholder="Input password" class="form-control form-control-line"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <a type="submit" onclick="update_profile()" class="btn btn-info"> <i class="fa fa-check"></i> Save</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <footer class="footer text-center"> <?php $date = date('Y'); echo $date;?> &copy; Tu-Technology </footer>
                </div>
                <!-- /#page-wrapper -->
                <?php $this->load->view("admin/template/footer.php");
                include 'profile-js.php';

                ?>