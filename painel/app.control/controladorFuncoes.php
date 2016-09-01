<?php
    /**
      * controladorFuncoes.php
      * Classe de Controle controladorFuncoes
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorFuncoes
    {
        /*
         *    Variaveis
         */
        private $funcoes;

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
            $this->funcoes = NULL;
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
         * Método getFuncoes
         * Retorna as funcoes do banco de dados
         * 
         * @access public
         * @return tbFuncoes    Funções do site
         */
        public function getFuncoes()
        {
            $this->funcoes = NULL;

            $this->funcoes = (new tbFuncoes())->load(1);

            return $this->funcoes;
        }
    }
?>