<?php
    /**
      * tbProdutos.php
      * Classe de modelo tbProdutos
      *
      * @author  Rogйrio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbProdutos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'produtos';


        /*
         * Colunas (Precisam ser protected)
         */
         /**
          * @access protected
          * @var    int             Cуdigo
          */
        protected $codigo;
         /**
          * @access protected
          * @var    string          Nome
          */
        protected $nome;
         /**
          * @access protected
          * @var    string          Descriзгo
          */
        protected $descricao;
         /**
          * @access protected
          * @var    double          Valor
          */
        protected $valor;
         /**
          * @access protected
          * @var    int             Peso
          */
        protected $peso;
         /**
          * @access protected
          * @var    boolean         Ativo/Inativo
          */
        protected $ativo;
         /**
          * @access protected
          * @var    boolean         Excluido
          */
        protected $excluido;


        /*
         * Mйtodos
         */
        
    }
?>