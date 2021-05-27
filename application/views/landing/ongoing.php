<?php $this->load->view("landing/template/header.php") ?>
<?php $ongoing = json_decode(json_encode($ongoing), True); ?>

    <div class="news">
        <div class="container-fluid">
            <div class="row">

                <!-- Start News Items -->
                <?php foreach($ongoing as $ongoing_item){ ?>
                <div class="col-12 px-0">
                    <a href="<?php echo base_url();?>home/insight_ongoing/<?php echo $ongoing_item['ongoing_id'] ?>">
                        <div class="news-item">
                            <div class="news-bg" style="background: url('<?php echo base_url();?>upload/ongoing/background/<?php echo $ongoing_item['background'] ?>') center no-repeat; background-size: cover;"></div>
                            <div class="col-lg-8 offset-lg-2">
                                <h2><?php echo $ongoing_item['judul'] ?></h2>
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