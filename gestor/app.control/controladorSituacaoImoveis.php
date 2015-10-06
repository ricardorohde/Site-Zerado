<?php
    /**
      * controladorSituacaoImoveis
      * Classe de Controle controladorSituacaoImoveis
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorSituacaoImoveis
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $collectionSituacao;
        private $situacao;


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
            $this->repository           = new TRepository;

            $this->collectionSituacao   = NULL;
            $this->situacao             = NULL;
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
        public function getSituacoes()
        {
            $this->collectionSituacao = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'situacao');
            
            $this->repository->addColumn('codigo');
            $this->repository->addColumn('situacao');
            
            $this->repository->addEntity('situacaoImoveis');

            $this->collectionSituacao = $this->repository->load($criteria);
            
            return $this->collectionSituacao;
        }
    }
?>