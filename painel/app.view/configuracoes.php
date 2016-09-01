<?php
    /**
      * configuracoes.php
      * Classe configuracoes
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
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
                            <?php
                                if($this->configuracoes->logotipo != NULL || $this->configuracoes->logotipo != '')
                                    $logotipo = $this->configuracoes->logotipo;
                                else
                                    $logotipo = '/app.view/img/no-image.jpg';
                            ?>
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $logotipo; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php"> title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php echo "<img src='{$logotipo}'>"; ?>
                                </div>
                            </a>
                        </div>
                        <div class='4u'>
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
                        <div class='4u'>
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
                        <div class='4u'>
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
                        <div class='4u'>
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
                        <div class='4u'>
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
                        <div class='4u'>
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
                        <div class='4u'>
                            <label for='facebookPage'>
                                Página Facebook
                            </label>
                            <input 
                                type='text' 
                                id='facebookPage' 
                                name='facebookPage' 
                                maxlength='100'
                                placeholder='Página Facebook' 
                                value="<?php echo $this->configuracoes->facebookPage; ?>"
                            >
                        </div>
                        <div class='4u'>
                            <label for='endereco'>
                                Endereço
                            </label>
                            <input 
                                type='text' 
                                id='endereco' 
                                name='endereco' 
                                maxlength='100'
                                placeholder='Endereço' 
                                value="<?php echo $this->configuracoes->endereco; ?>"
                            >
                        </div>
                        <div class='4u'>
                            <label for='numero'>
                                Número
                            </label>
                            <input 
                                type='number' 
                                id='numero' 
                                name='numero' 
                                placeholder='Número' 
                                min="1"
                                value="<?php echo $this->configuracoes->numero; ?>"
                            >
                        </div>
                        <div class='4u'>
                            <label for='bairro'>
                                Bairro
                            </label>
                            <input 
                                type='text' 
                                id='bairro' 
                                name='bairro' 
                                maxlength='50'
                                placeholder='Bairro' 
                                value="<?php echo $this->configuracoes->bairro; ?>"
                            >
                        </div>
                        <div class='4u'>
                            <label for='cep'>
                                CEP
                            </label>
                            <input 
                                type='text' 
                                class='cep'
                                id='cep' 
                                name='cep' 
                                maxlength='9'
                                placeholder='CEP' 
                                value="<?php echo $this->configuracoes->cep; ?>"
                            >
                        </div>
                        <div class='4u'>
                            <label for='cidade'>
                                Cidade
                            </label>
                            <input 
                                type='text' 
                                id='cidade' 
                                name='cidade' 
                                maxlength='50'
                                placeholder='Cidade' 
                                value="<?php echo $this->configuracoes->cidade; ?>"
                            >
                        </div>
                        <div class='4u'>
                            <label for='estado'>
                                Estado
                            </label>
                            <select name='estado' id='estado'>
                                <option value='' <?= ($this->configuracoes->estado == '' ? 'selected' : '') ?>></option>
                                <option value='AC' <?= ($this->configuracoes->estado == 'AC' ? 'selected' : '') ?>>Acre</option>
                                <option value='AL' <?= ($this->configuracoes->estado == 'AL' ? 'selected' : '') ?>>Alagoas</option>
                                <option value='AP' <?= ($this->configuracoes->estado == 'AP' ? 'selected' : '') ?>>Amapá</option>
                                <option value='AM' <?= ($this->configuracoes->estado == 'AM' ? 'selected' : '') ?>>Amazonas</option>
                                <option value='BA' <?= ($this->configuracoes->estado == 'BA' ? 'selected' : '') ?>>Bahia</option>
                                <option value='CE' <?= ($this->configuracoes->estado == 'CE' ? 'selected' : '') ?>>Ceará</option>
                                <option value='DF' <?= ($this->configuracoes->estado == 'DF' ? 'selected' : '') ?>>Distrito Federal</option>
                                <option value='ES' <?= ($this->configuracoes->estado == 'ES' ? 'selected' : '') ?>>Espírito Santo</option>
                                <option value='GO' <?= ($this->configuracoes->estado == 'GO' ? 'selected' : '') ?>>Goiás</option>
                                <option value='MA' <?= ($this->configuracoes->estado == 'MA' ? 'selected' : '') ?>>Maranhão</option>
                                <option value='MT' <?= ($this->configuracoes->estado == 'MT' ? 'selected' : '') ?>>Mato Grosso</option>
                                <option value='MS' <?= ($this->configuracoes->estado == 'MS' ? 'selected' : '') ?>>Mato Grosso do Sul</option>
                                <option value='MG' <?= ($this->configuracoes->estado == 'MG' ? 'selected' : '') ?>>Minas Gerais</option>
                                <option value='PA' <?= ($this->configuracoes->estado == 'PA' ? 'selected' : '') ?>>Pará</option>
                                <option value='PB' <?= ($this->configuracoes->estado == 'PB' ? 'selected' : '') ?>>Paraíba</option>
                                <option value='PR' <?= ($this->configuracoes->estado == 'PR' ? 'selected' : '') ?>>Paraná</option>
                                <option value='PE' <?= ($this->configuracoes->estado == 'PE' ? 'selected' : '') ?>>Pernambuco</option>
                                <option value='PI' <?= ($this->configuracoes->estado == 'PI' ? 'selected' : '') ?>>Piauí</option>
                                <option value='RJ' <?= ($this->configuracoes->estado == 'RJ' ? 'selected' : '') ?>>Rio de Janeiro</option>
                                <option value='RN' <?= ($this->configuracoes->estado == 'RN' ? 'selected' : '') ?>>Rio Grande do Norte</option>
                                <option value='RS' <?= ($this->configuracoes->estado == 'RS' ? 'selected' : '') ?>>Rio Grande do Sul</option>
                                <option value='RO' <?= ($this->configuracoes->estado == 'RO' ? 'selected' : '') ?>>Rondônia</option>
                                <option value='RR' <?= ($this->configuracoes->estado == 'RR' ? 'selected' : '') ?>>Roraima</option>
                                <option value='SC' <?= ($this->configuracoes->estado == 'SC' ? 'selected' : '') ?>>Santa Catarina</option>
                                <option value='SP' <?= ($this->configuracoes->estado == 'SP' ? 'selected' : '') ?>>São Paulo</option>
                                <option value='SE' <?= ($this->configuracoes->estado == 'SE' ? 'selected' : '') ?>>Sergipe</option>
                                <option value='TO' <?= ($this->configuracoes->estado == 'TO' ? 'selected' : '') ?>>Tocantins</option>
                            </select>
                        </div>
                        <div class='12u'>
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
            include_once('js/jsMascaras.php');
        }
    }
?>