<?php
    /**
      * controladorLocalizacao
      * Classe de Controle controladorLocalizacao
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorLocalizacao
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $collectionLocalizacao;
        private $localizacao;


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

            $this->collectionLocalizacao    = NULL;
            $this->localizacao              = NULL;
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

        /**
         * M�todo getLocalizacoes
         * Retorna as localiza��es
         * 
         * @access  public
         * @return  TRepository Cole��o de Localiza��es
         */
        public function getLocalizacoes()
        {
            $this->collectionLocalizacao = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'nome');
            
            $this->repository->addColumn('codigo');
            $this->repository->addColumn('nome');
            $this->repository->addEntity('localizacao');

            $this->collectionLocalizacao = $this->repository->load($criteria);
            
            return $this->collectionLocalizacao;
        }
    }
?>