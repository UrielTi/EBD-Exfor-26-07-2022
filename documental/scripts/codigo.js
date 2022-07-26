// Select proceso de documento
$(document).ready(function () {
  $('#select_proceso').on('change', function () {

    if ($(this).val() == '1') {
      document.getElementById("input_proceso").value = "10";
    }
    else if ($(this).val() == '2') {
      document.getElementById("input_proceso").value = "20";
    }
    else if ($(this).val() == '3') {
      document.getElementById("input_proceso").value = '30';
    }
    else if ($(this).val() == '4') {
      document.getElementById("input_proceso").value = '40';
    }
    else if ($(this).val() == '5') {
      document.getElementById("input_proceso").value = '50';
    }
    else if ($(this).val() == '6') {
      document.getElementById("input_proceso").value = '60';
    }
    else if ($(this).val() == '7') {
      document.getElementById("input_proceso").value = '70';
    }
    else if ($(this).val() == '8') {
      document.getElementById("input_proceso").value = '80';
    }
    else if ($(this).val() == '9') {
      document.getElementById("input_proceso").value = '90';
    }
    else if ($(this).val() == '10') {
      document.getElementById("input_proceso").value = '100';
    }
    else if ($(this).val() == '11') {
      document.getElementById("input_proceso").value = '110';
    }
    else if ($(this).val() == '') {
      document.getElementById("input_proceso").value = "";
    }
  });
});
// Select tipo de documento
$(document).ready(function () {
  $('#select_tipo').on('change', function () {

    if ($(this).val() == '1') {
      document.getElementById("input_tipo").value = "100";
    }
    else if ($(this).val() == '2') {
      document.getElementById("input_tipo").value = "200";
    }
    else if ($(this).val() == '3') {
      document.getElementById("input_tipo").value = '300';
    }
    else if ($(this).val() == '4') {
      document.getElementById("input_tipo").value = '400';
    }
    else if ($(this).val() == '5') {
      document.getElementById("input_tipo").value = '500';
    }
    else if ($(this).val() == '6') {
      document.getElementById("input_tipo").value = '600';
    }
    else if ($(this).val() == '7') {
      document.getElementById("input_tipo").value = '700';
    }
    else if ($(this).val() == '8') {
      document.getElementById("input_tipo").value = '800';
    }
    else if ($(this).val() == '9') {
      document.getElementById("input_tipo").value = '900';
    }
    else if ($(this).val() == '10') {
      document.getElementById("input_tipo").value = '1000';
    }
    else if ($(this).val() == '11') {
      document.getElementById("input_tipo").value = '1100';
    }
    else if ($(this).val() == '12') {
      document.getElementById("input_tipo").value = '1200';
    }
    else if ($(this).val() == '13') {
      document.getElementById("input_tipo").value = '1300';
    }
    else if ($(this).val() == '14') {
      document.getElementById("input_tipo").value = '1400';
    }
    else if ($(this).val() == '') {
      document.getElementById("input_tipo").value = "";
    }
  });
});
// Select consecutivo
$(document).ready(function () {
  $('#select_consecutivo').on('change', function () {
    let val = $(this).val();
    if ($(this).val() > '0') {
      document.getElementById("input_consecutivo").value = val;
    }
    else if ($(this).val() == '') {
      document.getElementById("input_consecutivo").value = "";
    }
  });
});