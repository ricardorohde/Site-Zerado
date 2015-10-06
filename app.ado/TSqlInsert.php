<?php
    /**
     * TSqlInsert.php
     * Esta classe prov� meios para aipula��o de uma instru��o de INSERT no banco de dados
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0
     * @access  public
     */
    final class TSqlInsert extends TSqlInstruction
    {
        /*
         *    Variaveis
         */
        /**
          * @access protected
          * @var    string  Valores das Colunas
          */ 
        protected $columnValues;


        /*
         * M�todos
         */
        
        /**
         * M�todo setRowData()
         * Atribui valores � determinadas colunas no banco de dados que ser�o inseridas
         * 
         * @access  public
         * @param   $column  = Coluna da tabela
         * @param   @value   = Valor a ser armazenado
         */
        public function setRowData($column, $value)
        {
            //Verifica se � um dado escalar (string, inteiro, etc...)
            if(is_scalar($value))
            {
                if(is_string($value) and (!empty($value)))
                {
                    //Adiciona \ em aspas
                    $value = addslashes($value);
                    
                    //Caso seja uma string
                    $this->columnValues[$column] = "'$value'";
                }
                else if(is_bool($value))
                {
                    //Caso seja um boolean
                    $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
                }
                else if($value !== '')
                {
                    //Caso seja outro tipo de dado
                    $this->columnValues[$column] = $value;
                }
                else
                {
                    //Caso seja NULL
                    $this->columnValues[$column] = "NULL";
                }
            }
        }
        
        /**
         * M�todo setCriteria()
         * N�o existe no contexto desta classe, logo, ir� lan�ar um erro se for executado
         * 
         * @access  public
         * @param   $criteria = Crit�rio de Sele��o
         * @throws  Exception   Como n�o existe o m�todo setCriteria para Insert lan�a erro
         */
        public function setCriteria(TCriteria $criteria)
        {
            //Lan�a o erro
            throw new Exception("N�o foi possivel chamar o m�todo setCriteria de " . __CLASS__ . 
                                ".<br />N�o existe no contexto desta classe.");
        }
        
        /**
         * M�todo getInstruction()
         * Retorna a instru��o de INSERT em forma de string
         * 
         * @access public
         * @return Instru��o SQL INSERT
         */
        public function getInstruction()
        {
            $this->sql  = "INSERT INTO {$this->entity[0]} (";
            //Monta uma string contendo os nomes de colunas
            $colunas    = implode(', ', array_keys($this->columnValues));
            //Monta uma string contendo os valores
            $values     = implode(', ', array_values($this->columnValues));
            //Concatena tudo
            $this->sql .= $colunas . ')';
            $this->sql .= " VALUES ({$values})";
            return $this->sql;
        }
    }
?>