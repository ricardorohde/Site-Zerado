<?php
    /**
      * subcategoriaProdutos.php
      * Classe subcategoriaProdutos
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.0
      * @access  public
      */
    class subcategoriaProdutos
    {
        /*
         * Variaveis
         */
        private $collection;
        private $listagem;


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
            $this->collection = new TList();

            $this->collection->setTituloPagina('Subcategoria Produtos');

            $this->collection->addColumn('s.codigo');
            $this->collection->addColumn('c.categoria');
            $this->collection->addColumn('s.subcategoria');
            $this->collection->addColumn('s.ativo');

            $this->collection->addEntity('subcategoriaprodutos s');
            $this->collection->addEntity('categoriaprodutos c');

            $criteria = new TCriteria();
            $criteria->addFilter('s.categoria', '=', 'c.codigo');
            $this->collection->setCriteria($criteria);

            $this->listagem = $this->collection->show();
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
          * Método show
          * Exibe as informações na tela
          *
          * @access public
          * @return void
          */
        public function show()
        {
            echo $this->listagem;
        }
    }
?>