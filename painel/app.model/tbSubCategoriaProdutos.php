<?php
    /**
      * tbSubCategoriaProdutos.php
      * Classe de modelo tbSubCategoriaProdutos
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbSubCategoriaProdutos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'subcategoriaprodutos';


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
          * @var    int         Código
          */
        protected $categoria;
        /**
          * @access protected
          * @var    string      Subcategoria
          */
        protected $subCategoria;
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