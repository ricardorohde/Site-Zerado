<?php
    /**
      * tbCidadeImoveis.php
      * Classe de modelo tbCidadeImoveis
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbCidadeImoveis extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'cidadeimoveis';


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
        protected $cidade;
        /**
          * @access protected
          * @var    string      Imagem
          */
        protected $imagem;
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