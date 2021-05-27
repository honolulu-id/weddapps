<script>
    var save_method;
    var kategori;
    kategori = $('#tabel-kategori').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": base_url+"kategori/ajax_list",
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


function reload_table_kategori()
    {
    kategori.ajax.reload(null,false); //reload datatable ajax
}
function validations()                                    
{ 
    var kategori = document.forms["form"]["kategori"];

    if (kategori.value == "")                                  
    { 
     $.toast({
        heading: 'Error input data',
        text: 'Please enter your kategori field.',
        position: 'top-right',
        loaderBg:'#ff6849',
        icon: 'warning',
        hideAfter: 3000, 
        stack: 6
    });
     kategori.focus(); 
     return false; 
 } 



} 
function save_kategori()
{   
    var url;

    if(save_method == 'update') {
        url = base_url+"kategori/ajax_update";
    } else {
        url = base_url+"kategori/ajax_add";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
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
            $('#kategorimodal').modal('hide');
            reload_table_kategori();
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

function delete_kategori(id)
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
            url : base_url+"kategori/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success:function(){
              swal('Data Berhasil Dihapus', ' ', 'success');
              $("#delete").fadeTo("slow", 0.7, function(){
                $(this).remove();
            })
              reload_table_kategori();

          },

      });
        
    });
}

function edit_kategori(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $.ajax({
        url : base_url+"kategori/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="kategori_id"]').val(data.kategori_id);
            $('[name="kategori"]').val(data.kategori);
            $('#kategorimodal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Kategori Form'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>