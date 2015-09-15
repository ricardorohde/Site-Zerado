<?php
    /**
      * TSession.php
      * Gerencia uma sessão com o usuário
      *
      * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
      * @version 1.0
      * @access  public
      */
    class TSession
    {
        /*
         *    Variaveis
         */

        /*
         * Métodos
         */
        /**
         * Método Construtor
         * Inicia uma sessão
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
          * Método __set
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
          * Método __get
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
         * Método freeSession
         * Destroi os dados de uma sessão
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