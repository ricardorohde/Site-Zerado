<script>
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
</script>