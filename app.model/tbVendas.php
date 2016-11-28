<?php
    /**
      * tbVendas.php
      * Classe de modelo tbVendas
      *
      * @author  Rogério Eduardo Pereira <rogerio@colmeiatecnologia.com.br>
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
          * @var    tbClientes      Cliente
          */
        protected $cliente;
        /**
          * @access protected
          * @var    datetime        Data Hora de Compra
          */
        protected $dataHora;
        /**
          * @access protected
          * @var    int             Status (1 - Aberto; 2 - Processando; 3 - Postado no Correio; 4 - Entregue)
          */
        protected $status;
        /**
          * @access protected
          * @var    string          Código de Rastreio dos Correios
          */
        protected $codigoRastreio;
        /**
          * @access protected
          * @var    int             Tipo de Entrega (1 - PAC; 2 - SEDEX;)
          */
        protected $tipoEntrega;
        /**
          * @access protected
          * @var    double          Valor do Frete
          */
        protected $frete;
        /**
          * @access protected
          * @var    string          Endereço de Entrega
          */
        protected $enderecoEntrega;
        /**
          * @access protected
          * @var    int             Número do Endereço de Entrega
          */
        protected $numeroEntrega;
        /**
          * @access protected
          * @var    string          Complemento de Entrega
          */
        protected $complementoEntrega;
        /**
          * @access protected
          * @var    string          Bairro de Entrega
          */
        protected $bairroEntrega;
        /**
          * @access protected
          * @var    string          CEP de Entrega
          */
        protected $cepEntrega;
        /**
          * @access protected
          * @var    string          Cidade de Entrega
          */
        protected $cidadeEntrega;
        /**
          * @access protected
          * @var    string          Estado de Entrega
          */
        protected $estadoEntrega;
        /**
          * @access protected
          * @var    double          Valor da Venda
          */
        protected $valor;
        /**
          * @access protected
          * @var    double          Valor do Desconto
          */
        protected $desconto;
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