<script>
    $(document).ready(function() 
    { 
        $('#configuracoesPagSeguroForm').submit(function(e)
        {
            e.preventDefault();
            
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    email:      $('#email').val(),
                    token:      $('#token').val(),
                    sandbox:    $('#sandbox').is(":checked"),
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