<?php
    /**
      * controladorArquivosIni.php
      * Obtem as configurações de um arquivo ini
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorArquivosIni
    {
        /*
         *    Variaveis
         */


        /*
         * Métodos
         */
        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {
            
        }

        /**
         * Método getBanners
         * Obtém todos os banners ativos
         * 
         * @access  public
         * @return  Collection  Coleção de banners ativos
         */
        public static function getConfig($arquivo)
        {
            // verifica se existe arquivo de configuração de email
            if (file_exists("./app.config/{$arquivo}.ini"))
            {
                // lê o INI e retorna um array
                $config = parse_ini_file("/app.config/{$arquivo}.ini");
            }
            else
            {
                // se não existir, lançaa um erro
                throw new Exception("Arquivo /app.config/{$arquivo}.ini não encontrado");
            }

            return $config;
        }
    }
?>