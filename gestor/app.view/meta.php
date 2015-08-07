<?php
    /**
     * meta.php
     * Meta Tags
     *
     * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
     * @version 1.0   
    */

    $controladorConfiguracoes   = new controladorConfiguracoes();
    $configuracoes              = $controladorConfiguracoes->getConfiguracoes();
    $_SESSION['dominio']        = $configuracoes->dominio;
?>
<title>Painel Administrativo - <?php echo $configuracoes->titulo; ?></title>

<link rel="icon"                    href="<?php echo $configuracoes->dominio; ?>app.view/img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon"           href="<?php echo $configuracoes->dominio; ?>app.view/img/favicon.ico" type="image/x-icon" />

<meta name="description"            content="<?php echo $configuracoes->descricao; ?>" />
<meta name="keywords"               content="<?php echo $configuracoes->keywords; ?>"/>
<meta name="title"                  content="Painel Administrativo - <?php echo $configuracoes->titulo; ?>"/> 
<meta name="url"                    content="<?php echo $configuracoes->dominio; ?>"/> 
<meta http-equiv="VW96.OBJECT TYPE"	content="<?php echo $configuracoes->keywords; ?>"/> 
<meta property="og:title"           content="<?php echo $configuracoes->descricao.' - '.$configuracoes->empresa; ?>" />
<meta property="og:description"     content="<?php echo $configuracoes->descricao.' - '.$configuracoes->conteudo.' - '.$configuracoes->empresa; ?>" />
<meta property="og:image"           content="<?php echo $configuracoes->logotipo; ?>" />
<meta property="og:url"             content="<?php echo $configuracoes->dominio; ?>" />
<meta property="og:type"            content="<?php echo $configuracoes->conteudo; ?>" />
<meta property="og:site_name"       content="<?php echo $configuracoes->empresa; ?>" />
<meta itemprop="name"               content="<?php echo $configuracoes->empresa; ?>" />
<meta itemprop="description"        content="<?php echo $configuracoes->descricao; ?>" />
<meta itemprop="image"              content="<?php echo $configuracoes->logotipo; ?>"/>


<meta name="author"                 content="Rogério Pereira"/> 
<meta name="copyright"              content="Rogério Pereira"/> 
<meta name="generator"              content="Rogério Pereira"/> 
<meta http-equiv="Content-Type"     content="text/html; charset=utf-8">
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