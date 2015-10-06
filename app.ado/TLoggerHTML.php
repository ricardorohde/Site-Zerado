<?php
    /**
     * TLoggerHTML.php
     * implementa o algoritmo de LOG em HTML
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    class TLoggerHTML
    {
        
        /*
         * Métodos
         */
        

        /**
         * Método write
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
            $text = "<p>\n";
            $text .= "  <b>$time</b> : \n";
            $text .= "  <i>$message</i> <br> \n";
            $text .= "</p>\n";
            
            //Adiciona no final do arquivo
            $handler = fopen($this->filename, 'a');
            fwrite($handler, $text);
            fclose($handler);
        }
    }
?>