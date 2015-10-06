<?php
    /**
      * tbClienteEnderecos.php
      * Classe de modelo tbClienteEnderecos
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbClienteEnderecos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'clienteEnderecos';


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
          * @var    int             C�digo do Cliente
          */
        protected $codigoCliente;
        /**
          * @access protected
          * @var    string          Rua
          */
        protected $rua;
        /**
          * @access protected
          * @var    int             N�mero
          */
        protected $numero;
        /**
          * @access protected
          * @var    string          Complemento
          */
        protected $complemento;
        /**
          * @access protected
          * @var    string          Bairro
          */
        protected $bairro;
        /**
          * @access protected
          * @var    string          Cidade
          */
        protected $cidade;
        /**
          * @access protected
          * @var    string          Estado
          */
        protected $estado;
        /**
          * @access protected
          * @var    string          CEP
          */
        protected $cep;


        /*
         * M�todos
         */
        
    }
?>