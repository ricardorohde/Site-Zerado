<script>
    skel.init();

    $('#progress-div').hide();

    $('#userImage').change(function()
    {
        $('#listaArquivosUpload').html('');
        for (var i = 0; i < this.files.length; i++)
        {
            $('#listaArquivosUpload').append(this.files[i].name+"<br/>");
        }
    });

    function selecionaImagem(imagem)
    {
        $('#imagemSelecionada').val(imagem);
        parent.$.fancybox.close();
    }

    function selecionaImagens()
    {
        var imagens = '';

        $(".checkImagensSelecionadas:checked").each(function(){
            imagens = imagens + $(this).val() + "?";
        });

        $('#imagensSelecionadas').val(imagens);

        parent.$.fancybox.close();
    }

    function excluirImagem(imagem, category)
    {
        $.ajax
        ({
            type: "POST",
            url: "../app.control/ajax.php",
            data: 
            {
                imagem:     imagem,
                category:   category,
                request:    'apagaImagem'
            },
            success: function(data) 
            {
                $('.uploaderContent').html(data);
            }
        });
    }

    $(document).ready(function() 
    { 
        $('#uploadForm').submit(function(e) 
        {
            if($('#userImage').val()) 
            {
                e.preventDefault();
                $('#progress-div').show();
                $(this).ajaxSubmit(
                { 
                    target:   '.uploaderContent', 
                    beforeSubmit: function() 
                    {
                        $("#progress-bar").width('0%');
                    },
                    uploadProgress: function (event, position, total, percentComplete)
                    { 
                        $("#progress-bar").width(percentComplete + '%');
                        $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
                    },
                    success:function ()
                    {
                        $('#listaArquivosUpload').html('');
                        $('#progress-div').hide();
                    },
                    resetForm: true 
                }); 
                return false; 
            }
        });
    }); 
</script>