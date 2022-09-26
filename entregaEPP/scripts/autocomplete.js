$(document).ready(function() {
    $("#codigoElement").on('change', function() {
        $.ajax({
            url: 'autocompleteElement.php',
            type: 'POST',
            dataType: 'json',
            data: {
                codigo: $('#codigoElement').val()
            }
        }).done(function(element) {
            const selector = document.querySelector("#tallaElement");

            for (let i = selector.options.length; i >= 1; i--) {
                selector.remove(i);
            }

            $("#stockElement").val(element.stock);
            $("#id_elemento").val('');
            $("#id_elemento").val(element.id);

            const count = element.count * 3;
            const tallasArray = [element.TS, element.TL, element.TXL, element.TXXL, element.T28, element.T29, element.T30, element.T31, element.T32, element.T33, element.T34, element.T35, element.T36, element.T37, element.T38, element.T39, element.T40, element.T41, element.T42, element.T43];
            const tallasPush = []

            for (var i = 0; i <= count; i++) {
                while (tallasArray[i] != null) {
                    tallasPush.push(tallasArray[i]);
                    break;
                }
            }

            if (element.TU != null) {
                selector.options[1] = new Option(element.TU, element.TU);
            } else {
                for (var i = 0; i < tallasPush.length; i++) {
                    j = i + 1;
                    selector.options[j] = new Option(tallasPush[i], tallasPush[i]);
                }
            }
        });
    });
});