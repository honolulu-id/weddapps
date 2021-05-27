<?php $this->load->view("admin/template/header.php") ?>
<?php $this->load->view("admin/template/sidebar.php") ?>
<?php 
$projects = json_decode(json_encode($projects), True); 
$team = json_decode(json_encode($team), True); 
$teams = json_decode(json_encode($teams), True);
$news = json_decode(json_encode($news), True); 
$ongoing = json_decode(json_encode($ongoing), True); 
$downloads = json_decode(json_encode($downloads), True); 
?>

<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Dashboard</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- Other sales widgets -->
            <!-- ============================================================== -->
            <!-- .row -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                       <div class="row row-in">
                          <div class="col-lg-3 col-sm-3 row-in-br">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                </li>
                                <li class="col-last"><h3 class="counter text-right m-t-15"><?php echo $projects; ?></h3></li>
                                <li class="col-middle">
                                    <h4>Projects</h4>
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                        <span class="sr-only"><?php echo $projects; ?></span> 
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-3 row-in-br  b-r-none">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                            </li>
                            <li class="col-last"><h3 class="counter text-right m-t-15"><?php echo $news; ?></h3></li>
                            <li class="col-middle">
                                <h4>News</h4>
                                <div class="progress">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                      <span class="sr-only"><?php echo $news; ?></span> 
                                  </div>
                              </div>
                          </li>

                      </ul>
                  </div>
                  <div class="col-lg-3 col-sm-3 row-in-br">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                        </li>
                        <li class="col-last"><h3 class="counter text-right m-t-15"><?php echo $ongoing; ?></h3></li>
                        <li class="col-middle">
                            <h4>On Going</h4>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                                  <span class="sr-only"><?php echo $ongoing; ?></span> 
                              </div>
                          </div>
                      </li>

                  </ul>
              </div>
              <div class="col-lg-3 col-sm-3 row-in-br">
                <ul class="col-in">
                    <li>
                        <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                    </li>
                    <li class="col-last"><h3 class="counter text-right m-t-15"><?php echo $downloads; ?></h3></li>
                    <li class="col-middle">
                        <h4>Downloads</h4>
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> 
                              <span class="sr-only"><?php echo $downloads; ?></span> 
                          </div>
                      </div>
                  </li>

              </ul>
          </div>

      </div>
  </div>
</div>
</div>
<!-- /.row -->
<!-- ============================================================== -->
                  <!-- .row -->
                <div class="row">
                     <!-- col-md-9 -->
                        <div class="col-md-8 col-lg-9">
                            <div class="manage-users">
                                <div class="sttabs tabs-style-iconbox">
                                    <nav>
                                        <ul>
                                            <li><a href="" class="sticon ti-user"><span>List of Teams</span></a></li>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                        </ul>
                                    </nav>
                                    <div class="content-wrap">
                                        <section id="section-iconbox-1">
                                            <div class="p-20 row">
                                                <div class="col-sm-6">
                                                    <h3 class="m-t-0">Select Team to Manage</h3></div>
                                                <div class="col-sm-6">
                                                    <ul class="side-icon-text pull-right">
                                                        <li><a href="<?php echo base_url();?>team/add"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Team</span></a></li>
                                                        <!-- <li><a href="#"><span class="circle circle-sm bg-danger di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="table-responsive manage-table">
                                                <table class="table" cellspacing="14">
                                                    <thead>
                                                        <tr>
                                                            <th width="50"></th>
                                                            <th>NAME</th>
                                                            <th>POSITION</th>
                                                            <th>EMAIL</th>
                                                            <th>NO TELP</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php 
                                                        foreach ($teams as $value) { ?>
                                                        
                                                        <tr class="advance-table-row active">
                                                            <td width="60"><img src="<?php echo base_url();?>upload/team/<?php echo $value['photo']?>" class="img-circle" width="30" /></td>
                                                            <td><?php echo $value['nama']?></td>
                                                            <td><?php echo $value['jabatan']?></td>
                                                            <td><?php echo $value['email']?></td>
                                                            <td><?php echo $value['no_telp']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="7" class="sm-pd"></td>
                                                        </tr>
                                                    <?php } ?>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="p-10 p-t-30 row">
                                                <div class="col-sm-8">
                                                    <h3><?php echo $team; ?> Teams countered</h3></div>
                                                <div class="col-sm-2 pull-right m-t-10"><a href="<?php echo base_url();?>team/index" class="btn btn-block p-10 btn-rounded btn-danger"><span>All Team</span><i class="ti-arrow-right m-l-5"></i></a></div>
                                            </div>
                                        </section>
                                    </div>
                                    <!-- /content -->
                                </div>
                                <!-- /tabs -->
                            </div>
                        </div>
                        <!-- /col-md-9 -->

      </div> 

</div>
<!-- /.container-fluid -->
<footer class="footer text-center"> <?php $date = date('Y'); echo $date;?> &copy; Tu-Technology </footer>

</div>
<!-- /#page-wrapper -->
<?php $this->load->view("admin/template/footer.php");
    include 'dashboard-js.php';

 ?>
