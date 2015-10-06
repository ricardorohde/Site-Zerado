<?php
    /**
      * categoriaImoveis_salvar.php
      * Classe categoriaImoveis_salvar
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class categoriaImoveis_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $categoria;


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
            if(isset($_GET['cod']))
            {
                $this->codigo       = $_GET['cod'];
                $this->categoria    = (new tbCategoriaImoveis())->load($this->codigo);            
            }
            else
            {
                $this->codigo       = NULL;
                $this->categoria    = new tbCategoriaImoveis;
            }
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
          * M�todo show
          * Exibe as informa��es na tela
          *
          * @access public
          * @return void
          */
        public function show()
        {
            ?>
                <span class='center'>
                    <h1 alt='Categoria Im�veis' title='Categoria Im�veis' >Categoria Im�veis</h1>
                </span>

                <form id="categoriaImoveisForm" name='categoriaImoveisForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?= $this->codigo; ?>'>

                    <div class='row'>
                        <div class='4u'>
                            <label for='nome'>
                                Categoria dos Im�veis
                            </label>
                            <input 
                                type='text' 
                                id='categoria' 
                                name='categoria'  
                                maxlength='100'
                                placeholder='Categoria dos Im�veis (Casa, Apartamento, Terreno)'
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
                                            <option value='0' <?= $this->categoria->ativo == 0 ? 'selected' : '' ?>>N�o</option>
                                        <?php
                                    }
                                    else
                                        echo 
                                            "
                                                <option value='1' selected>Sim</option>
                                                <option value='0'>N�o</option>
                                            ";
                                ?>
                            </select>
                        </div>

                        <div class='clear'></div>

                        <div class='12u'>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsCategoriaImoveis.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>