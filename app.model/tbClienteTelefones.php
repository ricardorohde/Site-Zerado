<?php
    /**
      * tbClienteTelefones.php
      * Classe de modelo tbClienteTelefones
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbClienteTelefones extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'clienteTelefones';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int             C�digo
          */
        protected $codigo;
        /**
          * @access protected
          * @var    int             C�digo do Cliente
          */
        protected $codigoCliente;
        /**
          * @access protected
          * @var    string          N�mero de Telefone
          */
        protected $telefone;
        /**
          * @access protected
          * @var    int             Ramal
          */
        protected $ramal;
        /**
          * @access protected
          * @var    string          Operadora
          */
        protected $operadora;
        /**
          * @access protected
          * @var    boolean         Telefone de Recado
          */
        protected $recado;


        /*
         * M�todos
         */
        
    }
?>