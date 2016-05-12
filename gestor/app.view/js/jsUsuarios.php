<script>
    $(document).ready(function() 
    { 
        $('#usuariosForm').submit(function(e) 
        {
            e.preventDefault();
            
            if($('#senha').val() != $('#confirmacao').val())
            {
                alert('Senha diferente da confirmação');

                $('#senha').val('');
                $('#confirmacao').val('');
                $('#senha').focus();

                return false;
            }

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    nome:           $('#nome').val(),
                    email:          $('#email').val(),
                    senha:          $('#senha').val(),
                    administrador:  $('#administrador').val(),
                    ativo:          $('#ativo').val(),
                    request:        'salvaUsuario'
                },
                success:            function(data)
                {
                    if(data == 1)
                    {
                        top.location='/usuarios';
                        alert('Salvo com sucesso!');
                    }
                    else
                    {
                        alert('Erro ao salvar o conteúdo!');
                    }
                }
            });
        });

        $('#senhaForm').submit(function(e) 
        {
            e.preventDefault();
            
            if($('#senhaNova').val() != $('#confirmacao').val())
            {
                alert('Senha nova diferente da confirmação!');

                $('#senhaNova').val('');
                $('#confirmacao').val('');
                $('#senhaNova').focus();

                return false;
            }

            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    senhaAntiga:    $('#senhaAntiga').val(),
                    senhaNova:      $('#senhaNova').val(),
                    request:        'alteraSenha'
                },
                success:            function(data) 
                {
                    alert(data);
                    top.location='/home';
                }
            });
        });
    }); 
</script>