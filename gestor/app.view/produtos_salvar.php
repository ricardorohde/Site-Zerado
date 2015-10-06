<?php
    /**
      * produtos_salvar.php
      * Classe produtos_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class produtos_salvar
    {
        /*
         * Variaveis
         */        
        private $codigo;
        private $produto;


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
                $this->produto = (new tbProdutos())->load($this->codigo);         
            }
            else
            {
                $this->codigo = NULL;
                $this->produto = new tbProdutos;
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
                    <h1 alt='Produtos' title='Produtos' >Produtos</h1>
                </span>

                <form id="produtosForm" name='produtosForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'> 
                        <div class='6u'>
                            <label for='nome'>
                                Nome
                            </label>
                            <input 
                                type='text' 
                                id='nome' 
                                name='nome'  
                                maxlength='100'
                                placeholder='Nome'
                                value="<?php echo $this->produto->nome; ?>"
                                required
                            >
                        </div>

                        <div class='6u'>
                            <label for='valor'>
                                Valor
                            </label>
                            <input 
                                type='text'
                                name='valor'
                                id='valor'
                                class='dinheiro'
                                placeholder='Valor:'
                                value="<?php echo number_format($this->produto->valor, 2); ?>" 
                                required
                            />
                        </div>

                        <div class='6u'>
                            <label for='peso'>
                                Peso (g)
                            </label>
                            <input 
                                type='number'
                                name='peso'
                                id='peso'
                                min='0' 
                                step='1'
                                placeholder='Peso (g)'
                                value="<?php echo $this->produto->peso; ?>" 
                                required
                            />
                        </div>

                        <div class='6u'>
                            <label for='ativo'>
                                Ativo
                            </label>
                            <select name='ativo' id='ativo'>
                                <?php
                                    if($this->codigo != NULL)
                                    {
                                        if($this->produto->ativo == 1)
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
                            <label for='descricao'>Descrição</label>
                            <br/>
                            <textarea name="descricao" id='descricao' class='tinymce'><?php echo $this->produto->descricao; ?></textarea>
                        </div>

                        <?php include_once('galeria.php'); ?>

                        <div class='12u'>
                            <br/>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php 
                            include_once('js/jsProdutos.php'); 
                            include_once('js/jsMascaras.php');
                        ?>
                    </div>
                </form>
            <?php
        }
    }
?>