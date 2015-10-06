<?php
    /**
     * TSqlDelete.php
     * Esta classse provк meios para manipulaзгo de uma instruзгo de DELETE no banco de dados
     *      1.1 Realiza a exclusгo lуgica do item
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaзгo a Objetos - 2Є Ediзгo)
     * @version 1.1     
     * @access  public
     */
    final class TSqlDelete extends TSqlInstruction
    {
        /*
         * Mйtodos
         */

        /**
         * Mйtodo getInstruction
         * Retorna a instruзгo DELETE em forma de string
         * 
         * @access public
         * @return Instruзгo SQL DELETE
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