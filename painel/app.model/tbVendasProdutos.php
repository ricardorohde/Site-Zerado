<?php
    /**
      * tbVendasProdutos
      * Classe de modelo tbVendasProdutos
      *
      * @author  Rogério Eduardo Pereira <rogerio@colmeiatecnologia.com.br>
      * @version 1.0
      * @access  public
      */
    class tbVendasProdutos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'vendasprodutos';


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
          * @var    tbVendas        Código da Venda
          */
        protected $codigoVenda;
        /**
          * @access protected
          * @var    tbProdutos      Código do Produto
          */
        protected $codigoProduto;
        /**
          * @access protected
          * @var    valor           Valor do Produto
          */
        protected $valor;
        /**
          * @access protected
          * @var    int             Quantidade do Produto
          */
        protected $quantidade;
        /**
          * @access protected
          * @var    string          Cor do Produto
          */
        protected $cor;
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