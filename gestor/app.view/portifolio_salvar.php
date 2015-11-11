<?php
    /**
      * portifolio_salvar.php
      * Classe portifolio_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class portifolio_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $portifolio;
        private $localizacoes;


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
                $this->codigo = $_GET['cod'];
                $this->portifolio = (new tbPortifolio())->load($this->codigo);            
            }
            else
            {
                $this->codigo = NULL;
                $this->portifolio = new tbPortifolio;
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
                    <h1 alt='Portifólio' title='Portifólio' >Portifólio</h1>
                </span>

                <form id="portifolioForm" name='portifolioForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>    

                        <div class='4u'>
                            Imagem
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $this->portifolio->imagem; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php"> title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php 
                                        if (($this->portifolio->imagem != NULL) || ($this->portifolio->imagem != ''))
                                            echo "<img src='{$this->portifolio->imagem}'>";
                                        else
                                            echo "<img src='/app.view/img/no-image.jpg'>";
                                    ?>
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
                                value="<?php echo $this->portifolio->titulo; ?>"
                                required
                            >
                        </div>

                        <div class='4u'>
                            <label for='url'>
                                URL
                            </label>
                            <input 
                                type='text' 
                                id='url' 
                                name='url' 
                                maxlength='255'
                                placeholder='URL'
                                value="<?php echo $this->portifolio->url; ?>"
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
                                        if($this->portifolio->ativo == 1)
                                            echo 
                                                "
                                                    <option value='1' selected>Sim</option>
                                                    <option value='0'>Não</option>  
                                                ";
                                        else
                                            echo 
                                                "
                                                    <option value='1'>Sim</option>
                                                    <option value='0' selected>Não</option>  
                                                ";
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

                        <div class="12u">
                            <label for='descricao'>Descrição</label>
                            <br/>
                            <textarea name="descricao" id='descricao' class='tinymce'><?php echo $this->portifolio->descricao; ?></textarea>
                        </div>

                        <div class='12u'>
                            <br/>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsPortifolio.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>