<script>
    $(document).ready(function() 
    { 
        $('#depoimentosForm').submit(function(e) 
        {
            e.preventDefault();
            
            depoimento = tinyMCE.get('depoimento').getContent();

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:       $('#codigo').val(),
                    imagem:       $('#logotipo').val(),
                    nome:         $('#nome').val(),
                    empresa:      $('#empresa').val(),
                    depoimento:   depoimento,
                    ativo:        $('#ativo').val(),
                    request:      'salvaDepoimentos'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/depoimentos';
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