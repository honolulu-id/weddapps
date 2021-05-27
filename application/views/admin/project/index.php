 <?php $this->load->view("admin/template/header.php") ?>
 <?php $this->load->view("admin/template/sidebar.php") ?>
 <!-- ============================================================== -->
 <!-- Page Content -->
 <!-- ============================================================== -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Project</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="<?php echo base_url();?>project/add" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add Data</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Masterdata</a></li>
                        <li class="active">Project</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Project</h3>
                        <p class="text-muted m-b-30">Add some team to your site</p>
                        <div class="table-responsive">
                            <table id="tabel-project" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama</th>
                                        <th>Waktu</th>
                                        <th>Customer</th>
                                        <th>Year</th>
                                        <th>Budget</th>
                                        <th>Background</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                

            </div>
            <!-- /.row -->
            <!-- ============================================================== -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> <?php $date = date('Y'); echo $date;?> &copy; Tu-Technology </footer>
    </div>
    <!-- /#page-wrapper -->
    <?php $this->load->view("admin/template/footer.php");
    include 'project-js.php';
    include 'project-modal.php';
    ?>
