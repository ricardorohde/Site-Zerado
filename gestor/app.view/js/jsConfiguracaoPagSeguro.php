<script>
    $(document).ready(function() 
    { 
        $('#configuracoesPagSeguroForm').submit(function(e)
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    email:      $('#email').val(),
                    token:      $('#token').val(),
                    request:    'salvaConfiguracaoPagSeguro'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/';
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