<?php header('Content-type: text/html; charset=UTF-8'); ?>

<?php 
    /**
     * Funcao Autoload
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
    class TApplicatioN
    {
        /*
         *  Funcao run
         *  Carrega conteudo da pagina
         */
        static public function run()
        {
            //Suprimir Warnings
            //error_reporting(E_WARNING);
            
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
                $class = $_GET['class'];

                if (class_exists($class))
                {
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
                $pagina   = new home();
                ob_start();
                $pagina->show();
                $content  = ob_get_contents();
                ob_end_clean();       
            }

            /*
             *  Obtém as meta tags
             */
            $metatags = '';
            foreach ($_SESSION['metatags'] as $metatag) {
                $metatags .= $metatag."\n";
            }

            /*
             *  Susbstitui a string #CONTENT# e #METATAGS# pelo seu conteúdo
             */
            $site = $template;

            $site = str_replace('#CONTENT#', $content, $site);
            $site = str_replace('#METATAGS#', $metatags, $site);

            echo $site;
        }
    }

    TApplication::run();
?>