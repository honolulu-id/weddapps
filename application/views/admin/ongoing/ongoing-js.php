<script>
    var save_method;
    var ongoing;
    $(document).ready(function() {

    //datatables
    ongoing = $('#tabel-ongoing').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": base_url+"ongoing/ajax_list",
        "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [
    {
        "targets": [ 3 ], //last column
        "orderable": true, //set not orderable
    },
    ],

});

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $("#tambahFoto").click(function(){
        var counter=$('.barang_tr1').length+1;
        var nomor = $(".barang_tr_new1").length+1;
        var string=
        "<tr class=' barang_tr1 barang_tr_new1'>"
        +"<td><label for='hasil'>Photo ongoing</label>  <label class='field-option'><input type='file' name='photo["+counter+"]' id='foto' class='form-control' accept='image/jpeg' required=''></input> </label><td>"
        +"<td style='width: 11%'><button type='button' onClick='deleteElement("+counter+",this)' class='btn btn-danger btn-sm'>Hapus</button>";
        +"</td></tr>";
        $("#tableFoto").append(string);
    });

});


    function reload_table_ongoing()
    {
    ongoing.ajax.reload(null,false); //reload datatable ajax
}

function validations()                                    
{ 
    var judul = document.forms["form"]["judul"]; 
    var waktu = document.forms["form"]["waktu"];
    var background = document.forms["form"]["background"]; 
    var keterangan = document.forms["form"]["keterangan"];

    if (judul.value == "")                                  
    { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your judul field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     judul.focus(); 
     return false; 
 } 
 if (waktu.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your waktu field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     waktu.focus(); 
     return false; 
 } 

 if (background.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your background field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     background.focus(); 
     return false; 
 } 
 if (keterangan.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your keterangan field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     keterangan.focus(); 
     return false; 
 }


} 

function save_ongoing()
{   
    var url;

    if(save_method == 'update') {
        url = base_url+"ongoing/ajax_update";
    } else {
        url = base_url+"ongoing/ajax_add";
    }
    var formData = new FormData($('#form')[0]);

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: formData, //contentype dan processData perlu dicopy
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

           if(data.status) //if success close modal and reload ajax table
           {
            $.toast({
                heading: 'Data Berhasil Disimpan',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 1500, 
                stack: 6
            });
            $('#ongoingmodal').modal('hide');
            reload_table_ongoing();
            document.getElementById("form").reset();  
        }
        else
        {
            for (var i = 0; i < data.inputerror.length; i++) 
            {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $.toast({
                heading: 'Data gagal disimpan',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'error',
                hideAfter: 1500

            });
            // document.getElementById("form").reset();

        }
    });
}

function delete_ongoing(id)
{   
    swal({
        title: "Delete",
        text: "Apakah anda yakin akan menghapus data ?",
        type: "warning",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            url : base_url+"ongoing/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success:function(){
              swal('Data Berhasil Dihapus', ' ', 'success');
              $("#delete").fadeTo("slow", 0.7, function(){
                $(this).remove();
            })
              reload_table_ongoing();

          },

      });
        
    });
}

function edit_ongoing(id)
{
    save_method = 'update';
    var ed = tinyMCE.get('keterangan');
    $('#form')[0].reset(); // reset form on modals
    $("#photo-preview div").html('');
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $.ajax({
        url : base_url+"ongoing/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="ongoing_id"]').val(data.ongoing_id);
            $('[name="judul"]').val(data.judul);
            $('[name="waktu"]').val(data.waktu);
            $('[name="foto"]').val(data.foto);
            $('[name="keterangan"]').val(tinyMCE.get('keterangan'));
            // $('[name="keterangan"]').html(ed);
            //textarea
            tinymce.get('message-text').setContent(data.keterangan);
            $("#message-text").val();
            tinymce.get('message-text').getContent();

            if(data.background)
            {
                // $('#label-photo').text('Change Photo'); // label photo upload
                $('#background-preview div').html('<img src="'+base_url+'upload/ongoing/background/'+data.background+'" class="img-responsive">'); // show photo
                $('#background-preview div').append('<input type="checkbox" name="remove_background" value="'+data.background+'"/> Remove background when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#background-preview div').text('(No photo)');
            }

            for (var i = 0; i < data.photo.length; i++) {

                // $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').append('<img src="'+base_url+'upload/ongoing/'+data.photo[i].photo+'" style="width:350px" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_['+i+'][photo]" value="'+data.photo[i].photo+'"/> Remove photo when saving'); // remove photo
                // $('#photo-preview div').append('<input type="hidden" name="remove_['+i+'][id_detail]" value="'+data.photo[i].id_detail+'"/>'); // remove photo
            }

            $('#ongoingmodal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data ongoing'); // Set title to Bootstrap modal title

             $('#photo-preview').show(); // show photo preview modal


         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            alert('Error get data from ajax');
        }
    });
}
function deleteElement(count,el) {
    var parent = el.parentNode.parentNode;
    parent.parentNode.removeChild(parent);
    var penerimaan=$('.icd_tr');
    var countPenerimaanTr=penerimaan.length;
    for(var i=0;i<countPenerimaanTr;i++){
        $('.icd_tr:eq('+i+')').children('td:eq(0)').html(i+1);
        $('.icd_tr:eq('+i+')').removeClass('even');
        $('.icd_tr:eq('+i+')').removeClass('odd');
        $('.icd_tr:eq('+i+')').addClass(((i+1) % 2 != 0)?'even':'odd');

        $('.icd_tr:eq('+i+')').children('td:eq(1)').children('.auto').attr('id','namaAlat'+(i+1));
    }
    hitungTotal(count);

}
</script>