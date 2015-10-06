<?php
    /**
      * TSession.php
      * Gerencia uma sess�o com o usu�rio
      *
      * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
      * @version 1.0
      * @access  public
      */
    class TSession
    {
        /*
         *    Variaveis
         */

        /*
         * M�todos
         */
        /**
         * M�todo Construtor
         * Inicia uma sess�o
         *
         * @access private
         * @param  login    Janela de login
         * @return void
         */
        public function __construct($login)
        {
            @session_start();

            if($login == 0)
            {
                if(!isset($_SESSION['usuario']))
                {
                    echo "
                        <script>
                            top.location='/login';
                        </script>
                    ";
                }
            }   
        }

        /**
          * M�todo __set
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public static function setValue($propriedade, $valor)
        {
            $_SESSION[$propriedade] = $valor;
        }

        /**
          * M�todo __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public static function getValue($propriedade)
        {
            return $_SESSION[$propriedade];
        }

        /**
         * M�todo freeSession
         * Destroi os dados de uma sess�o
         */
        public static function freeSession()
        {
            $_SESSION = array();
            session_destroy();

            echo 
                "
                    <script>
                        top.location='/login';
                    </script>
                ";
        }
    }
?>