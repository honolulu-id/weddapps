
<div class="modal fade" id="kategorimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Detail kategori</h4> </div>
                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="kategori_id">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="kategori" id="recipient-name"> </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button onclick="save_kategori()" type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                    </div>
                </div>
            </div>