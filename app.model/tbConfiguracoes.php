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
          * @access private
          * @var    int     Código
          */
        private $codigo;
        /**
          * @access private
          * @var    string     Titulo do Site
          */
        private $titulo;
        /**
          * @access private
          * @var    string     Empresa Dona do Site
          */
        private $empresa;
        /**
          * @access private
          * @var    string     Conteúdo do Site
          */
        private $conteudo;
        /**
          * @access private
          * @var    string     Domínio do site
          */
        private $dominio;
        /**
          * @access private
          * @var    string     Descrição do site
          */
        private $descricao;
        /**
          * @access private
          * @var    string     Palavras-Chave do Site
          */
        private $keywords;
        /**
          * @access private
          * @var    string     Logotipo do Site
          */
        private $logotipo;


        /*
         * Métodos
         */
        /**
          * Método __set
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        /**
          * Método __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }
    }
?>