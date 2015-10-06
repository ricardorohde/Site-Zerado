<script>
    $(document).ready(function() 
    { 
        $('#funcoesForm').submit(function(e) 
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    banner:         $('#banner').is(":checked"),
                    video:          $('#video').is(":checked"),
                    galeria:        $('#galeria').is(":checked"),
                    ecommerce:      $('#ecommerce').is(":checked"),
                    delivery:       $('#delivery').is(":checked"),
                    imobiliaria:    $('#imobiliaria').is(":checked"),
                    request:        'salvaFuncoes'
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