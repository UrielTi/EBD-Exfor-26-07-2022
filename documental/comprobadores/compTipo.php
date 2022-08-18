<?php
// Guardar correctamente el tipo de documento obteniendo el texto de el query y convertirlo a un dato int.
if ($queryTipo == 'FORMATO') {
    $input_tipo = '100';
}
else if ($queryTipo == 'INSTRUCTIVO') {
    $input_tipo = '200';
}
else if ($queryTipo == 'SUBPROGRAMA') {
    $input_tipo = '300';
}
else if ($queryTipo == 'PROCEDIMIENTO') {
    $input_tipo = '400';
}
else if ($queryTipo == 'DOCUMENTO') {
    $input_tipo = '500';
}
else if ($queryTipo == 'NORMA') {
    $input_tipo = '600';
}
else if ($queryTipo == 'PROGRAMA') {
    $input_tipo = '700';
}
else if ($queryTipo == 'POLITICA') {
    $input_tipo = '800';
}
else if ($queryTipo == 'MANUAL') {
    $input_tipo = '900';
}
else if ($queryTipo == 'MATRIZ') {
    $input_tipo = '1000';
}
else if ($queryTipo == 'PLAN') {
    $input_tipo = '1100';
}
else if ($queryTipo == 'LISTADO') {
    $input_tipo = '1200';
}
else if ($queryTipo == 'CRONOGRAMA') {
    $input_tipo = '1300';
}
else if ($queryTipo == 'PLANTILLA') {
    $input_tipo = '1400';
}
?>