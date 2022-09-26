$(document).ready(function() {
    $("#tallaElement").on('change', function() {
        $.ajax({
            url: 'cantTalla.php',
            type: 'POST',
            dataType: 'json',
            data: {
                talla: $('#tallaElement').val(),
                id: $('#id_elemento').val()
            }
        }).done(function(cant) {
            $("#cantTalla").val(cant.cant);
        })
    })
})