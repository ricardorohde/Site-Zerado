<?php
    /**
     * TConnection.php
     * Gerencia conex�es com o banco de dados atrav�s de arquivos de configuracao (*.ini)
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0     
     * @access  public
     */
    final class TConnection
    {
        /*
         * M�todos
         */
        
        /**
         * M�todo Construtor
         * N�o existem instancias de TConnection, por isso est� marcado como private
         *
         * @access private
         * @return void
         */
        public function __construct()
        {

        }

        /**
         * M�todo open
         * Recebe o nome do banco de dados e instancia o objeto PDO correspondente
         * 
         * @access  public
         * @param   $name       Nome do arquivo de configura��es
         * @throws  Exception   Arquivo n�o encontrado
         * @return  $conn       Conex�o com o banco de dados
         */
        public static function open($name)
        {
            //Verifica se existe arquivo de configura��o para este banco de dados
            if(file_exists("app.config/{$name}.ini"))
            {
                //Le o arquivo INI e retorna um array
                $db = parse_ini_file("app.config/{$name}.ini");
            }
            elseif(file_exists("../app.config/{$name}.ini"))
            {
                //Le o arquivo INI e retorna um array
                $db = parse_ini_file("../app.config/{$name}.ini");
            }
            else
            {
                //Se nao existir lan�a um erro
                throw new Exception("Arquivo '$name' n�o encontrado");
            }
            
            //Le as informa��es contidas no arquivo
            $user = isset($db['user']) ? $db['user'] : NULL;
            $pass = isset($db['pass']) ? $db['pass'] : NULL;
            $name = isset($db['name']) ? $db['name'] : NULL;
            $host = isset($db['host']) ? $db['host'] : NULL;
            $type = isset($db['type']) ? $db['type'] : NULL;
            $port = isset($db['port']) ? $db['port'] : NULL;
            
            //Descobre qual o tipo (driver) de banco de dados a ser utilizado
            switch($type)
            {
                //Postgress
                case 'pgsql':
                    $port = $port ? $port : '5432';
                    //N�o pode quebrar linhas nos parametros
                    $conn = new PDO("pgsql:dbname={$name};user={$user};password={$pass};host=$host;port={$port}");
                    break;
                //Mysql
                case 'mysql':
                    $port = $port ? $port : '3306';
                    //N�o pode quebrar linhas nos parametros
                    $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}",$user,$pass);
                    break;
                //Sqlite
                case 'sqlite':
                    //N�o pode quebrar linhas nos parametros
                    $conn = new PDO("sqlite:{$name}");
                    break;
                //Ibase
                case 'ibase':
                    //N�o pode quebrar linhas nos parametros
                    $conn = new PDO("firebird:dbname={$name}", $user,$pass);
                    break;
                //Oci8
                case 'oci8':
                    //N�o pode quebrar linhas nos parametros
                    $conn = new PDO("oci:dbname={$name}",$user,$pass);
                    break;
                //Microsoft Sql
                case 'mssql':
                    //N�o pode quebrar linhas nos parametros
                    $conn = new PDO("mssql:host={$host},1433;dbname={$name}",$user,$pass);
                    break;
            }
            
            //Define para que o PDO lance exce��es a ocorr�ncia de erros
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            //Retorna o objeto instanciado
            return $conn;
        }        
    }
?>