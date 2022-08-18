<?php
// Guardar correctamente el proceso obteniendo el texto y convirtiendolo en int.
if ($queryProceso == 'DIRECCIONAMIENTO ESTRATEGICO') {
    $input_proceso = '10';
}
else if ($queryProceso == 'SILVICULTURA') {
    $input_proceso = '20';
}
else if ($queryProceso == 'APROVECHAMIENTO') {
    $input_proceso = '30';
}
else if ($queryProceso == 'ADMINISTRATIVO') {
    $input_proceso = '40';
}
else if ($queryProceso == 'FINANCIERO') {
    $input_proceso = '50';
}
else if ($queryProceso == 'GESTION DEL RIESGO') {
    $input_proceso = '60';
}
else if ($queryProceso == 'GESTION DE LA INFORMACION') {
    $input_proceso = '70';
}
else if ($queryProceso == 'SOCIAL') {
    $input_proceso = '80';
}
else if ($queryProceso == 'OPERATIVO') {
    $input_proceso = '90';
}
else if ($queryProceso == 'VIAS') {
    $input_proceso = '100';
}
else if ($queryProceso == 'INVENTARIO FORESTAL') {
    $input_proceso = '110';
}