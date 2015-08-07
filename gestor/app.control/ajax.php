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
    */
    error_reporting(E_WARNING);
    @session_start();

    //Obtem informação do que sera feito através do campo action
    $request = $_POST['request'];

    //Login
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

    //Apaga Imagem (Uploader)
    if($request == 'apagaImagem')
    {
        $controlador = new controladorArquivos();
        $ok = $controlador->apagaArquivo($_POST['imagem']);

        $imagens = scandir('../../app.view/img/');

        foreach ($imagens as $file) 
        {
            if(!is_dir('../../app.view/img/'.$file))
                echo 
                    "
                        <div class='2u uploaderBox'>
                            <div class='uploaderImg'>
                                <img src='../../app.view/img/{$file}'>
                            </div>
                            <input 
                                type='button' 
                                name='selecionar' 
                                id='selecionar' 
                                class='uploaderSelecionar' 
                                value='Selecionar' 
                                onclick=\"selecionaImagem('../../app.view/img/{$file}');\"
                            ><br/>
                            <input 
                                type='button' 
                                name='excluir' 
                                id='excluir' 
                                class='uploaderExcluir' 
                                value='Excluir' 
                                onclick=\"excluirImagem('../../app.view/img/{$file}');\"
                            >
                        </div>
                    ";
        }

        if($ok == false)
            echo "<script>alert('Houve falhas ao apagar o arquivo!');</script>";
    }

    //Salva Paginas
    if($request == 'salvaPaginas')
    {   
        $controlador                        = new controladorPaginas();
        $controlador->pagina                = new tbPaginas();

        $controlador->pagina->codigo        = $_POST['codigo'];
        $controlador->pagina->imagem        = $_POST['imagem'];
        $controlador->pagina->titulo        = $_POST['titulo'];
        $controlador->pagina->descricao     = $_POST['descricao'];
        $controlador->pagina->localizacao   = $_POST['localizacao'];
        $controlador->pagina->texto         = $_POST['texto'];
        $controlador->pagina->ativo         = $_POST['ativo'];

        echo $controlador->pagina->store();
    }

    //Salva Banner
    if($request == 'salvaBanner')
    {
        $controlador                        = new controladorBanners();

        $controlador->banner                = new tbBanners();

        $controlador->banner->codigo        = $_POST['codigo'];
        $controlador->banner->imagem        = $_POST['imagem'];
        $controlador->banner->titulo        = $_POST['titulo'];
        $controlador->banner->descricao     = $_POST['descricao'];
        $controlador->banner->ativo         = $_POST['ativo'];

        echo $controlador->banner->store();
    }

    //Salva Usuario
    if($request == 'salvaUsuario')
    {
        $controlador                    = new controladorUsuario();

        $controlador->usuario           = new tbUsuarios();

        $controlador->usuario->codigo   = $_POST['codigo'];
        $controlador->usuario->nome     = $_POST['nome'];
        $controlador->usuario->email    = $_POST['email'];
        
        if(isset($_POST['senha']))
            $controlador->usuario->senha    = $_POST['senha'];
        if(isset($_POST['administrador']));
            $controlador->usuario->administrador = $_POST['administrador'];
        if(isset($_POST['ativo']))
            $controlador->usuario->ativo    = $_POST['ativo'];

        if($_POST['codigo'] == $_SESSION['usuario']->codigo)
            $_SESSION['usuario'] = $controlador->usuario;

        echo $controlador->usuario->store();
    }

    //Salva Localizacao
    if($request == 'salvaLocalizacao')
    {
        $controlador                        = new controladorLocalizacao();

        $controlador->localizacao           = new tbLocalizacao();

        $controlador->localizacao->codigo   = $_POST['codigo'];
        $controlador->localizacao->nome     = $_POST['nome'];
        $controlador->localizacao->ativo    = $_POST['ativo'];
        
        echo $controlador->localizacao->store();
    }

    //Salva Video
    if($request == 'salvaVideos')
    {
        $controlador                    = new controladorVideos();
        $controlador->video             = new tbVideos();

        $video                          = $_POST['video'];

        if(strpos($video, '/watch?v=') > 0)
        {
            $url    = explode('/watch?v=', $video);
            $video  = 'https://www.youtube.com/embed/'.$url[1];
        }

        $controlador->video->codigo     = $_POST['codigo'];
        $controlador->video->titulo     = $_POST['titulo'];
        $controlador->video->descricao  = $_POST['descricao'];
        $controlador->video->video      = $video;
        $controlador->video->imagem     = $_POST['imagem'];
        $controlador->video->ativo      = $_POST['ativo'];
        
        echo $controlador->video->store();
    }

    //Altera Senha
    if($request == 'alteraSenha')
    {
        $senhaAntiga    = hash('sha512', $_POST['senhaAntiga']);
        $senhaNova      = hash('sha512', $_POST['senhaNova']);

        if($senhaAntiga == $_SESSION['usuario']->senha)
        {
            $controlador                    = new controladorUsuario();
            $controlador->usuario           = new tbUsuarios();

            $controlador->usuario->codigo   = $_SESSION['usuario']->codigo;
            $controlador->usuario->senha    = $senhaNova;

            if($controlador->usuario->store())
            {
                $_SESSION['usuario']->senha = $senhaNova;
                echo 'Senha alterada com sucesso!';
            }
        }
        else
            echo 'Senha antiga inválida!';
    }

    //Apaga item
    if($request == 'apagar')
    {
        $tabela         = $_POST['tabela'];
        $tabelaClass    = 'tb'. ucfirst($tabela);
        $codigo         = $_POST['codigo'];

        $object = new $tabelaClass;
        $object->delete($codigo);

        $listagem = new TList();

        if($tabela == 'paginas')
        {
            $listagem->setTituloPagina('Páginas');

            $listagem->addColumn('titulo');
            $listagem->addColumn('descricao');
            $listagem->addColumn('ativo');
        }
        else if($tabela == 'banners')
        {
            $listagem->setTituloPagina(ucfirst($tabela));
            
            $listagem->addColumn('titulo');
            $listagem->addColumn('descricao');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');
        }
        else if($tabela == 'usuarios')
        {
            $listagem->setTituloPagina('Usuários');

            $listagem->addColumn('nome');
            $listagem->addColumn('ativo');
        }
        else if($tabela == 'localizacao')
        {
            $listagem->setTituloPagina('Localização');

            $listagem->addColumn('nome');
            $listagem->addColumn('ativo');
        }
        else if($tabela == 'videos')
        {
            $listagem->setTituloPagina('Videos');

            $listagem->addColumn('titulo');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');
        }
        else
            $listagem->setTituloPagina(ucfirst($tabela));

        $listagem->addEntity($tabela);

        echo $listagem->show();
    }

    //Verifica Video do Youtube
    if($request == 'UrlCurta')
    {
        $controlador    = new controladorUtilidades();
        echo $controlador->unshorten_url($_POST['video']);
    }

    //Verifica Video do Youtube
    if($request == 'verificaYoutube')
    {
        $controlador    = new controladorUtilidades();
        $video          = $_POST['video'];

        if($controlador->isValidYoutubeURL($video))
            echo 1;
        else
            echo 0;
    }

    //Obtem a imagem do video
    if($request == 'getYoutubeThumb')
    {
        $video          = $_POST['video'];

        $controlador    = new controladorUtilidades();
        $id             = $controlador->getYoutubeId($video);

        echo "http://img.youtube.com/vi/{$id}/0.jpg";
    }
?>