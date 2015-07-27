<?php
	/**
      * erro.php
      * Classe de erros
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
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
		 * Método Contrutor
		 * 
         * @access public
         * @return void
		 */
		public function __construct()
		{
			
		}
		
		/**
		 * Método show
		 * Exibe as informações na tela
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
						<h1>Solicitação Imprópria</h1>
						<p>
							O servidor não pode compreender a solicitação e processá-la.<br>
							Contate o <a href='mailto:suporte@rogeriopereira.info'>Suporte Técnico</a>
						</p>
					";
			//Erro 401 - Unauthorized
			if($_GET['codigo'] == 401)
				echo 
					'
						<h1>Não autorizado</h1>
						<p>
							Por favor faça o login primeiro
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
						<h1>Não encontrado</h1>
						<p>
							O conteudo solicitado não foi encontrado em nossos servidores.
						</p>
					';
			//Erro 500 - Internal Server Error
			if($_GET['codigo'] == 500)
				echo 
					"
						<h1>Erro interno no Servidor</h1>
						<p>
							O servidor encontrou uma condição inesperada<br>
							Contate o <a href='mailto:suporte@rogeriopereira.info'>Suporte Técnico</a>
						</p>
					";
		}
	}

?>