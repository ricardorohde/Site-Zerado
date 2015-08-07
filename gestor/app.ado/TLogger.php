<?php
    /**
     * TLogger.php
     * Esta classe provê uma interface abstrata para a definição de algoritmos de LOG
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
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
         * Métodos
         */
        
        /**
         * Método Construtor
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
         * Método write
         * Define o método write como obrigatório
         * 
         * @abstract
         */
        abstract function write($message);
    }
?>