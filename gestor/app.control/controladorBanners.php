<?php
    /**
      * controladorBanners.php
      * Classe de Controle controladorBanners
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorBanners
    {
        /*
         *    Variaveis
         */
        private $banner;


        /*
         * M�todos
         */
        /**
         * M�todo Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {
            $this->repository               = new TRepository;
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
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        /**
          * M�todo __get
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