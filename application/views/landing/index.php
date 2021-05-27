<?php $this->load->view("landing/template/header.php") ?>

    <!-- Start Content -->

    <div class="swiper-pagination"></div>

    <div class="swiper-container">
        <div class="swiper-wrapper">

            <?php for($i = 0; $i < 6; $i++) { ?>
            <!-- Start Project -->
            <div class="swiper-slide">
                <div class="title-work">
                    <!-- Project Title -->
                    <h2>
                        <span class="head-text">Creativity in space</span>
                    </h2>

                    <!-- Project Button -->
                    <div class="c-magnetic">
                        <div class="span">
                            <div class="btn-discover">
                                <a class="load-marmoset" href="single-project.html">
                                    <div class="learn-more empty-cursor">
                                        <div class="circle">
                                            <span class="icon arrow"></span>
                                        </div>
                                        <p class="button-text">DISCOVER</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Project Background -->
                <div class="bg">
                    <div class="overlay-bg"></div>
                    <div class="project-img project-0" style="background: url('<?php echo base_url();?>assets/img/portfolio/<?php echo $i ?>.jpg') no-repeat;"></div>
                </div>
            </div>
            <!-- End Project -->

            <?php } ?>

        </div>
    </div>

    <!-- End Content -->
    
    <?php $this->load->view("landing/template/footer.php") ?>
    <!-- Spesific Page JS -->
    <script src="<?php echo base_url();?>assets/js/landing-js/single-showcase.js"></script>
    <!-- End Spesific JS Page -->
</body>

</html>