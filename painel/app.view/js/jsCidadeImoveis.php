<script>
    $(document).ready(function() 
    { 
        $('#cidadeImoveisForm').submit(function(e)
        {
            e.preventDefault();
            
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    cidade:     $('#cidade').val(),
                    imagem:     $('#logotipo').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaCidadeImoveis'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/cidadeImoveis';
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