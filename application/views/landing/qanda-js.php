<!-- toast CSS -->
<link href="<?php echo base_url();?>assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">

<script>var base_url = '<?php echo base_url() ?>';</script>
<script src="<?php echo base_url();?>assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script src="<?php echo base_url();?>assets/js/toastr.js"></script>

<script type="text/javascript">
	var save_method;

	function validations()                                    
	{ 
		var user = document.forms["form"]["user"]; 
		var email = document.forms["form"]["email"]; 
		var tanya = document.forms["form"]["tanya"];

		if (user.value == "")                                  
		{ 
			$.toast({
				heading: 'Error input data',
				text: 'Please enter your user field.',
				position: 'top-right',
				loaderBg:'#ff6849',
				icon: 'warning',
				hideAfter: 3000, 
				stack: 6
			});
			user.focus(); 
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

		if (tanya.value == "")                                  
		{ 
			$.toast({
				heading: 'Error input data',
				text: 'Please enter your tanya field.',
				position: 'top-right',
				loaderBg:'#ff6849',
				icon: 'warning',
				hideAfter: 3000, 
				stack: 6
			});
			tanya.focus(); 
			return false; 
		} 

	} 

	function save_qanda_landing()
	{   
		var url;

		if(save_method == 'update') {
			url = base_url+"qanda/ajax_update";
		} else {
			url = base_url+"qanda/ajax_add";
		}

	var formData = new FormData($('#form')[0]);
    // ajax adding data to database
    $.ajax({
    	url : url,
    	type: "POST",
    	// data: $('#form').serialize(),
    	data:formData,
    	contentType: false,
        processData: false,
    	dataType: "JSON",
    	success: function(data)
    	{

    		$.toast({
    			heading: 'Pertanyaan Anda Berhasil Dikirim',
    			position: 'top-right',
    			loaderBg:'#ff6849',
    			icon: 'success',
    			hideAfter: 3500, 
    			stack: 6
    		});
            // $('#qandamodal').modal('hide');
            // reload_table_qanda();
            document.getElementById("form").reset();


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        	$.toast({
        		heading: 'Maaf, Mohon isi semua field yang tersedia.',
        		position: 'top-right',
        		loaderBg:'#ff6849',
        		icon: 'error',
        		hideAfter: 3500

        	});
        	// document.getElementById("form").reset();

        }
    });
}
</script>