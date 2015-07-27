<?php 
	session_start();
	header("Content-Type:text/html; charset=UTF-8",true) 
?>

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
   * ajax.php
   * Destino de todos os formularios
   *
   * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
   * @version 1.0     
   * @access  public
   */
	error_reporting(E_WARNING);
	
	//Obtem informação do que sera feito através do campo action
	$request = $_POST['request'];
	
	if($request == 'login')
  {
    $controladorLogin = new controladorLogin($_POST['email'], $_POST['senha']);
    $retorno          = $controladorLogin->login();

    if($retorno == true)
    {
      return true;
    }
    else
    {
      echo "Falha ao fazer login";
      session_destroy();
    }
  }
?>