<script>
    $(document).ready(function() 
    { 
        $("#video").blur(function()
        {
            if($('#video').val() != '')
            {
                //Verifica se a URL foi encurtada
                $.ajax
                ({
                    type: "POST",
                    url: "../../app.control/ajax.php",
                    data:
                    {
                        video:      $('#video').val(),
                        request:    'UrlCurta',
                    },
                    success: function(data) 
                    {
                        $("#video").val(data);

                        $.ajax
                        ({
                            type: "POST",
                            url: "../../app.control/ajax.php",
                            data: 
                            {
                                video:      data,
                                request:    'verificaYoutube'
                            },
                            success: function(data2) 
                            {
                                if(data2 == 0)
                                    alert('O link não é um video do youtube válido!');
                                else if(data2 == 1)
                                {
                                    $.ajax
                                    ({
                                        type: "POST",
                                        url: "../../app.control/ajax.php",
                                        data: 
                                        {
                                            video:      data,
                                            request:    'getYoutubeThumb'
                                        },
                                        success: function(data3) 
                                        {
                                            $('#imagem').val(data3);
                                            $('#imagemUploader').html("<img src='"+data3+"' >");
                                        }
                                    });
                                }
                            }
                        });
                    }
                });
            }
        });

        $('#videosForm').submit(function(e) 
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    imagem:         $('#imagem').val(),
                    titulo:         $('#titulo').val(),
                    descricao:      $('#descricao').val(),
                    video:          $('#video').val(),
                    ativo:          $('#ativo').val(),
                    request:        'salvaVideos'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/videos';
                        alert('Salvo com sucesso!');
                    }
                    else
                    {
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });
    }); 
</script>