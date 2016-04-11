<?php
    /**
      * tbManual.php
      * Classe de modelo tbManual
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbManual extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'manual';


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
          * @var    string          Funcao
          */
        protected $funcao;
        /**
          * @access protected
          * @var    string          Titulo
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string          Texto
          */
        protected $texto;
        /**
          * @access protected
          * @var    string          Imagem
          */
        protected $imagem;
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
         * Métodos
         */
        
    }
?>