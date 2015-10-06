<?php
    /**
      * tbGaleria.php
      * Classe de modelo tbGaleria
      *
      * @author  Rogйrio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbGaleria extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'galeria';


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
          * @var    int         Cуdigo da Pagina
          */
        protected $codigoPagina;
        /**
          * @access protected
          * @var    int         Cуdigo do Produto
          */
        protected $codigoProduto;
        /**
          * @access protected
          * @var    int         Cуdigo do Imуvel
          */
        protected $codigoImovel;
        /**
          * @access protected
          * @var    string      Imagem
          */
        protected $imagem;
        /**
          * @access protected
          * @var    string      Tнtulo
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string      Descriзгo
          */
        protected $descricao;
        /**
          * @access protected
          * @var    int         Ordem
          */
        protected $ordem;
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