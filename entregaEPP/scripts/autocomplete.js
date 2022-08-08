$(document).ready(function () {
    $("#nombre-elemento").focusout(function () {
        $.ajax({
            url: '../include/elementos/element.php',
            type: 'POST',
            dataType: 'json',
            data: {
                talla: $('#talla').val(),
                nombres: $('#elemento').val()
            }
        }).done(function (respuesta) {
            $("#id_talla").val(respuesta.id_talla);
            $("#elemento").val(respuesta.nombres);
            $("#precio").val(respuesta.precio);
            $("#cantidadE").val(respuesta.stock);
        });
    });
});


// function AlertaCantidad() {
//     var cantidadElemento = document.getElementById("cantidadE").value,
//         cantidadSolicitada = document.getElementById("cantidad").value,
//         total = cantidadElemento - cantidadSolicitada;

//     if (total < 0) {
//         alert("La cantidad solicitada: " + cantidadSolicitada + " es mayor a la cantidad del producto: " + cantidadElemento);
//         document.getElementById("cantidad").value = 0;
//     } else if (cantidadSolicitada < 0) {
//         alert("La cantidad solicitada: " + cantidadSolicitada + " no puede ser menor");
//         document.getElementById("cantidad").value = 0;
//     }
// }