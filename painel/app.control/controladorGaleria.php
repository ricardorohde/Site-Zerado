<?php
    /**
      * controladorGaleria
      * Classe de Controle controladorGaleria
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorGaleria
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $galeria;
        private $collectionGaleria;
        private $galeriaImagens;


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
            $this->repository               = new TRepository();

            $this->galeria                  = NULL;
            $this->collectionGaleriaImagens = NULL;
            $this->galeriaImagens           = NULL;
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
         * Método getGaleria
         * Retorna a galeria de acordo com o codigo
         *
         * @access  public
         * @return  TRepository Coleção de Galeria
         */
        public function getGaleriaImagens($classe, $codigo)
        {
            $this->collectionGaleria = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->addFilter('codigo'.$classe, '=', $codigo);
            $criteria->setProperty('order', 'ordem');

            $this->repository->addColumn('imagem');
            $this->repository->addColumn('titulo');
            $this->repository->addColumn('descricao');
            $this->repository->addColumn('ordem');

            $this->repository->addEntity('galeriaimagens');

            $this->collectionGaleriaImagens = $this->repository->load($criteria);

            return $this->collectionGaleriaImagens;
        }

        /**
         * Apaga fisicamente a galeria
         *
         * @param  $coluna Coluna a ser usada na busca
         * @param  $codigo Código (Foreign Key) a ser apagado
         * @return void
         */
        public function apagaGaleriaFisico($coluna, $codigo)
        {
            $this->repository = new TRepository();

            $this->repository->addEntity('galeriaimagens');

            $criteria = new TCriteria();
            $criteria->addFilter($coluna, '=', $codigo);

            $this->repository->deleteFisico($criteria);
        }
    }
?>
