<script>
    $(document).ready(function() 
    { 
        $('#manualForm').submit(function(e) 
        {
            texto = tinyMCE.get('texto').getContent();

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajaxManual.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    imagem:         $('#logotipo').val(),
                    funcao:         $('#funcao').val(),
                    funcao:         $('#titulo').val(),
                    texto:          texto,
                    ativo:          $('#ativo').val(),
                    request:        'salvaManual'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/manual';
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