<?php

/*
 *	Arquivo  home.php
 *	P�gina Home
 *	
 *	Sistema:	#SISTEMA#
 *	Autor:      Rog�rio Eduardo Pereira
 *	Data:       27/02/2015
 */
class template
{
	/*
		Variaveis
	*/


	/*
		Método construtor
	*/
	public function __construct()
	{
		new session();
        
		if(!isset($_SESSION['usuario']))
		{
			echo "
				<script>
					top.location='../?class=login';
				</script>
			";
		}
	}


	/*
		Método show
		Exibe as informações da página
	*/
	public function show()
	{
	?>
		
	<?php
	}
}
?>