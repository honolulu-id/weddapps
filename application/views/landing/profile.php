<?php $this->load->view("landing/template/header.php") ?>


    <div class="profile-start">

        <a href="<?php echo base_url();?>home/profile_company" class="company-start centered">
            <div class="link-to-a">
                <h2>COMPANY</h2>
            </div>
            <div class="bg-profile" style="background: url('<?php echo base_url();?>assets/img/portfolio/0.jpg') center no-repeat; background-size: cover;"></div>
        </a>

        <a href="<?php echo base_url();?>home/profile_the_team" class="team-start centered">
            <div class="link-to-a">

                <h2>THE TEAM</h2>

            </div>
            <div class="bg-profile team" style="background: url('<?php echo base_url();?>assets/img/portfolio/2.jpg') center no-repeat; background-size: cover;"></div>
        </a>
    </div>
    <?php $this->load->view("landing/template/footer.php") ?>

</body>

</html>