
<div class="modal fade bs-example-modal-lg" id="downloadsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">downloads Edit</h4> </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="downloads_id">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="recipient-name"> </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Waktu</label>
                                <input type="text" class="form-control datepicker" name="waktu" id="recipient-name"> </div>
                                <div class="form-group" id="files-preview">
                                   <label class="control-label">Files</label>
                                   <div>
                                    (No files added)
                                    <span class="help-block"></span>
                                </div>
                            </div> 

                            <div class="form-group" id="files-preview">
                                <label class="control-label">If you want to change your files</label>
                                <input type="file" class="form-control" name="files" id="recipient-name"></div>    
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button onclick="save_downloads()" type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                        </div>
                    </div>
                </div>