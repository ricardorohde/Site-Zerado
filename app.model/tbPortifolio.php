<?php
    /**
      * tbPortifolio.php
      * Classe de modelo tbPortifolio
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbPortifolio extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'portifolio';


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
          * @var    string          Imagem
          */
        protected $imagem;
        /**
          * @access protected
          * @var    string          Titulo
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string          Descricao
          */
        protected $descricao;
        /**
          * @access protected
          * @var    string          URL
          */
        protected $url;
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