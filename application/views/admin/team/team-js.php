<script>
    var save_method;
    var team;
   $(document).ready(function() {

    //datatables
    team = $('#tabel-team').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": base_url+"team/ajax_list",
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

});


function reload_table_team()
    {
    team.ajax.reload(null,false); //reload datatable ajax
}

function validations()                                    
{ 
    var nama = document.forms["form"]["nama"]; 
    var jabatan = document.forms["form"]["jabatan"];
    var email = document.forms["form"]["email"]; 
    var photo = document.forms["form"]["photo"];
    var keterangan = document.forms["form"]["keterangan"];

    if (nama.value == "")                                  
    { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your nama field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     nama.focus(); 
     return false; 
 } 
 if (jabatan.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your jabatan field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     jabatan.focus(); 
     return false; 
 } 

 if (email.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your email field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     email.focus(); 
     return false; 
 } 
 if (photo.value == "")                                  
 { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your photo field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     photo.focus(); 
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

function save_team()
{   
    var url;

    if(save_method == 'update') {
        url = base_url+"team/ajax_update";
    } else {
        url = base_url+"team/ajax_add";
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
                $('#teammodal').modal('hide');
                reload_table_team();
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

function delete_team(id)
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
            url : base_url+"team/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success:function(){
              swal('Data Berhasil Dihapus', ' ', 'success');
              $("#delete").fadeTo("slow", 0.7, function(){
                $(this).remove();
            })
              reload_table_team();

          },

      });
        
    });
}

function edit_team(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $.ajax({
        url : base_url+"team/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="team_id"]').val(data.team_id);
            $('[name="nama"]').val(data.nama);
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="email"]').val(data.email);
            $('[name="no_telp"]').val(data.no_telp);
            $('[name="keterangan"]').val(data.keterangan);
            //textarea
            tinymce.get('message-text').setContent(data.keterangan);
            $("#message-text").val();
            tinymce.get('message-text').getContent();





                if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'upload/team/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }

            $('#teammodal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data team'); // Set title to Bootstrap modal title

             $('#photo-preview').show(); // show photo preview modal
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>