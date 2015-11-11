<?php
    /**
     * TRecord.class.php
     * Esta classe provê os métodos necessários para persistir e recuperar objetos da base de dados (Active Record) 
     *    1.1 Obtenção das variaveis da classe de modelo
     *        Inicio e conclusão de transação direto nas operações
     *    1.2 Adicionado Paramatro excluido = 0 nas buscas
     *    1.3 Criado métodos de exclusão fisicos
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.3
     * @access  public
     */
    abstract class TRecord
    {
        /*
         *    Variaveis
         */


        /*
         * Métodos
         */
        

        /**
          * Método Construtor
          * Instancia um Active Record. Se passado o codigo ja carrega o objeto
          *
          * @access  public
          * @param   $codigo  Códico do Objeto
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
          * Método __clone
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
          * Método __set
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
          * Método __get
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
          * Método getEntity
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
         * Método getVars
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
          * Método store
          * Armazena o objeto na base de dados e retorn o número de linhas afetadas pela instrução SQL (0 ou 1)
          * 
          * @access public
          * @throws Exception   Não há transação ativa
          * @return int         Numero de linhas afetadas pela instrução SQL
          */
        public function store()
        {
            if (empty($this->codigo) or (!$this->load($this->codigo))) 
            {                
                // cria instrução SQL
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
                // cria instrução UPDATE
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
                throw new Exception('Não há transação ativa');
            }
        }
        
        /**
          * Método load
          * Recupera (retorna) um objeto da base de dados através de seu Codigo e instancia ele na memória
          * 
          * @access public
          * @param  $codigo     Codigo do Objeto
          * @throws Exception   Não há transação ativa
          * @return object      Objeto da base de dados
          */
        public function load($codigo)
        {

            // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }
        }
        
        /**
          * Método loadCriteria
          * Recupera (retorna) um objeto da base de dados através de um Critério e instancia ele na memória
          * 
          * @access public
          * @param  $criteria   Critério de seleção
          * @throws Exception   Não há transação ativa
          * @return object      Objeto da base de dados
          */
        public function loadCriteria($criteria)
        {
            // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }
        }
        
        /**
          * Método delete
          * Exclui um objeto da base de dados através de um Código
          * 
          * @access public
          * @param  $codigo     Código do objeto
          * @throws Exception   Não há transação ativa
          * @return boolean     Resultado da operação de delete
          */
        public function delete($codigo = NULL)
        {
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }           
        }

        /**
          * Método deleteFisico
          * Exclui um objeto da base de dados através de um Código
          * 
          * @since  1.3
          * @access public
          * @param  $codigo     Código do objeto
          * @throws Exception   Não há transação ativa
          * @return boolean     Resultado da operação de delete
          */
        public function deleteFisico($codigo = NULL)
        {
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }           
        }
        
        /**
          * Método deleteCriteria
          * Exclui um objeto da base de dados através de um Código
          * 
          * @access public
          * @param  $criteria   Critério de seleção
          * @throws Exception   Não há transação ativa
          * @return boolean     Resultado da operação de delete
          */
        public function deleteCriteria($criteria)
        {
        
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }           
        }

        /**
          * Método deleteCriteriaFisico
          * Exclui um objeto da base de dados através de um Código
          * 
          * @since  1.3
          * @access public
          * @param  $criteria   Critério de seleção
          * @throws Exception   Não há transação ativa
          * @return boolean     Resultado da operação de delete
          */
        public function deleteCriteriaFisico($criteria)
        {
        
            $codigo = $codigo ? $codigo : $this->codigo;
            
            // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }           
        }
        
        /**
          * Método getLast
          * Retorna o último código
          * 
          * @access public
          * @throws Exception   Não há transação ativa
          * @return int         Último código
          */
        public function getLast()
        {
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ( $conn = TTransaction::get() ) 
            {
                // cria instrução SQL
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
                throw new Exception('Não há transação ativa');
            }           
        }
    }
?>