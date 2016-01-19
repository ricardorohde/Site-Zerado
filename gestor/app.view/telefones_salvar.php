<?php
    /**
      * telefones_salvar.php
      * Classe telefones_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class telefones_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $telefone;


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
                $this->telefone     = (new tbTelefones())->load($this->codigo);      
            }
            else
            {
                $this->codigo       = NULL;
                $this->telefone     = new tbTelefones();
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
                    <h1 alt='Telefone' title='Telefone'>Telefone</h1>
                </span>

                <form id="telefonesForm" name='telefonesForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>
                        <div class='6u'>
                            <label for='telefone'>
                                Telefone
                            </label>
                            <input 
                                type='text' 
                                class='telefone'
                                id='telefone' 
                                name='telefone'
                                placeholder='Telefone'
                                value="<?php echo $this->telefone->telefone; ?>"
                                required
                            >
                        </div>

                        <div class='6u'>
                            <label for='ativo'>
                                Ativo
                            </label>
                            <select name='ativo' id='ativo'>
                                <?php
                                    if($this->codigo != NULL)
                                    {
                                        if($this->telefone->ativo == 1)
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
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsMascaras.php'); ?>
                        <?php include_once('js/jsTelefones.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>