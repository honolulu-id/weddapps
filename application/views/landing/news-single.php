<?php $this->load->view("landing/template/header.php") ?>
<?php $news_single = json_decode(json_encode($news_single), True); ?>

    <!-- Start Single News Page -->
    <div class="container">
        <div class="row about-us-text">
            <div class="col-lg-8 offset-lg-2 mt-90 text-center">
                <h2><?php echo $news_single['judul'] ?></h2>
            </div>
        </div>
        <div class="project-single-v mt-40">
            <div class="project-slider">
                <div class="project-slide-top">
                    <div class="owl-carousel owl-theme">
                        <?php foreach($news_single['photo'] as $item ) { ?>
                        <div class="item-single-slide link">
                            <div class="center-cropped-insight" 
                                style="background-image: url('<?php echo base_url();?>upload/news/<?php echo $item['photo'] ?>');" alt="News Picture">
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
                    <div class="col-sm-12" data-aos="fade-up">
                        <p><?php echo $news_single['keterangan'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Single News Page -->

    <?php $this->load->view("landing/template/footer.php") ?>
  
</body>

</html>