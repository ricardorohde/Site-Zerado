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
?>
<title><?php echo  $titulo; ?></title>

<link rel="icon"                    href="/app.view/img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon"           href="/app.view/img/favicon.ico" type="image/x-icon" />

<meta name="description"            content="<?php echo  $_SESSION['configuracoes']->descricao; ?>" />
<meta name="keywords"               content="<?php echo  $_SESSION['configuracoes']->keywords; ?>"/>
<meta name="title"                  content="<?php echo  $titulo; ?>"/>
<meta name="url"                    content="<?php echo  $_SESSION['configuracoes']->dominio; ?>"/> 
<meta http-equiv="VW96.OBJECT TYPE"	content="<?php echo  $_SESSION['configuracoes']->keywords; ?>"/> 
<meta property="og:title"           content="<?php echo  $_SESSION['configuracoes']->descricao.' - '. $_SESSION['configuracoes']->empresa; ?>" />
<meta property="og:description"     content="<?php echo  $_SESSION['configuracoes']->descricao.' - '. $_SESSION['configuracoes']->conteudo.' - '. $_SESSION['configuracoes']->empresa; ?>" />
<meta property="og:image"           content="<?php echo  $_SESSION['configuracoes']->logotipo; ?>" />
<meta property="og:url"             content="<?php echo  $_SESSION['configuracoes']->dominio; ?>" />
<meta property="og:type"            content="<?php echo  $_SESSION['configuracoes']->conteudo; ?>" />
<meta property="og:site_name"       content="<?php echo  $_SESSION['configuracoes']->empresa; ?>" />
<meta itemprop="name"               content="<?php echo  $_SESSION['configuracoes']->empresa; ?>" />
<meta itemprop="description"        content="<?php echo  $_SESSION['configuracoes']->descricao; ?>" />
<meta itemprop="image"              content="<?php echo  $_SESSION['configuracoes']->logotipo; ?>"/>


<meta charset='UTF-8' />
<meta name="author"                 content="Rogério Pereira"/> 
<meta name="copyright"              content="Rogério Pereira"/> 
<meta name="generator"              content="Rogério Pereira"/> 
<meta http-equiv="Content-Type"     content="text/html; charset=utf-8" />
<meta http-equiv="Expires"          content="none"/>
<meta http-equiv="X-UA-Compatible"  content="IE=edge,chrome=1" />
<meta name="GENERATOR"              content="MSHTML 6.00.3790.3959"/>
<meta property="og:locale"          content="pt_BR" />
<meta name="Robots"                 content="all"/>
<meta name="DISTRIBUTION"           content="GLOBAL"/> 
<meta name="RATING"                 content="General, HTML"/>
<meta name="REVISIT-AFTER"          content="7 days"/>
<meta name="Audience"               content="All"/>
<meta name="language"               content="Portuguese, english"/> 
<meta name="viewport"               content="width=device-width, initial-scale=1.0"/>