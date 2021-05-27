<?php $this->load->view("landing/template/header.php") ?>
<?php $project = json_decode(json_encode($project), True); ?>

    <!-- Project Image Slider -->
    <div class="project-single-v">
        <div class="project-slider">
            <div class="project-slide-top">
                <div class="owl-carousel owl-theme">
                    <?php foreach($project['photo'] as $photo_item ) { ?>                  
                    <div class="item-single-slide link">
                        <div class="center-cropped" 
                            style="background-image: url('<?php echo base_url();?>upload/project/<?php echo $photo_item['photo'] ?>');">
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Project Image Slider -->

    <section class="about-us-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h3 data-aos="fade-up"><?php echo $project['nama_project'] ?></h3>
                    <p data-aos="fade-up"><?php echo $project['kategori'] ?></p>
                    <div class="dash"></div>

                </div>
            </div>
        </div>
        <div class="project-text-single text-center mt-30" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="detailes">
                            <h3>Customer</h3>
                            <p><?php echo $project['customer'] ?></p>
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="detailes">
                            <h3>Year</h3>
                            <p><?php echo $project['year'] ?></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="detailes">
                            <h3>Budget</h3>
                            <p>Rp. <?php echo $project['budget'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- single-project -->
    <div class="single-project-img about-us-text">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" data-aos="fade-up">
                    <p><?php echo $project['keterangan'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- slider -->
    <section id="project-slider">
        <div class="project-slider">
            <div class="container">
                <div class="title-content text-center" data-aos="fade-up">
                    <h2>Project Preview</h2>
                </div>

                <div class="row mt-30" data-aos="fade-up">
                    <div class="col-lg-12 mt-20">

                        <div class="project-slide">
                            <div class="owl-carousel owl-theme">
                                <?php foreach($project['photo'] as $photo_item ) { ?>
                                <div class="item-single-slide link">
                                    <div class="center-cropped-mini" 
                                        style="background-image: url('<?php echo base_url();?>upload/project/<?php echo $photo_item['photo'] ?>');" alt="Gambar Project">
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-testi"></div>
            </div>
        </div>
    </section>

    <!-- footer-next -->
    <?php $this->load->view("landing/template/footer.php") ?>

</body>

</html>