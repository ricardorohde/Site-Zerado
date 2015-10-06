<?php
    /**
     * Classe TTransaction
     * Esta classe prove os mщtodos necessarios para manipular transaчуoes
     * Atomicidade
     * Consistencia
     * Isolamento
     * Durabilidade
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaчуo a Objetos - 2Њ Ediчуo)
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
          * @var    TConnection  Conexуo Ativa
          */
        private static $conn;
        /**
          * @access private
          * @var    TLogger  Objeto de LOG
          */
        private static $logger;

        /*
         * Mщtodos
         */
        
        /**
         * Mщtodo open()
         * Abre uma transaчуo e uma conexуo ao Banco de Dados
         * 
         * @access public
         * @param  $database = nome do banco de dados
         * @return void
         */
        public static function open($database)
        {
            //Abre uma conexуo e armazena na propriedade estatica $conn
            if(empty(self::$conn))
            {
                self::$conn = TConnection::open($database);
                //Inicia transaчуo
                self::$conn->beginTransaction();
                //Desliga o log do SQL
                self::$logger = NULL;
            }
        }
        
        /**
         * Mщtodo get()
         * retorna a conexуo ativa da transaчуo
         * 
         * @access public
         * @return Conexуo Ativa
         */
        public static function get()
        {
            //Retorna a conexуo ativa
            return self::$conn;
        }
        
        /**
         * Metodo rollback()
         * Desfaz todas operaчѕes realizadas na transaчуo
         * 
         * @access public
         * @return void
         */
        public static function rollback()
        {
            if(self::$conn)
            {
                //Desfaz as operaчѕes realizadas durante a transaчуo
                self::$conn->rollBack();
                self::$conn = NULL;
            }
        }
        
        /**
         * Mщtodo close()
         * Aplica todas as operaчѕes realizadas e fecha a transaчуo
         * 
         * @access public
         * @return void
         */
        public static function close()
        {
            if(self::$conn)
            {
                //Aplica as operaчѕes realizadas durante a transaчуo
                self::$conn->commit();
                self::$conn = NULL;
            }
        }
        
        /**
         * Mщtodo setLogger()
         * Armazena uma mensagem no arquivo de LOG
         * Baseada a estratщgia ($logger) atual
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
         * Mщtodo log()
         * Armazena uma mensagem no arquivo de LOG
         * Baseada na estratщgia ($logger) atual
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