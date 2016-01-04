<?php
    /**
      * controladorTelefones.php
      * Classe de Controle controladorTelefones
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorTelefones
    {
        /*
         *    Variaveis
         */
        private $telefone;


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
            $this->repository = new TRepository;
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
    }
?>