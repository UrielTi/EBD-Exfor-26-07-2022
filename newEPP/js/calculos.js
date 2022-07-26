var tallas = ["tallaU", "tallaS", "tallaM", "tallaL", "tallaXL", "tallaXXL", "talla28", "talla29", "talla30", "talla31", "talla32", "talla33", "talla34", "talla35", "talla36", "talla37", "talla38", "talla39", "talla40", "talla41", "talla42", "talla43"]
var precios = ["precioU", "precioS", "precioM", "precioL", "precioXL", "precioXXL", "precio28", "precio29", "precio30", "precio31", "precio32", "precio33", "precio34", "precio35", "precio36", "precio37", "precio38", "precio39", "precio40", "precio41", "precio42", "precio43"]


function CantTotal() {
    let total_cantidad = 0;
    for (var i = 0; i < tallas.length; i++) {
        try {
            var uno = parseInt(document.getElementById(tallas[i]).value) || 0;
            total_cantidad += uno;
            document.getElementById("cantidad").value = total_cantidad;
        } catch (e) { }

    }
}

function PrecTotal() {
    let total_precios = 0;
    for (var i = 0; i < tallas.length; i++) {
        try {
            var uno = parseInt(document.getElementById(tallas[i]).value) || 0;
            var dos = parseInt(document.getElementById(precios[i]).value) || 0;
            total_precios += uno * dos;
            document.getElementById("precio").value = total_precios;
        } catch (e) {}

    }
}
function mayus(e) {
    e.value = e.value.toUpperCase();
}
$(document).ready(function () {
    $('#my_selector').on('change', function () {
        if ($(this).val() == '1') {
            $('#tallaU').attr('readOnly', 'readOnly');
            $('#precioU').attr('readOnly', 'readOnly');
            document.getElementById("tallaU").value = "";
            document.getElementById("precioU").value = "";

            $('#tallaS').attr('readOnly', 'readOnly'); $('#tallaM').attr('readOnly', 'readOnly'); $('#tallaL').attr('readOnly', 'readOnly'); $('#tallaXL').attr('readOnly', 'readOnly');
            $('#precioS').attr('readOnly', 'readOnly'); $('#precioM').attr('readOnly', 'readOnly'); $('#precioL').attr('readOnly', 'readOnly'); $('#precioXL').attr('readOnly', 'readOnly');
            $('#tallaXXL').attr('readOnly', 'readOnly'); $('#talla28').attr('readOnly', 'readOnly'); $('#talla29').attr('readOnly', 'readOnly'); $('#talla30').attr('readOnly', 'readOnly');
            $('#precioXXL').attr('readOnly', 'readOnly'); $('#precio28').attr('readOnly', 'readOnly'); $('#precio29').attr('readOnly', 'readOnly'); $('#precio30').attr('readOnly', 'readOnly');
            $('#talla31').attr('readOnly', 'readOnly'); $('#talla32').attr('readOnly', 'readOnly'); $('#talla33').attr('readOnly', 'readOnly'); $('#talla34').attr('readOnly', 'readOnly');
            $('#precio31').attr('readOnly', 'readOnly'); $('#precio32').attr('readOnly', 'readOnly'); $('#precio33').attr('readOnly', 'readOnly'); $('#precio34').attr('readOnly', 'readOnly');
            $('#talla35').attr('readOnly', 'readOnly'); $('#talla36').attr('readOnly', 'readOnly'); $('#talla37').attr('readOnly', 'readOnly'); $('#talla38').attr('readOnly', 'readOnly');
            $('#precio35').attr('readOnly', 'readOnly'); $('#precio36').attr('readOnly', 'readOnly'); $('#precio37').attr('readOnly', 'readOnly'); $('#precio38').attr('readOnly', 'readOnly');
            $('#talla39').attr('readOnly', 'readOnly'); $('#talla40').attr('readOnly', 'readOnly'); $('#talla41').attr('readOnly', 'readOnly'); $('#talla42').attr('readOnly', 'readOnly');
            $('#precio39').attr('readOnly', 'readOnly'); $('#precio40').attr('readOnly', 'readOnly'); $('#precio41').attr('readOnly', 'readOnly'); $('#precio42').attr('readOnly', 'readOnly');
            $('#talla43').attr('readOnly', 'readOnly');
            $('#precio43').attr('readOnly', 'readOnly');
            document.getElementById("tallaS").value = ""; document.getElementById("tallaM").value = ""; document.getElementById("tallaL").value = ""; document.getElementById("tallaXL").value = ""; document.getElementById("tallaXXL").value = "";
            document.getElementById("precioS").value = ""; document.getElementById("precioM").value = ""; document.getElementById("precioL").value = ""; document.getElementById("precioXL").value = ""; document.getElementById("precioXXL").value = "";
            document.getElementById("talla28").value = ""; document.getElementById("talla29").value = ""; document.getElementById("talla30").value = ""; document.getElementById("talla31").value = ""; document.getElementById("talla32").value = "";
            document.getElementById("precio28").value = ""; document.getElementById("precio29").value = ""; document.getElementById("precio30").value = ""; document.getElementById("precio31").value = ""; document.getElementById("precio32").value = "";
            document.getElementById("talla33").value = ""; document.getElementById("talla34").value = ""; document.getElementById("talla35").value = ""; document.getElementById("talla36").value = ""; document.getElementById("talla37").value = "";
            document.getElementById("precio33").value = ""; document.getElementById("precio34").value = ""; document.getElementById("precio35").value = ""; document.getElementById("precio36").value = ""; document.getElementById("precio37").value = "";
            document.getElementById("talla38").value = ""; document.getElementById("talla39").value = ""; document.getElementById("talla40").value = ""; document.getElementById("talla41").value = ""; document.getElementById("talla42").value = "";
            document.getElementById("precio38").value = ""; document.getElementById("precio39").value = ""; document.getElementById("precio40").value = ""; document.getElementById("precio41").value = ""; document.getElementById("precio42").value = "";
            document.getElementById("talla43").value = "";
            document.getElementById("precio43").value = "";
            document.getElementById("precio").value = "";
            document.getElementById("cantidad").value = "";
        } else if ($(this).val() == '2') {
            //Desbloquear tallas unicas
            $('#tallaU').removeAttr('readOnly');
            $('#precioU').removeAttr('readOnly');
            //limpiar tallas multiples y bloquearlas.
            $('#tallaS').attr('readOnly', 'readOnly'); $('#tallaM').attr('readOnly', 'readOnly'); $('#tallaL').attr('readOnly', 'readOnly'); $('#tallaXL').attr('readOnly', 'readOnly');
            $('#precioS').attr('readOnly', 'readOnly'); $('#precioM').attr('readOnly', 'readOnly'); $('#precioL').attr('readOnly', 'readOnly'); $('#precioXL').attr('readOnly', 'readOnly');
            $('#tallaXXL').attr('readOnly', 'readOnly'); $('#talla28').attr('readOnly', 'readOnly'); $('#talla29').attr('readOnly', 'readOnly'); $('#talla30').attr('readOnly', 'readOnly');
            $('#precioXXL').attr('readOnly', 'readOnly'); $('#precio28').attr('readOnly', 'readOnly'); $('#precio29').attr('readOnly', 'readOnly'); $('#precio30').attr('readOnly', 'readOnly');
            $('#talla31').attr('readOnly', 'readOnly'); $('#talla32').attr('readOnly', 'readOnly'); $('#talla33').attr('readOnly', 'readOnly'); $('#talla34').attr('readOnly', 'readOnly');
            $('#precio31').attr('readOnly', 'readOnly'); $('#precio32').attr('readOnly', 'readOnly'); $('#precio33').attr('readOnly', 'readOnly'); $('#precio34').attr('readOnly', 'readOnly');
            $('#talla35').attr('readOnly', 'readOnly'); $('#talla36').attr('readOnly', 'readOnly'); $('#talla37').attr('readOnly', 'readOnly'); $('#talla38').attr('readOnly', 'readOnly');
            $('#precio35').attr('readOnly', 'readOnly'); $('#precio36').attr('readOnly', 'readOnly'); $('#precio37').attr('readOnly', 'readOnly'); $('#precio38').attr('readOnly', 'readOnly');
            $('#talla39').attr('readOnly', 'readOnly'); $('#talla40').attr('readOnly', 'readOnly'); $('#talla41').attr('readOnly', 'readOnly'); $('#talla42').attr('readOnly', 'readOnly');
            $('#precio39').attr('readOnly', 'readOnly'); $('#precio40').attr('readOnly', 'readOnly'); $('#precio41').attr('readOnly', 'readOnly'); $('#precio42').attr('readOnly', 'readOnly');
            $('#talla43').attr('readOnly', 'readOnly');
            $('#precio43').attr('readOnly', 'readOnly');
            document.getElementById("tallaS").value = ""; document.getElementById("tallaM").value = ""; document.getElementById("tallaL").value = ""; document.getElementById("tallaXL").value = ""; document.getElementById("tallaXXL").value = "";
            document.getElementById("precioS").value = ""; document.getElementById("precioM").value = ""; document.getElementById("precioL").value = ""; document.getElementById("precioXL").value = ""; document.getElementById("precioXXL").value = "";
            document.getElementById("talla28").value = ""; document.getElementById("talla29").value = ""; document.getElementById("talla30").value = ""; document.getElementById("talla31").value = ""; document.getElementById("talla32").value = "";
            document.getElementById("precio28").value = ""; document.getElementById("precio29").value = ""; document.getElementById("precio30").value = ""; document.getElementById("precio31").value = ""; document.getElementById("precio32").value = "";
            document.getElementById("talla33").value = ""; document.getElementById("talla34").value = ""; document.getElementById("talla35").value = ""; document.getElementById("talla36").value = ""; document.getElementById("talla37").value = "";
            document.getElementById("precio33").value = ""; document.getElementById("precio34").value = ""; document.getElementById("precio35").value = ""; document.getElementById("precio36").value = ""; document.getElementById("precio37").value = "";
            document.getElementById("talla38").value = ""; document.getElementById("talla39").value = ""; document.getElementById("talla40").value = ""; document.getElementById("talla41").value = ""; document.getElementById("talla42").value = "";
            document.getElementById("precio38").value = ""; document.getElementById("precio39").value = ""; document.getElementById("precio40").value = ""; document.getElementById("precio41").value = ""; document.getElementById("precio42").value = "";
            document.getElementById("talla43").value = "";
            document.getElementById("precio43").value = "";
            document.getElementById("precio").value = "";
            document.getElementById("cantidad").value = "";

        } else if ($(this).val() == '3') {
            //Desbloquear tallas multiples
            $('#tallaS').removeAttr('readOnly'); $('#tallaM').removeAttr('readOnly'); $('#tallaL').removeAttr('readOnly'); $('#tallaXL').removeAttr('readOnly');
            $('#precioS').removeAttr('readOnly'); $('#precioM').removeAttr('readOnly'); $('#precioL').removeAttr('readOnly'); $('#precioXL').removeAttr('readOnly');
            $('#tallaXXL').removeAttr('readOnly'); $('#talla28').removeAttr('readOnly'); $('#talla29').removeAttr('readOnly'); $('#talla30').removeAttr('readOnly');
            $('#precioXXL').removeAttr('readOnly'); $('#precio28').removeAttr('readOnly'); $('#precio29').removeAttr('readOnly'); $('#precio30').removeAttr('readOnly');
            $('#talla31').removeAttr('readOnly'); $('#talla32').removeAttr('readOnly'); $('#talla33').removeAttr('readOnly'); $('#talla34').removeAttr('readOnly');
            $('#precio31').removeAttr('readOnly'); $('#precio32').removeAttr('readOnly'); $('#precio33').removeAttr('readOnly'); $('#precio34').removeAttr('readOnly');
            $('#talla35').removeAttr('readOnly'); $('#talla36').removeAttr('readOnly'); $('#talla37').removeAttr('readOnly'); $('#talla38').removeAttr('readOnly');
            $('#precio35').removeAttr('readOnly'); $('#precio36').removeAttr('readOnly'); $('#precio37').removeAttr('readOnly'); $('#precio38').removeAttr('readOnly');
            $('#talla39').removeAttr('readOnly'); $('#talla40').removeAttr('readOnly'); $('#talla41').removeAttr('readOnly'); $('#talla42').removeAttr('readOnly');
            $('#precio39').removeAttr('readOnly'); $('#precio40').removeAttr('readOnly'); $('#precio41').removeAttr('readOnly'); $('#precio42').removeAttr('readOnly');
            $('#talla43').removeAttr('readOnly');
            $('#precio43').removeAttr('readOnly');
            //Bloquear y limpiar talla unica
            $('#tallaU').attr('readOnly', 'readOnly').value = "";
            $('#precioU').attr('readOnly', 'readOnly').value = "";
            document.getElementById("tallaU").value = "";
            document.getElementById("precioU").value = "";
            document.getElementById("precio").value = "";
            document.getElementById("cantidad").value = "";
        }
    });
});
$(document).ready(function () {
    $('#my_selector2').on('change', function () {
        if ($(this).val() == '2') {
            //Desbloquear tallas unicas
            $('#tallaU').removeAttr('readOnly');
            $('#precioU').removeAttr('readOnly');
            //Bloquear multiples tallas
            $('#tallaS').attr('readOnly', 'readOnly'); $('#tallaM').attr('readOnly', 'readOnly'); $('#tallaL').attr('readOnly', 'readOnly'); $('#tallaXL').attr('readOnly', 'readOnly');
            $('#precioS').attr('readOnly', 'readOnly'); $('#precioM').attr('readOnly', 'readOnly'); $('#precioL').attr('readOnly', 'readOnly'); $('#precioXL').attr('readOnly', 'readOnly');
            $('#tallaXXL').attr('readOnly', 'readOnly'); $('#talla28').attr('readOnly', 'readOnly'); $('#talla29').attr('readOnly', 'readOnly'); $('#talla30').attr('readOnly', 'readOnly');
            $('#precioXXL').attr('readOnly', 'readOnly'); $('#precio28').attr('readOnly', 'readOnly'); $('#precio29').attr('readOnly', 'readOnly'); $('#precio30').attr('readOnly', 'readOnly');
            $('#talla31').attr('readOnly', 'readOnly'); $('#talla32').attr('readOnly', 'readOnly'); $('#talla33').attr('readOnly', 'readOnly'); $('#talla34').attr('readOnly', 'readOnly');
            $('#precio31').attr('readOnly', 'readOnly'); $('#precio32').attr('readOnly', 'readOnly'); $('#precio33').attr('readOnly', 'readOnly'); $('#precio34').attr('readOnly', 'readOnly');
            $('#talla35').attr('readOnly', 'readOnly'); $('#talla36').attr('readOnly', 'readOnly'); $('#talla37').attr('readOnly', 'readOnly'); $('#talla38').attr('readOnly', 'readOnly');
            $('#precio35').attr('readOnly', 'readOnly'); $('#precio36').attr('readOnly', 'readOnly'); $('#precio37').attr('readOnly', 'readOnly'); $('#precio38').attr('readOnly', 'readOnly');
            $('#talla39').attr('readOnly', 'readOnly'); $('#talla40').attr('readOnly', 'readOnly'); $('#talla41').attr('readOnly', 'readOnly'); $('#talla42').attr('readOnly', 'readOnly');
            $('#precio39').attr('readOnly', 'readOnly'); $('#precio40').attr('readOnly', 'readOnly'); $('#precio41').attr('readOnly', 'readOnly'); $('#precio42').attr('readOnly', 'readOnly');
            $('#talla43').attr('readOnly', 'readOnly');
            $('#precio43').attr('readOnly', 'readOnly');

        } else if ($(this).val() == '3') {
            //Desbloquear tallas multiples
            $('#tallaS').removeAttr('readOnly'); $('#tallaM').removeAttr('readOnly'); $('#tallaL').removeAttr('readOnly'); $('#tallaXL').removeAttr('readOnly');
            $('#precioS').removeAttr('readOnly'); $('#precioM').removeAttr('readOnly'); $('#precioL').removeAttr('readOnly'); $('#precioXL').removeAttr('readOnly');
            $('#tallaXXL').removeAttr('readOnly'); $('#talla28').removeAttr('readOnly'); $('#talla29').removeAttr('readOnly'); $('#talla30').removeAttr('readOnly');
            $('#precioXXL').removeAttr('readOnly'); $('#precio28').removeAttr('readOnly'); $('#precio29').removeAttr('readOnly'); $('#precio30').removeAttr('readOnly');
            $('#talla31').removeAttr('readOnly'); $('#talla32').removeAttr('readOnly'); $('#talla33').removeAttr('readOnly'); $('#talla34').removeAttr('readOnly');
            $('#precio31').removeAttr('readOnly'); $('#precio32').removeAttr('readOnly'); $('#precio33').removeAttr('readOnly'); $('#precio34').removeAttr('readOnly');
            $('#talla35').removeAttr('readOnly'); $('#talla36').removeAttr('readOnly'); $('#talla37').removeAttr('readOnly'); $('#talla38').removeAttr('readOnly');
            $('#precio35').removeAttr('readOnly'); $('#precio36').removeAttr('readOnly'); $('#precio37').removeAttr('readOnly'); $('#precio38').removeAttr('readOnly');
            $('#talla39').removeAttr('readOnly'); $('#talla40').removeAttr('readOnly'); $('#talla41').removeAttr('readOnly'); $('#talla42').removeAttr('readOnly');
            $('#precio39').removeAttr('readOnly'); $('#precio40').removeAttr('readOnly'); $('#precio41').removeAttr('readOnly'); $('#precio42').removeAttr('readOnly');
            $('#talla43').removeAttr('readOnly');
            $('#precio43').removeAttr('readOnly');
            //Bloquear talla unica
            $('#tallaU').attr('readOnly', 'readOnly').value = "";
            $('#precioU').attr('readOnly', 'readOnly').value = "";
        }
    });
});