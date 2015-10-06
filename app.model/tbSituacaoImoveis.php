<?php
    /**
      * tbSituacaoImoveis.php
      * Classe de modelo tbSituacaoImoveis
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
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
          * @var    int         C�digo
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string      Situa��o do Im�vel (Aluguel, Venda, Arrendamento)
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
         * M�todos
         */
        
    }
?>