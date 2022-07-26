<?php
// Guardar correctamente el proceso obteniendo el id y convirtiendolo en un dato texto.
if ($select_proceso == '1') {
    $proceso = 'DIRECCIONAMIENTO ESTRATEGICO';
}
else if ($select_proceso == '2') {
    $proceso = 'SILVICULTURA';
}
else if ($select_proceso == '3') {
    $proceso = 'APROVECHAMIENTO';
}
else if ($select_proceso == '4') {
    $proceso = 'ADMINISTRATIVO';
}
else if ($select_proceso == '5') {
    $proceso = 'FINANCIERO';
}
else if ($select_proceso == '6') {
    $proceso = 'GESTION DEL RIESGO';
}
else if ($select_proceso == '7') {
    $proceso = 'GESTION DE LA INFORMACION';
}
else if ($select_proceso == '8') {
    $proceso = 'SOCIAL';
}
else if ($select_proceso == '9') {
    $proceso = 'OPERATIVO';
}
else if ($select_proceso == '10') {
    $proceso = 'VIAS';
}
else if ($select_proceso == '11') {
    $proceso = 'INVENTARIO FORESTAL';
}
// Guardar correctamente el tipo de documento obteniendo el id y convirtiendo a un dato texto.
if ($select_tipo == '1') {
    $tipo = 'FORMATO';
}
else if ($select_tipo == '2') {
    $tipo = 'INSTRUCTIVO';
}
else if ($select_tipo == '3') {
    $tipo = 'SUBPROGRAMA';
}
else if ($select_tipo == '4') {
    $tipo = 'PROCEDIMIENTO';
}
else if ($select_tipo == '5') {
    $tipo = 'DOCUMENTO';
}
else if ($select_tipo == '6') {
    $tipo = 'NORMA';
}
else if ($select_tipo == '7') {
    $tipo = 'PROGRAMA';
}
else if ($select_tipo == '8') {
    $tipo = 'POLITICA';
}
else if ($select_tipo == '9') {
    $tipo = 'MANUAL';
}
else if ($select_tipo == '10') {
    $tipo = 'MATRIZ';
}
else if ($select_tipo == '11') {
    $tipo = 'PLAN';
}
else if ($select_tipo == '12') {
    $tipo = 'LISTADO';
}
else if ($select_tipo == '13') {
    $tipo = 'CRONOGRAMA';
}
else if ($select_tipo == '14') {
    $tipo = 'PLANTILLA';
}
?>