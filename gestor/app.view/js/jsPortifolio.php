<script>
    $(document).ready(function() 
    { 
        $('#portifolioForm').submit(function(e) 
        {
            descricao = tinyMCE.get('descricao').getContent();

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    imagem:         $('#logotipo').val(),
                    titulo:         $('#titulo').val(),
                    descricao:      descricao,
                    url:            $('#url').val(),
                    ativo:          $('#ativo').val(),
                    request:        'salvaPortifolio'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        top.location='/portifolio';
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