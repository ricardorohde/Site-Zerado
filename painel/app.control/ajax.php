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
    * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
    * @version 1.0
    */
    //error_reporting(E_WARNING);
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
            $funcoes                    = new tbFuncoes();
            $_SESSION['funcoes']        = $funcoes->load(1);
            return true;
        }
        else
        {
            echo "Falha ao fazer login";
            @session_destroy();
        }
    }

    //Apaga Imagem (Uploader)
    if($request == 'apagaImagem')
    {
        $controlador    = new controladorArquivos();
        $ok             = $controlador->apagaArquivo($_POST['imagem']);
        $category       = $_POST['category'];

        $imagens        = scandir("../../app.view/img/");

        foreach ($imagens as $file)
        {
            if(!is_dir("../../app.view/img/".$file))
            {
                echo
                    "
                        <div class='2u uploaderBox'>
                            <div class='uploaderImg'>
                                <img src='{$_SESSION['configuracoes']->dominio}/app.view/img/{$file}'>
                            </div>
                            <div class='center'>
                    ";
                if($category != 'gallery')
                    echo
                        "
                            <input
                                type='button'
                                name='selecionar'
                                id='selecionar'
                                class='uploaderSelecionar'
                                value='Selecionar'
                                onclick=\"selecionaImagem('{$_SESSION['configuracoes']->dominio}/app.view/img/{$file}');\"
                            >
                        ";
                else
                    echo
                        "
                            <input
                                type='checkbox'
                                name='imagens[]'
                                class='checkImagensSelecionadas'
                                value='{$_SESSION['configuracoes']->dominio}/app.view/img/{$file}'
                            />
                        ";
                echo
                    "
                                <input
                                    type='button'
                                    name='excluir'
                                    id='excluir'
                                    class='uploaderExcluir'
                                    value='Excluir'
                                    onclick=\"excluirImagem('../../app.view/img/{$file}', '{$category}');\"
                                >
                            </div>
                        </div>
                    ";
            }
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

        $result                             = $controlador->pagina->store();

        if($result == 1)
        {
            if($_POST['codigo'] == '')
                $codigo = $controlador->pagina->getLast();
            else
                $codigo = $_POST['codigo'];

            $controladorGaleria = new controladorGaleria();
            $controladorGaleria->repository->addEntity('galeriaimagens');

            $criteria = new TCriteria();
            $criteria->addFilter('codigoPagina', '=', $codigo);

            $controladorGaleria->repository->deleteFisico($criteria);

            $imagens    = $_POST['imagens'];
            $imagens    = explode('³', $imagens);

            $erros      = 0;

            if(count($imagens) > 1)
            {
                foreach ($imagens as $imagem)
                {
                    $imagem = explode('²', $imagem);

                    if  (
                            ($imagem[0] != '' &&    $imagem[0] != NULL    &&    $imagem[0] != 'undefined') &&
                            ($imagem[3] != '' &&    $imagem[3] != NULL    &&    $imagem[3] != 'undefined')
                        )
                    {
                        $controladorGaleria->galeria                    = new tbGaleriaImagens();

                        $controladorGaleria->galeria->codigoPagina      = $codigo;
                        $controladorGaleria->galeria->imagem            = $imagem[0];
                        $controladorGaleria->galeria->titulo            = $imagem[1];
                        $controladorGaleria->galeria->descricao         = $imagem[2];
                        $controladorGaleria->galeria->ordem             = $imagem[3];

                        if($controladorGaleria->galeria->store() == 0)
                            $erros++;
                    }
                }
            }

            if($erros == 0)
                echo 1;
            else
                echo 'erro '.$erros;
        }
        else
            echo 'erro 0';
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

    //Salva Portifólio
    if($request == 'salvaPortifolio')
    {
        $controlador                            = new controladorPortifolio();

        $controlador->portifolio                = new tbPortifolio();

        $controlador->portifolio->codigo        = $_POST['codigo'];
        $controlador->portifolio->imagem        = $_POST['imagem'];
        $controlador->portifolio->titulo        = $_POST['titulo'];
        $controlador->portifolio->descricao     = $_POST['descricao'];
        $controlador->portifolio->url           = $_POST['url'];
        $controlador->portifolio->ativo         = $_POST['ativo'];

        echo $controlador->portifolio->store();
    }

    //Salva Configuracao PagSeguro
    if($request == 'salvaConfiguracaoPagSeguro')
    {
        $controlador                                        = new controladorConfiguracoes();
        $controlador->configuracao                          = new tbConfiguracoes();

        $controlador->configuracao->codigo                  = 1;
        $controlador->configuracao->emailPagSeguro          = $_POST['email'];
        $controlador->configuracao->tokenPagSeguro          = $_POST['token'];
        $controlador->configuracao->emailPagSeguroSandbox   = $_POST['emailSandbox'];
        $controlador->configuracao->tokenPagSeguroSandbox   = $_POST['tokenSandbox'];
        $controlador->configuracao->sandboxPagSeguro        = $_POST['sandbox'] == 'true' ? 1 : 0;

        echo $controlador->configuracao->store();
    }

    //Salva Categoria Produtos
    if($request == 'salvaCategoriaProdutos')
    {
        $controlador                                = new controladorProdutos();

        $controlador->categoriaProduto              = new tbCategoriaProdutos();

        $controlador->categoriaProduto->codigo      = $_POST['codigo'];
        $controlador->categoriaProduto->categoria   = $_POST['categoria'];
        $controlador->categoriaProduto->ativo       = $_POST['ativo'];

        echo $controlador->categoriaProduto->store();
    }

    //Salva Subcategoria Produtos
    if($request == 'salvaSubcategoriaProdutos')
    {
        $controlador                                        = new controladorProdutos();

        $controlador->subcategoriasProduto                  = new tbSubCategoriaProdutos();

        $controlador->subcategoriasProduto->codigo          = $_POST['codigo'];
        $controlador->subcategoriasProduto->categoria       = $_POST['categoria'];
        $controlador->subcategoriasProduto->subCategoria    = $_POST['subcategoria'];
        $controlador->subcategoriasProduto->ativo           = $_POST['ativo'];

        echo $controlador->subcategoriasProduto->store();
    }

    //Salva Produtos
    if($request == 'salvaProdutos')
    {
        $controlador            = new controladorProdutos();
        $controlador->produto   = new tbProdutos();

        $video                  = $_POST['video'];

        if(strpos($video, '/watch?v=') > 0)
        {
            $url    = explode('/watch?v=', $video);
            $video  = 'https://www.youtube.com/embed/'.$url[1];
        }

        $controlador->produto->codigo           = $_POST['codigo'];
        $controlador->produto->nome             = $_POST['nome'];
        $controlador->produto->valor            = $_POST['valor'];
        $controlador->produto->peso             = $_POST['peso'];
        $controlador->produto->estoque          = $_POST['estoque'];
        $controlador->produto->categoria        = $_POST['categoria'];
        $controlador->produto->subCategoria     = $_POST['subCategoria'];
        $controlador->produto->video            = $video;
        $controlador->produto->imagemVideo      = $_POST['imagemVideo'];
        $controlador->produto->descricao        = $_POST['descricao'];
        $controlador->produto->ativo            = $_POST['ativo'];

        $result = $controlador->produto->store();

        if($result == 1)
        {
            if($_POST['codigo'] == '')
                $codigo = $controlador->produto->getLast();
            else
                $codigo = $_POST['codigo'];

            //IMAGENS
            $controladorGaleria = new controladorGaleria();
            $controladorGaleria->apagaGaleriaFisico('codigoProduto', $codigo);

            $imagens    = $_POST['imagens'];
            $imagens    = explode('³', $imagens);

            $erros      = 0;

            if(count($imagens) > 1)
            {
                foreach ($imagens as $imagem)
                {
                    $imagem = explode('²', $imagem);

                    if  (
                            ($imagem[0] != '' &&    $imagem[0] != NULL    &&    $imagem[0] != 'undefined') &&
                            ($imagem[1] != '' &&    $imagem[1] != NULL    &&    $imagem[1] != 'undefined') &&
                            ($imagem[2] != '' &&    $imagem[2] != NULL    &&    $imagem[2] != 'undefined') &&
                            ($imagem[3] != '' &&    $imagem[3] != NULL    &&    $imagem[3] != 'undefined')
                        )
                    {
                        $controladorGaleria->galeria                    = new tbGaleriaImagens();

                        $controladorGaleria->galeria->codigoProduto     = $codigo;
                        $controladorGaleria->galeria->imagem            = $imagem[0];
                        $controladorGaleria->galeria->titulo            = $imagem[1];
                        $controladorGaleria->galeria->descricao         = $imagem[2];
                        $controladorGaleria->galeria->ordem             = $imagem[3];

                        if($controladorGaleria->galeria->store() == 0)
                            $erros++;
                    }
                }
            }

            //Cores
            $controlador->apagaCoresFisico($codigo);

            $cores = $_POST['cores'];
            $cores = explode('¬', $cores);

            if(count($cores) >= 1) {
                foreach ($cores as $cor) {
                    if  ($cor != '' &&    $cor != NULL    &&    $cor != 'undefined') {
                        $controlador->cor                   = new tbProdutosCores();

                        $controlador->cor->codigoProduto    = $codigo;
                        $controlador->cor->cor              = $cor;

                        if($controlador->cor->store() == 0)
                            $erros++;
                    }
                }
            }

            if($erros == 0)
                echo 1;
            else
                echo 'erro '.$erros;
        }
        else
            echo 'erro 0';
    }

    //Salva Venda
    if($request == 'salvaVenda')
    {
        $controlador                        = new controladorVendas();
        $controlador->produto               = new tbVendas();

        $controlador->venda->codigo         = $_POST['codigo'];
        $controlador->venda->status         = $_POST['nome'];
        $controlador->venda->codigoRastreio = $_POST['valor'];

        echo $controlador->venda->store();
    }

    //Salva Situação dos imóveis
    if($request == 'salvaSituacaoImoveis')
    {
        $controlador                        = new controladorSituacaoImoveis();

        $controlador->situacao              = new tbSituacaoImoveis();

        $controlador->situacao->codigo      = $_POST['codigo'];
        $controlador->situacao->situacao    = $_POST['situacao'];
        $controlador->situacao->ativo       = $_POST['ativo'];

        echo $controlador->situacao->store();
    }

    //Salva Categoria dos imóveis
    if($request == 'salvaCategoriaImoveis')
    {
        $controlador                        = new controladorCategoriaImoveis();

        $controlador->categoria             = new tbCategoriaImoveis();

        $controlador->categoria->codigo     = $_POST['codigo'];
        $controlador->categoria->categoria  = $_POST['categoria'];
        $controlador->categoria->ativo      = $_POST['ativo'];

        echo $controlador->categoria->store();
    }

    //Salva Categoria dos imóveis
    if($request == 'salvaCidadeImoveis')
    {
        $controlador                    = new controladorCidadeImoveis();

        $controlador->cidade            = new tbCidadeImoveis();

        $controlador->cidade->codigo    = $_POST['codigo'];
        $controlador->cidade->cidade    = $_POST['cidade'];
        $controlador->cidade->imagem    = $_POST['imagem'];
        $controlador->cidade->ativo     = $_POST['ativo'];

        echo $controlador->cidade->store();
    }

    //Salva Imóveis
    if($request == 'salvaImoveis')
    {
        $controlador                                = new controladorImoveis();

        $controlador->imovel                        = new tbImoveis();

        $controlador->imovel->codigo                = $_POST['codigo'];
        $controlador->imovel->codigoInterno         = $_POST['codigoInterno'];
        $controlador->imovel->corretor              = $_POST['corretor'];
        $controlador->imovel->proprietario          = $_POST['proprietario'];
        $controlador->imovel->telefoneProprietario  = $_POST['telefoneProprietario'];
        $controlador->imovel->situacao              = $_POST['situacao'];
        $controlador->imovel->categoria             = $_POST['categoria'];
        $controlador->imovel->categoriaAluguel      = $_POST['categoriaAluguel'];
        $controlador->imovel->preco                 = $_POST['preco'];
        $controlador->imovel->quartos               = $_POST['quartos'];
        $controlador->imovel->destaque              = $_POST['destaque'];
        $controlador->imovel->ativo                 = $_POST['ativo'];
        $controlador->imovel->endereco              = $_POST['endereco'];
        $controlador->imovel->numero                = $_POST['numero'];
        $controlador->imovel->complemento           = $_POST['complemento'];
        $controlador->imovel->bairro                = $_POST['bairro'];
        $controlador->imovel->cep                   = $_POST['cep'];
        $controlador->imovel->cidade                = $_POST['cidade'];
        $controlador->imovel->estado                = $_POST['estado'];
        $controlador->imovel->metragemFrente        = $_POST['metragemFrente'];
        $controlador->imovel->metragemFundos        = $_POST['metragemFundos'];
        $controlador->imovel->metragemEsquerda      = $_POST['metragemEsquerda'];
        $controlador->imovel->metragemDireita       = $_POST['metragemDireita'];
        $controlador->imovel->metragemConstrucao    = $_POST['metragemConstrucao'];
        $controlador->imovel->descricao             = $_POST['descricao'];

        $result = $controlador->imovel->store();

        if($result == 1)
        {
            if($_POST['codigo'] == '')
                $codigo = $controlador->imovel->getLast();
            else
                $codigo = $_POST['codigo'];

            $controladorGaleria = new controladorGaleria();
            $controladorGaleria->repository->addEntity('galeria');

            $criteria = new TCriteria();
            $criteria->addFilter('codigoImovel', '=', $codigo);

            $controladorGaleria->repository->deleteFisico($criteria);

            $imagens    = $_POST['imagens'];
            $imagens    = explode('³', $imagens);

            $erros      = 0;

            if(count($imagens) > 1)
            {
                foreach ($imagens as $imagem)
                {
                    $imagem = explode('²', $imagem);

                    if  (
                            ($imagem[0] != '' &&    $imagem[0] != NULL    &&    $imagem[0] != 'undefined') &&
                            ($imagem[1] != '' &&    $imagem[1] != NULL    &&    $imagem[1] != 'undefined') &&
                            ($imagem[2] != '' &&    $imagem[2] != NULL    &&    $imagem[2] != 'undefined') &&
                            ($imagem[3] != '' &&    $imagem[3] != NULL    &&    $imagem[3] != 'undefined')
                        )
                    {
                        $controladorGaleria->galeria                    = new tbGaleria();

                        $controladorGaleria->galeria->codigoImovel      = $codigo;
                        $controladorGaleria->galeria->imagem            = $imagem[0];
                        $controladorGaleria->galeria->titulo            = $imagem[1];
                        $controladorGaleria->galeria->descricao         = $imagem[2];
                        $controladorGaleria->galeria->ordem             = $imagem[3];

                        if($controladorGaleria->galeria->store() == 0)
                            $erros++;
                    }
                }
            }

            if($erros == 0)
                echo 1;
            else
                echo 'erro '.$erros;
        }
        else
            echo 'erro 0';
    }

    //Salva Depoimentos
    if($request == 'salvaDepoimentos')
    {
        $controlador                            = new controladorDepoimentos;

        $controlador->depoimentos               = new tbDepoimentos();

        $controlador->depoimentos->codigo       = $_POST['codigo'];
        $controlador->depoimentos->imagem       = $_POST['imagem'];
        $controlador->depoimentos->nome         = $_POST['nome'];
        $controlador->depoimentos->empresa      = $_POST['empresa'];
        $controlador->depoimentos->depoimento   = $_POST['depoimento'];
        $controlador->depoimentos->ativo        = $_POST['ativo'];

        echo $controlador->depoimentos->store();
    }

    //Salva Telefones
    if($request == 'salvaTelefones')
    {
        $controlador                        = new controladorTelefones;

        $controlador->telefone              = new tbTelefones();

        $controlador->telefone->codigo      = $_POST['codigo'];
        $controlador->telefone->telefone    = $_POST['telefone'];
        $controlador->telefone->whatsapp    = $_POST['whatsapp'] == 'true' ? '1' : '0';
        $controlador->telefone->ativo       = $_POST['ativo'];

        echo $controlador->telefone->store();
    }

    //Salva E-mails
    if($request == 'salvaEmails')
    {
        $controlador                 = new controladorEmails;

        $controlador->email          = new tbEmails();

        $controlador->email->codigo  = $_POST['codigo'];
        $controlador->email->email   = $_POST['email'];
        $controlador->email->senha   = $_POST['senha'];
        $controlador->email->ativo   = $_POST['ativo'];

        echo $controlador->email->store();
    }

    //Salva catalogo de CLietnes
    if($request == 'salvaCatalogoClientes')
    {
        $controlador                            = new controladorCatalogoClientes();

        $controlador->catalogoClientes          = new tbCatalogoClientes();

        $controlador->catalogoClientes->codigo  = $_POST['codigo'];
        $controlador->catalogoClientes->imagem  = $_POST['imagem'];
        $controlador->catalogoClientes->nome    = $_POST['nome'];
        $controlador->catalogoClientes->ativo   = $_POST['ativo'];

        echo $controlador->catalogoClientes->store();
    }

    //Salva Eventos
    if($request == 'salvaEventos')
    {
        $controlador                    = new controladorEventos();

        $controlador->evento            = new tbEventos();

        $controlador->evento->codigo    = $_POST['codigo'];
        $controlador->evento->imagem    = $_POST['imagem'];
        $controlador->evento->titulo    = $_POST['titulo'];
        $controlador->evento->descricao = $_POST['descricao'];
        $controlador->evento->inicio    = $_POST['inicio'];
        $controlador->evento->fim       = $_POST['fim'];
        $controlador->evento->ativo     = $_POST['ativo'];

        echo $controlador->evento->store();
    }

    //Salva Funções
    if($request == 'salvaFuncoes')
    {
        $controlador                                = new controladorFuncoes;

        $controlador->funcoes                       = new tbFuncoes();

        $controlador->funcoes->codigo               = 1;
        $controlador->funcoes->banner               = $_POST['banner']              == 'true' ? 1 : 0;
        $controlador->funcoes->video                = $_POST['video']               == 'true' ? 1 : 0;
        $controlador->funcoes->galeria              = $_POST['galeria']             == 'true' ? 1 : 0;
        $controlador->funcoes->catalogo             = $_POST['catalogo']            == 'true' ? 1 : 0;
        $controlador->funcoes->ecommerce            = $_POST['ecommerce']           == 'true' ? 1 : 0;
        $controlador->funcoes->delivery             = $_POST['delivery']            == 'true' ? 1 : 0;
        $controlador->funcoes->imobiliaria          = $_POST['imobiliaria']         == 'true' ? 1 : 0;
        $controlador->funcoes->portifolio           = $_POST['portifolio']          == 'true' ? 1 : 0;
        $controlador->funcoes->depoimentos          = $_POST['depoimentos']         == 'true' ? 1 : 0;
        $controlador->funcoes->catalogoClientes     = $_POST['catalogoClientes']    == 'true' ? 1 : 0;
        $controlador->funcoes->eventos              = $_POST['eventos']    == 'true' ? 1 : 0;

        $retorno                                    = $controlador->funcoes->store();

        if($retorno == 1)
            $_SESSION['funcoes'] = $controlador->funcoes;

        echo $retorno;
    }

    //Altera Senha
    if($request == 'alteraSenha')
    {
        $senhaAntiga    = hash('sha512', $_POST['senhaAntiga']);
        $senhaNova      = $_POST['senhaNova'];

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
        if($tabela == 'categoriaprodutos')
            $tabelaClass    = 'tbCategoriaProdutos';
        else if($tabela == 'situacaoimoveis')
            $tabelaClass    = 'tbSituacaoImoveis';
        else if($tabela == 'categoriaimoveis')
            $tabelaClass    = 'tbCategoriaImoveis';
        else if($tabela == 'cidadeimoveis')
            $tabelaClass    = 'tbCidadeImoveis';
        else
            $tabelaClass    = 'tb'.ucfirst($tabela);
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

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'banners')
        {
            $listagem->setTituloPagina(ucfirst($tabela));

            $listagem->addColumn('titulo');
            $listagem->addColumn('descricao');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'usuarios')
        {
            $listagem->setTituloPagina('Usuários');

            $listagem->addColumn('nome');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'localizacao')
        {
            $listagem->setTituloPagina('Categoria Páginas');

            $listagem->addColumn('nome');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'videos')
        {
            $listagem->setTituloPagina('Videos');

            $listagem->addColumn('titulo');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'categoriaprodutos')
        {
            $listagem->setTituloPagina('Categoria Produtos');

            $listagem->addColumn('codigo');
            $listagem->addColumn('categoria');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'subcategoriaprodutos')
        {
            $listagem->setTituloPagina('Subcategoria Produtos');

            $listagem->addColumn('s.codigo');
            $listagem->addColumn('c.categoria');
            $listagem->addColumn('s.subcategoria');
            $listagem->addColumn('s.ativo');

            $listagem->addEntity('subcategoriaprodutos s');
            $listagem->addEntity('categoriaprodutos c');

            $criteria = new TCriteria();
            $criteria->addFilter('s.categoria', '=', 'c.codigo');
            $listagem->setCriteria($criteria);
        }
        else if($tabela == 'produtos')
        {
            $listagem->setTituloPagina('Produtos');

            $listagem->addColumn('p.codigo');
            $listagem->addColumn('p.nome');
            $listagem->addColumn('c.categoria');
            $listagem->addColumn('p.ativo');

            $listagem->addEntity('produtos p');
            $listagem->addEntity('categoriaprodutos c');

            $criteria = new TCriteria();
            $criteria->addFilter('p.categoria',     '=', 'c.codigo');
            $listagem->setCriteria($criteria);
        }
        else if($tabela == 'situacaoimoveis')
        {
            $listagem->setTituloPagina('Situação Imóveis');

            $listagem->addColumn('codigo');
            $listagem->addColumn('situacao');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'categoriaimoveis')
        {
            $listagem->setTituloPagina('Categoria Imóveis');

            $listagem->addColumn('codigo');
            $listagem->addColumn('categoria');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'cidadeimoveis')
        {
            $listagem->setTituloPagina('Cidade Imóveis');

            $listagem->addColumn('codigo');
            $listagem->addColumn('cidade');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'imoveis')
        {
            $listagem->setTituloPagina('Imóveis');

            $listagem->addColumn('i.codigo');
            $listagem->addColumn('c.categoria');
            $listagem->addColumn('i.endereco');
            $listagem->addColumn('i.numero');
            $listagem->addColumn('i.bairro');
            $listagem->addColumn('i.cidade');
            $listagem->addColumn('i.preco');
            $listagem->addColumn('s.situacao');
            $listagem->addColumn('i.ativo');

            $listagem->addEntity('imoveis i');
            $listagem->addEntity('categoriaImoveis c');
            $listagem->addEntity('situacaoImoveis s');

            $criteria = new TCriteria();
            $criteria->addFilter('c.codigo', '=', 'i.categoria');
            $criteria->addFilter('s.codigo', '=', 'i.situacao');
            $listagem->setCriteria($criteria);
        }
        else if($tabela == 'portifolio')
        {
            $listagem->setTituloPagina('Portifólio');

            $listagem->addColumn('codigo');
            $listagem->addColumn('imagem');
            $listagem->addColumn('titulo');
            $listagem->addColumn('url');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'depoimentos')
        {
            $listagem->setTituloPagina('Depoimentos');

            $listagem->addColumn('codigo');
            $listagem->addColumn('nome');
            $listagem->addColumn('empresa');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'telefones')
        {
            $listagem->setTituloPagina('Telefones');

            $listagem->addColumn('codigo');
            $listagem->addColumn('telefone');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'emails')
        {
            $listagem->setTituloPagina('E-mails');

            $listagem->addColumn('codigo');
            $listagem->addColumn('email');
            if($_SESSION['usuario']->administrador == 1)
                $listagem->addColumn('senha');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'catalogoClientes')
        {
            $listagem->setTituloPagina('Clientes');

            $listagem->addColumn('codigo');
            $listagem->addColumn('nome');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else if($tabela == 'eventos')
        {
            $listagem->setTituloPagina(ucfirst($tabela));


            $listagem->addColumn('codigo');
            $listagem->addColumn('titulo');
            $listagem->addColumn('inicio');
            $listagem->addColumn('fim');
            $listagem->addColumn('imagem');
            $listagem->addColumn('ativo');

            $listagem->addEntity($tabela);
        }
        else
            $listagem->setTituloPagina(ucfirst($tabela));

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

    //Obtem a imagem do video
    if($request == 'buscaSubcategorias')
    {
        $codigoSubcategoria = $_POST['codigoSubcategoria'];
        $categoria          = $_POST['categoria'];

        $controlador = new controladorProdutos();
        $subcategorias = $controlador->getSubCategorias($categoria);

        $retorno = "<option value='' disabled selected style='display: none;'></option>";
        foreach ($subcategorias as $subcategoria)
        {
            $selected = '';

            if($codigoSubcategoria == $subcategoria->codigo)
                $selected = 'selected';

            $retorno .= "
                            <option value='{$subcategoria->codigo}' {$selected}>
                                {$subcategoria->subcategoria}
                            </option>
                        ";
        }

        echo $retorno;
    }
?>
