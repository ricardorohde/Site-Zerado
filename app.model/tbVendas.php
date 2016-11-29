<?php
    /**
      * tbVendas.php
      * Classe de modelo tbVendas
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbVendas extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'vendas';


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
          * @var    Timestamp       Data da Compra
          */
        protected $dataCompra;
        /**
          * @access protected
          * @var    Timestamp       Data da ultima alteração - Atualizado automaticamente no update
          */
        protected $dataAlteracao;
        /**
          * @access protected
          * @var    int             Código do Cliente
          */
        protected $codigoCliente;
        /**
          * @access protected
          * @var    int             Código da tabela vendastatus
          */
        protected $codigoStatus;
        /**
          * @access protected
          * @var    md5             Referencia do compra para identificar no pagseguro
          */
        protected $referencia;
        /**
          * @access protected
          * @var    double          Valor da compra
          */
        protected $valor;
        /**
          * @access protected
          * @var    double          Valor do Desconto
          */
        protected $desconto;
        /**
          * @access protected
          * @var    double          Valor da Montagem
          */
        protected $montagem;
        /**
          * @access protected
          * @var    int             Código da tabela clienteenderecos
          */
        protected $codigoEnderecoEntrega;
        /**
          * @access protected
          * @var    double          Valor do Frete
          */
        protected $frete;
        /**
          * @access protected
          * @var    int             Código da tabela vendastipoentrega
          */
        protected $codigoTipoEntrega;
        /**
          * @access protected
          * @var    string          Código de Rastreio dos Correios
          */
        protected $codigoRastreioCorreio;
        /**
          * @access protected
          * @var    string          Forma de Pagamento - BOLETO, CREDIT_CARD
          */
        protected $formaPagamento;
        /**
          * @access protected
          * @var    int             Número de Parcelas
          */
        protected $parcelas;
        /**
          * @access protected
          * @var    string          Sessão do Pagseguro - Gerado pela API
          */
        protected $sessionPagSeguro;
        /**
          * @access protected
          * @var    string          Hash do Comprador - Gerado pela API
          */
        protected $senderHash;
        /**
          * @access protected
          * @var    string          Token do Cartão de Crédito - Gerado pela API
          */
        protected $tokenCartao;
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