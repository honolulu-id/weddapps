<script type="text/javascript">
    function update_profile(){
    url = base_url+"profile/ajax_update";
    var formData = new FormData($('#form')[0]);

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

            var reloadPage = setInterval(timer, 1500);
            function timer(){
                window.location.href=base_url+"profile";
            }
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
            document.getElementById("form").reset();

        }
    });
}
</script>