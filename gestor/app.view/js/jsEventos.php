<script>
    $(document).ready(function() 
    { 
        $('#eventosForm').submit(function(e) 
        {
            if($('#fim').val() < $('#inicio').val())
            {
                alert('Data Final após data inicial');
                return false;
            }

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:     $('#codigo').val(),
                    imagem:     $('#logotipo').val(),
                    titulo:     $('#titulo').val(),
                    descricao:  $('#descricao').val(),
                    inicio:     $('#inicio').val(),
                    fim:        $('#fim').val(),
                    ativo:      $('#ativo').val(),
                    request:    'salvaEventos'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/eventos';
                    }
                    else
                    {
                        alert(data);
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });
    }); 
</script>