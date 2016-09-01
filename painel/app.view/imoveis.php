<?php
    /**
      * imoveis.php
      * Classe imoveis
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class imoveis
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

            $this->collection->setTituloPagina('Imóveis');

            $this->collection->addColumn('i.codigo');
            $this->collection->addColumn('c.categoria');
            $this->collection->addColumn('i.endereco');
            $this->collection->addColumn('i.numero');
            $this->collection->addColumn('i.bairro');
            $this->collection->addColumn('i.cidade');
            $this->collection->addColumn('i.preco');
            $this->collection->addColumn('s.situacao');
            $this->collection->addColumn('i.ativo');

            $this->collection->addEntity('imoveis i');
            $this->collection->addEntity('categoriaimoveis c');
            $this->collection->addEntity('situacaoimoveis s');

            $criteria = new TCriteria();
            $criteria->addFilter('c.codigo', '=', 'i.categoria');
            $criteria->addFilter('s.codigo', '=', 'i.situacao');
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