<script>
    $(document).ready(function() 
    { 
        $('#divCodigoRastreio').hide();

        $('#status').change(function (e)
        {
            if($('#status').val() > 2)
                $('#divCodigoRastreio').show();
            else
            {
                $('#codigoRastreio').val('');
                $('#divCodigoRastreio').hide();
            }
        });

        $('#vendaForm').submit(function(e)
        {
            e.preventDefault();
            
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    status:         $('#status').val(),
                    codigoRastreio: $('#codigoRastreio').val(),
                    request:        'salvaVenda'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        top.location='/vendas';
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