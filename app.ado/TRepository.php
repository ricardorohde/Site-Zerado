<?php
    /**
     * TRepository.php
     * Esta classe prov� os m�todos necess�rios para manipular cole��es de objetos
     *    1.1 Inicio e conclus�o de transa��o direto nas opera��es
     *    1.2 Adicionado Paramatro excluido = 0 nas buscas
     *    1.3 Criado m�todos de exclus�o fisicos
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.3
     * @access  public
     */
    class TRepository
    {
        /*
         * M�todos
         */
        
        /**
          * M�todo addColumn
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
          * M�todo addEntity()
          * Define o nome da entidade (tabela) manipulada pela instru��o SQL
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
          * M�todo load
          * Recupera um conjunto de objetos (collection) da base de dados atrav�s de um crit�rio de sele��o
          * 
          * @access public
          * @param  $criteria   Crit�rio de Sele��o
          * @throws Exception   N�o h� transa��o ativa
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

            if(count($this->entity) > 1)
            {
                foreach ($this->entity as $entity) 
                {
                    $entity = explode(' ', $entity);
                    $criteria->addFilter($entity[1].'.excluido', '=', 0);
                }
            }
            else
            {
                $criteria->addFilter('excluido', '=', 0);
            }

            $sql->setCriteria($criteria);

            echo $sql->getInstruction();

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
                throw new Exception('N�o h� transa��o ativa!');
            }
        }
        
        /**
          * M�todo delete()
          * Exclui um conjunto de objetos (collection) da base de dados atrav�s de um crit�rio de sele��o
          * 
          * @access public
          * @param  $criteria   Objeto do tipo TCriteria
          * @throws Exception   N�o h� transa��o ativa
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
                throw new Exception('N�o h� transa��o ativa!');
            }   
        }

        /**
          * M�todo deleteFisico()
          * Exclui um conjunto de objetos (collection) da base de dados atrav�s de um crit�rio de sele��o
          * 
          * @since  1.3
          * @access public
          * @param  $criteria   Objeto do tipo TCriteria
          * @throws Exception   N�o h� transa��o ativa
          * @return void
          */
        function deleteFisico(TCriteria $criteria)
        {
            $sql = new TSqlDeleteFisico;
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
                throw new Exception('N�o h� transa��o ativa!');
            }   
        }
        
        /**
          * M�todo count()
          * Conta o n�mero de ocorrencias que satisfazem o crit�rio de sele��o
          * 
          * @access public
          * @param  $criteria    Criteria de Selec��o
          * @throws Exception   N�o h� transa��o ativa
          * @return N�mero de Ocorrencias
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
                throw new Exception('N�o h� transa��o ativa!');
            }   
        }
    }
?>