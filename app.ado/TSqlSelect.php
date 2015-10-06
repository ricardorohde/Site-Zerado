<?php
    /**
     * TSqlSelect.php
     * Esta classe prov� meios para manipula��o de uma instru��o de SELECT no banco de dados
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0     
     * @access  public
     */
    final class TSqlSelect extends TSqlInstruction
    {
        /*
         *    Variaveis
         */
        /**
          * @access private
          * @var    array  Array de colunas a serem retornadas
          */
        private $columns;

        /*
         * M�todos
         */
        
        /**
         * M�todo addColumn
         * Adiciona uma coluna a ser retornada pelo SELECT
         * 
         * @access  public
         * @param   $column = Coluna da Tabela
         * @return  void
         */
        public function addColumn($column)
        {
            //Adiciona coluna no array
            $this->columns[] = $column;
        }
        
        /**
         * M�todo getInstruction()
         * Retorna a instru��o de SELECT em forma de string
         * 
         * @access public
         * @return Instru��o SQL SELECT
         */
        public function getInstruction()
        {
            //Monta a instru��o de SELECT
            $this->sql =    'SELECT ';
            //Monta uma string com os nomes das colunas
            if(count($this->columns) == 1)
                $this->sql .=   $this->columns[0];
            else
                $this->sql .=   implode(',', $this->columns);
            
            //Adiciona cl�usula FROM o nome da tabela
            if(count($this->entity) == 1)
                $this->sql .=  ' FROM ' . $this->entity[0];
            else
                $this->sql .=  ' FROM ' . implode(',', $this->entity);
            
            //Obtem cl�usula WHERE do objeto criteria
            if($this->criteria)
            {
                $expression = $this->criteria->dump();
                if($expression)
                {
                    $this->sql .= ' WHERE ' .$expression;
                }
                
                //Obt�m as propriedades do crit�rio
                $group  = $this->criteria->getProperty('group');
                $order  = $this->criteria->getProperty('order');
                $limit  = $this->criteria->getProperty('limit');
                $offset = $this->criteria->getProperty('offset');
                
                if($group)
                {
                    $this->sql .= ' GROUP BY ' . $group;
                }
                //Obt�m a ordena��o do SELECT
                if($order)
                {
                    $this->sql .= ' ORDER BY ' . $order;
                }
                //Obt�m o limite
                if($limit)
                {
                    $this->sql .= ' LIMIT ' . $limit;
                }
                //Obt�m o offset
                if($offset)
                {
                    $this->sql .= ' OFFSET ' . $offset;
                }
            }
            
            return $this->sql;
        }
    }
?>