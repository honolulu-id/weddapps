<script type="text/javascript">
    function update_about(){
    url = base_url+"about/ajax_update";
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
                window.location.href=base_url+"about";
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
