<?php
    /**
     * TSqlInstruction.php
     * Esta classe provê os métodos em comum entre todas instruções
     * SQL (SELECT, INSERT, DELETE, UPDATE)
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    abstract class TSqlInstruction
    {
        /*
         *    Variaveis
         */
        protected $sql;         //Armazena a instrução SQL
        protected $criteria;    //Armazena o objeto critério
        protected $entity;      //Nome do Banco de Dados

        /*
         * Métodos
         */
        
        /**
         * Método setEntity()
         * Define o nome da entidade (tabela) manipulada pela instrução SQL
         * 
         * @access public
         * @param  $entity = tabela
         * @return void
         */
        final public function addEntity($entity)
        {
            $this->entity[] = $entity;
        }
        
        /**
         * Método getEntity()
         * Retorna o nome da entidade (tabela)
         * 
         * @access public
         * @return Entidade que está sendo acessada
         */
        final public function getEntity()
        {
            return $this->entity;
        }
        
        /**
         * Método setCriteria
         * Define um critério de seleção dos dados através da composição de um objeto
         * do tipo TCriteria, que oferece uma interface para definição de critérios
         * 
         * @access public
         * @param  $criteria = objeto do tipo TCriteria
         * @return void
         */
        public function setCriteria(TCriteria $criteria)
        {
            $this->criteria = $criteria;
        }
        
        /**
         * Método getInstruction
         * Declarando-o como <abstract> obrigamos sua declaração nas classes filhas,
         * uma vez declarado que seu comportamento será distinto em cada uma delas,
         * configurando polimorfismo
         * 
         * @abstract
         */
        abstract function getInstruction();
    }
?>