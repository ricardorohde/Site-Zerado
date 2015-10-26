<script>
    /*skel.breakpoints(
        {   
            large:  "(max-width: 970px)",
            medium: "(max-width: 768px)",
            small:  "(max-width: 650px)",
            xsmall: "(max-width: 480px)"
        });
    skel.layout(
        {
            reset:          "full",
            conditionals:   true,
            grid:           true,
        });*/
    skel.init();

    $('.fancybox').fancybox(
    {
        openEffect:     'fade',
        openSpeed:      300,
        closeEffect:    'fade',
        closeSpeed:     300,
        closeClick:     true,
        width:          1000,
        height:         900,
        autoScale:      true,
        autoDimensions: false,
        beforeClose:    function() 
        {
            imagemSelecionada = $('.fancybox-iframe').contents().find('#imagemSelecionada').val();

            htmlImg = '<img src="'+imagemSelecionada+'">';

            if ((imagemSelecionada != '') && (imagemSelecionada != null))
            {
                $('#logotipo').val(imagemSelecionada.replace("../../", ""));
                $('#imagemUploader').html(htmlImg);
            }
        },
    });

    $('.fancyboxMultiple').fancybox(
    {
        openEffect:     'fade',
        openSpeed:      300,
        closeEffect:    'fade',
        closeSpeed:     300,
        closeClick:     true,
        width:          1000,
        height:         900,
        autoScale:      true,
        autoDimensions: false,
        beforeClose:    function() 
        {
            totalImagem = $('#quantidadeImagens').val();

            imagens = $('.fancybox-iframe').contents().find('#imagensSelecionadas').val();

            imagens = imagens.split('?');

            totalImagem++;

            for(i in imagens) 
            {
                if (imagens[i] != '')
                {
                    htmlImagens =   "<div class='row imagemGaleria' id='galeria_"+totalImagem+"'>                           " +
                                    "    <div class='2u' id='imagem_"+totalImagem+"'>                                       " +
                                    "    <input                                                                             " +
                                    "         type='hidden'                                                                 " +
                                    "         name='imagemCaminho_"+totalImagem+"'                                          " +
                                    "         id='imagemCaminho_"+totalImagem+"'                                            " +
                                    "         value='"+imagens[i]+"'                                                        " +
                                    "     >                                                                                 " +
                                    "        <img src='"+imagens[i]+"'>                                                     " +
                                    "    </div>                                                                             " +
                                    "                                                                                       " +
                                    "    <div class='4u'>                                                                   " +
                                    "        <label for'titulo_"+totalImagem+"'>Titulo</label>                              " +
                                    "        <input                                                                         " +
                                    "            type='text'                                                                " +
                                    "            name='titulo_"+totalImagem+"'                                              " +
                                    "            id='titulo_"+totalImagem+"'                                                " +
                                    "            maxlength='50'                                                             " +
                                    "            placeholder='Titulo'                                                       " +
                                    "            required                                                                   " +
                                    "        >                                                                              " +
                                    "    </div>                                                                             " +
                                    "                                                                                       " +
                                    "    <div class='4u'>                                                                   " +
                                    "        <label for'descricao_"+totalImagem+"'>Descrição</label>                        " +
                                    "        <input                                                                         " +
                                    "            type='text'                                                                " +
                                    "            name='descricao_"+totalImagem+"'                                           " +
                                    "            id='descricao_"+totalImagem+"'                                             " +
                                    "            placeholder='Descrição'                                                    " +
                                    "            required                                                                   " +
                                    "        >                                                                              " +
                                    "    </div>                                                                             " +
                                    "                                                                                       " +
                                    "    <div class='1u'>                                                                   " +
                                    "        <label for'posicao_"+totalImagem+"'>Posicao</label>                            " +
                                    "        <input                                                                         " +
                                    "            type='number'                                                              " +
                                    "            name='posicao_"+totalImagem+"'                                             " +
                                    "            id='posicao_"+totalImagem+"'                                               " +
                                    "            min='1'                                                                    " +
                                    "            step='1'                                                                   " +
                                    "            placeholder='Posição'                                                      " +
                                    "            value='"+totalImagem+"'                                                    " +
                                    "            required                                                                   " +
                                    "        >                                                                              " +
                                    "    </div>                                                                             " +
                                    "                                                                                       " +
                                    "    <div class='1u' style='text-align:center;'>                                        " +
                                    "        <label for='apagar_"+totalImagem+"' onclick='apagarGaleria("+totalImagem+")'>  " +
                                    "            Apagar                                                                     " +
                                    "        </label>                                                                       " +
                                    "        <img                                                                           " +
                                    "            src='/app.view/img/delete.png'                                             " +
                                    "            class='center'                                                             " +
                                    "            onclick='apagarGaleria("+totalImagem+")'                                   " +
                                    "        >                                                                              " +
                                    "    </div>                                                                             " +
                                    "                                                                                       " +
                                    "</div>                                                                                 " +
                                    "<div class='clear'></div>                                                              ";

                    $('.boxImagensGaleria').append(htmlImagens);

                    $('#quantidadeImagens').val(totalImagem);

                    totalImagem++;
                }
            }
        },
    });

    function myFileBrowser () 
    {
        $.fancybox(
        {
            'type':         'iframe',
            'href':         '/app.view/uploader.php',
            openEffect:     'fade',
            openSpeed:      300,
            closeEffect:    'fade',
            closeSpeed:     300,
            closeClick:     true,
            width:          1000,
            height:         900,
            autoScale:      true,
            autoDimensions: false,
            beforeClose:    function() 
            {
                imagemSelecionada = $('.fancybox-iframe').contents().find('#imagemSelecionada').val();

                if ((imagemSelecionada != '') && (imagemSelecionada != null))
                    $('#mceu_35-inp').val(imagemSelecionada.replace("../../", ""));
            },
        });
    }

    tinymce.init(
    {
        selector: "textarea",
        theme: "modern",
        height: 190,
        content_css : "/app.view/css/formulario.css",
        plugins: 
                [
                   "advlist", "autolink", "image", "media", "code", "link", "paste", "save", "hr", "lists", "table", 
                   "textpattern", "importcss",
                ],
        toolbar1: "code | save | undo redo | bold italic hr | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | insertfile | image link media table",
        //language : 'pt_BR',
        file_browser_callback : myFileBrowser,
        menubar: false,
        statusbar: false
    });

    function apagar(tabela, codigo)
    {
        $.ajax
        ({
            type: "POST",
            url: "../../app.control/ajax.php",
            data: 
            {
                tabela:     tabela,
                codigo:     codigo,
                request:    'apagar'
            },
            success: function(data) 
            {
                $('#listagem').html(data);
            }
        });
    }

    function apagarGaleria(posicao)
    {
        $('#galeria_'+posicao).html('');
    }
</script>