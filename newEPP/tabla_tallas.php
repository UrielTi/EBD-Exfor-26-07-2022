<!-- botones de las tallas -->
<?php
if (isset($row_epp_talla) == NULL || isset($row_epp_talla) == '0') {
    $row_epp_talla['tipo_talla'] = '1';
}
?>
<center>
    <div class="d-grid gap-2 d-md-block col-6 mx-auto">
        <button class="btn btn-sm btn-success shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#talla_unica" aria-expanded="false" aria-controls="talla_unica">TALLA ÚNICA</button>
        <button class="btn btn-sm btn-success shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#talla_letras" aria-expanded="false" aria-controls="talla_letras">TALLA EN LETRAS</button>
        <button class="btn btn-sm btn-success shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#talla_numeros" aria-expanded="false" aria-controls="talla_numeros">TALLA EN NÚMEROS</button>
    </div>
</center>

<center><small class="text-muted">Diligenciar precios sin puntos ni comas.</small></center>
<!-- talla unica -->
<div class="d-flex justify-content-center flex-wrap">
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 2 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																echo $collapse; ?>style="margin-bottom: 10px;" id="talla_unica">
        <div class="card card-body" style="width: 200px; border-color: #198754;">
            <small class="text-muted"> Talla única: </small>
            <input type="hidden" id="idU" name="idU" value="<?php echo $id_tallaU ?>">
            <input name="tallaU" id="tallaU" value="<?php $valueTU = $cantidadU == '0' ? '' : $cantidadU;
                                                    echo $valueTU; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioU" id="precioU" value="<?php $valuePU = $precioU == '0' ? '' : $precioU;
                                                        echo $valuePU; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_unica">
        <a class="btn btn-sm btn-success" style="margin-left: 10px;" data-bs-toggle="collapse" role="button" aria-expanded="true" href="#talla_unica" aria-controls="talla_unica"><i class="bi bi-dash-lg"></i></a>
    </div>
</div>

<!-- talla en letras -->
<div class="d-flex justify-content-center flex-wrap">
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?>style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla S: </small>
            <input type="hidden" id="idS" name="idS" value="<?php echo $id_tallaS ?>">
            <input name="tallaS" id="tallaS" value="<?php $valueTS = $cantidadS == '0' ? '' : $cantidadS;
                                                    echo $valueTS; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioS" id="precioS" value="<?php $valuePS = $precioS == '0' ? '' : $precioS;
                                                        echo $valuePS; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?>style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla M: </small>
            <input type="hidden" id="idM" name="idM" value="<?php echo $id_tallaM ?>">
            <input name="tallaM" id="tallaM" value="<?php $valueTM = $cantidadM == '0' ? '' : $cantidadM;
                                                    echo $valueTM; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioM" id="precioM" value="<?php $valuePM = $precioM == '0' ? '' : $precioM;
                                                        echo $valuePM; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?>style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla L: </small>
            <input type="hidden" id="idL" name="idL" value="<?php echo $id_tallaL ?>">
            <input name="tallaL" id="tallaL" value="<?php $valueTL = $cantidadL == '0' ? '' : $cantidadL;
                                                    echo $valueTL; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioL" id="precioL" value="<?php $valuePL = $precioL == '0' ? '' : $precioL;
                                                        echo $valuePL; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?>style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla XL: </small>
            <input type="hidden" id="idXL" name="idXL" value="<?php echo $id_tallaXL ?>">
            <input name="tallaXL" id="tallaXL" value="<?php $valueTXL = $cantidadXL == '0' ? '' : $cantidadXL;
                                                        echo $valueTXL; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioXL" id="precioXL" value="<?php $valuePXL = $precioXL == '0' ? '' : $precioXL;
                                                        echo $valuePXL; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?>style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla XXL: </small>
            <input type="hidden" id="idXXL" name="idXXL" value="<?php echo $id_tallaXXL ?>">
            <input name="tallaXXL" id="tallaXXL" value="<?php $valueTXXL = $cantidadXXL == '0' ? '' : $cantidadXXL;
                                                        echo $valueTXXL; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioXXL" id="precioXXL" value="<?php $valuePXXL = $precioXXL == '0' ? '' : $precioXXL;
                                                            echo $valuePXXL; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?>style="margin-bottom: 10px;" id="talla_letras">
        <a class="btn btn-sm btn-success" data-bs-toggle="collapse" role="button" aria-expanded="true" href="#talla_letras" aria-controls="talla_letras"><i class="bi bi-dash-lg"></i></a>
    </div>
