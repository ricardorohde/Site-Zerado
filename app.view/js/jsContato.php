<script>
    $(document).ready(function() 
    { 
        $('#contatoForm').submit(function(e) 
        {
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    nome:       $('#nome').val(),
                    email:      $('#email').val(),
                    telefone:   $('#telefone').val(),
                    cidade:     $('#cidade').val(),
                    assunto:    $('#assunto').val(),
                    mensagem:   $('#mensagem').val(),
                    request:    'enviaContato'
                },
                success: function(data)
                {
                    if(data == 1)
                        alert('Contato enviado com sucesso!');
                    else
                        alert('Erro ao enviar contato!');
                }
            });
        });
    });
</script>