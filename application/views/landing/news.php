<?php $this->load->view("landing/template/header.php") ?>
<?php $news = json_decode(json_encode($news), True); ?>

    <div class="news">
        <div class="container-fluid">
            <div class="row">

                <!-- Start News Items -->
                <?php foreach($news as $news_item){ ?>
                <div class="col-12 px-0">
                    <a href="<?php echo base_url();?>home/insight_news/<?php echo $news_item['news_id'] ?>">
                        <div class="news-item">
                            <div class="news-bg" style="background: url('<?php echo base_url();?>upload/news/background/<?php echo $news_item['background'] ?>') center no-repeat; background-size: cover;"></div>
                            <div class="col-lg-8 offset-lg-2">
                                <h2><?php echo $news_item['judul'] ?></h2>
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