<?php
    /**
      * controladorUsuario.php
      * Classe de Controle controladorUsuario
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version _VERSAO_
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
            $this->repository           = NULL;
            $this->usuario              = NULL;
            $this->collectionUsuario    = NULL;
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
          * Método getUsuarios
          * Obtem todos os usuarios
          * 
          * @access public
          * @return array Coleção de Usuário
          */
        public function getUsuarios()
        {
            $this->collectionUsuario = NULL;
            
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            //TABELA exposition_gallery
            $criteria = new TCriteria;
            //$criteria->add(new TFilter('situacao', '=', $situacao));
            $criteria->setProperty('order', 'nome');
            
            $this->repository = new TRepository();
            
            $this->repository->addColumn('*');
            $this->repository->addEntity('usuarios');
            
            $this->collectionUsuario = $this->repository->load($criteria);
            
            return $this->collectionUsuario;
        }

        /**
          * Método getUsuario
          * Obtem o usuario pelo código
          * 
          * @access public
          * @return tbUsuario Usuario
          */
        public function getUsuario($codigo)
        {
            $this->usuario = NULL;
            $result;
            
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            $this->usuario = new tbUsuario($codigo);

            return $this->usuario;
        }

        /**
          * Método getUserByEmail
          * Obtem o usuario de acordo com o E-mail
          * 
          * @access public
          * @param  $email      E-mail do usuario a ser buscado
          * @return tbUsuario   Usuario
          */
        public function getUserByEmail($email)
        {
            $this->collectionUsuario = NULL;
            
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            //TABELA exposition_gallery
            $criteria   = new TCriteria;
            $criteria->add(new TFilter('email', '=', $email));
            //$criteria->setProperty('order', 'nome');
            
            $this->repository = new TRepository();
            
            $this->repository->addColumn('*');
            $this->repository->addEntity('usuarios');
            
            $this->collectionUsuario = $this->repository->load($criteria);
            
            TTransaction::close();

            return $this->collectionUsuario[0];
        }

        /**
          * Método salvarUsuario
          * Insere/Atualiza a situação
          * 
          * @access public
          * @return boolean
          */
        public function salvarUsuario()
        {
            try
            {
                //RECUPERA CONEXAO BANCO DE DADOS
                TTransaction::open('my_bd_site');

                $result = $this->usuario->store();

                TTransaction::close();

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