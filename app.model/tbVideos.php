<?php
    /**
      * tbVideos.php
      * Classe de modelo tbVideos
      *
      * @author  Rogйrio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbVideos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'videos';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access private
          * @var    int     Cуdigo do Video
          */
        protected $codigo;
        /**
          * @access private
          * @var    string  Tнulo
          */
        protected $titulo;
        /**
          * @access private
          * @var    string  Descriзгo
          */
        protected $descricao;
        /**
          * @access private
          * @var    string  Link do Video
          */
        protected $video;
        /**
          * @access private
          * @var    string  Thumbnail do Video
          */
        protected $imagem;
        /**
          * @access private
          * @var    boolean Ativo/Inativo
          */
        protected $ativo;
        /**
          * @access private
          * @var    boolean Excluido
          */
        protected $excluido;


        /*
         * Mйtodos
         */
        
    }
?>