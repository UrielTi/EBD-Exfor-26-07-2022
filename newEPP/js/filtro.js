$(document).ready(function () {
    $('#select_nucleo').on('change', function () {
        if ($(this).val() == '1') {
            document.getElementById("input_nucleo").value = "1";
        } else {
            if ($(this).val() == '2') {
                document.getElementById("input_nucleo").value = "2";
            } else {
                if ($(this).val() == '3') {
                    document.getElementById("input_nucleo").value = "3";
                }
            }
        }
    })
})