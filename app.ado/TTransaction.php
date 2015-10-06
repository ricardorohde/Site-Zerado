<?php
    /**
     * Classe TTransaction
     * Esta classe prove os m�todos necessarios para manipular transa��oes
     * Atomicidade
     * Consistencia
     * Isolamento
     * Durabilidade
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0
     * @access  public
     */
    final class TTransaction
    {
        /*
         *    Variaveis
         */
        /**
          * @access private
          * @var    TConnection  Conex�o Ativa
          */
        private static $conn;
        /**
          * @access private
          * @var    TLogger  Objeto de LOG
          */
        private static $logger;

        /*
         * M�todos
         */
        
        /**
         * M�todo open()
         * Abre uma transa��o e uma conex�o ao Banco de Dados
         * 
         * @access public
         * @param  $database = nome do banco de dados
         * @return void
         */
        public static function open($database)
        {
            //Abre uma conex�o e armazena na propriedade estatica $conn
            if(empty(self::$conn))
            {
                self::$conn = TConnection::open($database);
                //Inicia transa��o
                self::$conn->beginTransaction();
                //Desliga o log do SQL
                self::$logger = NULL;
            }
        }
        
        /**
         * M�todo get()
         * retorna a conex�o ativa da transa��o
         * 
         * @access public
         * @return Conex�o Ativa
         */
        public static function get()
        {
            //Retorna a conex�o ativa
            return self::$conn;
        }
        
        /**
         * Metodo rollback()
         * Desfaz todas opera��es realizadas na transa��o
         * 
         * @access public
         * @return void
         */
        public static function rollback()
        {
            if(self::$conn)
            {
                //Desfaz as opera��es realizadas durante a transa��o
                self::$conn->rollBack();
                self::$conn = NULL;
            }
        }
        
        /**
         * M�todo close()
         * Aplica todas as opera��es realizadas e fecha a transa��o
         * 
         * @access public
         * @return void
         */
        public static function close()
        {
            if(self::$conn)
            {
                //Aplica as opera��es realizadas durante a transa��o
                self::$conn->commit();
                self::$conn = NULL;
            }
        }
        
        /**
         * M�todo setLogger()
         * Armazena uma mensagem no arquivo de LOG
         * Baseada a estrat�gia ($logger) atual
         * 
         * @access public
         * @param  $logger = Log a ser salvo
         * @return void
         */
        public static function setLogger(TLogger $logger)
        {
            self::$logger = $logger;
        }
        
        /**
         * M�todo log()
         * Armazena uma mensagem no arquivo de LOG
         * Baseada na estrat�gia ($logger) atual
         * 
         * @access public
         * @param $message = Mensagem a ser salva no Log
         * @return void
         */
        public static function log($message)
        {
            //Verifica se existe um logger
            if(self::$logger)
            {
                self::$logger->write($message);
            }
        }
    }
?>