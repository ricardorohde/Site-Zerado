<div class='2u menu'>
    <span class='center title'>
        Bem vindo<br/>
        <?php echo $_SESSION['usuario']->nome; ?>
    </span><br />

    <nav id='menuLateral'>
        <ul>
            <li>
                <a href='/configuracoes' title='Configura��es' alt='Configura��es'>
                    <i class="fa fa-cog"></i>&nbsp;
                    Configura��es
                </a>
            </li>
            <?php
                if($_SESSION['funcoes']->ecommerce == 1)
                {
                    ?>
                    <li>
                        <a href='/configuracoesPagSeguro' title='Configura��es PagSeguro' alt='Configura��es PagSeguro'>
                            <i class="fa fa-cog"></i>&nbsp;
                            Configura��es PagSeguro
                        </a>
                    </li>
                    <?php
                }
            ?>
            <li>
                <a href='/localizacao' title='Categoria P�ginas' alt='Categoria P�ginas'>
                    <i class="fa fa-list"></i>&nbsp;
                    Categoria P�ginas
                </a>
            </li>
            <li>
                <a href='/paginas' title='P�ginas' alt='P�ginas'>
                    <i class="fa fa-file-text"></i>&nbsp;
                    P�ginas
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
                if($_SESSION['funcoes']->ecommerce == 1)
                {
                    ?>
                    <li>
                        <a href='/vendas' title='Vendas' alt='Vendas'>
                            <i class="fa fa-shopping-cart"></i>&nbsp;
                            Vendas
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
                        <a href='/situacaoImoveis' title='Situa��o Im�veis' alt='Situa��o Im�veis'>
                            <i class="fa fa-list"></i>&nbsp;
                            Situa��o Im�veis
                        </a>
                    </li>
                    <li>
                        <a href='/categoriaImoveis' title='Categoria Im�veis' alt='Categoria Im�veis'>
                            <i class="fa fa-list"></i>&nbsp;
                            Categoria Im�veis
                        </a>
                    </li>
                    <li>
                        <a href='/imoveis' title='Im�veis' alt='Im�veis'>
                            <i class="fa fa-home"></i>&nbsp;
                            Im�veis
                        </a>
                    </li>
                    <?php
                }
            ?>
            <?php
                if  (
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
                }
            ?>
            <li>
                <a href='/usuarios' title='Usu�rios' alt='Usu�rios'>
                    <i class="fa fa-user-plus"></i>&nbsp;
                    Usu�rios
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
                <a href='http://rogeriopereira.info' alt='Desenvolvedor' title='Desenvolvedor' target='_blank'>
                    Rog�rio Pereira
                </a>
            </span>
        </div>
    </div>
</div>