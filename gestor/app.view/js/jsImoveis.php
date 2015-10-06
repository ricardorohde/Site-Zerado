<script>
    $(document).ready(function() 
    { 
        $('#imoveisForm').submit(function(e)
        {
            var preco               = $('#preco').val();
            preco                   = preco.split("R$ ").join("");
            preco                   = preco.split(".").join("");
            preco                   = preco.split(",").join(".");

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
                    codigo:             $('#codigo').val(),
                    endereco:           $('#endereco').val(),
                    numero:             $('#numero').val(),
                    bairro:             $('#bairro').val(),
                    cep:                $('#cep').val(),
                    cidade:             $('#cidade').val(),
                    estado:             $('#estado').val(),
                    situacao:           $('#situacao').val(),
                    categoria:          $('#categoria').val(),
                    categoriaAluguel:   $('#categoriaAluguel').val(),
                    preco:              preco,                    
                    destaque:           $('#destaque').val(),
                    ativo:              $('#ativo').val(),
                    imagens:            imagens,
                    request:            'salvaImoveis'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/imoveis';
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