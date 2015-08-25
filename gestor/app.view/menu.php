<div class='2u menu'>
    <span class='center title'>
        Bem vindo <br/>
        <?php echo $_SESSION['usuario']->nome; ?>
    </span><br />

    <nav id='menuLateral'>
        <ul>
            <li>
                <a href='/configuracoes' title='Configurações' alt='Configurações'>
                    <i class="fa fa-cog"></i>
                    Configurações
                </a>
            </li>
            <li>
                <a href='/configuracoesPagSeguro' title='Configurações PagSeguro' alt='Configurações PagSeguro'>
                    <i class="fa fa-cog"></i>
                    Configurações PagSeguro
                </a>
            </li>
            <li>
                <a href='/localizacao' title='Localização' alt='Localização'>
                    <i class="fa fa-list"></i>
                    Localização
                </a>
            </li>
            <li>
                <a href='/paginas' title='Páginas' alt='Páginas'>
                    <i class="fa fa-file-text"></i>
                    Páginas
                </a>
            </li>
            <li>
                <a href='/banners' title='Banner' alt='Banner'>
                    <i class="fa fa-picture-o"></i>
                    Banner
                </a>
            </li>
            <li>
                <a href='/videos' title='Videos' alt='Videos'>
                    <i class="fa fa-video-camera"></i>
                    Videos
                </a>
            </li>
            <li>
                <a href='/vendas' title='Vendas' alt='Vendas'>
                    <i class="fa fa-shopping-cart"></i>
                    Vendas
                </a>
            </li>
            <li>
                <a href='/pedidos' title='Pedidos' alt='Pedidos'>
                    &nbsp;<i class="fa fa-spoon"></i>
                    Pedidos
                </a>
            </li>
            <li>
                <a href='/produtos' title='Produtos' alt='Produtos'>
                    <i class="fa fa-star"></i>
                    Produtos
                </a>
            </li>

            <li>
                <a href='/usuarios' title='Usuários' alt='Usuários'>
                    <i class="fa fa-user-plus"></i>
                    Usuários
                </a>
            </li>
            <li>
                <a href='/senha' title='Senha' alt='Senha'>
                    <i class="fa fa-asterisk"></i>
                    Senha
                </a>
            </li>
            <li>
                <a href='/logoff' title='Logoff' alt='Logoff'>
                    <i class="fa fa-user-times"></i>
                    Logoff
                </a>
            </li>
        </ul>

        <div class='copyright'>
            <div>
                <span class='center'>
                    &copy; 2015 - 
                    <a href='http://rogeriopereira.info' alt='Desenvolvedor' title='Desenvolvedor' target='_blank'>
                        Rogério Pereira
                    </a>
                </span>
            </div>
        </div>
    </nav>
</div>