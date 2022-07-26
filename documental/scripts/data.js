function loadDataDocumental(icon, titulo, archivo, idC) {
    document.getElementById("titulo").innerHTML = '<i class="' + icon + '"></i>' + titulo;
    $(".modal-body").load(archivo + ".php?id=" + idC, function() {
        $("#viewDocumental").modal({
            show: true
        });
    });
}

function loadDataTarea(icon, titulo, idC) {
    document.getElementById("titulo").innerHTML = '<i class="' + icon + '"></i>' + titulo;
    $(".modal-body").load("../tareas/crudTarea.php?grupo=" + idC, function() {
        $("#viewDocumental").modal({
            show: true
        });
    });
}