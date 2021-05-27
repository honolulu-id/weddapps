<script>
    var save_method;
    var qanda;
    qanda = $('#tabel-qanda').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": base_url+"qanda/ajax_list",
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


function reload_table_qanda()
    {
    qanda.ajax.reload(null,false); //reload datatable ajax
}

function save_qanda()
{   
    var url;

    if(save_method == 'update') {
        url = base_url+"qanda/ajax_update";
    } else {
        url = base_url+"qanda/ajax_add";
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
            $('#qandamodal').modal('hide');
            reload_table_qanda();
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
            document.getElementById("form").reset();

        }
    });
}

function delete_qanda(id)
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
            url : base_url+"qanda/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success:function(){
              swal('Data Berhasil Dihapus', ' ', 'success');
              $("#delete").fadeTo("slow", 0.7, function(){
                $(this).remove();
            })
              reload_table_qanda();

          },

      });
        
    });
}

function edit_qanda(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $.ajax({
        url : base_url+"qanda/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="qanda_id"]').val(data.qanda_id);
            $('[name="nama"]').val(data.user_username);
            $('[name="id_user"]').val(data.user_id);
            $('[name="tanya"]').val(data.tanya);
            $('[name="waktu_tanya"]').val(data.waktu_tanya);
            $('[name="jawab"]').val(data.jawab);

              //textarea
            tinymce.get('message-pertanyaan').setContent(data.tanya);
            $("#message-pertanyaan").val();
            tinymce.get('message-pertanyaan').getContent();

              //textarea
            tinymce.get('message-jawaban').setContent(data.jawab);
            $("#message-jawaban").val();
            tinymce.get('message-jawaban').getContent();

            $('#qandamodal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Q&A Form'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>