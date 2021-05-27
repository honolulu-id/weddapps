
<?php $this->load->view("admin/template/header.php") ?>
<?php $this->load->view("admin/template/sidebar.php") ?>
<?php 
$username = ($this->session->userdata['logged_in']['user_username']);
?>
<?php $user_info = json_decode(json_encode($user_info), True); ?>

<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">about page</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">about page</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="active tab">
                                <a href="#about" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">about</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="about">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 b-r"> <strong>About Us</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $user_info['about_us']?></p>
                                    </div>
                                   <!--  </div>
                                       <div class="row"> -->
                                        <div class="col-md-6 col-xs-6 b-r"> <strong>Our Strength</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['our_strength']?></p>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="form-group">
                                         <label class="col-md-12">Photo</label>
                                            <div class="col-md-12">
                                            <?php if ($user_info['photo'] !=null) {?>
                                            <img src="<?php echo base_url();?>upload/about/<?php echo $user_info['photo']?>" class="img-responsive">
                                                
                                            <?php } else { ?>
                                                No Photo
                                            <?php } ?>
                                            </div>
                                        </div> 
                                </div>

                                </div>

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal form-material" id="form">
                                        <input type="hidden" name="about_id" value="<?php echo $user_info['about_id']; ?>">

                                        <div class="form-group">
                                            <label class="col-md-12">About Us</label>
                                            <div class="col-md-12">
                                                <textarea name="about_us" rows="5" class="editor"><?php echo $user_info['about_us']?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Our Strength</label>
                                            <div class="col-md-12">
                                                <textarea name="our_strength" rows="5" class="editor"><?php echo $user_info['our_strength']?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                         <label class="col-md-12">Photo</label>
                                            <div class="col-md-12">
                                            <?php if ($user_info['photo'] !=null) {?>
                                            <img src="<?php echo base_url();?>upload/about/<?php echo $user_info['photo']?>" class="img-responsive">
                                                
                                            <?php } else { ?>
                                                No Photo
                                            <?php } ?>
                                            </div>
                                        </div> 

                                    <div class="form-group">
                                        <label class="col-md-12">If you want to change your photo</label>
                                        <div class="col-md-12">
                                            
                                        <input type="file" class="form-control" name="photo" id="recipient-name"></div> 
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a type="submit" onclick="update_about()" class="btn btn-info"> <i class="fa fa-check"></i> Save</a>
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
        include 'about-js.php';

        ?>