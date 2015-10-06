<script>
    $(document).ready(function() 
    { 
        $('#paginasForm').submit(function(e) 
        {
            texto = tinyMCE.get('texto').getContent();
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    imagem:         $('#logotipo').val(),
                    titulo:         $('#titulo').val(),
                    descricao:      $('#descricao').val(),
                    localizacao:    $('#localizacao').val(),
                    texto:          texto,
                    ativo:          $('#ativo').val(),
                    request:        'salvaPaginas'
                },
                success: function(data) 
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/paginas';
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