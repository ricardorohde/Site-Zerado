<?php header('Content-type: text/html; charset=UTF-8');?>

<?php
    /**
      * Função Autoload
      * Carrega a classe quando for instanciada
      * 
      * @global
      * @param  $classe     Classe a ser carregada
      * @return void
      */
    function __autoload($classe)
    {
        $pastas = array('app.widgets', 'app.ado', 'app.config', 'app.model', 'app.control','app.view');
        foreach ($pastas as $pasta)
        {
            if (file_exists("{$pasta}/{$classe}.php"))
            {
                include_once "{$pasta}/{$classe}.php";
            }
        }
    }

    /**
     * TApllication.php
     * Aplicacao Principal
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    class TApplication
    {
        /**
         * Funcao run
         * Carrega conteudo da pagina
         * 
         * @access  public
         * @return  void
         */
        static public function run()
        {
            //Suprimir Warnings
            //error_reporting(E_WARNING);

            new TSession(1); 

            //Não tem Usuario ativo
            if(!isset($_SESSION['usuario']))
            {
                $pagina 	= new login;
                $pagina->show();
            }
          	else
          	{
          		//$template = file_get_contents('app.view/template.class.php');
                  $template = new template;
                  ob_start(); 
                  $template->show();
                  $template = ob_get_contents();
                  ob_get_clean();
                  
                  $content = '';
                  /*
                   *  Se tiver parametros na URL, carrega a classe
                   */
                  if ($_GET)
                  {
                      $class = urldecode($_GET['class']);

                      if (class_exists($class))
                      {
                          if(isset($_GET['funcao']))
                          {
                              $funcao = $_GET['funcao'];
                              $class = $class.'_'.$funcao;

                              if (class_exists($class))       
                                $pagina = new $class;
                              else
                              {
                                  $pagina = new erro();
                                  $pagina->codigo = 404;
                                  ob_start();
                                  $pagina->show();
                                  $content = ob_get_contents();
                                  ob_end_clean();
                              }
                          }
                          else
                              $pagina = new $class;

                          ob_start();
                          $pagina->show();
                          $content = ob_get_contents();
                          ob_end_clean();
                      }
                      else
                      {
                          $pagina = new erro();
                          $pagina->codigo = 404;
                          ob_start();
                          $pagina->show();
                          $content = ob_get_contents();
                          ob_end_clean();
                      }
                  }
                  /*
                   * Caso nao tenha parametros na URL, carreaga padrao
                   */
                  else
                  {
                      $pagina   = new home;
                      ob_start();
                      $pagina->show();
                      $content  = ob_get_contents();
                      ob_end_clean();       
                  }
                  
                  /*
                   *  Susbstitui a string #CONTENT# do template para a pagina principal
                   */
                  $site = str_replace('#CONTENT#', $content, $template);
                  echo $site;
          	}
        }
    }

    TApplication::run();
?>

