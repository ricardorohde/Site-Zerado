<?php
    /**
      * controladorImoveis
      * Classe de Controle controladorImoveis
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorImoveis
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $collectionImoveis;
        private $imovel;


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
            $this->repository         = new TRepository;

            $this->collectionImoveis  = NULL;
            $this->imovel             = NULL;
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
         * Método getImoveis
         * Retorna os Imóveis
         * 
         * @access  public
         * @return  TRepository Coleção de Imóveis
         */
        public function getImoveis()
        {
            $this->collectionImoveis = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'endereco');
            
            $this->repository->addColumn('*');
            
            $this->repository->addEntity('imoveis');

            $this->collectionImoveis = $this->repository->load($criteria);
            
            return $this->collectionImoveis;
        }
    }
?>