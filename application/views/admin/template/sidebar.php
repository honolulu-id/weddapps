<?php 
$username = ($this->session->userdata['logged_in']['user_username']); 
$photo = ($this->session->userdata['logged_in']['photo']); 

?>
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
            <ul class="nav" id="side-menu">
                <li class="user-pro">
                    <a href="<?php echo base_url();?>profile/index" class="waves-effect">
                      <!-- <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user-img" class="img-circle"> -->
                           <?php if ($photo) {?>
                            <img src="<?php echo base_url();?>upload/user/<?php echo $photo?>" alt="user-img" width="36" class="img-circle">
                            <?php } else { ?>
                            <img src="<?php echo base_url();?>assets/img/logo.png" alt="user-img" width="36" class="img-circle">
                            <?php } ?>
                       <span class="hide-menu"> <?php echo $username;?><span class="fa arrow"></span></span>
                    </a>
                </li>
                <li class="devider"></li>
                <li> <a href="<?php echo base_url();?>dashboard/index" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a>
                </li>
                <li class="devider"></li>
                    <!-- <li> <a href="<?php echo base_url();?>project/index" class="waves-effect"><i  class="mdi mdi-file-word fa-fw"></i> <span class="hide-menu">Projects</span></a> </li> -->
                    <li> <a href="<?php echo base_url();?>savethedate/index" class="waves-effect"><i  class="mdi mdi-file-word fa-fw"></i> <span class="hide-menu">Save The Date</span></a> </li>
                <li class="devider"></li>
                
               <!--  <li> <a href="<?php echo base_url();?>insight/index" class="waves-effect"><i class="mdi mdi-map-marker fa-fw"></i><span class="hide-menu">Insight</span></a> </li> -->
                <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-map-marker fa-fw"></i> <span class="hide-menu">Insight<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                       <li> <a href="<?php echo base_url();?>news/index" class="waves-effect"><i  class="mdi mdi-newspaper fa-fw"></i> <span class="hide-menu">News</span></a> </li>

                       <li> <a href="<?php echo base_url();?>ongoing/index" class="waves-effect"><i class="mdi mdi-pulse fa-fw"></i><span class="hide-menu">On-Going Projects</span></a> </li>

                       <li> <a href="<?php echo base_url();?>downloads/index" class="waves-effect"><i class="mdi mdi-folder-download fa-fw"></i><span class="hide-menu">Downloads</span></a> </li>
                   </ul>
               </li>

                <li class="devider"></li>

                <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Profile<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                       <li> <a href="<?php echo base_url();?>team/index" class="waves-effect"><i  class="mdi mdi-account-multiple fa-fw"></i> <span class="hide-menu">Team</span></a> </li>

                       <li> <a href="<?php echo base_url();?>about/index" class="waves-effect"><i class="mdi mdi-account-star-variant fa-fw"></i><span class="hide-menu">About</span></a> </li>

                       <li> <a href="<?php echo base_url();?>service/index" class="waves-effect"><i class="mdi mdi-ticket fa-fw"></i><span class="hide-menu">Service</span></a> </li>

                       <li> <a href="<?php echo base_url();?>contact/index" class="waves-effect"><i class="mdi mdi-contact-mail fa-fw"></i> <span class="hide-menu">Contact</span></a></li>
                   </ul>
               </li>

               <li class="devider"></li>

               <li> <a href="<?php echo base_url();?>qanda/index" class="waves-effect"><i class="mdi mdi-comment-question-outline fa-fw"></i> <span class="hide-menu">Q & A</span></a></li>

           </ul>
       </div>
   </div>
   <!-- ============================================================== -->
   <!-- End Left Sidebar -->
        <!-- ============================================================== -->