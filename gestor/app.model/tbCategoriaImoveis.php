<?php
    /**
      * tbCategoriaImoveis.php
      * Classe de modelo tbCategoriaImoveis
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.0
      * @access  public
      */
    class tbCategoriaImoveis extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'categoriaImoveis';


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
          * @var    string      Categoria do Imóvel (Casa, Apartamento, Terreno)
          */
        protected $categoria;
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