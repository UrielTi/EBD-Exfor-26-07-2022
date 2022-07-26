$(document).ready(function() {
    $("#nombres").focusout(function() {
        $.ajax({
            url: '../cliente.php',
            type: 'POST',
            dataType: 'json',
            data: {
                nombres: $('#nombres').val()
            }
        }).done(function(respuesta) {
            $("#nombres").val(respuesta.nombres);
            $("#cedula").val(respuesta.cedula);
            $("#cargo").val(respuesta.cargo);
        });
    });
});