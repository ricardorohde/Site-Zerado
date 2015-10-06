<?php
    /**
      * tbVendasProdutos
      * Classe de modelo tbVendasProdutos
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
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
        const TABLENAME = 'vendasProdutos';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int             C�digo
          */
        protected $codigo;
        /**
          * @access protected
          * @var    tbVendas        C�digo da Venda
          */
        protected $codigoVenda;
        /**
          * @access protected
          * @var    tbProdutos      C�digo do Produto
          */
        protected $produto;
        /**
          * @access protected
          * @var    int             Quantidade do Produto
          */
        protected $quantidade;
        /**
          * @access protected
          * @var    double          Valor do Desconto
          */
        protected $desconto;


        /*
         * M�todos
         */
        
    }
?>