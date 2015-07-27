<?php
	/**
      * erro.php
      * Classe de erros
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
	class erro 
	{
		/*
		 * Variaveis
		 */
		
		
		/*
		 * Getters e Setters
		 */
		
		
		/**
		 * M�todo Contrutor
		 * 
         * @access public
         * @return void
		 */
		public function __construct()
		{
			
		}
		
		/**
		 * M�todo show
		 * Exibe as informa��es na tela
		 * 
         * @access public
         * @return void
		 */
		public function show()
		{
			//echo '<h1>Erro</h1><hr>';
			//Erro 400 - Bad Request
			if($_GET['codigo'] == 400)
				echo 
					"
						<h1>Solicita��o Impr�pria</h1>
						<p>
							O servidor n�o pode compreender a solicita��o e process�-la.<br>
							Contate o <a href='mailto:suporte@rogeriopereira.info'>Suporte T�cnico</a>
						</p>
					";
			//Erro 401 - Unauthorized
			if($_GET['codigo'] == 401)
				echo 
					'
						<h1>N�o autorizado</h1>
						<p>
							Por favor fa�a o login primeiro
						</p>
					';
			//Erro 403 - Forbidden 
			if($_GET['codigo'] == 403)
				echo 
					'
						<h1>Acesso Negado</h1>
						<p>
							O acesso a esse local foi proibido
						</p>
					';
			//Erro 404 - Not Found
			if($_GET['codigo'] == 404)
				echo 
					'
						<h1>N�o encontrado</h1>
						<p>
							O conteudo solicitado n�o foi encontrado em nossos servidores.
						</p>
					';
			//Erro 500 - Internal Server Error
			if($_GET['codigo'] == 500)
				echo 
					"
						<h1>Erro interno no Servidor</h1>
						<p>
							O servidor encontrou uma condi��o inesperada<br>
							Contate o <a href='mailto:suporte@rogeriopereira.info'>Suporte T�cnico</a>
						</p>
					";
		}
	}

?>