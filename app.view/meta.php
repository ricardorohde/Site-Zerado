<?php
    if(!isset($_SESSION['configuracoes']))
    {
        $controladorConfiguracoes  = new controladorConfiguracoes();
        $_SESSION['configuracoes'] = $controladorConfiguracoes->getConfiguracoes();
    }

    if(isset($_GET['class']))
    {
       $titulo = ucfirst($_GET['class']);

       if(isset($_GET['desc']))
       {
            $descricao = (new controladorUrl())->corrigeUrlAmigavel($_GET['desc']);

            $titulo .= ' - '.$descricao;
       }

        $titulo .= ' - '.$_SESSION['configuracoes']->titulo;
    }
    else
       $titulo = $_SESSION['configuracoes']->titulo;

    $_SESSION['metatags'] = array(
        'title'                         => '<title><?php echo  $titulo; ?></title>',

        'icon'                          => '<link rel="icon"                    href="/app.view/img/favicon.ico" type="image/x-icon" />',
        'shortcut'                      => '<link rel="shortcut icon"           href="/app.view/img/favicon.ico" type="image/x-icon" />',

        'description'                   => "<meta name='description'            content='{$_SESSION['configuracoes']->descrica}' />",
        'keywords'                      => "<meta name='keywords'               content='{$_SESSION['configuracoes']->keyword}' />",
        'title'                         => "<meta name='title'                  content='{$titulo}'/>",
        'url'                           => "<meta name='url'                    content='{$_SESSION['configuracoes']->dominio}' /> ",
        'VW96_OBJECT_TYPE'              => "<meta http-equiv='VW96.OBJECT TYPE' content='{$_SESSION['configuracoes']->keywords}' /> ",
        'og_title'                      => "<meta property='og:title'           content='{$_SESSION['configuracoes']->descricao} - {$_SESSION['configuracoes']->empresa}' />",
        'og_description'                => "<meta property='og:description'     content='{$_SESSION['configuracoes']->descricao} - {$_SESSION['configuracoes']->conteudo} - {$_SESSION['configuracoes']->empresa}' />",
        'og_image'                      => "<meta property='og:image'           content='{$_SESSION['configuracoes']->logotipo}' />",
        'og_url'                        => "<meta property='og:url'             content='{$_SESSION['configuracoes']->dominio}' />",
        'og_type'                       => "<meta property='og:type'            content='{$_SESSION['configuracoes']->conteudo}' />",
        'og_site_name'                  => "<meta property='og:site_name'       content='{$_SESSION['configuracoes']->empresa}' />",
        'itemprop_name'                 => "<meta itemprop='name'               content='{$_SESSION['configuracoes']->empresa}' />",
        'itemprop_description'          => "<meta itemprop='description'        content='{$_SESSION['configuracoes']->descricao}' />",
        'itemprop_image'                => "<meta itemprop='image'              content='{$_SESSION['configuracoes']->logotipo}' />",

        'charset'                       => '<meta charset="UTF-8" />',
        'author'                        => '<meta name="author"                 content="Rogério Pereira"/> ',
        'copyright'                     => '<meta name="copyright"              content="Rogério Pereira"/> ',
        'generator'                     => '<meta name="generator"              content="Rogério Pereira"/> ',
        'http-equiv_Content-Type'       => '<meta http-equiv="Content-Type"     content="text/html; charset=utf-8" />',
        'http-equiv_Expires'            => '<meta http-equiv="Expires"          content="none" />',
        'http-equiv_X-UA-Compatible'    => '<meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1" />',
        'GENERATOR'                     => '<meta name="GENERATOR"              content="MSHTML 6.00.3790.3959" />',
        'og_locale'                     => '<meta property="og:locale"          content="pt_BR" />',
        'Robots'                        => '<meta name="Robots"                 content="all" />',
        'DISTRIBUTION'                  => '<meta name="DISTRIBUTION"           content="GLOBAL"/> ',
        'RATING'                        => '<meta name="RATING"                 content="General, HTML" />',
        '"REVISIT-AFTER'                => '<meta name="REVISIT-AFTER"          content="7 days" />',
        'Audience'                      => '<meta name="Audience"               content="All" />',
        'language'                      => '<meta name="language"               content="Portuguese, english" /> ',
        'viewport'                      => '<meta name="viewport"               content="width=device-width, initial-scale=1.0" />'
    );
?>

#METATAGS#