<?php
    /**
      * catalogoClientes_salvar.php
      * Classe catalogoClientes_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.0
      * @access  public
      */
    class catalogoClientes_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $cliente;


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
                $this->cliente = (new tbCatalogoClientes())->load($this->codigo);            
            }
            else
            {
                $this->codigo = NULL;
                $this->cliente = new tbCatalogoClientes;
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
                    <h1 alt='Cliente' title='Cliente' >Cliente</h1>
                </span>

                <form id="catalogoClientesForm" name='catalogoClientesForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>    

                        <div class='4u'>
                            Imagem
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $this->cliente->imagem; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php" title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php 
                                        if (($this->cliente->imagem != NULL) || ($this->cliente->imagem != ''))
                                            echo "<img src='{$this->cliente->imagem}'>";
                                        else
                                            echo "<img src='/app.view/img/no-image.jpg'>";
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class='4u'>
                            <label for='nome'>
                                Nome
                            </label>
                            <input 
                                type='text' 
                                id='nome' 
                                name='nome'  
                                maxlength='100'
                                placeholder='Nome'
                                value="<?php echo $this->cliente->nome; ?>"
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
                                        if($this->cliente->ativo == 1)
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

                        <div class='12u'>
                            <br/>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsCatalogoCliente.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>