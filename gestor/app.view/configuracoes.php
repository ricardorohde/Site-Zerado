<?php
    /**
      * configuracoes.php
      * Classe configuracoes
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class configuracoes
    {
        /*
         * Variaveis
         */
        private $controladorConfiguracoes;
        private $configuracoes;


        /*
         * Métodos
         */
        /**
          * Método Construtor
          *
          * @access private
          * @return void
          */
        public function __construct()
        {
            new TSession(0);

            $this->controladorConfiguracoes   = new controladorConfiguracoes();
            $this->configuracoes              = $this->controladorConfiguracoes->getConfiguracoes();
        }

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

        /**
          * Método show
          * Exibe as informações na tela
          *
          * @access public
          * @return void
          */
        public function show()
        {
            ?>
                <span class='center'>
                    <h1 alt='Configurações' title='Configurações'>Configurações</h1>
                </span>
  

                <form id="configuracoesForm" name='configuracoesForm' action="../app.control/ajaxConfiguracoes.php" method="post">
                    <div class='row'>
                        <div class='4u'>
                            Logotipo
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $this->configuracoes->logotipo; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php"> title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php
                                        if($this->configuracoes->logotipo != NULL || $this->configuracoes->logotipo != '')
                                            echo "<img src='{$this->configuracoes->logotipo}'>";
                                        else
                                            echo "<img src='/app.view/img/no-image.jpg'>";
                                    ?>
                                </div>
                            </a>
                        </div>
                        <div class='3u'>
                            <label for='titulo'>
                                Título
                            </label>
                            <input 
                                type='text' 
                                id='titulo' 
                                name='titulo'  
                                maxlength='100'
                                placeholder='Título'
                                value="<?php echo $this->configuracoes->titulo; ?>"
                            >
                        </div>
                        <div class='3u'>
                            <label for='empresa'>
                                Empresa
                            </label>
                            <input 
                                type='text' 
                                id='empresa' 
                                name='empresa' 
                                maxlength='100'
                                placeholder='Empresa'
                                value="<?php echo $this->configuracoes->empresa; ?>"
                            >
                        </div>
                        <div class='3u'>
                            <label for='conteudo'>
                                Conteúdo
                            </label>
                            <input 
                                type='text' 
                                id='conteudo' 
                                name='conteudo' 
                                maxlength='255'
                                placeholder='Conteúdo' 
                                value="<?php echo $this->configuracoes->conteudo; ?>"
                            >
                        </div>
                        <div class='3u'>
                            <label for='dominio'>
                                Domínio
                            </label>
                            <input 
                                type='text' 
                                id='dominio' 
                                name='dominio' 
                                maxlength='100'
                                placeholder='Domínio' 
                                value="<?php echo $this->configuracoes->dominio; ?>"
                            >
                        </div>
                        <div class='3u'>
                            <label for='descricao'>
                                Descrição
                            </label>
                            <input 
                                type='text' 
                                id='descricao' 
                                name='descricao' 
                                maxlength='160'
                                placeholder='Descrição'
                                value="<?php echo $this->configuracoes->descricao; ?>"
                            >
                        </div>
                        <div class='3u'>
                            <label for='keywords'>
                                Palavras-Chave
                            </label>
                            <input 
                                type='text' 
                                id='keywords' 
                                name='keywords' 
                                maxlength='255'
                                placeholder='Palavra-Chave, Palavra-Chave' 
                                value="<?php echo $this->configuracoes->keywords; ?>"
                            >
                        </div>
                        <div class='6u'>
                            <label for='favicon'>
                                Favicon
                            </label>
                            <input type='file' id='favicon' name='favicon' accept='.ico' placeholder='Favicon'>
                        </div>

                        <div class='clear'></div>

                        <div class='1u center'>
                            <input type='submit' name='Enviar' value='Enviar'>
                        </div>
                    </div>
                </form>
            <?php
        }
    }
?>