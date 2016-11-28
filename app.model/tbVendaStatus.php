<?php
    /**
      * tbVendasProdutos
      * Classe de modelo tbVendasProdutos
      *
      * @author  Rogério Eduardo Pereira <rogerio@colmeiatecnologia.com.br>
      * @version 1.0
      * @access  public
      */
    class tbVendaStatus extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'vendastatus';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int             Código
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string          Nome do Status
          */
        protected $status;
        /**
          * @access protected
          * @var    string          Descrição do Status
          */
        protected $descricao;
        /**
          * @access protected
          * @var    boolean         Ativo
          */
        protected $ativo;
        /**
          * @access protected
          * @var    boolean         Excluido
          */
        protected $excluido;


        /*
         * Métodos
         */
        
    }
?>