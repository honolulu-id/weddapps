
<div class="modal fade bs-example-modal-lg" id="teammodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Team Edit</h4> </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="team_id">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="recipient-name"> </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="recipient-name"> </div>
                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" id="recipient-name"> </div>
                             <div class="form-group">
                                <label for="recipient-name" class="control-label">No Telp</label>
                                <input type="number" class="form-control" name="no_telp" id="recipient-name"> </div>

                                <div class="form-group" id="photo-preview">
                                 <label class="control-label">Photo</label>
                                 <div>
                                    (No photo)
                                    <span class="help-block"></span>
                                </div>
                            </div> 
                            <div class="form-group" id="photo-preview">
                                <label class="control-label">If you want to change your photo</label>
                                <input type="file" class="form-control" name="photo" id="recipient-name"></div>  
                                
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button onclick="save_team()" type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                        </div>
                    </div>
                </div>