<?php
    /**
     * TLoggerTXT.php
     * Implementa o algoritmo de LOG em TXT
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0     
     * @access  public
     */
    class TLoggerTXT
    {
        /*
         * M�todos
         */
        

        /**
         * M�todo write
         * Escreve uma mensagem no arquivo de LOG
         * 
         * @access public
         * @param  $message = mensagem a ser escrita
         * @return void
         */
        public function write($message)
        {
            date_default_timezone_set('America/Sao_Paulo');
            $time = date("Y-m-d H:i:s");
            //Monta a String
            $text = "$time :: $message\n";
            
            //Adiciona no final do arquivo
            $handler = fopen($this->filename, 'a');
            fwrite($handler, $text);
            fclose($handler);
        }
    }
?>