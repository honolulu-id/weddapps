
<div class="modal fade bs-example-modal-lg" id="ongoingmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">ongoing Edit</h4> </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="ongoing_id">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="recipient-name"> </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Waktu</label>
                                <input type="text" class="form-control datepicker" name="waktu" id="recipient-name"> </div>

                                <div class="form-group">
                                    <label for="message-text" class="control-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="message-text"></textarea>
                                </div>
                                <div class="form-group" id="background-preview">
                                 <label class="control-label">Background</label>
                                 <div>
                                    <!-- (No photo) -->
                                </div>
                            </div> 
                            <div class="form-group" id="background-preview">
                                <label class="control-label">If you want to change your background</label>
                                <input type="file" class="form-control" name="background" id="recipient-name"></div>
                                <hr>
                                <div class="form-group" id="photo-preview">
                                 <label class="control-label">Photo</label>
                                 <div>
                                    <!-- (No photo) -->
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail" class="control-label">Photo</label>
                                <input type="button" class="btn btn-success btn-xs" value="Tambah Foto" id="tambahFoto" /> 
                                <table id="tableFoto">
                                </table>
                                <div class="help-block with-errors"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button onclick="save_ongoing()" type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                    </div>
                </div>
            </div>