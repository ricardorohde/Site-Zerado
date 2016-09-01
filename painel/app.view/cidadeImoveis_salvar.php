<?php
    /**
      * cidadeImoveis_salvar.php
      * Classe cidadeImoveis_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class cidadeImoveis_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $cidade;


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
            if(isset($_GET['cod']))
            {
                $this->codigo       = $_GET['cod'];
                $this->cidade    = (new tbCidadeImoveis())->load($this->codigo);            
            }
            else
            {
                $this->codigo       = NULL;
                $this->cidade    = new tbCidadeImoveis;
            }
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
                    <h1 alt='Cidade Imóveis' title='Cidade Imóveis' >Cidade Imóveis</h1>
                </span>

                <form id="cidadeImoveisForm" name='cidadeImoveisForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?= $this->codigo; ?>'>

                    <div class='row'>
                        <div class='4u'>
                            Imagem
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $this->cidade->imagem; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php"> title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php 
                                        if (($this->cidade->imagem != NULL) || ($this->cidade->imagem != ''))
                                            echo "<img src='{$this->cidade->imagem}'>";
                                        else
                                            echo "<img src='/app.view/img/no-image.jpg'>";
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class='4u'>
                            <label for='cidade'>
                                Cidade dos Imóveis
                            </label>
                            <input 
                                type='text' 
                                id='cidade' 
                                name='cidade'  
                                maxlength='100'
                                value="<?= $this->cidade->cidade ?>"
                                required
                            >
                        </div>

                        <div class='4u'>
                            <label for='ativo'>
                                Ativo
                            </label>
                            <select name='ativo' id='ativo'>
                                <?php
                                    if($this->codigo != NULL)
                                    {
                                        ?>
                                            <option value='1' <?= $this->cidade->ativo == 1 ? 'selected' : '' ?>>Sim</option>
                                            <option value='0' <?= $this->cidade->ativo == 0 ? 'selected' : '' ?>>Não</option>
                                        <?php
                                    }
                                    else
                                        echo 
                                            "
                                                <option value='1' selected>Sim</option>
                                                <option value='0'>Não</option>
                                            ";
                                ?>
                            </select>
                        </div>

                        <div class='clear'></div>

                        <div class='12u'>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsCidadeImoveis.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>