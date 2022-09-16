$(document).ready(function () {
    $("#cedula").focusout(function () {
        $.ajax({
            url: '../include/empleados/empleado.php',
            type: 'POST',
            dataType: 'json',
            data: {
                cedula: $('#cedula').val()
            }
        }).done(function(respuesta) {
            $('#id-empleado').val(respuesta.id);
            $('#nombres').val(respuesta.nombres);
            $('#proceso').val(respuesta.proceso);
            $('#nucleo').val(respuesta.nucleo);
            $('#cargo').val(respuesta.cargo);
        });
    });
});