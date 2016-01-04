<div class='2u menu'>
    <span class='center title'>
        Bem vindo<br/>
        <?php echo $_SESSION['usuario']->nome; ?>
    </span><br />

    <nav id='menuLateral'>
        <ul>
            <li>
                <a href='/configuracoes' title='Configurações' alt='Configurações'>
                    <i class="fa fa-cog"></i>&nbsp;
                    Configurações
                </a>
            </li>
            <?php
                if($_SESSION['funcoes']->ecommerce == 1)
                {
                    ?>
                    <li>
                        <a href='/configuracoesPagSeguro' title='Configurações PagSeguro' alt='Configurações PagSeguro'>
                            <i class="fa fa-cog"></i>&nbsp;
                            Configurações PagSeguro
                        </a>
                    </li>
                    <?php
                }
            ?>
            <li>
                <a href='/localizacao' title='Categoria Páginas' alt='Categoria Páginas'>
                    <i class="fa fa-list"></i>&nbsp;
                    Categoria Páginas
                </a>
            </li>
            <li>
                <a href='/paginas' title='Páginas' alt='Páginas'>
                    <i class="fa fa-file-text"></i>&nbsp;
                    Páginas
                </a>
            </li>
             <?php
                if($_SESSION['funcoes']->banner == 1)
                {
                    ?>
                        <li>
                            <a href='/banners' title='Banner' alt='Banner'>
                                <i class="fa fa-picture-o"></i>&nbsp;
                                Banner
                            </a>
                        </li>
                    <?php
                }
            ?>
            <?php
                if($_SESSION['funcoes']->video == 1)
                {
                    ?>
                        <li>
                            <a href='/videos' title='Videos' alt='Videos'>
                                <i class="fa fa-youtube-play"></i>&nbsp;                                
                                Videos
                            </a>
                        </li>
                    <?php
                }
            ?>
             <?php
                if($_SESSION['funcoes']->portifolio == 1)
                {
                    ?>
                        <li>
                            <a href='/portifolio' title='Portifólio' alt='Portifólio'>
                                <i class="fa fa-clone"></i>&nbsp;                                
                                Portifólio
                            </a>
                        </li>
                    <?php
                }
            ?>
            <?php
                if($_SESSION['funcoes']->ecommerce == 1)
                {
                    ?>
                    <li>
                        <a href='/vendas' title='Vendas' alt='Vendas'>
                            <i class="fa fa-shopping-cart"></i>&nbsp;
                            Vendas
                        </a>
                    </li>
                    <?php
                }
            ?>
            <?php
                if($_SESSION['funcoes']->catalogo == 1) || $_SESSION['funcoes']->ecommerce == 1))
                {
                    ?>
                    <li>
                        <a href='/categoriaProdutos' title='Categoria Produtos' alt='Categoria Produtos'>
                            <i class="fa fa-list"></i>&nbsp;
                            Categoria Produtos
                        </a>
                    </li>
                    <li>
                        <a href='/subcategoriaProdutos' title='Subcategoria Produtos' alt='Subcategoria Produtos'>
                            <i class="fa fa-list"></i>&nbsp;
                            Subcategoria Produtos
                        </a>
                    </li>
                    <li>
                        <a href='/produtos' title='Produtos' alt='Produtos'>
                            <i class="fa fa-star"></i>&nbsp;
                            Produtos
                        </a>
                    </li>
                    <?php
                }
            ?>
            <?php
                if($_SESSION['funcoes']->delivery == 1)
                {
                    ?>
                    <li>
                        <a href='/pedidos' title='Pedidos' alt='Pedidos'>
                            &nbsp;<i class="fa fa-spoon"></i>&nbsp;
                            Pedidos
                        </a>
                    </li>
                    <li>
                        <a href='/alimentos' title='Alimentos' alt='Alimentos'>
                            <i class="fa fa-pie-chart"></i>&nbsp;
                            Alimentos
                        </a>
                    </li>
                    <?php
                }
            ?>
            <?php
                if($_SESSION['funcoes']->imobiliaria == 1)
                {
                    ?>
                    <li>
                        <a href='/situacaoImoveis' title='Situação Imóveis' alt='Situação Imóveis'>
                            <i class="fa fa-list"></i>&nbsp;
                            Situação Imóveis
                        </a>
                    </li>
                    <li>
                        <a href='/categoriaImoveis' title='Categoria Imóveis' alt='Categoria Imóveis'>
                            <i class="fa fa-list"></i>&nbsp;
                            Categoria Imóveis
                        </a>
                    </li>
                    <li>
                        <a href='/imoveis' title='Imóveis' alt='Imóveis'>
                            <i class="fa fa-home"></i>&nbsp;
                            Imóveis
                        </a>
                    </li>
                    <?php
                }
            ?>
            <?php
                if($_SESSION['funcoes']->depoimentos == 1)
                {
                    ?>
                    <li>
                        <a href='/depoimentos' title='Depoimentos' alt='Depoimentos'>
                            <i class="fa fa-commenting-o"></i>&nbsp;
                            Depoimentos
                        </a>
                    </li>
                    <?php
                }
            ?>
            <?php
                /*if  (
                        ($_SESSION['funcoes']->galeria      == 1)   ||
                        ($_SESSION['funcoes']->ecommerce    == 1)   ||
                        ($_SESSION['funcoes']->imobiliaria  == 1)
                    )
                {
                    ?>
                        <li>
                        <a href='/galeria' title='Galeria' alt='Galeria'>
                            <i class="fa fa-picture-o"></i>&nbsp;
                            Galeria de Imagens
                        </a>
                    </li>
                    <?php
                }*/
            ?>
            <li>
                <a href='/usuarios' title='Usuários' alt='Usuários'>
                    <i class="fa fa-user-plus"></i>&nbsp;
                    Usuários
                </a>
            </li>
            <li>
                <a href='/senha' title='Senha' alt='Senha'>
                    <i class="fa fa-asterisk"></i>&nbsp;
                    Senha
                </a>
            </li>
            <li>
                <a href='/logoff' title='Logoff' alt='Logoff'>
                    <i class="fa fa-user-times"></i>&nbsp;
                    Logoff
                </a>
            </li>
        </ul>
    </nav>

    <div class='copyright'>
        <div>
            <span class='center'>
                &copy; 2015 - 
                <a href='http://www.groupsofter.com.br' alt='Softer' title='Softer' target='_blank'>
                    Softer
                </a>
            </span>
        </div>
    </div>
</div>