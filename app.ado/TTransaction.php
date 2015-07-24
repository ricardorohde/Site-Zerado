<?php
    /**
     * Classe TTransaction
     * Esta classe prove os métodos necessarios para manipular transaçãoes
     * Atomicidade
     * Consistencia
     * Isolamento
     * Durabilidade
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    final class TTransaction
    {
        /*
         *    Variaveis
         */
        private static $conn;   //Conexão Ativa
        private static $logger; //Objeto de LOG

        /*
         * Métodos
         */
        
        /**
         * Método open()
         * Abre uma transação e uma conexão ao Banco de Dados
         * 
         * @access public
         * @param  $database = nome do banco de dados
         * @return void
         */
        public static function open($database)
        {
            //Abre uma conexão e armazena na propriedade estatica $conn
            if(empty(self::$conn))
            {
                self::$conn = TConnection::open($database);
                //Inicia transação
                self::$conn->beginTransaction();
                //Desliga o log do SQL
                self::$logger = NULL;
            }
        }
        
        /**
         * Método get()
         * retorna a conexão ativa da transação
         * 
         * @access public
         * @return Conexão Ativa
         */
        public static function get()
        {
            //Retorna a conexão ativa
            return self::$conn;
        }
        
        /**
         * Metodo rollback()
         * Desfaz todas operações realizadas na transação
         * 
         * @access public
         * @return void
         */
        public static function rollback()
        {
            if(self::$conn)
            {
                //Desfaz as operações realizadas durante a transação
                self::$conn->rollBack();
                self::$conn = NULL;
            }
        }
        
        /**
         * Método close()
         * Aplica todas as operações realizadas e fecha a transação
         * 
         * @access public
         * @return void
         */
        public static function close()
        {
            if(self::$conn)
            {
                //Aplica as operações realizadas durante a transação
                self::$conn->commit();
                self::$conn = NULL;
            }
        }
        
        /**
         * Método setLogger()
         * Armazena uma mensagem no arquivo de LOG
         * Baseada a estratégia ($logger) atual
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
         * Método log()
         * Armazena uma mensagem no arquivo de LOG
         * Baseada na estratégia ($logger) atual
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