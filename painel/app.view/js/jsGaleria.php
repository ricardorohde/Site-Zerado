<script>
    $(document).ready(function() 
    { 
        $('#galeriaForm').submit(function(e) 
        {
            e.preventDefault();
            
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
                        (titulo      != ''  &&  titulo      != null &&  titulo      != 'undefined') &&
                        (descricao   != ''  &&  descricao   != null &&  descricao   != 'undefined') &&
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
                    titulo:         $('#titulo').val(),
                    descricao:      $('#descricao').val(),
                    ativo:          $('#ativo').val(),
                    imagens:        imagens,
                    request:        'salvaGaleria'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/galeria';
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