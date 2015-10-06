<?php
    /**
     * TLogger.php
     * Esta classe provк uma interface abstrata para a definiзгo de algoritmos de LOG
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaзгo a Objetos - 2Є Ediзгo)
     * @version 1.0
     * @access  public
     */
    abstract class TLogger
    {
        /*
         *    Variaveis
         */
        /**
          * @access protected
          * @var    string  Local do arquivo de LOG
          */
        protected $filename; 


        /*
         * Mйtodos
         */
        
        /**
         * Mйtodo Construtor
         * Instancia um novo logger
         * 
         * @access private
         * @param $filename = local do arquivo de LOG
         * @return void
         */
        public function __construct($filename)
        {
            $this->filename = $filename;
            
            //Reseta o conteudo do arquivo
            file_put_contents($filename, '');
        }
        
        /**
         * Mйtodo write
         * Define o mйtodo write como obrigatуrio
         * 
         * @abstract
         */
        abstract function write($message);
    }
?>