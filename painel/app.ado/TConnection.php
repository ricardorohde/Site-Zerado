<?php
    /**
     * TConnection.php
     * Gerencia conexões com o banco de dados através de arquivos de configuracao (*.ini)
     *     1.1 - Arquivo unico de configuracoes (bd.ini), verificando se o servidor é local ou virtual
     *     1.2 - Refatoração para uso de controlador de Arquivos INI, e seleção automatica do tipo de servidor
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.2
     * @access  public
     */
    final class TConnection
    {
        /*
         * Métodos
         */
        
        /**
         * Método Construtor
         * Não existem instancias de TConnection, por isso está marcado como private
         *
         * @access private
         * @return void
         */
        public function __construct()
        {

        }

        /**
         * Método open
         * Recebe o nome do banco de dados e instancia o objeto PDO correspondente
         * 
         * @access  public
         * @param   $name       Nome do arquivo de configurações
         * @throws  Exception   Arquivo não encontrado
         * @return  $conn       Conexão com o banco de dados
         */
        public static function open($name)
        {
             $db = controladorArquivosIni::getConfig($name);
            
            //Le as informações contidas no arquivo
            $type = isset($db['type']) ? $db['type'] : NULL;
            $port = isset($db['port']) ? $db['port'] : NULL;

            //Se o ip do servidor for 127.0.0.1, carrega configurações locais, senao configurações normais
            $user = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') ? $db['user_local'] : $db['user'];
            $pass = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') ? $db['pass_local'] : $db['pass'];
            $name = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') ? $db['name_local'] : $db['name'];
            $host = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') ? $db['host_local'] : $db['host'];
            
            //Descobre qual o tipo (driver) de banco de dados a ser utilizado
            switch($type)
            {
                //Postgress
                case 'pgsql':
                    $port = $port ? $port : '5432';
                    //Não pode quebrar linhas nos parametros
                    $conn = new PDO("pgsql:dbname={$name};user={$user};password={$pass};host=$host;port={$port}");
                    break;
                //Mysql
                case 'mysql':
                    $port = $port ? $port : '3306';
                    //Não pode quebrar linhas nos parametros
                    $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}",$user,$pass);
                    break;
                //Sqlite
                case 'sqlite':
                    //Não pode quebrar linhas nos parametros
                    $conn = new PDO("sqlite:{$name}");
                    break;
                //Ibase
                case 'ibase':
                    //Não pode quebrar linhas nos parametros
                    $conn = new PDO("firebird:dbname={$name}", $user,$pass);
                    break;
                //Oci8
                case 'oci8':
                    //Não pode quebrar linhas nos parametros
                    $conn = new PDO("oci:dbname={$name}",$user,$pass);
                    break;
                //Microsoft Sql
                case 'mssql':
                    //Não pode quebrar linhas nos parametros
                    $conn = new PDO("mssql:host={$host},1433;dbname={$name}",$user,$pass);
                    break;
            }
            
            //Define para que o PDO lance exceções a ocorrência de erros
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            //Retorna o objeto instanciado
            return $conn;
        }        
    }
?>