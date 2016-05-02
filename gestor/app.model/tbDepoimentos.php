<?php
    /**
      * tbDepoimentos.php
      * Classe de modelo tbDepoimentos
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbDepoimentos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'depoimentos';


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
          * @var    string          Titulo
          */
        protected $imagem;
        /**
          * @access protected
          * @var    string          Descricao
          */
        protected $nome;
        /**
          * @access protected
          * @var    tbLocalizaco    Localizacao
          */
        protected $empresa;
        /**
          * @access protected
          * @var    string          Texto
          */
        protected $depoimento;
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