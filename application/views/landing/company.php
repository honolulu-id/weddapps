
<?php $this->load->view("landing/template/header.php") ?>
<?php $company = json_decode(json_encode($company), True); ?>


    <!-- Start Profile Company Page -->
    <div class="company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-90">
                    <?php foreach($company as $data){ ?>
                    <div class="about-us-text">
                        <div class="title-content text-center" data-aos="fade-up">
                            <h2>About PDC</h2>
                        </div>
                            <p><?php echo $data['about_us'] ?></p>
                    </div>

                    <div class="about-us-text mt-50">
                        <div class="title-content text-center" data-aos="fade-up">
                            <h2>Our Strength</h2>
                        </div>
                        <p><?php echo $data['our_strength'] ?></p>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 mt-90" data-aos="fade-up" style="margin-bottom:50px;">
                    <img class="img-fluid" src="<?php echo base_url();?>upload/about/<?php echo $data['photo'] ?>" alt="Gambar About">
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Profile Company Page -->
    <?php $this->load->view("landing/template/footer.php") ?>

</body>

</html>