<?php
    /**
      * tbConfiguracoes.php
      * Classe de modelo tbConfiguracoes
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbConfiguracoes extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'configuracoes';


        /*
         *  Colunas
         */
        /**
          * @access protected
          * @var    int     Código
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string     Titulo do Site
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string     Empresa Dona do Site
          */
        protected $empresa;
        /**
          * @access protected
          * @var    string     Conteúdo do Site
          */
        protected $conteudo;
        /**
          * @access protected
          * @var    string     Domínio do site
          */
        protected $dominio;
        /**
          * @access protected
          * @var    string     Descrição do site
          */
        protected $descricao;
        /**
          * @access protected
          * @var    string     Palavras-Chave do Site
          */
        protected $keywords;
        /**
          * @access protected
          * @var    string     Logotipo do Site
          */
        protected $logotipo;
        /**
          * @access protected
          * @var    string     Email cadastrado no PagSeguro
          */
        protected $emailPagSeguro;
        /**
          * @access protected
          * @var    string     Token Gerado pelo PagSeguro
          */
        protected $tokenPagSeguro;


        /*
         * Métodos
         */
    }
?>