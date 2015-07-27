<?php

	/**
      * template.php
      * Classe template
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
	class template
	{
		/*
		 *	Variaveis
		 */


		/**
		 * M�todo construtor
		 * Verifica se esta logado
		 * 
		 * @access public
		 * @return void
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


		/**
		 * M�todo show
		 * Exibe as informa��es da p�gina
		 * 
		 * @access public
		 * @return void
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
					<?php include_once 'css.php'; ?>	
					
					<!--JQuery-->
					<?php include_once 'jsLib.php'; ?>				
					
					<!--JavaScript-->
				</head>
				<body>
					#CONTENT#
				</body>
			</html>
		<?php
		}
	}
?>