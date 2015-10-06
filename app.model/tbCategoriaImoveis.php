<?php
    /**
      * tbCategoriaImoveis.php
      * Classe de modelo tbCategoriaImoveis
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
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
          * @var    int         C�digo
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string      Categoria do Im�vel (Casa, Apartamento, Terreno)
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
         * M�todos
         */
        
    }
?>