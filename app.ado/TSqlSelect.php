<?php
    /**
     * TSqlSelect.php
     * Esta classe provъ meios para manipulaчуo de uma instruчуo de SELECT no banco de dados
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaчуo a Objetos - 2Њ Ediчуo)
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
         * Mщtodos
         */
        
        /**
         * Mщtodo addColumn
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
         * Mщtodo getInstruction()
         * Retorna a instruчуo de SELECT em forma de string
         * 
         * @access public
         * @return Instruчуo SQL SELECT
         */
        public function getInstruction()
        {
            //Monta a instruчуo de SELECT
            $this->sql =    'SELECT ';
            //Monta uma string com os nomes das colunas
            if(count($this->columns) == 1)
                $this->sql .=   $this->columns[0];
            else
                $this->sql .=   implode(',', $this->columns);
            
            //Adiciona clсusula FROM o nome da tabela
            if(count($this->entity) == 1)
                $this->sql .=  ' FROM ' . $this->entity[0];
            else
                $this->sql .=  ' FROM ' . implode(',', $this->entity);
            
            //Obtem clсusula WHERE do objeto criteria
            if($this->criteria)
            {
                $expression = $this->criteria->dump();
                if($expression)
                {
                    $this->sql .= ' WHERE ' .$expression;
                }
                
                //Obtщm as propriedades do critщrio
                $group  = $this->criteria->getProperty('group');
                $order  = $this->criteria->getProperty('order');
                $limit  = $this->criteria->getProperty('limit');
                $offset = $this->criteria->getProperty('offset');
                
                if($group)
                {
                    $this->sql .= ' GROUP BY ' . $group;
                }
                //Obtщm a ordenaчуo do SELECT
                if($order)
                {
                    $this->sql .= ' ORDER BY ' . $order;
                }
                //Obtщm o limite
                if($limit)
                {
                    $this->sql .= ' LIMIT ' . $limit;
                }
                //Obtщm o offset
                if($offset)
                {
                    $this->sql .= ' OFFSET ' . $offset;
                }
            }
            
            return $this->sql;
        }
    }
?>