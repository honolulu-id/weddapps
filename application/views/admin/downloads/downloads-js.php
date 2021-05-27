<script>
    var save_method;
    var downloads;
 
    $(document).ready(function() {

    //datatables
    downloads = $('#tabel-downloads').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": base_url+"downloads/ajax_list",
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
        orientation: "bottom auto",
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

});



function reload_table_downloads()
    {
    downloads.ajax.reload(null,false); //reload datatable ajax
}

function validations()                                    
{ 
    var judul = document.forms["form"]["judul"]; 
    var waktu = document.forms["form"]["waktu"];
    var files = document.forms["form"]["files"]; 
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

 if (files.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your files field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     files.focus(); 
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

function save_downloads()
{   
    var url;

    if(save_method == 'update') {
        url = base_url+"downloads/ajax_update";
    } else {
        url = base_url+"downloads/ajax_add";
    }
    var formData = new FormData($('#form')[0]);

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        // data: $('#form').serialize(),
          data: formData, //contentype dan processData perlu dicopy
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            $.toast({
                heading: 'Data Berhasil Disimpan',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 1500, 
                stack: 6
            });
            $('#downloadsmodal').modal('hide');
            reload_table_downloads();
            document.getElementById("form").reset();


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

function delete_downloads(id)
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
            url : base_url+"downloads/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success:function(){
              swal('Data Berhasil Dihapus', ' ', 'success');
              $("#delete").fadeTo("slow", 0.7, function(){
                $(this).remove();
            })
              reload_table_downloads();

          },

      });
        
    });
}

function edit_downloads(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $.ajax({
        url : base_url+"downloads/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="downloads_id"]').val(data.downloads_id);
            $('[name="judul"]').val(data.judul);
            $('[name="waktu"]').val(data.waktu);
            // $('[name="files"]').val(data.files);
            $('[name="keterangan"]').val(data.keterangan);
            //textarea
            tinymce.get('message-text').setContent(data.keterangan);
            $("#message-text").val();
            tinymce.get('message-text').getContent();

            if(data.files)
            {
                $('#label-files').text('Change files'); // label files upload
                $('#files-preview div').html('<span>'+data.files+'</span><br>'); // show files
                $('#files-preview div').append('<input type="checkbox" name="remove_files" value="'+data.files+'"/> Remove files when saving'); // remove files

            }
            else
            {
                $('#label-files').text('Upload files'); // label files upload
                $('#files-preview div').text('(No files)');
            }

            $('#downloadsmodal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data downloads'); // Set title to Bootstrap modal title

            $('#files-preview').show(); // show files preview modal


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>