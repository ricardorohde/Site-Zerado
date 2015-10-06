<div class='clear'></div>
                        
<div class='12u center'>
    <h1 alt='Imagens' title='Imagens' >Imagens</h1>

    <input 
        type='button' 
        id='adicionarImagens' 
        class='fancyboxMultiple fancybox.iframe' 
        href='/app.view/uploader.php?category=gallery'
        value='Adicionar'
    >

    <input type='hidden' name='quantidadeImagens' id='quantidadeImagens' value='0'>
</div>

<div class='boxImagensGaleria'>
    <?php
        if(isset($_GET['cod']))
        {
            if($_GET['class'] == 'imoveis')
                $classe = 'Imovel';
            if($_GET['class'] == 'produtos')
                $classe = 'Produto';
            if($_GET['class'] == 'paginas')
                $classe = 'Pagina';

            $controlador        = new controladorGaleria();
            $collectionGaleria  = $controlador->getGaleria($classe, $_GET['cod']);

            if(count($collectionGaleria) > 0)
            {
                $totalImagem = 1;
                foreach ($collectionGaleria as $galeria) 
                {
                    echo 
                            "
                                <div class='row imagemGaleria' id='galeria_{$totalImagem}'>
                                    <div class='2u' id='imagem_{$totalImagem}'>
                                    <input
                                        type='hidden'
                                        name='imagemCaminho_{$totalImagem}'
                                        id='imagemCaminho_{$totalImagem}'
                                        value='{$galeria->imagem}'
                                     >
                                        <img src='{$galeria->imagem}'>
                                    </div>

                                    <div class='4u'>
                                        <label for'titulo_{$totalImagem}'>Titulo</label>
                                        <input
                                            type='text'
                                            name='titulo_{$totalImagem}'
                                            id='titulo_{$totalImagem}'
                                            maxlength='50'
                                            placeholder='Titulo'
                                            value='{$galeria->titulo}'
                                            required
                                        >
                                    </div>

                                    <div class='4u'>
                                        <label for'descricao_{$totalImagem}'>Descrição</label>
                                        <input
                                            type='text'
                                            name='descricao_{$totalImagem}'
                                            id='descricao_{$totalImagem}'
                                            maxlength='100'
                                            placeholder='Descrição'
                                            value='{$galeria->descricao}'
                                            required
                                        >
                                    </div>

                                    <div class='1u'>
                                        <label for'posicao_{$totalImagem}'>Posicao</label>
                                        <input
                                            type='number'
                                            name='posicao_{$totalImagem}'
                                            id='posicao_{$totalImagem}'
                                            min='1'
                                            step='1'
                                            placeholder='Posição'
                                            value='{$totalImagem}'
                                            required
                                        >
                                    </div>

                                    <div class='1u' style='text-align:center;'>
                                        <label for='apagar_{$totalImagem}' onclick='apagarGaleria({$totalImagem})'>
                                            Apagar
                                        </label>
                                        <img
                                            src='/app.view/img/delete.png'
                                            class='center'
                                            onclick='apagarGaleria({$totalImagem})'
                                        >
                                    </div>
                                </div>
                                <div class='clear'></div>
                            ";

                    $totalImagem++;
                }

                echo "<script>$('#quantidadeImagens').val({$totalImagem});</script>";
            }
        }
    ?>
</div>