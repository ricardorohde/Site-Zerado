<?php
    /**
      * tbGaleria.php
      * Classe de modelo tbGaleria
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
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
          * @var    string      Titulo
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string      Descrição
          */
        protected $descricao;
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