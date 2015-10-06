<?php
    /**
      * tbSituacaoImoveis.php
      * Classe de modelo tbSituacaoImoveis
      *
      * @author  Rogйrio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbSituacaoImoveis extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'situacaoImoveis';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int         Cуdigo
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string      Situaзгo do Imуvel (Aluguel, Venda, Arrendamento)
          */
        protected $situacao;
        /**
          * @access protected
          * @var    boolean     Ativo/Inativo
          */
        protected $ativo;
        /**
          * @access protected
          * @var    boolean     Excluido
          */
        protected $excluido;


        /*
         * Mйtodos
         */
        
    }
?>