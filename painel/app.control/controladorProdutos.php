<?php
    /**
      * controladorProdutos
      * Classe de Controle controladorProdutos
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorProdutos
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $collectionProdutos;
        private $produto;

        private $cor;
        private $collectionCores;

        private $categoriasProduto;

        private $subcategoriasProduto;


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

            $this->collectionProdutos   = NULL;
            $this->produto              = NULL;

            $this->cor                  = NULL;
            $this->collectionCores      = NULL;

            $this->categoriasProduto    = NULL;

            $this->subcategoriasProduto = NULL;
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
         * Método getCategorias
         * Obtém listagem de categorias ativas
         *
         * @access public
         * @return tbCategorias   Listagem de Categorias
         */
        public function getCategorias()
        {
            $this->repository         = new TRepository();
            $this->categoriasProduto  = NULL;

            $this->repository->addEntity('categoriaprodutos');

            $this->repository->addColumn('codigo');
            $this->repository->addColumn('categoria');;

            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'categoria');

            $this->categoriasProduto = $this->repository->load($criteria);

            return $this->categoriasProduto;
        }

        /**
         * Método getSubCategorias
         * Obtém listagem de subcategorias ativas
         *
         * @access public
         * @return tbSubCategoriasProdutos  Listagem de Categorias
         */
        public function getSubCategorias($categoria)
        {
            $this->repository         = new TRepository();
            $this->categoriasProduto  = NULL;

            $this->repository->addEntity('subcategoriaprodutos');

            $this->repository->addColumn('codigo');
            $this->repository->addColumn('subcategoria');;

            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->addFilter('categoria', '=', $categoria);
            $criteria->setProperty('order', 'subcategoria');

            $this->categoriasProduto = $this->repository->load($criteria);

            return $this->categoriasProduto;
        }

        /**
         * Obtém todas as cores do Produto
         *
         * @param  $codigo          Código do Produto
         * @return tbProdutosCores  Cores do Produto
         */
        public function getCoresProduto($codigo)
        {
            $this->repository = new TRepository();

            $this->collectionCores = NULL;

            $this->repository->addColumn('cor');

            $this->repository->addEntity('produtoscores');

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->addFilter('codigoProduto', '=', $codigo);
            $criteria->setProperty('order', 'cor');

            $this->collectionCores = $this->repository->load($criteria);

            return $this->collectionCores;
        }

        /**
         * Apaga fisicamente a galeria
         *
         * @param  $coluna Coluna a ser usada na busca
         * @param  $codigo Código (Foreign Key) a ser apagado
         * @return void
         */
        public function apagaCoresFisico($codigo)
        {
            $this->repository = new TRepository();

            $this->repository->addEntity('produtoscores');

            $criteria = new TCriteria();
            $criteria->addFilter('codigoProduto', '=', $codigo);

            $this->repository->deleteFisico($criteria);
        }
    }
?>
