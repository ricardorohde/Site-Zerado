<?php
    /**
     * TSqlInstruction.php
     * Esta classe prov� os m�todos em comum entre todas instru��es
     * SQL (SELECT, INSERT, DELETE, UPDATE)
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0     
     * @access  public
     */
    abstract class TSqlInstruction
    {
        /*
         *    Variaveis
         */
        /**
          * @access protected
          * @var    string  Armazena a instru��o SQL
          */ 
        protected $sql;
        /**
          * @access protected
          * @var    string  Armazena o objeto crit�rio
          */ 
        protected $criteria;
        /**
          * @access protected
          * @var    string  Nome do Banco de Dados
          */ 
        protected $entity;

        /*
         * M�todos
         */
        
        /**
         * M�todo setEntity()
         * Define o nome da entidade (tabela) manipulada pela instru��o SQL
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
         * M�todo getEntity()
         * Retorna o nome da entidade (tabela)
         * 
         * @access public
         * @return Entidade que est� sendo acessada
         */
        final public function getEntity()
        {
            return $this->entity;
        }
        
        /**
         * M�todo setCriteria
         * Define um crit�rio de sele��o dos dados atrav�s da composi��o de um objeto
         * do tipo TCriteria, que oferece uma interface para defini��o de crit�rios
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
         * M�todo getInstruction
         * Declarando-o como <abstract> obrigamos sua declara��o nas classes filhas,
         * uma vez declarado que seu comportamento ser� distinto em cada uma delas,
         * configurando polimorfismo
         * 
         * @abstract
         */
        abstract function getInstruction();
    }
?>