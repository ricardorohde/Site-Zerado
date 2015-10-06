<?php
    /**
     * TSqlDelete.php
     * Esta classse prov� meios para manipula��o de uma instru��o de DELETE no banco de dados
     *      1.1 Realiza a exclus�o l�gica do item
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.1     
     * @access  public
     */
    final class TSqlDelete extends TSqlInstruction
    {
        /*
         * M�todos
         */

        /**
         * M�todo getInstruction
         * Retorna a instru��o DELETE em forma de string
         * 
         * @access public
         * @return Instru��o SQL DELETE
         */
        public function getInstruction()
        {
            //Monta a string de DELETE
            //$this->sql = "DELETE FROM {$this->entity[0]}";
            $this->sql = "UPDATE {$this->entity[0]} SET excluido = 1";
            
            //Retorna a clausula WHERE do objeto $this->criteria
            if($this->criteria)
            {
                $expression = $this->criteria->dump();
                
                if($expression)
                {
                    $this->sql .= ' WHERE ' . $expression;
                }
            }
            
            return $this->sql;
        }
    }
?>