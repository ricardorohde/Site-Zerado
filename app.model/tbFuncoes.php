<?php
    /**
      * tbFuncoes.php
      * Classe de modelo tbFuncoes
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbFuncoes extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'funcoes';


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
          * @var    boolean     Banner
          */
        protected $banner;
        /**
          * @access protected
          * @var    boolean     Video
          */
        protected $video;
        /**
          * @access protected
          * @var    boolean     Galeria
          */
        protected $galeria;
        /**
          * @access protected
          * @var    boolean     E-commerce
          */
        protected $ecommerce;
        /**
          * @access protected
          * @var    boolean     Delivery
          */
        protected $delivery;
        /**
          * @access protected
          * @var    boolean     Imobiliária
          */
        protected $imobiliaria;


        /*
         * Métodos
         */
        
    }
?>