<?php $this->load->view("landing/template/header.php") ?>
<?php $ongoing_single = json_decode(json_encode($ongoing_single), True); ?>

    <!-- Start Single Ongoing Page -->
    <div class="container">
        <div class="row about-us-text">
            <div class="col-lg-8 offset-lg-2 mt-90 text-center">
                <h2><?php echo $ongoing_single['judul'] ?></h2>
            </div>
        </div>
        <div class="project-single-v mt-40">
            <div class="project-slider">
                <div class="project-slide-top">
                    <div class="owl-carousel owl-theme">
                        <?php foreach($ongoing_single['photo'] as $item ) { ?>
                        <div class="item-single-slide link">
                            <div class="center-cropped-insight" 
                                style="background-image: url('<?php echo base_url();?>upload/ongoing/<?php echo $item['photo'] ?>');" alt="Ongoing Picture">
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-project-img about-us-text" style="margin-bottom:20vh;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up">
                        <p><?php echo $ongoing_single['keterangan'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single News Page -->

    <?php $this->load->view("landing/template/footer.php") ?>
  
</body>

</html>