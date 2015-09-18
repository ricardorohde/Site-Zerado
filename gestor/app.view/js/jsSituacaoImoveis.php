<script>
    $(document).ready(function() 
    { 
        $('#situacaoImoveisForm').submit(function(e)
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    situacao:   $('#situacao').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaSituacaoImoveisForm'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/situacaoImoveis';
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