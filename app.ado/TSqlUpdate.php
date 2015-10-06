<?php
    /**
     * TSqlUpdate.php
     * Esta classe provъ meios para manipulaчуo de uma instruчуo UPDATE do banco de dados
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaчуo a Objetos - 2Њ Ediчуo)
     * @version 1.0     
     * @access  public
     */
    class TSqlUpdate extends TSqlInstruction
    {
        /*
         *    Variaveis
         */
        /**
          * @access protected
          * @var    string  Valores das Colunas
          */ 
        private $columnValues;

        /*
         * Mщtodos
         */
        
        /**
         * Mщtodo setRowData()
         * Atribui valores р determinadas colunas no banco de dados que serуo modificados
         * 
         * @access  public
         * @param   $column  = Coluna da tabela
         * @param   $value   = Valor a ser armazenado
         * @return  void
         */
        public function setRowData($column, $value)
        {
            //Verifica se щ um dado escalar (string, inteiro, etc...)
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
         * Mщtodo getInstruction()
         * Retorna a instruчуo de UPDATE em forma de string
         * 
         * @access public
         * @return Instruчуo SQL UPDATE
         */
        public function getInstruction()
        {
            //Monta a string de UPDATE
            $this->sql = "UPDATE {$this->entity[0]}";
            
            //Monta os pares: coluna=valor,...
            if($this->columnValues)
            {
                foreach($this->columnValues as $column => $value)
                {
                    $set[] = "{$column} = {$value}";
                }
            }
            
            $this->sql .= ' SET ' . implode(', ', $set);
            
            //Retorna a clausula WHERE do objeto $this->criteria
            if($this->criteria)
            {
                $this->sql .= ' WHERE ' . $this->criteria->dump();
            }
            
            return $this->sql;
        }
    }
?>