<?php $this->load->view("landing/template/header.php") ?>
<?php $projects = json_decode(json_encode($projects), True); ?>

    <!-- Start Project Page  -->
    <div class="projects-swipe">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Start Project Items -->
                <?php foreach($projects as $project){ ?>
                <div class="swiper-slide">
                    <a class="xplor" href="<?php echo base_url();?>home/projects/<?php echo $project['project_id'] ?>">
                        <div class="projects-item">
                            <div class="projects-img">
                                <div class="bg" style="background: url('<?php echo base_url();?>upload/project/background/<?php echo $project['background'] ?>') center no-repeat; background-size: cover;"></div>
                            </div>
                            <div class="projects-text">
                                <h2><?php echo $project['nama_project'] ?></h2>
                                <p><?php echo $project['kategori'] ?></p>
                            </div>
                            <div class="projects-overlay"></div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END Project Page  -->
    
    <?php $this->load->view("landing/template/footer.php") ?>
    
</body>

</html>