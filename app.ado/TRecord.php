<?php
    /**
     * TRecord.class.php
     * Esta classe prov� os m�todos necess�rios para persistir e recuperar objetos da base de dados (Active Record) 
     *    1.1 Obten��o das variaveis da classe de modelo
     *        Inicio e conclus�o de transa��o direto nas opera��es
     *    1.2 Adicionado Paramatro excluido = 0 nas buscas
     *    1.3 Criado m�todos de exclus�o fisicos
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.3
     * @access  public
     */
    abstract class TRecord
    {
        /*
         *    Variaveis
         */


        /*
         * M�todos
         */
        

        /**
          * M�todo Construtor
          * Instancia um Active Record. Se passado o codigo ja carrega o objeto
          *
          * @access  public
          * @param   $codigo  C�dico do Objeto
          * @return  object   Objeto buscado
          */
        public function  __construct($codigo = NULL)
        {
            if ($codigo)
            {
                $object = $this->load($codigo);
                
                return $object;
            }
        }

        /**
          * M�todo __clone
          * Executado quando o objeto for clonado
          * Limpa o Codigo para que seja gerado um novo para o objeto clonado
          * 
          * @access public
          * @return void
          */
        public function __clone()
        {
            unset($this->codigo);
        }

        /**
          * M�todo __set
          * Seta o valor da variavel
          * 
          * @since 1.1
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public function __set($propriedade, $valor)
        {
            if($valor == NULL)
                $this->$propriedade = '';
            else
                $this->$propriedade = $valor;
        }

        /**
          * M�todo __get
          * Seta o valor da variavel
          * 
          * @since 1.1
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }
        
        /**
          * M�todo getEntity
          * Retorna o nome da entidade (tabela)
          * 
          * @access private
          * @return Nome da Entidade(tabela)
          */
        private function getEntity()
        {
            $class = get_class($this);

            return constant("{$class}::TABLENAME");
        }

        /**
         * M�todo getVars
         * Retorna array de variaveis
         * 
         * @since   1.1
         * @access  private
         * @return  array   Array com o nome das propriedades
         */
        private function getVars()
        {
            $reflection = new ReflectionClass($this);
            $vars       = $reflection->getProperties(ReflectionProperty::IS_PROTECTED);
            $prop       = array();
          
            foreach ($vars as $value) 
            {
                $nome         = $value->getName();

                $prop[$nome]  = $this->$nome;
            }

            return $prop;
        }
        
        /**
          * M�todo store
          * Armazena o objeto na base de dados e retorn o n�mero de linhas afetadas pela instru��o SQL (0 ou 1)
          * 
          * @access public
          * @throws Exception   N�o h� transa��o ativa
          * @return int         Numero de linhas afetadas pela instru��o SQL
          */
        public function store()
        {
            if (empty($this->codigo) or (!$this->load($this->codigo))) 
            {                
                // cria instru��o SQL
                $sql = new TSqlInsert;
                $sql->addEntity($this->getEntity());
                // percorre dados do objeto
                foreach ( $this->getVars() as $key => $value )
                {
                    // passa os dados do objeto para o SQL
                    $sql->setRowData($key, $this->$key);
                }
            }
            else
            {
                // cria instru��o UPDATE
                $sql = new TSqlUpdate;
                $sql->addEntity($this->getEntity());

                $criteria = new TCriteria;
                $criteria->addFilter('codigo', ' = ', $this->codigo);
                $sql->setCriteria($criteria);
                // percorre dados do objeto
                foreach ( $this->getVars() as $key => $value )
                {
                    if ($key !== 'codigo') {
                        // passa os dados do objeto para o SQL
                        $sql->setRowData($key, $this->$key);
                    }
                }               
            }

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            //echo $sql->getInstruction();
            
            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

                TTransaction::close();

                return $result;
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }
        }
        
        /**
          * M�todo load
          * Recupera (retorna) um objeto da base de dados atrav�s de seu Codigo e instancia ele na mem�ria
          * 
          * @access public
          * @param  $codigo     Codigo do Objeto
          * @throws Exception   N�o h� transa��o ativa
          * @return object      Objeto da base de dados
          */
        public function load($codigo)
        {

            // cria instru��o SQL
            $sql = new TSqlSelect;
            $sql->addEntity($this->getEntity());
            $sql->addColumn('*');
            
            $criteria = new TCriteria;
            $criteria->addFilter('codigo', '=', $codigo);
            $criteria->addFilter('excluido', '=', 0);
            $sql->setCriteria($criteria);

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->query($sql->getInstruction());

                if ( $result )
                {
                    $object = $result->fetchObject(get_class($this));
                }

                TTransaction::close();

                return $object;            
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }
        }
        
        /**
          * M�todo loadCriteria
          * Recupera (retorna) um objeto da base de dados atrav�s de um Crit�rio e instancia ele na mem�ria
          * 
          * @access public
          * @param  $criteria   Crit�rio de sele��o
          * @throws Exception   N�o h� transa��o ativa
          * @return object      Objeto da base de dados
          */
        public function loadCriteria($criteria)
        {
            // cria instru��o SQL
            $sql = new TSqlSelect;
            $sql->addEntity($this->getEntity());
            $sql->addColumn('*');
            
            //$criteria = new TCriteria;
            //$criteria->addFilter('codigo', '=', $codigo);            
            $criteria->addFilter('excluido', '=', 0);
            $sql->setCriteria($criteria);
            
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->query($sql->getInstruction());
                if ( $result )
                {
                    $object = $result->fetchObject(get_class($this));
                }

                TTransaction::close();

                return $object;
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }
        }
        
        /**
          * M�todo delete
          * Exclui um objeto da base de dados atrav�s de um C�digo
          * 
          * @access public
          * @param  $codigo     C�digo do objeto
          * @throws Exception   N�o h� transa��o ativa
          * @return boolean     Resultado da opera��o de delete
          */
        public function delete($codigo = NULL)
        {
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instru��o SQL
            $sql = new TSqlDelete;
            $sql->addEntity($this->getEntity());
            
            $criteria = new TCriteria;
            $criteria->addFilter('codigo', '=', $codigo);
            $sql->setCriteria($criteria);   

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

                TTransaction::close();

                return $result;
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }           
        }

        /**
          * M�todo deleteFisico
          * Exclui um objeto da base de dados atrav�s de um C�digo
          * 
          * @since  1.3
          * @access public
          * @param  $codigo     C�digo do objeto
          * @throws Exception   N�o h� transa��o ativa
          * @return boolean     Resultado da opera��o de delete
          */
        public function deleteFisico($codigo = NULL)
        {
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instru��o SQL
            $sql = new TSqlDeleteFisico;
            $sql->addEntity($this->getEntity());
            
            $criteria = new TCriteria;
            $criteria->addFilter('codigo', '=', $codigo);
            $sql->setCriteria($criteria);   

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

                TTransaction::close();

                return $result;
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }           
        }
        
        /**
          * M�todo deleteCriteria
          * Exclui um objeto da base de dados atrav�s de um C�digo
          * 
          * @access public
          * @param  $criteria   Crit�rio de sele��o
          * @throws Exception   N�o h� transa��o ativa
          * @return boolean     Resultado da opera��o de delete
          */
        public function deleteCriteria($criteria)
        {
        
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instru��o SQL
            $sql = new TSqlDelete;
            $sql->addEntity($this->getEntity());
            
            //$criteria = new TCriteria;
            //$criteria->add('codigo', '=', $codigo);
            $sql->setCriteria($criteria);   

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

                TTransaction::close();

                return $result;
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }           
        }

        /**
          * M�todo deleteCriteriaFisico
          * Exclui um objeto da base de dados atrav�s de um C�digo
          * 
          * @since  1.3
          * @access public
          * @param  $criteria   Crit�rio de sele��o
          * @throws Exception   N�o h� transa��o ativa
          * @return boolean     Resultado da opera��o de delete
          */
        public function deleteCriteriaFisico($criteria)
        {
        
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instru��o SQL
            $sql = new TSqlDeleteFisico;
            $sql->addEntity($this->getEntity());
            
            //$criteria = new TCriteria;
            //$criteria->add('codigo', '=', $codigo);
            $sql->setCriteria($criteria);   

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

                TTransaction::close();

                return $result;
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }           
        }
        
        /**
          * M�todo getLast
          * Retorna o �ltimo c�digo
          * 
          * @access public
          * @throws Exception   N�o h� transa��o ativa
          * @return int         �ltimo c�digo
          */
        public function getLast()
        {
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                // cria instru��o SQL
                $sql = new TSqlSelect;
                $sql->addColumn('max(codigo) as codigo');
                $sql->addEntity($this->getEntity());            
            
                $result = $conn->query($sql->getInstruction());
                $row = $result->fetch();

                TTransaction::close();
                
                return $row[0];
            }
            else
            {
                throw new Exception('N�o h� transa��o ativa');
            }           
        }
    }
?>