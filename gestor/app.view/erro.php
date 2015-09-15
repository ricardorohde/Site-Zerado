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
		private $codigo/

		/*
		 * Métodos
		 */
		/**
		 * Método Contrutor
		 * 
         * @access public
         * @return void
		 */
		public function __construct()
		{
			if(isset($_GET['codigo']))
				$this->codigo = $_GET['codigo'];
		}

		/**
          * Método __set
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        /**
          * Método __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
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
			if($this->codigo == 400)
				echo 
					"
						<h1>Solicitação Imprópria</h1>
						<p>
							O servidor não pode compreender a solicitação e processá-la.<br>
							Contate o <a href='mailto:suporte@rogeriopereira.info'>Suporte Técnico</a>
						</p>
					";
			//Erro 401 - Unauthorized
			if($this->codigo == 401)
				echo 
					'
						<h1>Não autorizado</h1>
						<p>
							Por favor faça o login primeiro
						</p>
					';
			//Erro 403 - Forbidden 
			if($this->codigo == 403)
				echo 
					'
						<h1>Acesso Negado</h1>
						<p>
							O acesso a esse local foi proibido
						</p>
					';
			//Erro 404 - Not Found
			if($this->codigo == 404)
				echo 
					'
						<h1>Não encontrado</h1>
						<p>
							O conteudo solicitado não foi encontrado em nossos servidores.
						</p>
					';
			//Erro 500 - Internal Server Error
			if($this->codigo == 500)
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