<script>
    $(document).ready(function()
    {
        $('#produtosForm').submit(function(e)
        {
            e.preventDefault();

            var valor = $('#valor').val();
            valor = valor.split("R$ ").join("");
            valor = valor.split(".").join("");
            valor = valor.split(",").join(".");

            desc = tinyMCE.get('descricao').getContent();

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

            var quantidadeCores     = $('#quantidadeCores').val();
            var cores               = '';

            for(i=1; i<=quantidadeCores; i++)
            {
                var cor = $('#cor_'+i).val();

                if(cor != ''    &&  cor != null     &&  cor != 'undefined')
                {
                    cores = cores + cor + "¬";
                }
            }

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data:
                {
                    codigo:         $('#codigo').val(),
                    nome:           $('#nome').val(),
                    valor:          valor,
                    peso:           $('#peso').val(),
                    estoque:        $('#estoque').val(),
                    categoria:      $('#categoriaCombobox').val(),
                    subCategoria:   $('#subcategoriaCombobox').val(),
                    video:          $('#video').val(),
                    imagemVideo:    $('#imagem').val(),
                    descricao:      desc,
                    ativo:          $('#ativo').val(),
                    cores:          cores,
                    imagens:        imagens,
                    request:        'salvaProdutos'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        top.location='/produtos';
                        alert('Salvo com sucesso!');
                    }
                    else
                    {
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });

        $('#categoriaProdutosForm').submit(function(e)
        {
            e.preventDefault();

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data:
                {
                    codigo:     $('#codigo').val(),
                    categoria:  $('#categoria').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaCategoriaProdutos'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/categoriaProdutos';
                    }
                    else
                    {
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });

        $('#subcategoriaProdutosForm').submit(function(e)
        {
            e.preventDefault();

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data:
                {
                    codigo:         $('#codigo').val(),
                    categoria:      $('#categoria').val(),
                    subcategoria:   $('#subcategoria').val(),
                    ativo:          $('#ativo').val(),
                    request:        'salvaSubcategoriaProdutos'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/subcategoriaProdutos';
                    }
                    else
                    {
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });

        $("#categoriaCombobox").change(function(){
            buscaSubcategorias('');
        });

        $('#adicionarCor').click(function()
        {
            cores = $('#quantidadeCores').val();
            cores++;

            html =  '    <div class="3u" id="boxCor_'+cores+'">                                                             ' +
                    '       <input type="text" name="cor_'+cores+'" id="cor_'+cores+'" value="" placeholder="Cor" required> ' +
                    '                                                                                                       ' +
                    '           <div class="center">                                                                        ' +
                    '               <img                                                                                    ' +
                    '                   src="/app.view/img/delete.png"                                                      ' +
                    '                   class="center"                                                                      ' +
                    '                   onclick="apagarCor('+cores+')"                                                      ' +
                    '               >                                                                                       ' +
                    '           </div>                                                                                      ' +
                    '    </div>                                                                                             ' +
                    '                                                                                                       ';

            $('#boxImagensGaleria').append(html);
            $('#quantidadeCores').val(cores);
        });
    });

    function buscaSubcategorias(codigoSubcategoria)
    {
        $.ajax
        ({
            type: "POST",
            url: "../../app.control/ajax.php",
            data:
            {
                codigoSubcategoria: codigoSubcategoria,
                categoria:          $('#categoriaCombobox').val(),
                request:            'buscaSubcategorias'
            },
            success: function(data)
            {
               $("#subcategoriaCombobox").html(data);
            }
        });
    }
</script>
