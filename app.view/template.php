<?php
/*
 *	Arquivo  template.php
 *	Template
 *	
 *	Sistema:	#SISTEMA#
 *	Autor:      Rog�rio Eduardo Pereira
 *	Data:	27/02/2015
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

	}


	/*
		Método show
		Exibe as informações da página
	*/
	public function show()
	{
	?>
		<!DOCTYPE HTML>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
			<head>
				<?php include_once 'meta.php'; ?>
				
				<!--Fontes-->
				
				<!--CSS-->
				
				<!--JQuery-->
				<script type="text/javascript" src="/app.view/js/jquery.js"></script>
				<script type="text/javascript" src="/app.view/js/skel.js"></script>
				
				<!--JavaScript-->
			</head>
			<body>
				
			</body>
		</html>
	<?php
	}
}
?>