<?php
    /**
      * emails_salvar.php
      * Classe emails_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class emails_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $email;


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
                $this->codigo   = $_GET['cod'];
                $this->email    = (new tbEmails())->load($this->codigo);      
            }
            else
            {
                $this->codigo   = NULL;
                $this->email    = new tbEmails();
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
                    <h1 alt='E-mail' title='E-mail'>E-mail</h1>
                </span>

                <form id="emailsForm" name='emailsForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>
                        <div class='4u'>
                            <label for='email'>
                                E-mail
                            </label>
                            <input 
                                type='text' 
                                id='email' 
                                name='email'
                                placeholder='E-mail'
                                value="<?php echo $this->email->email; ?>"
                                required
                            >
                        </div>

                        <?php
                            if(!isset($this->codigo) || ($_SESSION['usuario']->administrador == 1))
                            {
                                ?>
                                    <div class='4u'>
                                        <label for='senha'>
                                            Senha
                                        </label>
                                        <input 
                                            type='text' 
                                            id='senha' 
                                            name='senha'
                                            placeholder='Senha'
                                            value="<?php echo $this->email->senha; ?>"
                                        >
                                    </div>
                                <?php
                            }
                        ?>

                        <div class='4u'>
                            <label for='ativo'>
                                Ativo
                            </label>
                            <select name='ativo' id='ativo'>
                                <?php
                                    if($this->codigo != NULL)
                                    {
                                        if($this->email->ativo == 1)
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
                        <?php include_once('js/jsEmails.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>