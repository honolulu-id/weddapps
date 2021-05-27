<?php $this->load->view("admin/template/header.php"); ?>
<?php $this->load->view("admin/template/sidebar.php");
// print_r($kategori);
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">kategori</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Masterdata</a></li>
                        <li class="active">kategori</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">kategori Forms Page</h3>
                        <p class="text-muted m-b-30">Form kategori</p>
                        <form data-toggle="validator" id="form">

                            <div class="form-group">
                                <label for="inputName1" class="control-label">Nama kategori</label>
                                <input name="kategori" type="text" class="form-control" id="inputName1" placeholder="Poladata,Inc" required> </div>

                                <div class="form-group">
                                    <!-- <div class="col-md-12"> -->
                                        <a type="submit" onclick="validations(),save_kategori()" class="btn btn-info"> <i class="fa fa-check"></i> Save</a>
                                        <!-- </div> -->
                                    </div>
                                </form>
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
            include 'kategori-js.php';
            ?>
