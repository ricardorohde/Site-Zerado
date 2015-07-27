<?php
    /**
     * TRecord.class.php
     * _DESCRIÇÃO_
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    abstract class TRecord
    {
        /*
         *    Variaveis
         */
        /**
          * @access protected
          * @var    string  Dados
          */
        protected $data;


        /*
         * Métodos
         */
        

        /**
          * Método Construtor
          * Instancia um Active Record. Se passado o codigo ja carrega o objeto
          *
          * @access  public
          * @param   $codigo Códico do Objeto
          * @return  void
          */
        public function  __construct($codigo = NULL)
        {
            if ($codigo)
            {
                $object = $this->load($codigo);
                
                if ($object)
                {
                    $this->fromArray($object->toArray());
                }
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
          * Executado sempre que uma propriedade for atribuida
          * 
          * @access public
          * @param  $prop   = Propriedade a ser definida
          * @param  $value  = Valor da propriedade
          * @return void
          */
        public function __set($prop, $value)
        {
            if (method_exists($this, 'set_'.$prop))
            {
                call_user_func(array($this, 'set_'.$prop), $value);
            }
            else
            {
                if($value == NULL)
                {
                    //unset($this->data[$prop]);
                    $this->data[$prop] = '';
                }
                else
                {
                    $this->data[$prop] = $value;
                }
            }
        }
        
        /**
          * Método __get
          * Executado sempre que uma propriedade for requirida
          * 
          * @access public
          * @param  $prop   = Propriedade a ser requirida
          * @return valor da propriedade
          */
        public function __get($prop)
        {
            if (method_exists($this, 'get_'.$prop))
            {
                return call_user_func(array($this, 'get_'.$prop));
            }
            else
            {
                if(isset($this->data[$prop]))
                {
                    return $this->data[$prop];
                }
            }   
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
          * Método fromArray
          * Preenche os dados de um objeto com um array
          * 
          * @access public
          * @param  $data = Dado a ser preenchido
          * @return void
          */
        public function fromArray($data)
        {
            $this->data = $data;
        }
        
        /**
          * Método toArray
          * Retorna os dados do objeto como array
          * 
          * @access public
          * @return array Dados do objeto como array
          */
        public function toArray()
        {
            return $this->data;
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
            if (empty($this->data['codigo']) or (!$this->load($this->codigo))) 
            {
                /*if (empty($this->data['codigo'])) 
                {
                    $this->codigo = $this->getLast() +1;
                }*/
                
                // cria instrução SQL
                $sql = new TSqlInsert;
                $sql->addEntity($this->getEntity());
                // percorre dados do objeto
                foreach ( $this->data as $key => $value )
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
                $criteria->add(new TFilter('codigo', ' = ', $this->codigo));
                $sql->setCriteria($criteria);
                // percorre dados do objeto
                foreach ( $this->data as $key => $value )
                {
                    if ($key !== 'codigo') {
                        // passa os dados do objeto para o SQL
                        $sql->setRowData($key, $this->$key);
                    }
                }               
            }
                
            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());
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
            $criteria->add(new TFilter('codigo', '=', $codigo));
            $sql->setCriteria($criteria);
            
            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->query($sql->getInstruction());
                if ( $result )
                {
                    $object = $result->fetchObject(get_class($this));
                }
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
            //$criteria->add(new TFilter('codigo', '=', $codigo));
            $sql->setCriteria($criteria);
            
            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->query($sql->getInstruction());
                if ( $result )
                {
                    $object = $result->fetchObject(get_class($this));
                }
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
            $criteria->add(new TFilter('codigo', '=', $codigo));
            $sql->setCriteria($criteria);   

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

                return $result;
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
          * @access deleteCriteria
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
            //$criteria->add(new TFilter('codigo', '=', $codigo));
            $sql->setCriteria($criteria);   

            if ( $conn = TTransaction::get() ) 
            {
                $result = $conn->exec($sql->getInstruction());

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
            if ( $conn = TTransaction::get() ) 
            {
                // cria instrução SQL
                $sql = new TSqlSelect;
                $sql->addColumn('max(codigo) as codigo');
                $sql->addEntity($this->getEntity());            
            
                $result = $conn->query($sql->getInstruction());
                $row = $result->fetch();
                
                return $row[0];
            }
            else
            {
                throw new Exception('Não há transação ativa');
            }           
        }
    }
?>