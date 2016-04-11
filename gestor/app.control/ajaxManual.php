<?php header('Content-type: text/html; charset=UTF-8');?>

<?php
  /**
    * Funcao Autoload
    * Carrega a classe quando for instanciada
    * 
    * @param  $classe     Classe a ser carregada
    * @return void
    */
    //Autoload
    function __autoload($classe)
    {
        $pastas = array('../app.widgets', '../app.ado', '../app.config', '../app.model', '../app.control','../app.view');
        foreach ($pastas as $pasta)
        {
            if (file_exists("{$pasta}/{$classe}.php"))
            {
                include_once "{$pasta}/{$classe}.php";
            }
        }
    }

  /**
   * controladorConfiguracoes.php
   * controlador Configurações
   *
   * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
   * @version 1.0     
   */
    error_reporting(E_WARNING);

    $controlador                    = new controladorManual();

    $controlador->manual            = new tbManual();

    $controlador->manual->codigo    = $_POST['codigo'];
    $controlador->manual->funcao    = $_POST['funcao'];
    $controlador->manual->titulo    = $_POST['titulo'];
    $controlador->manual->texto     = $_POST['texto'];
    $controlador->manual->imagem    = $_POST['imagem'];
    $controlador->manual->ativo     = $_POST['ativo'];

    $controlador->manual->store;
?>