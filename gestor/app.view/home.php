<?php

	/**
      * home.php
      * Classe Home
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
	class Home
	{
		/*
		 * Variáveis
		 */


		/**
		 * Método construtor
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
		 * Método show
		 * Exibe as informações da página
		 * 
		 * @access public
		 */
		public function show()
		{
			
		}
	}
?>