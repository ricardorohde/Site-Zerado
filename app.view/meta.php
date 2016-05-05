<?php
    if(!isset($_SESSION['configuracoes']))
    {
        $controladorConfiguracoes   = new controladorConfiguracoes();
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

    /*
     * TAGS QUE PRECISAM ALTERAR DENTRO DO BODY
     *      title,
     *      meta_description
     *      meta_keywords
     *      meta_title
     *      og_title
     *      og_description
     *      itemprop_description
     */
    $_SESSION['metatags'] = array(
        "title"                         => "<title>{$titulo}</title>",
        "charset"                       => "<meta charset='UTF-8' />",

        "link_icon"                     => "<link rel='icon' href='/app.view/img/favicon.ico' type='image/x-icon' />",
        "link_shortcut_icon"            => "<link rel='shortcut icon' href='/app.view/img/favicon.ico' type='image/x-icon' />",

        "meta_description"              => "<meta name='description' content='{$_SESSION['configuracoes']->descricao}' />",
        "meta_keywords"                 => "<meta name='keywords' content='{$_SESSION['configuracoes']->keywords}' />",
        "meta_title"                    => "<meta name='title' content='{$titulo}'/>",
        "meta_url"                      => "<meta name='url' content='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}' />",
        "meta_name"                     => "<meta itemprop='name' content='{$_SESSION['configuracoes']->empresa}' />",
        "meta_author"                   => "<meta name='author' content='Rogério Pereira' />",
        "meta_copyright"                => "<meta name='copyright' content='Rogério Pereira' />",
        "meta_generator"                => "<meta name='generator' content='Rogério Pereira' />",
        "meta_GENERATOR"                => "<meta name='GENERATOR' content='MSHTML 6.00.3790.3959' />",
        "meta_Robots"                   => "<meta name='Robots' content='all'/>",
        "meta_DISTRIBUTION"             => "<meta name='DISTRIBUTION' content='GLOBAL' />",
        "meta_RATING"                   => "<meta name='RATING' content='General, HTML' />",
        "meta_REVISIT-AFTER"            => "<meta name='REVISIT-AFTER' content='7 days' />",
        "meta_Audience"                 => "<meta name='Audience' content='All' />",
        "meta_language"                 => "<meta name='language'content='Portuguese' />",
        "meta_viewport"                 => "<meta name='viewport' content='width=device-width, initial-scale=1.0' />",
        
        "og_title"                      => "<meta property='og:title' content='{$_SESSION['configuracoes']->descricao} - {$_SESSION['configuracoes']->empresa}' />",
        "og_description"                => "<meta property='og:description' content='{$_SESSION['configuracoes']->descricao} - {$_SESSION['configuracoes']->conteudo} - {$_SESSION['configuracoes']->empresa}' />",
        "og_image"                      => "<meta property='og:image' content='{$_SESSION['configuracoes']->logotipo}' />",
        "og_url"                        => "<meta property='og:url'content='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}'/>",
        "og_type"                       => "<meta property='og:type' content='{$_SESSION['configuracoes']->conteudo}' />",
        "og_site_name"                  => "<meta property='og:site_name' content='{$_SESSION['configuracoes']->empresa}' />",
        "og_locale"                     => "<meta property='og:locale' content='pt_BR' />",
        
        "itemprop_description"          => "<meta itemprop='description' content='{$_SESSION['configuracoes']->descricao}' />",
        "itemprop_image"                => "<meta itemprop='image' content='{$_SESSION['configuracoes']->logotipo}' />",

        "http-equiv_Content-Type"       => "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />",
        "http-equiv_Expires"            => "<meta http-equiv='Expires' content='none' />",
        "http-equiv_X-UA-Compatible"    => "<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />",
        "http-equiv_VW96.OBJECT_TYPE"   => "<meta http-equiv='VW96.OBJECT TYPE' content='{$_SESSION['configuracoes']->keywords}' />"
    );
?>

#METATAGS#