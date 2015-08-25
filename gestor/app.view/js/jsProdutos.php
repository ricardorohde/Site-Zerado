<script>
    $(document).ready(function() 
    { 
        $('#produtosForm').submit(function(e)
        {
            desc = tinyMCE.get('descricao').getContent();
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    nome:       $('#nome').val(),
                    valor:      $('#valor').val(),
                    peso:       $('#peso').val(),
                    descricao:  desc,
                    ativo:      $('#ativo').val(),
                    request:    'salvaProdutos'
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
    }); 
</script>