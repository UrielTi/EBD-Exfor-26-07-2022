<!-- botones de las tallas -->
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
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_unica">
        <div class="card card-body" style="width: 200px; border-color: #198754;">
            <small class="text-muted"> Talla única: </small>
            <input name="tallaU" id="tallaU" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioU" id="precioU" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_unica">
        <a class="btn btn-success" style="margin-left: 10px;" data-bs-toggle="collapse" role="button" aria-expanded="true" href="#talla_unica" aria-controls="talla_unica"><i class="bi bi-dash-lg"></i></a>
    </div>
</div>

<!-- talla en letras -->
<div class="d-flex justify-content-center flex-wrap">
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla S: </small>
            <input name="tallaS" id="tallaS" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioS" id="precioS" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla M: </small>
            <input name="tallaM" id="tallaM" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioM" id="precioM" class="form-control" style="border-color: #198754;" type="number" min="0" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla L: </small>
            <input name="tallaL" id="tallaL" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioL" id="precioL" class="form-control" style="border-color: #198754;" type="number" min="0" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla XL: </small>
            <input name="tallaXL" id="tallaXL" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioXL" id="precioXL" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_letras">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla XXL: </small>
            <input name="tallaXXL" id="tallaXXL" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioXXL" id="precioXXL" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_letras">
        <a class="btn btn-success" data-bs-toggle="collapse" role="button" aria-expanded="true" href="#talla_letras" aria-controls="talla_letras"><i class="bi bi-dash-lg"></i></a>
    </div>
</div>
<!-- talla en números -->
<div class="d-flex justify-content-center flex-wrap">
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 28: </small>
            <input name="talla28" id="talla28" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio28" id="precio28" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>
    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 29: </small>
            <input name="talla29" id="talla29" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio29" id="precio29" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 30: </small>
            <input name="talla30" id="talla30" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio30" id="precio30" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 31: </small>
            <input name="talla31" id="talla31" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio31" id="precio31" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 32: </small>
            <input name="talla32" id="talla32" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio32" id="precio32" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 33: </small>
            <input name="talla33" id="talla33" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio33" id="precio33" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 34: </small>
            <input name="talla34" id="talla34" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio34" id="precio34" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 35: </small>
            <input name="talla35" id="talla35" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio35" id="precio35" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 36: </small>
            <input name="talla36" id="talla36" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio36" id="precio36" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 37: </small>
            <input name="talla37" id="talla37" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio37" id="precio37" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 38: </small>
            <input name="talla38" id="talla38" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio38" id="precio38" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 39: </small>
            <input name="talla39" id="talla39" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio39" id="precio39" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 40: </small>
            <input name="talla40" id="talla40" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio40" id="precio40" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 41: </small>
            <input name="talla41" id="talla41" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio41" id="precio41" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 42: </small>
            <input name="talla42" id="talla42" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio42" id="precio42" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>

    <div class="collapse collapse-horizontal" style="margin-bottom: 10px;" id="talla_numeros">
        <div class="card card-body" style="width: 150px; border-color: #198754; margin-right: 10px;">
            <small class="text-muted"> Talla 43: </small>
            <input name="talla43" id="talla43" class="form-control" style="border-color: #198754; margin-bottom: 5px;" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precio43" id="precio43" class="form-control" style="border-color: #198754;" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>

        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="collapse collapse-horizontal" id="talla_numeros">
        <a class="btn btn-success" data-bs-toggle="collapse" role="button" aria-expanded="true" href="#talla_numeros" aria-controls="talla_numeros"><i class="bi bi-dash-lg"></i></a>
    </div>
</div>