function validaLogin()
{
	if($('#email').val() == null)
		return false;
	else
	{
		email = $('#email').val()

		var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!filtro.test(email))
    	return false;
	}
	if($('#senha').val() == null)
		return false;

	executaLogin();
}

function executaLogin()
{
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			email:		$('#email').val(),
			senha:		$('#senha').val(),
			request:	'login'
		},
		success: function(data) 
		{
			if(data.length > 1)
				alert(data);
			
			top.location='home';
		}
	});
}