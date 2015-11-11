<?php
    /**
      * tbGaleria.php
      * Classe de modelo tbGaleria
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
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
          * @var    int         Código
          */
        protected $codigo;
        /**
          * @access protected
          * @var    int         Código da Pagina
          */
        protected $codigoPagina;
        /**
          * @access protected
          * @var    int         Código do Produto
          */
        protected $codigoProduto;
        /**
          * @access protected
          * @var    int         Código do Imóvel
          */
        protected $codigoImovel;
        /**
          * @access protected
          * @var    string      Imagem
          */
        protected $imagem;
        /**
          * @access protected
          * @var    string      Título
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string      Descrição
          */
        protected $descricao;
        /**
          * @access protected
          * @var    string      URL
          */
        protected $url;
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
         * Métodos
         */
        
    }
?>