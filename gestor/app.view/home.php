<?php

	/**
      * home.php
      * Classe Home
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
	class Home
	{
		/*
		 * Vari�veis
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
		 */
		public function show()
		{
			?>
				HOME
			<?php
		}
	}
?>