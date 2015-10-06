<?php
    /**
     * TLoggerXML.php
     * Implementa o algoritmo de LOG em XML
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    class TLoggerXML
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
            $text = "<log>\n";
            $text .= "  <time>$time</time>\n";
            $text .= "  <message>$message</message>\n";
            $text .= "</log>\n";
            
            //Adiciona no final do arquivo
            $handler = fopen($this->filename, 'a');
            fwrite($handler, $text);
            fclose($handler);
        }
    }
?>