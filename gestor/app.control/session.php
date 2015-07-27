<?php
	error_reporting(E_WARNING);

    /**
     * session.php
     * Controla a sessão PHP
     *
     * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
     * @version 1.0     
     * @access  public
     */
    class session
    {
        /**
          * Método construtor
          * Inicia sessão
          * 
          * @access  public
          * @return  void
          */
        public function __construct()
        {
          @session_start();
        }
    }
?>