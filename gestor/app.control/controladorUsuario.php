<?php
    /**
      * controladorUsuario.php
      * Classe de Controle controladorUsuario
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorUsuario
    {
        /*
         *    Variaveis
         */
        private $repository;
        private $usuario;
        private $collectionUsuario;

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
            $this->repository           = NULL;
            $this->usuario              = NULL;
            $this->collectionUsuario    = NULL;
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
          * M�todo getUsuarios
          * Obtem todos os usuarios
          * 
          * @access public
          * @return array Cole��o de Usu�rio
          */
        public function getUsuarios()
        {
            $this->collectionUsuario = NULL;
            
            //TABELA exposition_gallery
            $criteria = new TCriteria;
            //$criteria->addFilter('situacao', '=', $situacao);
            $criteria->setProperty('order', 'nome');
            
            $this->repository = new TRepository();
            
            $this->repository->addColumn('*');
            $this->repository->addEntity('usuarios');
            
            $this->collectionUsuario = $this->repository->load($criteria);
            
            return $this->collectionUsuario;
        }

        /**
          * M�todo getUsuario
          * Obtem o usuario pelo c�digo
          * 
          * @access public
          * @return tbUsuario Usuario
          */
        public function getUsuario($codigo)
        {
            $this->usuario = NULL;

            $this->usuario = (new tbUsuario())->load($codigo);

            return $this->usuario;
        }

        /**
          * M�todo getUserByEmail
          * Obtem o usuario de acordo com o E-mail
          * 
          * @access public
          * @param  $email      E-mail do usuario a ser buscado
          * @return tbUsuario   Usuario
          */
        public function getUserByEmail($email)
        {
            $this->collectionUsuario = NULL;

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->addFilter('email', '=', $email);
            //$criteria->setProperty('order', 'nome');
            
            $this->repository = new TRepository();
            
            $this->repository->addColumn('*');
            $this->repository->addEntity('usuarios');
            
            $this->collectionUsuario = $this->repository->load($criteria);

            return $this->collectionUsuario[0];
        }

        /**
          * M�todo salvarUsuario
          * Insere/Atualiza a situa��o
          * 
          * @access public
          * @return boolean
          */
        public function salvarUsuario()
        {
            try
            {
                $result = $this->usuario->store();

                if ($this->usuario->codigo = $_SESSION['usuario']->codigo)
                    $_SESSION['usuario'] = $this->usuario;

                return true;
            }
            catch(Exception $e)
            {
                return false;
            }
        }
    }
?>