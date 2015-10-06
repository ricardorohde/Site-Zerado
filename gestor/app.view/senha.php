<?php
    /**
      * senha.php
      * Classe senha
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class senha
    {
        /*
         * Variaveis
         */


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
                    <h1 alt='Usu�rios' title='Usu�rios's>Usu�rios</h1>
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
                                Confirma��o de Senha
                            </label>
                            <input 
                                type='password' 
                                id='confirmacao' 
                                name='confirmacao' 
                                placeholder='Confirma��o'
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