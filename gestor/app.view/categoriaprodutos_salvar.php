<?php
    /**
      * categoriaprodutos_salvar.php
      * Classe categoriaprodutos_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.0
      * @access  public
      */
    class categoriaprodutos_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $categoria;


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
                $this->categoria    = (new tbCategoriaProdutos())->load($this->codigo);            
            }
            else
            {
                $this->codigo       = NULL;
                $this->categoria    = new tbCategoriaProdutos;
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
                    <h1 alt='Categoria Produtos' title='Categoria Produtos' >Categoria Produtos</h1>
                </span>

                <form id="categoriaProdutosForm" name='categoriaProdutosForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?= $this->codigo; ?>'>

                    <div class='row'>
                        <div class='4u'>
                            <label for='categoria'>
                                Categoria dos Produtos
                            </label>
                            <input 
                                type='text' 
                                id='categoria' 
                                name='categoria'  
                                maxlength='100'
                                placeholder='Categoria dos Produtos'
                                value="<?= $this->categoria->categoria ?>"
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
                                            <option value='1' <?= $this->categoria->ativo == 1 ? 'selected' : '' ?>>Sim</option>
                                            <option value='0' <?= $this->categoria->ativo == 0 ? 'selected' : '' ?>>Não</option>
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
                        <?php include_once('js/jsProdutos.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>