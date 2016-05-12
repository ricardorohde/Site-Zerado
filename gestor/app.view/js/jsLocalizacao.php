<script>
    $(document).ready(function() 
    { 
        $('#localizacaoForm').submit(function(e)
        {
            e.preventDefault();
            
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    nome:       $('#nome').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaLocalizacao'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/localizacao';
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