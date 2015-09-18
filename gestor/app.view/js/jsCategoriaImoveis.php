<script>
    $(document).ready(function() 
    { 
        $('#categoriaImoveisForm').submit(function(e)
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    categoria:  $('#categoria').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaCategoriaImoveisForm'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/categoriaImoveis';
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