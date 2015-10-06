<?php
    /**
     * TRecord.class.php
     * Esta classe provк os mйtodos necessбrios para persistir e recuperar objetos da base de dados (Active Record) 
     *    1.1 Obtenзгo das variaveis da classe de modelo
     *        Inicio e conclusгo de transaзгo direto nas operaзхes
     *    1.2 Adicionado Paramatro excluido = 0 nas buscas
     *    1.3 Criado mйtodos de exclusгo fisicos
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaзгo a Objetos - 2Є Ediзгo)
     * @version 1.3
     * @access  public
     */
    abstract class TRecord
    {
        /*
         *    Variaveis
         */


        /*
         * Mйtodos
         */
        

        /**
          * Mйtodo Construtor
          * Instancia um Active Record. Se passado o codigo ja carrega o objeto
          *
          * @access  public
          * @param   $codigo  Cуdico do Objeto
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
          * Mйtodo __clone
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
          * Mйtodo __set
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
          * Mйtodo __get
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
          * Mйtodo getEntity
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
         * Mйtodo getVars
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
          * Mйtodo store
          * Armazena o objeto na base de dados e retorn o nъmero de linhas afetadas pela instruзгo SQL (0 ou 1)
          * 
          * @access public
          * @throws Exception   Nгo hб transaзгo ativa
          * @return int         Numero de linhas afetadas pela instruзгo SQL
          */
        public function store()
        {
            if (empty($this->codigo) or (!$this->load($this->codigo))) 
            {                
                // cria instruзгo SQL
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
                // cria instruзгo UPDATE
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
                throw new Exception('Nгo hб transaзгo ativa');
            }
        }
        
        /**
          * Mйtodo load
          * Recupera (retorna) um objeto da base de dados atravйs de seu Codigo e instancia ele na memуria
          * 
          * @access public
          * @param  $codigo     Codigo do Objeto
          * @throws Exception   Nгo hб transaзгo ativa
          * @return object      Objeto da base de dados
          */
        public function load($codigo)
        {

            // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }
        }
        
        /**
          * Mйtodo loadCriteria
          * Recupera (retorna) um objeto da base de dados atravйs de um Critйrio e instancia ele na memуria
          * 
          * @access public
          * @param  $criteria   Critйrio de seleзгo
          * @throws Exception   Nгo hб transaзгo ativa
          * @return object      Objeto da base de dados
          */
        public function loadCriteria($criteria)
        {
            // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }
        }
        
        /**
          * Mйtodo delete
          * Exclui um objeto da base de dados atravйs de um Cуdigo
          * 
          * @access public
          * @param  $codigo     Cуdigo do objeto
          * @throws Exception   Nгo hб transaзгo ativa
          * @return boolean     Resultado da operaзгo de delete
          */
        public function delete($codigo = NULL)
        {
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }           
        }

        /**
          * Mйtodo deleteFisico
          * Exclui um objeto da base de dados atravйs de um Cуdigo
          * 
          * @since  1.3
          * @access public
          * @param  $codigo     Cуdigo do objeto
          * @throws Exception   Nгo hб transaзгo ativa
          * @return boolean     Resultado da operaзгo de delete
          */
        public function deleteFisico($codigo = NULL)
        {
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }           
        }
        
        /**
          * Mйtodo deleteCriteria
          * Exclui um objeto da base de dados atravйs de um Cуdigo
          * 
          * @access public
          * @param  $criteria   Critйrio de seleзгo
          * @throws Exception   Nгo hб transaзгo ativa
          * @return boolean     Resultado da operaзгo de delete
          */
        public function deleteCriteria($criteria)
        {
        
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }           
        }

        /**
          * Mйtodo deleteCriteriaFisico
          * Exclui um objeto da base de dados atravйs de um Cуdigo
          * 
          * @since  1.3
          * @access public
          * @param  $criteria   Critйrio de seleзгo
          * @throws Exception   Nгo hб transaзгo ativa
          * @return boolean     Resultado da operaзгo de delete
          */
        public function deleteCriteriaFisico($criteria)
        {
        
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }           
        }
        
        /**
          * Mйtodo getLast
          * Retorna o ъltimo cуdigo
          * 
          * @access public
          * @throws Exception   Nгo hб transaзгo ativa
          * @return int         Ъltimo cуdigo
          */
        public function getLast()
        {
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                // cria instruзгo SQL
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
                throw new Exception('Nгo hб transaзгo ativa');
            }           
        }
    }
?>