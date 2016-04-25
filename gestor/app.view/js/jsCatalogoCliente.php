<script>
    $(document).ready(function() 
    { 
        $('#catalogoClientesForm').submit(function(e) 
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    imagem:     $('#logotipo').val(),
                    nome:       $('#nome').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaCatalogoClientes'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/catalogoClientes';
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