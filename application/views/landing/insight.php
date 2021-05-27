<?php $this->load->view("landing/template/header.php") ?>

    <div class="profile-start">

        <a href="<?php echo base_url();?>home/insight_news" class="news-start centered">
            <div class="link-to-a">
                <h2>NEWS</h2>
            </div>
            <div class="bg-profile" style="background: url('<?php echo base_url();?>assets/img/portfolio/1.jpg') center no-repeat; background-size: cover;"></div>
        </a>

        <a href="<?php echo base_url();?>home/insight_ongoing" class="ongo-start centered">
            <div class="link-to-a">
                <h2>ON GOING PROJECT</h2>
            </div>
            <div class="bg-profile" style="background: url('<?php echo base_url();?>assets/img/portfolio/3.jpg') center no-repeat; background-size: cover;"></div>
        </a>
        
        <a href="<?php echo base_url();?>home/insight_downloads" class="download-start centered">
                <div class="link-to-a">    
                    <h2>DOWNLOADS</h2>    
                </div>
                <div class="bg-profile" style="background: url('<?php echo base_url();?>assets/img/portfolio/4.jpg') center no-repeat; background-size: cover;"></div>
            </a>
    </div>
    
    <?php $this->load->view("landing/template/footer.php") ?>

</body>

</html>