
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
                <h4 class="page-title">service page</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">service page</li>
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
                                    <a href="#service" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">service</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                </li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="service">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>our service</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['keterangan']?></p>
                                        </div>
                                    </div>
                                   <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Planning</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Planning']?></p>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Architecture</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Architecture']?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Structural</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Structural']?></p>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Mechanic</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Mechanic']?></p>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Construction</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Construction']?></p>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Industrial</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Industrial']?></p>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Assessment</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Assessment']?></p>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 col-xs-12 b-r"> <strong>Water</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $user_info['Water']?></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal form-material" id="form">
                                        <input type="hidden" name="service_id" value="<?php echo $user_info['service_id']; ?>">
                                           
                                            <div class="form-group">
                                                <label class="col-md-12">our service</label>
                                                <div class="col-md-12">
                                                    <textarea name="keterangan" rows="5" class="form-control form-control-line"><?php echo $user_info['keterangan']?></textarea>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-md-12">Planning</label>
                                                <div class="col-md-12">
                                                    <textarea name="Planning" rows="5" class="form-control form-control-line"><?php echo $user_info['Planning']?></textarea>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-12">Architecture</label>
                                                <div class="col-md-12">
                                                    <textarea name="Architecture" rows="5" class="form-control form-control-line"><?php echo $user_info['Architecture']?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Structural</label>
                                                <div class="col-md-12">
                                                    <textarea name="Structural" rows="5" class="form-control form-control-line"><?php echo $user_info['Structural']?></textarea>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-12">Mechanic</label>
                                                <div class="col-md-12">
                                                    <textarea name="Mechanic" rows="5" class="form-control form-control-line"><?php echo $user_info['Mechanic']?></textarea>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-12">Construction</label>
                                                <div class="col-md-12">
                                                    <textarea name="Construction" rows="5" class="form-control form-control-line"><?php echo $user_info['Construction']?></textarea>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-12">Industrial</label>
                                                <div class="col-md-12">
                                                    <textarea name="Industrial" rows="5" class="form-control form-control-line"><?php echo $user_info['Industrial']?></textarea>
                                                </div>
                                            </div>


                                             <div class="form-group">
                                                <label class="col-md-12">Assessment</label>
                                                <div class="col-md-12">
                                                    <textarea name="Assessment" rows="5" class="form-control form-control-line"><?php echo $user_info['Assessment']?></textarea>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label class="col-md-12">Water</label>
                                                <div class="col-md-12">
                                                    <textarea name="Water" rows="5" class="form-control form-control-line"><?php echo $user_info['Water']?></textarea>
                                                </div>
                                            </div>
                            
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <a type="submit" onclick="update_service()" class="btn btn-info"> <i class="fa fa-check"></i> Save</a>
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
            include 'service-js.php';

             ?>