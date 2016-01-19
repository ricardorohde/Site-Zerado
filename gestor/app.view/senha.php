<?php
    /**
      * senha.php
      * Classe senha
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class senha
    {
        /*
         * Variaveis
         */


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

                <form id="senhaForm" name='usuariosForm' action="" method="post">
                    <div class='row'>    
                        <div class='4u'>
                            <label for='senha'>
                                Senha Antiga
                            </label>
                            <input 
                                type='password' 
                                id='senhaAntiga' 
                                name='senhaAntiga' 
                                placeholder='Senha'
                                required
                            >
                        </div>

                        <div class='4u'>
                            <label for='senha'>
                                Senha Nova
                            </label>
                            <input 
                                type='password' 
                                id='senhaNova' 
                                name='senhaNova' 
                                placeholder='Senha'
                                required
                            >
                        </div>

                        <div class='4u'>
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