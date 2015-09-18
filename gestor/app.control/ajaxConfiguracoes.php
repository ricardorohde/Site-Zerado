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

    $controlador = new controladorConfiguracoes();
    if($controlador->salva
                            (
                                $_POST['logotipo'], 
                                $_POST['titulo'], 
                                $_POST['empresa'], 
                                $_POST['conteudo'], 
                                $_POST['dominio'], 
                                $_POST['descricao'],
                                $_POST['keywords'],
                                $_POST['endereco'],
                                $_POST['numero'],
                                $_POST['bairro'],
                                $_POST['cep'],
                                $_POST['cidade'],
                                $_POST['estado'],
                                $_POST['telefone']
                            ))
    {
        if(!empty($_FILES))
        {
            if((new controladorArquivos())->upload($_FILES['favicon']['tmp_name'],'../../app.view/img/favicon.ico'))
                echo "<script>alert('Configurações salvas com sucesso');//top.location='/home';</script>";
            else
                echo "<script>alert('Erro ao fazer o upload do favicon!');</script>";
        }
        else
            echo "<script>alert('Configurações salvas com sucesso');top.location='/home';</script>";
    }
    else
        echo "<script>alert('Erro ao salvar as configurações!');</script>";
?>