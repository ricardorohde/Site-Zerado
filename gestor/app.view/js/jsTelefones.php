<script>
    $(document).ready(function() 
    { 
        $('#telefonesForm').submit(function(e) 
        {
            e.preventDefault();
            
            $.ajax
            ({
                type: "POST",
                url: "../../app.control/ajax.php",
                data: 
                {
                    codigo:         $('#codigo').val(),
                    telefone:       $('#telefone').val(),
                    whatsapp:       $('#whatsapp').is(":checked"),
                    ativo:          $('#ativo').val(),
                    request:        'salvaTelefones'
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        alert('Salvo com sucesso!');
                        top.location='/';
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