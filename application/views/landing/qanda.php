<?php $this->load->view("landing/template/header.php") ?>
<?php $qanda = json_decode(json_encode($qanda), True); ?>

<div class="qna-title text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2>Q & A Database</h2>
                <p>Tanya jawab (konsultasi) seputar administrasi dan teknis bidang jasa konsultasi.</p>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="mt-20">
                <div class="asking text-center">
                    <a class="best-ux-ever">Ask Question</a>
                </div>
                <div class="form-quest">
                    <form id="form">
                        <input name="user" type="text" class="feedback-input" placeholder="Name" required="" />
                        <input name="email" type="email" class="feedback-input" placeholder="Email" required=""/>
                        <textarea name="tanya" class="feedback-input" placeholder="Comment" required=""></textarea>
                        <button onclick="validations(),save_qanda_landing()" type="button" class="btn btn-info waves-effect waves-light">SUBMIT</button>
                    </form>
                </div>
                <div class="accordion mt-80" style="margin-bottom:120px">
                    <?php foreach($qanda as $item) { ?>
                        <div class="accordion-item">
                            <a style="padding-right:150px" ><?php echo $item['tanya'] ?> - <?php echo $item['user'] ?></a>
                            <div class="content">
                                <?php if ($item['jawab']==null) {
                                        # code...
                                    echo '<span class="label label-danger">Maaf, Pertanyaan Anda belum dijawab.</span>';
                                } else { ?>
                                    <p><?php echo $item['jawab'] ?></p>
                                    <p>Administrator - <i><?php echo $item['waktu_jawab'] ?></i></p>
                                <?php } ?>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.label-danger {
    background-color: #f44336;
}

.label {
    letter-spacing: 0.05em;
    border-radius: 60px;
    padding: 4px 12px 3px;
    font-weight: 500;
    color: #ffffff;
}
</style>

<?php $this->load->view("landing/template/footer.php");
include 'qanda-js.php';
?>
</body>

</html>