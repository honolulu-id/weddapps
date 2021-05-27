<?php $this->load->view("admin/template/header.php"); ?>
<?php $this->load->view("admin/template/sidebar.php");
// print_r($project);
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Project</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
                        <h3 class="box-title m-b-0">Project Forms Page</h3>
                        <p class="text-muted m-b-30">Form Project</p>
                        <form data-toggle="validator" id="form" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputName1" class="control-label">Kategori</label>
                                <!-- <input name="id_kategori" type="text" class="form-control" id="inputName1" placeholder="Poladata,Inc" required> -->
                                <select class="form-control" name="id_kategori" required="">
                                <?php 

                                foreach($kategori as $row)
                                { 
                                  echo '<option value="'.$row->kategori_id.'">'.$row->kategori.'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName1" class="control-label">Nama Project</label>
                                <input name="nama" type="text" class="form-control" id="inputName1" placeholder="Poladata,Inc" required="">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="control-label">Waktu</label>
                                <input name="waktu" type="text" class="form-control datepicker" id="inputEmail" placeholder="Waktu" required="" >
                                <!-- <div class="help-block with-errors"></div> -->
                            </div>
                               <div class="form-group">
                                <label for="inputName1" class="control-label">Customer</label>
                                <input name="customer" type="text" class="form-control" id="inputName1" placeholder="Customer" required="">
                            </div>
                                    <div class="form-group">
                                <label for="inputName1" class="control-label">Year</label>
                                <input name="year" type="number" class="form-control" id="inputName1" placeholder="Year" required="">
                            </div>
                                    <div class="form-group">
                                <label for="inputName1" class="control-label">Budget</label>
                                <input name="budget" type="number" class="form-control" id="inputName1" placeholder="Budget" required="">
                            </div>
                                    <div class="form-group">
                                <label for="inputName1" class="control-label">Background</label>
                                <input name="background" type="file" class="form-control" id="inputName1" placeholder="Background" required="">
                            </div>

                            <div class="form-group">
                                <label for="textarea" class="control-label">Keterangan</label>
                                <textarea name="keterangan" id="textarea" class="editor" required="" placeholder="For further information"></textarea> <span class="help-block with-errors">Hey look, this one has additional information for your company</span> </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Photo</label>
                                    <input type="button" class="btn btn-success btn-xs" value="Tambah Foto" id="tambahFoto" /> 
                                    <table id="tableFoto">
                                    </table>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <!-- <div class="col-md-12"> -->
                                        <a type="submit" onclick="validations(), save_project()" class="btn btn-info"> <i class="fa fa-check"></i> Save</a>
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
            include 'project-js.php';
            ?>
