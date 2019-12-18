var ofertas;
var carrito = new Array();

window.onload = function () {

    document.getElementById("cartn").innerHTML = "0";

    if (getCookie("cartshop")) {
        var aux = JSON.parse(getCookie("cartshop"));
        for (var k = 0; k < aux.length; k++) {
            carrito.push(aux[k]);
        }

    } else {
        carrito = JSON.parse(getCookie("cartshop"));
        //cambiar toda la tabla y decir que no hay nada por mostrar
    }

    ofertas = aux.length;
    pagecar();


};

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function del(id_prod) {

    var auxi = new Array();
    for (var i = 0; i < carrito.length; i++) {
        if(carrito[i]['id'] != id_prod){
            auxi.push(carrito[i]);
        }
    }
    carrito = auxi;
    pagecar();

    document.cookie = "cartshop = " + JSON.stringify(carrito);
}

function changemas(id_prod) {

    var band;
    var id = id_prod;
    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i]['cantidad'] > 0 && carrito[i]['id'] == id_prod) {
            carrito[i]['cantidad']++;
            band = true;
        }
    }

    pagecar();

    document.cookie = "cartshop = " + JSON.stringify(carrito);

}

function changemenos(id_prod) {

    var band;
    var id = id_prod;
    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i]['cantidad'] > 0 && carrito[i]['id'] == id_prod) {
            carrito[i]['cantidad']--;
            band = true;
        }
    }


    pagecar();


    document.cookie = "cartshop = " + JSON.stringify(carrito);



}

function pagecar() {
    prod = carrito;
    var band = false;
    var total = 0;
    var tot=0;
    var numero = document.getElementById("cartn");
    numero.innerHTML = carrito.length;
    var tbody = document.getElementById("tbody"); //modificar el contenido de la tabla
    tbody.innerHTML = "";
    tbody.className = "order-table";

    for (var i = 0; i < prod.length; i++) {
        tot = 0;
        band = false;


        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        td1.className = "product-col";
        var img = document.createElement("img");
        img.src = prod[i]['imagen'];
        img.className = "imgshop";
        var div1 = document.createElement("div");
        var h5 = document.createElement("h5");
        h5.innerHTML = prod[i]['nombre'];
        div1.appendChild(h5);
        td1.appendChild(img);
        td1.appendChild(div1)
        var td2 = document.createElement("td");
        td2.className = "price-col";
        for (var j = 0; j < ofertas.length; j++) {
            if (ofertas[j]['id_prod'] == prod[i]['id']) {
                td2.innerHTML = " $" + (prod[i]['precio'] - prod[i]['precio'] * ofertas[j]['porcentaje'] / 100);
                total += (prod[i]['precio'] - prod[i]['precio'] * ofertas[j]['porcentaje'] / 100) * prod[i]['cantidad'];
                tot = (prod[i]['precio'] - prod[i]['precio'] * ofertas[j]['porcentaje'] / 100) * prod[i]['cantidad'];
                band = true;
                break;
            }
        }

        if (!band) {
            total += (prod[i]['precio'] * prod[i]['cantidad']);
            tot = (prod[i]['precio'] * prod[i]['cantidad']);
            td2.innerHTML = prod[i]['precio'];
        }


        var td3 = document.createElement("td");
        td3.className = "quantity-col";
        var div2 = document.createElement("div");
        
        
        var input = document.createElement("input");
        input.type = "text";
        input.setAttribute("value",prod[i]['cantidad']);
       
        var buttonmas = document.createElement("button");
        buttonmas.className = "qtybtn";
        var text = "changemas(" + i + ")";
        buttonmas.setAttribute("onClick", text);
        buttonmas.innerHTML = " + ";

        var buttonmenos = document.createElement("button");
        buttonmenos.className = "qtybtn";
        var text2 = "changemenos(" + i + ")";
        buttonmenos.setAttribute("onClick", text2);
        buttonmenos.innerHTML = " - ";

        div2.appendChild(buttonmas);
        div2.appendChild(input);
        div2.appendChild(buttonmenos);
        td3.appendChild(div2);

        var td4 = document.createElement("td");
        td4.className = "total";
        td4.innerHTML = " $ " + tot;

        var td5 = document.createElement("td");
        td5.className = "product-close";
        var but = document.createElement("button");
        but.className = "qtybtn";
        but.innerHTML = "X";
        but.setAttribute("onClick", del(i));
        td5.appendChild(but);



        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);

        tbody.appendChild(tr);


    } //fin for



}
