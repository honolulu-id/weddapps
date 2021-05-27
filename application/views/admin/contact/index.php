<?php $this->load->view("admin/template/header.php") ?>
<?php $this->load->view("admin/template/sidebar.php") ?>
<?php $contact = json_decode(json_encode($contact), True); 
// print_r($contact);
?>
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Contact</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Masterdata</a></li>
                        <li class="active">Contact</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Contact Forms Page</h3>
                        <p class="text-muted m-b-30">Form Contact</p>
                        <form data-toggle="validator" id="form">
                            <input type="hidden" name="contact_id" value="<?php echo $contact['contact_id']; ?>">

                            <div class="form-group">
                                <label for="inputName1" class="control-label">Name</label>
                                <input name="name" type="text" class="form-control" id="inputName1" placeholder="Poladata,Inc" required value="<?php echo $contact['name'];?>"> </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required value="<?php echo $contact['email'];?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Phone Number</label>
                                    <input name="phone" type="number" class="form-control" id="inputEmail" placeholder="Phone Number" data-error="Bruh, that phone number is invalid" required value="<?php echo $contact['phone'];?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="textarea" class="control-label">Additional Info</label>
                                    <textarea name="additional" id="textarea" class="form-control" required placeholder="For further information"><?php echo $contact['additional'];?></textarea> <span class="help-block with-errors">Hey look, this one has additional information for your company</span> </div>

                                    <div class="form-group">
                                        <!-- <div class="col-md-12"> -->
                                            <a type="submit" onclick="update_contact()" class="btn btn-info"> <i class="fa fa-check"></i> Save</a>
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
                include 'contact-js.php';
                ?>
