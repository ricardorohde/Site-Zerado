<?php
    /**
      * controladorTelefones.php
      * Classe de Controle controladorTelefones
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorTelefones
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $telefone;
        private $collectionTelefones;


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
            $this->telefone              = NULL;
            $this->collectionTelefones   = NULL;
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


        public function getTelefones()
        {
            $this->collectionTelefones = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'codigo');
            
            $this->repository->addColumn('telefone');

            $this->repository->addEntity('telefones');

            $this->collectionTelefones = $this->repository->load($criteria);
            
            return $this->collectionTelefones;
        }
    }
?>