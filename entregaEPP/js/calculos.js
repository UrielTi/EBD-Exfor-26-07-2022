function calculo() {parseFloat
    try {
        var TS = parseFloat(document.getElementById("tallaS").value) || 0,
            TM = parseFloat(document.getElementById("tallaM").value) || 0,
            TL = parseFloat(document.getElementById("tallaL").value) || 0,
            TXL = parseFloat(document.getElementById("tallaXL").value) || 0,
            TXXL = parseFloat(document.getElementById("tallaXXL").value) || 0,
            T28 = parseFloat(document.getElementById("talla28").value) || 0,
            T29 = parseFloat(document.getElementById("talla29").value) || 0,
            T30 = parseFloat(document.getElementById("talla30").value) || 0,
            T31 = parseFloat(document.getElementById("talla31").value) || 0,
            T32 = parseFloat(document.getElementById("talla32").value) || 0,
            T33 = parseFloat(document.getElementById("talla33").value) || 0,
            T34 = parseFloat(document.getElementById("talla34").value) || 0,
            T35 = parseFloat(document.getElementById("talla35").value) || 0,
            T36 = parseFloat(document.getElementById("talla36").value) || 0,
            T37 = parseFloat(document.getElementById("talla37").value) || 0,
            T38 = parseFloat(document.getElementById("talla38").value) || 0,
            T39 = parseFloat(document.getElementById("talla39").value) || 0,
            T40 = parseFloat(document.getElementById("talla40").value) || 0,
            T42 = parseFloat(document.getElementById("talla42").value) || 0,
            T43 = parseFloat(document.getElementById("talla43").value) || 0;
        document.getElementById("cantidad").value = TS+TM+TL+TXL+TXXL+T28+T29+T30+T31+T32+T33+T34+T35+T36+T37+T38+T39+T40+T41+T42+T43;
        
        var cant = parseFloat(document.getElementById("cantidad").value) || 0,
            price = parseFloat(document.getElementById("precio").value) || 0;
        document.getElementById("total").value = cant * price;
    } catch (e) {}
}