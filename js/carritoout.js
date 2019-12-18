var ofertas;
var carrito = new Array();
var cupones;
var cuponesactive = new Array();

window.onload = function() {
    checkcupones();
    document.getElementById("cartn").innerHTML = "0";

    if (getCookie("cartshop")) {
        carrito = JSON.parse(getCookie("cartshop"));
        document.getElementById("cartn").innerHTML = carrito.length;

        if (getCookie("cuponesactive")) {
            cuponesactive = JSON.parse(getCookie("cuponesactive"));
        }
        ofertas = aux.length;
        myFunction();
    }


};



function checkcupones() {
    var peticion = new XMLHttpRequest(); //objeto para realizar el request
    peticion.open("GET", "../php/ConsultaCupones.php", true);
    peticion.setRequestHeader("Content-type", "application/json");
    peticion.onreadystatechange = function(aEvt) {
        if (peticion.readyState == 4) {
            if (peticion.status == 200) {
                if (peticion.responseText != "") { //si la peticion fue exitosa obtenemos los datos
                    cupones = JSON.parse(peticion.responseText);
                    console.log("cupones");
                } else {
                    alert("No OK");
                }
            }
        }
    };
    peticion.send(null);
}

function pagoOXXO() {
    var contenido = document.getElementById("oxxo");
    var img = document.createElement("img");
    img.src = "img/oxxopago.png";
    contenido.appendChild(img);


}


function myFunction() {

    prod = carrito;
    var band;
    var total = 0;
    var tot;
    var numero = document.getElementById("cartn");
    numero.innerHTML = carrito.length;

    var pagetable = document.getElementById("table2");
    pagetable.innerHTML = "";
    pagetable.className = "order-table";

    var ptable = document.getElementById("table"); //modificar el contenido de la tabla
    ptable.innerHTML = "";
    ptable.className = "order-table";

    for (var i = 0; i < prod.length; i++) {
        tot = 0;
        band = false;

        var caritem = document.createElement("div");
        caritem.className = "cart-item";

        var tabpadre = document.createElement("table");

        var tab0 = document.createElement("tr");
        var tab1 = document.createElement("tr");
        var tab2 = document.createElement("tr");
        var tab3 = document.createElement("tr");
        var tab4 = document.createElement("tr");

        var ele0 = document.createElement("td");
        var ele1 = document.createElement("td");
        var ele2 = document.createElement("td");
        var ele3 = document.createElement("td");
        var ele4 = document.createElement("td");
        var ele5 = document.createElement("td");
        var ele6 = document.createElement("td");
        var ele7 = document.createElement("td");
        var ele8 = document.createElement("td");
        var ele9 = document.createElement("td");

        var caritem1 = document.createElement("span");
        caritem1.innerHTML = "Producto: ";
        ele0.appendChild(caritem1);
        var caritem2 = document.createElement("p");
        caritem2.className = "product-name";
        var img = document.createElement("img");
        img.src = prod[i]['imagen'];
        img.className = "imgcart";

        var nom = document.createElement("p");
        nom.innerHTML = "  " + prod[i]['nombre'];

        caritem2.appendChild(img);
        //caritem2.appendChild(document.createElement("br"));
        caritem2.appendChild(nom);

        ele1.appendChild(caritem2);

        tab0.appendChild(ele0);
        tab0.appendChild(ele1);

        tabpadre.appendChild(tab0);


        var caritem3 = document.createElement("span");
        caritem3.innerHTML = "Precio: ";
        var caritem4 = document.createElement("p");
        var caritem41 = document.createElement("p");
        caritem41.innerHTML = "";
        for (var j = 0; j < ofertas.length; j++) {
            if (ofertas[j]['id_prod'] == prod[i]['id']) {
                caritem4 = document.createElement("strike");
                caritem41.innerHTML = " $" + (prod[i]['precio'] - prod[i]['precio'] * ofertas[j]['porcentaje'] / 100);
                total += (prod[i]['precio'] - prod[i]['precio'] * ofertas[j]['porcentaje'] / 100) * prod[i]['cantidad'];
                tot = (prod[i]['precio'] - prod[i]['precio'] * ofertas[j]['porcentaje'] / 100) * prod[i]['cantidad'];
                band = true;
                break;
            }
        }

        if (!band) {
            total += (prod[i]['precio'] * prod[i]['cantidad']);
            tot = (prod[i]['precio'] * prod[i]['cantidad']);
        }

        caritem4.innerHTML = " $" + prod[i]['precio'];

        ele2.appendChild(caritem3);
        ele3.appendChild(caritem4);


        tab1.appendChild(ele2);
        tab1.appendChild(ele3);

        tabpadre.appendChild(tab1);


        var caritem5 = document.createElement("span");
        caritem5.innerHTML = "Cantidad";
        var caritem6 = document.createElement("p");
        caritem6.innerHTML = prod[i]['cantidad'];

        ele4.appendChild(caritem5);
        ele5.appendChild(caritem6);

        tab2.appendChild(ele4);
        tab2.appendChild(ele5);

        tabpadre.appendChild(tab2);

        var caritem7 = document.createElement("span");
        caritem7.innerHTML = "SubTotal";
        var caritem8 = document.createElement("p");
        caritem8.innerHTML = " $" + tot;

        ele6.appendChild(caritem7);
        ele7.appendChild(caritem8);

        tab3.appendChild(ele6);
        tab3.appendChild(ele7);

        tabpadre.appendChild(tab3);

        if (prod[i]['cantidad'] > 10) {
            var caritem9 = document.createElement("span");
            caritem9.innerHTML = "Envio";
            var caritem10 = document.createElement("p");
            if (prod[i]['cantidad'] < 20) {
                caritem10.innerHTML = " $5"
                total += 5;
            } else {
                caritem10.innerHTML = "$10";
                total += 10;
            }
            ele8.appendChild(caritem9)
            ele9.appendChild(caritem10)

            tab4.appendChild(ele8);
            tab4.appendChild(ele9);

            tabpadre.appendChild(tab4);
        }
        caritem.appendChild(tabpadre);
        var car2 = caritem;
        ptable.appendChild(caritem);
        pagetable.appendChild(car2);
        ptable.appendChild(document.createElement("hr"));
        pagetable.appendChild(document.createElement("hr"));
    } //fin for

    var cartotal = document.createElement("div");
    cartotal.className = "cart-total";

    var ctotal1 = document.createElement("span");
    ctotal1.innerHTML = "Total";
    var ctotal2 = document.createElement("p");
    ctotal2.innerHTML = "$" + total;

    cartotal.appendChild(ctotal1);
    cartotal.appendChild(ctotal2);
    var vare2 = cartotal;

    ptable.appendChild(cartotal);
    pagetable.appendChild(vare2);
    ptable.appendChild(document.createElement("br"));

}