</div>
<!-- talla en números -->
<div class="d-flex justify-content-center flex-wrap">
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 28: </small>
            <input type="hidden" id="id28" name="id28" value="<?php echo $id_talla28 ?>">
            <input name="talla28" id="talla28" value="<?php $valueT28 = $cantidad28 == '0' ? '' : $cantidad28;
                                                        echo $valueT28; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio28" id="precio28" value="<?php $valueP28 = $precio28 == '0' ? '' : $precio28;
                                                        echo $valueP28; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 29: </small>
            <input type="hidden" id="id29" name="id29" value="<?php echo $id_talla29 ?>">
            <input name="talla29" id="talla29" value="<?php $valueT29 = $cantidad29 == '0' ? '' : $cantidad29;
                                                        echo $valueT29; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio29" id="precio29" value="<?php $valueP29 = $precio29 == '0' ? '' : $precio29;
                                                        echo $valueP29; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 30: </small>
            <input type="hidden" id="id30" name="id30" value="<?php echo $id_talla30 ?>">
            <input name="talla30" id="talla30" value="<?php $valueT30 = $cantidad30 == '0' ? '' : $cantidad30;
                                                        echo $valueT30; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio30" id="precio30" value="<?php $valueP30 = $precio30 == '0' ? '' : $precio30;
                                                        echo $valueP30; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 31: </small>
            <input type="hidden" id="id31" name="id31" value="<?php echo $id_talla31 ?>">
            <input name="talla31" id="talla31" value="<?php $valueT31 = $cantidad31 == '0' ? '' : $cantidad31;
                                                        echo $valueT31; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio31" id="precio31" value="<?php $valueP31 = $precio31 == '0' ? '' : $precio31;
                                                        echo $valueP31; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 32: </small>
            <input type="hidden" id="id32" name="id32" value="<?php echo $id_talla32 ?>">
            <input name="talla32" id="talla32" value="<?php $valueT32 = $cantidad32 == '0' ? '' : $cantidad32;
                                                        echo $valueT32; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio32" id="precio32" value="<?php $valueP32 = $precio32 == '0' ? '' : $precio32;
                                                        echo $valueP32; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 33: </small>
            <input type="hidden" id="id33" name="id33" value="<?php echo $id_talla33 ?>">
            <input name="talla33" id="talla33" value="<?php $valueT33 = $cantidad33 == '0' ? '' : $cantidad33;
                                                        echo $valueT33; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio33" id="precio33" value="<?php $valueP33 = $precio33 == '0' ? '' : $precio33;
                                                        echo $valueP33; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 34: </small>
            <input type="hidden" id="id34" name="id34" value="<?php echo $id_talla34 ?>">
            <input name="talla34" id="talla34" value="<?php $valueT34 = $cantidad34 == '0' ? '' : $cantidad34;
                                                        echo $valueT34; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio34" id="precio34" value="<?php $valueP34 = $precio34 == '0' ? '' : $precio34;
                                                        echo $valueP34; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 35: </small>
            <input type="hidden" id="id35" name="id35" value="<?php echo $id_talla35 ?>">
            <input name="talla35" id="talla35" value="<?php $valueT35 = $cantidad35 == '0' ? '' : $cantidad35;
                                                        echo $valueT35; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio35" id="precio35" value="<?php $valueP35 = $precio35 == '0' ? '' : $precio35;
                                                        echo $valueP35; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 36: </small>
            <input type="hidden" id="id36" name="id36" value="<?php echo $id_talla36 ?>">
            <input name="talla36" id="talla36" value="<?php $valueT36 = $cantidad36 == '0' ? '' : $cantidad36;
                                                        echo $valueT36; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio36" id="precio36" value="<?php $valueP36 = $precio36 == '0' ? '' : $precio36;
                                                        echo $valueP36; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 37: </small>
            <input type="hidden" id="id37" name="id37" value="<?php echo $id_talla37 ?>">
            <input name="talla37" id="talla37" value="<?php $valueT37 = $cantidad37 == '0' ? '' : $cantidad37;
                                                        echo $valueT37; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio37" id="precio37" value="<?php $valueP37 = $precio37 == '0' ? '' : $precio37;
                                                        echo $valueP37; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 38: </small>
            <input type="hidden" id="id38" name="id38" value="<?php echo $id_talla38 ?>">
            <input name="talla38" id="talla38" value="<?php $valueT38 = $cantidad38 == '0' ? '' : $cantidad38;
                                                        echo $valueT38; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio38" id="precio38" value="<?php $valueP38 = $precio38 == '0' ? '' : $precio38;
                                                        echo $valueP38; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 39: </small>
            <input type="hidden" id="id39" name="id39" value="<?php echo $id_talla39 ?>">
            <input name="talla39" id="talla39" value="<?php $valueT39 = $cantidad39 == '0' ? '' : $cantidad39;
                                                        echo $valueT39; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio39" id="precio39" value="<?php $valueP39 = $precio39 == '0' ? '' : $precio39;
                                                        echo $valueP39; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 40: </small>
            <input type="hidden" id="id40" name="id40" value="<?php echo $id_talla40 ?>">
            <input name="talla40" id="talla40" value="<?php $valueT40 = $cantidad40 == '0' ? '' : $cantidad40;
                                                        echo $valueT40; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio40" id="precio40" value="<?php $valueP40 = $precio40 == '0' ? '' : $precio40;
                                                        echo $valueP40; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 41: </small>
            <input type="hidden" id="id41" name="id41" value="<?php echo $id_talla41 ?>">
            <input name="talla41" id="talla41" value="<?php $valueT41 = $cantidad41 == '0' ? '' : $cantidad41;
                                                        echo $valueT41; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio41" id="precio41" value="<?php $valueP41 = $precio41 == '0' ? '' : $precio41;
                                                        echo $valueP41; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 42: </small>
            <input type="hidden" id="id42" name="id42" value="<?php echo $id_talla42 ?>">
            <input name="talla42" id="talla42" value="<?php $valueT42 = $cantidad42 == '0' ? '' : $cantidad42;
                                                        echo $valueT42; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio42" id="precio42" value="<?php $valueP42 = $precio42 == '0' ? '' : $precio42;
                                                        echo $valueP42; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 43: </small>
            <input type="hidden" id="id43" name="id43" value="<?php echo $id_talla43 ?>">
            <input name="talla43" id="talla43" value="<?php $valueT43 = $cantidad43 == '0' ? '' : $cantidad43;
                                                        echo $valueT43; ?>" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="calcTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio43" id="precio43" value="<?php $valueP43 = $precio43 == '0' ? '' : $precio43;
                                                        echo $valueP43; ?>" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="calcTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div <?php $collapse = $row_epp_talla['tipo_talla'] == 3 ? 'class="collapse collapse-horizontal show"' : 'class="collapse collapse-horizontal"';
																	echo $collapse; ?> id="talla_numeros">
        <a class="btn btn-sm btn-success" data-bs-toggle="collapse" role="button" aria-expanded="true" href="#talla_numeros" aria-controls="talla_numeros"><i class="bi bi-dash-lg"></i></a>
    </div>
</div>