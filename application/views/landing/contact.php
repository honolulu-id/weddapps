<?php $this->load->view("landing/template/header.php") ?>
<?php $contact = json_decode(json_encode($contact), True); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="main-title mt-20">
                        <h1 class="strokes">Contact Us</h1>
                        <div class="dash"></div>

                        <p class="mt-30">
                            <?php echo $contact['additional'] ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container mt-120">
            <div class="row" data-aos="fade-up">

                <div class="col-lg-4 px-0 text-center">
                    <div class="service-item contact min-height-contact">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p>Phone</p>
                        <div class="email link">
                            <a href="tel:<?php echo $contact['phone'] ?>"><?php echo $contact['phone'] ?></a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 px-0 text-center">
                    <div class="service-item contact min-height-contact">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <p>address</p>
                        <div class="email link">
                            <a href="https://www.google.com/maps/place/PT+Pola+Data+Consultant/@-7.748302,110.4391806,17z/data=!4m5!3m4!1s0x2e7a5bcc531ff61d:0xdff48eec0d1c671a!8m2!3d-7.7483122!4d110.4413693" target="_blank">Jalan Ponpes Sunan Ampel No. 70, Banjeng, Maguwoharjo, Depok, Banjeng, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 px-0 text-center">
                    <div class="service-item contact min-height-contact">
                        <i class="fas fa-directions    "></i>
                        <p>email</p>
                        <div class="email link">
                            <a href="mailto:<?php echo $contact['email'] ?>"><?php echo $contact['email'] ?></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view("landing/template/footer.php") ?>

</body>

</html>