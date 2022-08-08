// Constantes para el div contenedor de los inputs y el botón de agregar
const contenedor = document.querySelector('#element-dinamic');
const btnAgregar = document.querySelector('#button-add-element');
// Variable para el total de elementos agregados
let total = 1;

/**
 * Método que se ejecuta cuando se da clic al botón de agregar elementos
 */
btnAgregar.addEventListener('click', e => {
    let div = document.createElement('div');
    // Conjunto de Inputs del elemento.
    // const numCons = `<span class="badge text-bg-dark">${total++}</span>`;
    const contDiv = `<div class="input-group">`;
    // const spanEnumDinamic = `<span class="input-group-text rounded-start">${total++}</span>`;
    const inputEnumDinamic = `<input name="enum_elemento[]" type="int" value="${total++}"></input>`;
    const spanElementDinamic = `<span class="input-group-text w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Elemento:</span>`;
    const inputElementDinamic = `<input type="text" id="nombre-elemento" name="nombre-elemento[]" class="form-control rounded-end w-auto shadow-sm" list="elementList" placeholder="Buscar..." required style="margin-right: 10px;";>`;
    const spanTallaDinamic = `<span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Talla:</span>`;
    const inputTallaDinamic = `<input type="text" name="talla-elemento[]" class="form-control rounded-end w-auto shadow-sm" list="tallaList" placeholder="Selecciona" autocomplete="off" required style="margin-right: 10px;";>`;
    const spanCantDinamic = `<span class="input-group-text rounded-start w-auto shadow-sm" style="background-color: #198754; color: #FFFFFF;" ;>Cantidad:</span>`;
    const inputCantDinamic = `<input type="text" name="cantidad-elemento[]" class="form-control rounded-end w-auto shadow-sm" list="cantList" placeholder="Digita Cantidad" autocomplete="off" required style="margin-right: 10px;";>`;
    const inputStock = `<input type="int" class="form-control rounded-pill shadow-sm" style="background-color: #198754; color: white; margin-right: 5px;" readonly;>`;
    const dateRegElement = `<input type="date" name="fecha-reg-element[]" id="fecha-reg-element" class="form-control shadow-sm rounded-pill" style="background-color: #198754; color: white;" required>`;
    const endDiv = `</div>`;
    const buttonDelete = `<button class="btn btn-outline-danger btn-sm float-end rounded-pill" onclick="eliminar(this)"><i class="bi bi-x-lg"></i></button>`;

    div.innerHTML = buttonDelete + inputEnumDinamic + contDiv + spanElementDinamic + inputElementDinamic + spanTallaDinamic + inputTallaDinamic + spanCantDinamic + inputCantDinamic + inputStock + dateRegElement + endDiv;
    contenedor.appendChild(div);
});

/**
 * Método para eliminar el div contenedor del input
 * @param {this} e 
 */
const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedor.removeChild(divPadre);
    actualizarContador();
};

/**
 * Método para actualizar el contador de los elementos agregados
*/
const actualizarContador = () => {
    let divs = contenedor.children;
    total = 1;
    for (let i = 0; i < divs.length; i++) {
        divs[i].children[1].value = total++;
    }//end for
};