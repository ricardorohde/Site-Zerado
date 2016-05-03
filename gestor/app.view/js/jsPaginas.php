<script>
    $(document).ready(function() 
    { 
        $('#paginasForm').submit(function(e) 
        {
            texto = tinyMCE.get('texto').getContent();

            var quantidadeImagens   = $('#quantidadeImagens').val();
            var imagens             = '';

            for(i=1; i<=quantidadeImagens; i++)
            {
                var img         = $('#imagemCaminho_'+i).val();
                var titulo      = $('#titulo_'+i).val();
                var descricao   = $('#descricao_'+i).val();
                var posicao     = $('#posicao_'+i).val();

                if  (
                        (img         != ''  &&  img         != null &&  img         != 'undefined') &&
                        (posicao     != ''  &&  posicao     != null &&  posicao     != 'undefined')
                    )
                {
                    imagens = imagens + img + "²" + titulo + "²" + descricao + "²" + posicao + "³";
                }
            }

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    imagem:         $('#logotipo').val(),
                    titulo:         $('#titulo').val(),
                    descricao:      $('#descricao').val(),
                    localizacao:    $('#localizacao').val(),
                    texto:          texto,
                    ativo:          $('#ativo').val(),
                    imagens:        imagens,
                    request:        'salvaPaginas'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/paginas';
                    }
                    else
                    {
                        console.log(data);
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });
    }); 
</script>