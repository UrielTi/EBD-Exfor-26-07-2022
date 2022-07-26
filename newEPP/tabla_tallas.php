<div class="input-group shadow-sm">
    <label class="input-group-text w-auto">(*) TALLAS: </label>
    <select id="my_selector" name="tipo_talla" class="form-select" aria-label="Default select example">
        <option value="1" selected>Elige tipo de talla</option>
        <option value="2">Talla Unica</option>
        <option value="3">Múltiples Tallas</option>
    </select>
</div>

<br>
<h7>
    <small class="text-muted">Dar clic en los botones para diligenciar cantidad y precios.</small>
</h7><br>
<!-- botones de las tallas -->
<center>
    <p>
        <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#talla_unica" role="button" aria-expanded="false" aria-controls="talla_unica">TALLA ÚNICA</a>
        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#talla_letras" aria-expanded="false" aria-controls="talla_letras">TALLA EN LETRAS</button>
        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#talla_numeros" aria-expanded="false" aria-controls="talla_numeros">TALLA EN NÚMEROS</button>
        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="talla_unica talla_letras talla_numeros">MOSTRAR/OCULTAR TODO</button>
    </p>
</center>

<!-- talla unica -->
<div class="collapse multi-collapse" id="talla_unica">
    <div class="card card-body">

        <h6>Registrar elementos con talla única:</h6>
        <h7>
            <small class="text-muted">Diligenciar precios sin puntos ni comas.</small>
        </h7><br>
        <div class="card-header">
            Talla única
        </div>
        <ul class="list-group list-group-flush">
            <input name="tallaU" id="tallaU" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
            <input name="precioU" id="precioU" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
        </ul>
    </div>
</div>
<!-- talla en letras -->
<div class="col">
    <div class="collapse multi-collapse" id="talla_letras">
        <div class="card card-body">

            <h6>Registrar elementos con talla en letras:</h6>
            <h7>
            <small class="text-muted">Diligenciar precios sin puntos ni comas.</small>
            </h7><br>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla S
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="tallaS" id="tallaS" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precioS" id="precioS" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla M
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="tallaM" id="tallaM" class="form-control" type="number" min="0" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precioM" id="precioM" class="form-control" type="number" min="0" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla L
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="tallaL" id="tallaL" class="form-control" type="number" min="0" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precioL" id="precioL" class="form-control" type="number" min="0" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla XL
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="tallaXL" id="tallaXL" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precioXL" id="precioXL" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla XXL
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="tallaXXL" id="tallaXXL" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precioXXL" id="precioXXL" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- talla en números -->
<div class="col">
    <div class="collapse multi-collapse" id="talla_numeros">
        <div class="card card-body">
            
            <h6>Registrar elementos con talla en números:</h6>
            <h7>
            <small class="text-muted">Diligenciar precios sin puntos ni comas.</small>
            </h7><br>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 28
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla28" id="talla28" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio28" id="precio28" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 29
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla29" id="talla29" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio29" id="precio29" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 30
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla30" id="talla30" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio30" id="precio30" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 31
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla31" id="talla31" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio31" id="precio31" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 32
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla32" id="talla32" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio32" id="precio32" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 33
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla33" id="talla33" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio33" id="precio33" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 34
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla34" id="talla34" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio34" id="precio34" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 35
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla35" id="talla35" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio35" id="precio35" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 36
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla36" id="talla36" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio36" id="precio36" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 37
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla37" id="talla37" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio37" id="precio37" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 38
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla38" id="talla38" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio38" id="precio38" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 39
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla39" id="talla39" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio39" id="precio39" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 40
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla40" id="talla40" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio40" id="precio40" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 41
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla41" id="talla41" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio41" id="precio41" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 42
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla42" id="talla42" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio42" id="precio42" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>&nbsp;
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Talla 43
                    </div>
                    <ul class="list-group list-group-flush">
                        <input name="talla43" id="talla43" class="form-control" type="number" min="0" oninput="CantTotal();" placeholder="CANTIDAD" readonly>
                        <input name="precio43" id="precio43" class="form-control" type="number" min="0" oninput="PrecTotal();" placeholder="PRECIO" readonly>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>