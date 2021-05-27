
<?php $this->load->view("landing/template/header.php") ?>
<?php $teams = json_decode(json_encode($teams), True); ?>

    <!-- Start Profile Team Page -->
    <div class="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 mt-90 text-center">
                    <div class="about-us-text">
                        <div class="title-content text-center" data-aos="fade-up">
                            <h2>Our Team</h2>
                        </div>
                        <p>
                            <b>
                                Our professional team consists of architects, engineers, graphic designer, CAD/3D operators, field technicians, and administrative personnels. Our team not only do have professional experiences but also have excellent academic background. Some of our team members work in universities teaching his/her technical courses. We also have special experts that have strong academic background.
                            </b>  
                        </p>
                        <p>
                            We are proud to say that most of our team members are licensed architects and engineers with licenses from IAI, HAKI, ASCE, ACI, PATI, ATAKI, PII, etc.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="projects-swipe mt-70">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    
                    <!-- Start Team Items -->
                    <?php foreach($teams as $team){ ?>
                    <div class="swiper-slide">
                        <a class="explore" href="">
                            <div class="projects-item">
                                <div class="projects-img">
                                    <!-- <div class="center-cropped-team" 
                                        style="background-image: url('<?php echo base_url();?>upload/team/<?php echo $team['photo'] ?>');" alt="Gambar Team">
                                    </div> -->
                                    <img class="img-fluid" src="<?php echo base_url();?>upload/team/<?php echo $team['photo'] ?>" alt="">
                                </div>
                                <div class="projects-text">
                                    <h2><?php echo $team['nama'] ?></h2>
                                    <p><?php echo $team['jabatan'] ?></p>
                                </div>
                                <div class="projects-overlay"></div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                    <!-- End Team Items -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Profile Team Page -->

    <?php $this->load->view("landing/template/footer.php") ?>

</body>

</html>