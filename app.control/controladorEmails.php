<?php
    /**
      * controladorEmails.php
      * Classe de Controle controladorEmails
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorEmails
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $email;
        private $collectionEmails;


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
            $this->email              = NULL;
            $this->collectionEmails   = NULL;
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


        public function getEmails()
        {
            $this->collectionEmails = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('ativo', '=', 1);
            $criteria->setProperty('order', 'email');
            
            $this->repository->addColumn('email');

            $this->repository->addEntity('emails');

            $this->collectionEmails = $this->repository->load($criteria);
            
            return $this->collectionEmails;
        }
    }
?>