<script>
	$(document).ready(function() 
    { 
        $('#login').submit(function(e) 
        {
            $.ajax
			({
				type: "POST",
				url: "../../app.control/ajax.php",
				data: 
				{
					email:		$('#email').val(),
					senha:		$('#senha').val(),
					request:	'login'
				},
				success: function(data)
				{
					top.location='/';
					
					if(data.length > 1)
						alert(data);
				}
			});
        });
    }); 
</script