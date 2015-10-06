<?php
    /**
      * tbClientes.php
      * Classe de modelo tbClientes
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbClientes extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'clientes';


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
          * @var    string          Nome
          */
        protected $nome;
        /**
          * @access protected
          * @var    boolean         0 - Pessoa Jurídica; 1 - Pessoa Física;
          */
        protected $tipoPessoa;
        /**
          * @access protected
          * @var    string          RG
          */
        protected $rg;
        /**
          * @access protected
          * @var    string          CPF
          */
        protected $cpf;
        /**
          * @access protected
          * @var    date            Data de Nascimento
          */
        protected $nascimento;
        /**
          * @access protected
          * @var    boolean         0 - Feminino; 1 - Masculino
          */
        protected $sexo;
        /**
          * @access protected
          * @var    string          CNPJ
          */
        protected $cnpj;
        /**
          * @access protected
          * @var    string          Inscrição Estadual
          */
        protected $inscricaoEstadual;
        /**
          * @access protected
          * @var    string          E-mail
          */
        protected $email;
        /**
          * @access protected
          * @var    boolean         Ativo/Inativo
          */
        protected $ativo;
        /**
          * @access protected
          * @var    boolean         Excluído
          */
        protected $excluido;


        /*
         * Métodos
         */
        
    }
?>