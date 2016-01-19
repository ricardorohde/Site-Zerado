<?php
    /**
      * tbCatalogoClientes.php
      * Classe de modelo tbCatalogoClientes
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbCatalogoClientes extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'catalogoclientes';


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
        protected $nome;
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