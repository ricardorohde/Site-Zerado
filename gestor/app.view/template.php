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
			new TSession(0);
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
					<?php include_once 'css/css.php'; ?>	
					
					<!--JQuery-->
					<?php include_once 'js/jsLib.php'; ?>
					
					<!--JavaScript-->
					<?php include_once 'js/jsInit.php'; ?>
				</head>
				<body>
					<div class='row'>
						<!--MENU-->
						<?php include_once 'menu.php'; ?>

						<div class='clear'></div>

						<!--CONTEUDO-->
						<div class='10u content'>
							#CONTENT#
						</div>
					</div>
				</body>
			</html>
		<?php
		}
	}
?>
