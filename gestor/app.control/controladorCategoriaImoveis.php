<?php
    /**
      * controladorCategoriaImoveis
      * Classe de Controle controladorCategoriaImoveis
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorCategoriaImoveis
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $collectionCategoria;
        private $categoria;


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
            $this->repository           = new TRepository;

            $this->collectionCategoria  = NULL;
            $this->categoria            = NULL;
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
         * Método getLocalizacoes
         * Retorna as localizações
         * 
         * @access  public
         * @return  TRepository Coleção de Localizações
         */
        public function getCategorias()
        {
            $this->collectionCategoria = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'categoria');
            
            $this->repository->addColumn('codigo');
            $this->repository->addColumn('categoria');

            $this->repository->addEntity('categoriaimoveis');

            $this->collectionCategoria = $this->repository->load($criteria);
            
            return $this->collectionCategoria;
        }
    }
?>