<?php
    /**
      * controladorConfiguracoes.php
      * Classe de Controle controladorConfiguracoes
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorConfiguracoes
    {
        /*
         *    Variaveis
         */
        private $configuracao;
        private $favicon;

        /*
         * M�todos
         */
        /**
         * M�todo Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {
            $this->configuracao = NULL;
            $this->favicon      = NULL;
        }

        /**
          * M�todo __set
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
          * M�todo __get
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

        /**
         * M�todo getConfiguracoes
         * Retorna as configura��es do banco de dados
         * 
         * @access public
         * @return tbConfiguracoes   Configura��es do site
         */
        public function getConfiguracoes()
        {
            $this->configuracao = NULL;

            $this->configuracao = (new tbConfiguracoes())->load(1);

            return $this->configuracao;
        }

        /**
         * M�todo salva()
         * Salva as configura��es
         * 
         * @access  public
         * @param   string  $logotipo
         * @param   string  $titulo
         * @param   string  $empresa
         * @param   string  $conteudo
         * @param   string  $dominio
         * @param   string  $descricao
         * @param   string  $keywords
         * @return  boolean Status da opera��o
         */
        public function salva(
                                $logotipo, 
                                $titulo, 
                                $empresa, 
                                $conteudo, 
                                $dominio, 
                                $descricao, 
                                $keywords, 
                                $endereco, 
                                $numero, 
                                $bairro, 
                                $cep,
                                $cidade,
                                $estado,
                                $telefone
                              )
        {
            $this->configuracao             = new tbConfiguracoes();

            $this->configuracao->codigo     = 1;
            $this->configuracao->logotipo   = $logotipo;
            $this->configuracao->titulo     = $titulo;
            $this->configuracao->empresa    = $empresa;
            $this->configuracao->conteudo   = $conteudo;
            $this->configuracao->dominio    = $dominio;
            $this->configuracao->descricao  = $descricao;
            $this->configuracao->keywords   = $keywords;
            $this->configuracao->endereco   = $endereco;
            $this->configuracao->numero     = $numero;
            $this->configuracao->bairro     = $bairro;
            $this->configuracao->cep        = $cep;
            $this->configuracao->cidade     = $cidade;
            $this->configuracao->estado     = $estado;
            $this->configuracao->telefone   = $telefone;

            $status = $this->configuracao->store();

            return status;
        }
    }
?>