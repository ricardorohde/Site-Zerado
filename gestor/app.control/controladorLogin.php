<?php
    /**
      * controladorLogin.php
      * Classe de Controle Login
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorLogin
    {
        /*
         *    Variaveis
         */
        private $controladorUsuario;
        private $userDB;
        private $email;
        private $senha;


        /*
         * M�todos
         */
        /**
         * M�todo Construtor
         *
         * @access private
         * @return void
         */
        public function __construct($email, $senha)
        {
            $this->controladorUsuario   = new controladorUsuario();
            $this->userDB               = NULL;
            $this->email                = $email;
            $this->senha                = hash('sha512', $senha);
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
          * @param  string $propriedade     Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }

        /**
          * M�todo login
          * Realiza o login
          * 
          * @access public
          * @return boolean
          */
        public function login()
        {
            $this->userDB    = $this->controladorUsuario->getUserByEmail($this->email);

            if($this->compara())
            {
                $_SESSION['usuario'] = $this->userDB;

                return true;
            }
            else
                return false;
        }
        
        /**
          * M�todo compara
          * Compara usuario e senha
          * 
          * @access public
          * @return boolean
          */
        private function compara()
        {   
            if(
                ($this->email == $this->userDB->email) &&
                ($this->senha == $this->userDB->senha)
              )
                return true;
            else
                return false;
        }
    }
?>