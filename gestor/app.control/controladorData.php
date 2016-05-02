<?php
    /**
      * controladorData.php
      * Classe de Controle controladorData
      *     1.1 Método corrigeUrlAmigavel
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.1
      * @access  public
      */
    class controladorData
    {
        /*
         *    Variaveis
         */


        /*
         * Métodos
         */
        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {

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
         * Método urlAmigavel
         * Transforma a string do parametro para um formato de URL Amigavel
         * 
         * @access  public
         * @param   string $string  String a ser convertida em URL Amigável
         * @return  string          Url Amigavel
         */
        public static function converteData($data)
        {
            return date("d/m/Y", strtotime($this->$propriedade));
        }
    }
?>