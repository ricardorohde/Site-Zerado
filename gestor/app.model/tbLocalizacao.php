<?php
    /**
      * tbLocalizacao.php
      * Classe de modelo tbLocalizacao
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbLocalizacao extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'localizacao';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int         Código
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string      Nome
          */
        protected $nome;
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
         * Métodos
         */
        
    }
?>