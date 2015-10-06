<?php
    /**
      * situacaoImoveis.php
      * Classe situacaoImoveis
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class situacaoImoveis
    {
        /*
         * Variaveis
         */        
        private $collection;
        private $listagem;


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
            $this->collection = new TList();

            $this->collection->setTituloPagina('Situa��o Im�veis');

            $this->collection->addColumn('codigo');
            $this->collection->addColumn('situacao');
            $this->collection->addColumn('ativo');

            $this->collection->addEntity('situacaoImoveis');

            $this->listagem = $this->collection->show();
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
          * M�todo show
          * Exibe as informa��es na tela
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