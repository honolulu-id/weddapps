<script type="text/javascript">
    function update_contact(){
    url = base_url+"contact/ajax_update";
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
            var reloadPage = setInterval(timer, 1500);
            function timer(){
                window.location.href=base_url+"contact/index";
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