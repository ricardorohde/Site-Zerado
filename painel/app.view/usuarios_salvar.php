<?php
    /**
      * usuarios_salvar.php
      * Classe usuarios_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class usuarios_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $usuario;
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
                $this->codigo   = $_GET['cod'];
                $this->usuario  = (new tbUsuarios())->load($this->codigo);      
            }
            else
            {
                $this->codigo   = NULL;
                $this->usuario  = new tbUsuarios;
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
                    <h1 alt='Usuários' title='Usuários's>Usuários</h1>
                </span>

                <form id="usuariosForm" name='usuariosForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>    

                        <div class='6u'>
                            <label for='titulo'>
                                Nome
                            </label>
                            <input 
                                type='text' 
                                id='nome' 
                                name='nome'
                                maxlength='100'
                                placeholder='Nome'
                                value="<?php echo $this->usuario->nome; ?>"
                                required
                            >
                        </div>

                        <div class='6u'>
                            <label for='descricao'>
                                E-mail
                            </label>
                            <input 
                                type='email' 
                                id='email' 
                                name='email' 
                                maxlength='100'
                                placeholder='E-mail'
                                value="<?php echo $this->usuario->email; ?>"
                                required
                            >
                        </div>

                        <?php
                            if($this->codigo == NULL)
                            {
                                ?>
                                    <div class='3u'>
                                        <label for='senha'>
                                            Senha
                                        </label>
                                        <input 
                                            type='password' 
                                            id='senha' 
                                            name='senha' 
                                            placeholder='Senha'
                                            required
                                        >
                                    </div>

                                    <div class='3u'>
                                        <label for='confirmacao'>
                                            Confirmação de Senha
                                        </label>
                                        <input 
                                            type='password' 
                                            id='confirmacao' 
                                            name='confirmacao' 
                                            placeholder='Confirmação'
                                            required
                                        >
                                    </div>
                                <?php
                            }
                           
                            if($_SESSION['usuario']->administrador == true)
                            {
                                ?>
                                    <div class='3u'>
                                        <label for='administrador'>
                                            Administrador
                                        </label>
                                        <select name='administrador' id='administrador'>
                                            <?php
                                                if($this->codigo != NULL)
                                                {
                                                    if($this->usuario->administrador == 1)
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
                                                            <option value='1'>Sim</option>
                                                            <option value='0' selected>Não</option>
                                                        ";
                                            ?>
                                        </select>
                                    </div>

                                    <div class='3u'>
                                        <label for='ativo'>
                                            Ativo
                                        </label>
                                        <select name='ativo' id='ativo'>
                                            <?php
                                                if($this->codigo != NULL)
                                                {
                                                    if($this->usuario->ativo == 1)
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
                                <?php
                            }
                        ?>

                        <div class='clear'></div>

                        <div class='12u'>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsUsuarios.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>