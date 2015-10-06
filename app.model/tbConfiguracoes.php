<?php
    /**
      * tbConfiguracoes.php
      * Classe de modelo tbConfiguracoes
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
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
          * @var    int     C�digo
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
          * @var    string     Conte�do do Site
          */
        protected $conteudo;
        /**
          * @access protected
          * @var    string     Dom�nio do site
          */
        protected $dominio;
        /**
          * @access protected
          * @var    string     Descri��o do site
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
        /**
          * @access protected
          * @var    string     Endere�o da Empresa
          */
        protected $endereco;
        /**
          * @access protected
          * @var    int         N�mero do Endere�o da Empresa
          */
        protected $numero;
        /**
          * @access protected
          * @var    string     Bairro da Empresa
          */
        protected $bairro;
        /**
          * @access protected
          * @var    string     CEP da Empresa
          */
        protected $cep;
        /**
          * @access protected
          * @var    string     Cidade da Empresa
          */
        protected $cidade;
        /**
          * @access protected
          * @var    string     Estado da Empresa
          */
        protected $estado;
        /**
          * @access protected
          * @var    string     Telefone da Empresa
          */
        protected $telefone;



        /*
         * M�todos
         */
    }
?>