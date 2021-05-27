
<div class="modal fade bs-example-modal-lg" id="qandamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Q&A Form</h4> </div>
            <div class="modal-body">
                <form id="form">
                    <input type="hidden" name="qanda_id">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama User</label>
                        <input type="text" class="form-control" name="nama" id="recipient-name" readonly=""> 
                        <input type="hidden" class="form-control" name="id_user" id="recipient-name" readonly=""> 
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tanggal</label>
                        <input type="text" class="form-control" name="waktu_tanya" id="recipient-name" readonly=""> </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pertanyaan</label>
                        <textarea class="form-control" name="tanya" id="message-pertanyaan" readonly=""></textarea>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Jawaban</label>
                        <textarea class="form-control" name="jawab" id="message-jawaban"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button onclick="save_qanda()" type="button" class="btn btn-danger waves-effect waves-light">Answer It</button>
            </div>
        </div>
    </div>