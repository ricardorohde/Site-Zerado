<script>
    $(document).ready(function() 
    { 
        $('#situacaoImoveisForm').submit(function(e)
        {
            e.preventDefault();
            
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    situacao:   $('#situacao').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaSituacaoImoveis'
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