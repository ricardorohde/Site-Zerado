<?php
    /**
     * TSqlDeleteFisico.php
     * Esta classse provъ meios para manipulaчуo de uma instruчуo de DELETE no banco de dados
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaчуo a Objetos - 2Њ Ediчуo)
     * @version 1.0     
     * @access  public
     */
    final class TSqlDeleteFisico extends TSqlInstruction
    {
        /*
         * Mщtodos
         */

        /**
         * Mщtodo getInstruction
         * Retorna a instruчуo DELETE em forma de string
         * 
         * @access public
         * @return Instruчуo SQL DELETE
         */
        public function getInstruction()
        {
            //Monta a string de DELETE
            $this->sql = "DELETE FROM {$this->entity[0]}";
            
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