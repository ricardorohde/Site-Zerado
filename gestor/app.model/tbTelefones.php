<?php
    /**
      * tbTelefones.php
      * Classe de modelo tbTelefones
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.0
      * @access  public
      */
    class tbTelefones extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'telefones';


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
          * @var    string          Email
          */
        protected $telefone;
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