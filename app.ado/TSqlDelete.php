<?php
    /**
     * TSqlDelete.php
     * Esta classse provê meios para manipulação de uma instrução de DELETE no banco de dados
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    final class TSqlDelete extends TSqlInstruction
    {
        /*
         * Métodos
         */

        /**
         * Método getInstruction
         * Retorna a instrução DELETE em forma de string
         * 
         * @access public
         * @return Instrução SQL DELETE
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