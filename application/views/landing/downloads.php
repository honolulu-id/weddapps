<?php $this->load->view("landing/template/header.php") ?>
<?php $downloads = json_decode(json_encode($downloads), True); ?>

    <div class="news">
        <div class="container-fluid">
            <div class="row">

                <!-- Start News Items -->
                <?php foreach($downloads as $downloads_item){ ?>
                <div class="col-12 px-0">
                    <a href="<?php echo base_url();?>upload/downloads/<?php echo $downloads_item['files'] ?>" download="<?php echo $downloads_item['judul'] ?>">
                        <div class="news-item">
                            <div class="news-bg"  style="background: url('<?php echo base_url();?>assets/img/portfolio/<?php echo rand(0,3) ?>.jpg') center no-repeat; background-size: cover;"></div>
                            <div class="col-lg-8 offset-lg-2">
                                <h2 style="font-size:30px;"><?php echo $downloads_item['judul'] ?></h2>
                                <h2><?php echo $downloads_item['keterangan'] ?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <!-- End News Items -->

            </div>
        </div>
    </div>

    <?php $this->load->view("landing/template/footer.php") ?>
</body>

</html>