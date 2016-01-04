<script>
    $(document).ready(function() 
    { 
        $('#emailsForm').submit(function(e) 
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    email:      $('#email').val(),
                    senha:      $('#senha').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaEmails'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/';
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