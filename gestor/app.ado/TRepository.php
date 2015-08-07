<?php
    /**
     * TRepository.php
     * Esta classe provê os métodos necessários para manipular coleções de objetos
     *    1.1 Inicio e conclusão de transação direto nas operações
     *    1.2 Adicionado Paramatro excluido = 0 nas buscas
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.2
     * @access  public
     */
    class TRepository
    {
        /*
         * Métodos
         */
        
        /**
          * Método addColumn
          * Adiciona uma coluna a ser retornada pelo SELECT
          * 
          * @access  public
          * @param   $column     Coluna da Tabela
          * @return  void
          */
        public function addColumn($column)
        {
            //Adiciona coluna no array
            $this->columns[] = $column;
        }
        
        /**
          * Método addEntity()
          * Define o nome da entidade (tabela) manipulada pela instrução SQL
          * 
          * @access  public
          * @param   $entity     Tabela
          * @return  void
          */
        final public function addEntity($entity)
        {
            $this->entity[] = $entity;
        }
        
        /**
          * Método load
          * Recupera um conjunto de objetos (collection) da base de dados através de um critério de seleção
          * 
          * @access public
          * @param  $criteria   Critério de Seleção
          * @throws Exception   Não há transação ativa
          * @return Resultados da Busca
          */
        function load(TCriteria $criteria = NULL)
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
            if(!isset($criteria))
                $criteria = new TCriteria;
            $criteria->addFilter('excluido', '=', 0);
            $sql->setCriteria($criteria);

            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

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

                TTransaction::close();

                return $results;
            }
            else 
            {
                throw new Exception('Não há transação ativa!');
            }
        }
        
        /**
          * Método delete()
          * Exclui um conjunto de objetos (collection) da base de dados através de um critério de seleção
          * 
          * @access public
          * @param  $criteria   Objeto do tipo TCriteria
          * @throws Exception   Não há transação ativa
          * @return void
          */
        function delete(TCriteria $criteria)
        {
            $sql = new TSqlDelete;
            $sql->addEntity($this->entity[0]);
            $sql->setCriteria($criteria);
            
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ($conn = TTransaction::get()) 
            {               
                $result = $conn->exec($sql->getInstruction());

                TTransaction::close();
                
                return $result;
            }
            else 
            {
                throw new Exception('Não há transação ativa!');
            }   
        }
        
        /**
          * Método count()
          * Conta o número de ocorrencias que satisfazem o critério de seleção
          * 
          * @access public
          * @param  $criteria    Criteria de Selecção
          * @throws Exception   Não há transação ativa
          * @return Número de Ocorrencias
          */
        function count(TCriteria $criteria)
        {
            $sql = new TSqlSelect;
            $sql->addColumn(' count(*) ');
            $sql->addEntity($this->entity[0]);
            $sql->setCriteria($criteria);
            
            //RECUPERA CONEXAO BANCO DE DADOS
            TTransaction::open('my_bd_site');

            if ($conn = TTransaction::get()) 
            {
                $result = $conn->query($sql->getInstruction());
                
                if ($result)
                {
                    $row = $result->fetch();
                }

                TTransaction::close();
                
                return $row[0];
            }
            else 
            {
                throw new Exception('Não há transação ativa!');
            }   
        }
    }
?>