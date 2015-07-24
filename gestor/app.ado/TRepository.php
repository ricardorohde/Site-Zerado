<?php
    /**
     * TRepository.php
     * _DESCRIÇÃO_
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    final class TRepository
    {
        /*
         * Métodos
         */
        
        /**
         * Método addColumn
         * Adiciona uma coluna a ser retornada pelo SELECT
         * 
         * @access public
         * @param $column = Coluna da Tabela
         * @return void
         */
        public function addColumn($column)
        {
            //Adiciona coluna no array
            $this->columns[] = $column;
        }
        
        /**
         * Método setEntity()
         * Define o nome da entidade (tabela) manipulada pela instrução SQL
         * 
         * @access public
         * @param $entity = tabela
         * @return void
         */
        final public function addEntity($entity)
        {
            $this->entity[] = $entity;
        }
        
        /**
         * Método load
         * Realiza a busca no banco de dados
         * 
         * @access public
         * @param  $criteria = Critério de Seleção
         * @return Resultados da Busca
         */
        function load(TCriteria $criteria)
        {
            $sql = new TSqlSelect;
            
            //Colunas
            if(count($this->columns) == 1)
                $sql->addColumn($this->columns[0]);
            else
                foreach ($this->columns as $coluna)
                    $sql->addColumn($coluna);
            
            //Entidade
            if(count($this->entity) == 1)
                $sql->addEntity($this->entity[0]);
            else
                foreach ($this->entity as $entidade)
                    $sql->addEntity($entidade);
            
            //Criteria
            $sql->setCriteria($criteria);
            if ($conn = TTransaction::get()) 
            {   
                $result = $conn->query($sql->getInstruction());
                $results= array();
                
                if ($result)
                {
                    while($row = $result->fetchObject(get_class($this)))
                    {
                        $results[] = $row;
                    }
                }
                
                return $results;
            }
            else 
            {
                throw new Exception('Não há transação ativa!');
            }
        }
        
        /**
         * Método delete()
         * Exclui um conjunto de objetos (collection) da base de dados
         * através de um critério de seleção
         * 
         * @access public
         * @param  $crteria = objeto do tipo TCriteria
         * @return void
         */
        function delete(TCriteria $criteria)
        {
            $sql = new TSqlDelete;
            $sql->addEntity($this->entity[0]);
            $sql->setCriteria($criteria);
            
            if ($conn = TTransaction::get()) 
            {               
                $result = $conn->exec($sql->getInstruction());
                
                return $result;
            }
            else 
            {
                throw new Exception('Não há transação ativa!');
            }   
        }
        
        /**
         * Método count()
         * Conta o número de ocorrencias
         * 
         * @access public
         * @param  $criteria = Criteria de Selecção
         * @return Número de Ocorrencias
         */
        function count(TCriteria $criteria)
        {
        
            $sql = new TSqlSelect;
            $sql->addColumn(' count(*) ');
            $sql->addEntity($this->entity[0]);
            $sql->setCriteria($criteria);
            
            if ($conn = TTransaction::get()) 
            {
                $result = $conn->query($sql->getInstruction());
                
                if ($result)
                {
                    $row = $result->fetch();
                }
                
                return $row[0];
            }
            else 
            {
                throw new Exception('Não há transação ativa!');
            }   
        }
    }
?>