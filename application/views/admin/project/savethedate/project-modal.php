
<div class="modal fade bs-example-modal-lg" id="savethedatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Detail Save The Date</h4> </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Pria</label>
                                <input type="text" class="form-control" name="nama_pria" id="recipient-name"> 
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama Wanita</label>
                                <input type="text" class="form-control" name="nama_wanita" id="recipient-name"> 
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tanggal Resepsi</label>
                                <input type="text" class="form-control datepicker" name="tanggal" id="recipient-name"> 
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tempat Resepsi</label>
                                <input type="text" class="form-control" name="tempat_resepsi" id="recipient-name"> 
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Keluarga Pria</label>
                                <input type="text" class="form-control" name="keluarga_pria" id="recipient-name"> 
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Keluarga Wanita</label>
                                <input type="text" class="form-control" name="keluarga_wanita" id="recipient-name"> 
                            </div>

                            <div class="form-group" id="foto_pria-preview">
                                <label class="control-label">Foto Pengantin Pria</label>
                                <div style="width: 150px; max-width:auto">
                                    <!-- (No photo) -->
                                </div>
                            </div>

                            <div class="form-group" id="foto_wanita-preview">
                                <label class="control-label">Foto Pengantin Wanita</label>
                                <div style="width: 150px; max-width:auto">
                                    <!-- (No photo) -->
                                </div>
                            </div> 

                            <div class="form-group" id="foto_pria-preview">
                                <label class="control-label">Ganti Foto Pengantin Pria</label>
                                <input type="file" accept="image/jpg, image/jpeg" class="form-control" name="foto_pria" id="recipient-name">
                            </div>

                            <div class="form-group" id="foto_wanita-preview">
                                <label class="control-label">Ganti Foto Pengantin Wanita</label>
                                <input type="file" accept="image/jpg, image/jpeg" class="form-control" name="foto_wanita" id="recipient-name">
                            </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button onclick="save_savethedate()" type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                </div>
            
            </div>
        </div>