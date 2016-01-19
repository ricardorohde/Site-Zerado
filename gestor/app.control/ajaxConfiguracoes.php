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
   * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
   * @version 1.0     
   */
    error_reporting(E_WARNING);

    $controlador                                = new controladorConfiguracoes();

    $controlador->configuracao                  = new tbConfiguracoes();

    $controlador->configuracao->codigo          = 1;
    $controlador->configuracao->logotipo        = $_POST['logotipo'];
    $controlador->configuracao->titulo          = $_POST['titulo'];
    $controlador->configuracao->empresa         = $_POST['empresa'];
    $controlador->configuracao->conteudo        = $_POST['conteudo'];
    $controlador->configuracao->dominio         = $_POST['dominio'];
    $controlador->configuracao->descricao       = $_POST['descricao'];
    $controlador->configuracao->keywords        = $_POST['keywords'];
    $controlador->configuracao->endereco        = $_POST['endereco'];
    $controlador->configuracao->numero          = $_POST['numero'];
    $controlador->configuracao->bairro          = $_POST['bairro'];
    $controlador->configuracao->cep             = $_POST['cep'];
    $controlador->configuracao->cidade          = $_POST['cidade'];
    $controlador->configuracao->estado          = $_POST['estado'];
    $controlador->configuracao->facebookPage    = $_POST['facebookPage'];

    if($controlador->configuracao->store())
    {
        if(!empty($_FILES))
        {
            if((new controladorArquivos())->upload($_FILES['favicon']['tmp_name'],'../../app.view/img/favicon.ico'))
                echo "<script>alert('Configurações salvas com sucesso');top.location='/home';</script>";
            else
                echo "<script>alert('Erro ao fazer o upload do favicon!');</script>";
        }
        else
            echo "<script>alert('Configurações salvas com sucesso');top.location='/home';</script>";
    }
    else
        echo "<script>alert('Erro ao salvar as configurações!');</script>";
?>