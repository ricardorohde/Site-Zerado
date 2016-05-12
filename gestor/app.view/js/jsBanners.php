<script>
    $(document).ready(function() 
    { 
        $('#bannersForm').submit(function(e) 
        {
            e.preventDefault();
            
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
                    ativo:          $('#ativo').val(),
                    request:        'salvaBanner'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/banners';
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