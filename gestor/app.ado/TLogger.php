<?php
    /**
     * TLogger.php
     * Esta classe prov� uma interface abstrata para a defini��o de algoritmos de LOG
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
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
         * M�todos
         */
        
        /**
         * M�todo Construtor
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
         * M�todo write
         * Define o m�todo write como obrigat�rio
         * 
         * @abstract
         */
        abstract function write($message);
    }
?>