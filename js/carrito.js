var ofertas;
var carrito = new Array();
var cupones;
var cuponesactive = new Array();


window.onload = function() {
    checkcupones();
    if (getCookie("cartshop")) {
        carrito = JSON.parse(getCookie("cartshop"));
        document.getElementById("cartn").innerHTML = carrito.length;

        if (getCookie("cuponesactive")) {
            cuponesactive = JSON.parse(getCookie("cuponesactive"));
        }

        ofertas = carrito.length;
        pagecar();
    }


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

function del(id_prod) {
    var auxi = new Array();
    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i]['id'] != id_prod) {
            auxi.push(carrito[i]);
        }
    }
    carrito = auxi;
    console.log("del" + carrito);
    pagecar();
    document.cookie = "cartshop = " + JSON.stringify(carrito);


}

function changemas(id_prod) {
    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i]['id'] == id_prod) {
            carrito[i]['cantidad']++;
        }
    }
    console.log("mas" + carrito);
    pagecar();
    document.cookie = "cartshop = " + JSON.stringify(carrito);

}

function changemenos(id_prod) {

    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i]['id'] == id_prod && carrito[i]['cantidad'] > 0) {
            carrito[i]['cantidad']--;
        }
    }
    console.log("menos" + carrito);
    pagecar();
    document.cookie = "cartshop = " + JSON.stringify(carrito);

}


function limpiar() {
    var butsec = document.getElementById("butlim");
    butsec.innerHTML = "";

    var limpi = document.createElement("input");
    limpi.setAttribute("value", "");
    limpi.setAttribute("id", "cupon");
    limpi.placeholder = "Introduce tu cupon aqui";

    butsec.appendChild(limpi);
}

function insertcupon() {
    var tbody = document.getElementById("tbody"); //modificar el contenido de la tabla
    var banderacu = false;
    var cuponin = document.getElementById("cupon").value;
    console.log(cuponin.length);
    if (cuponin.length != 6) {
        alert("!! " + cuponin + "  !!  No Es un Cupon Valido");
    } else {
        for (var i = 0; i < cupones.length; i++) {
            if (cupones[i]['codigo'] == cuponin) {
                var cuponaux = {
                    'id': cupones[i]['id'],
                    'imagen': cupones[i]['imagen'],
                    'nombre': cupones[i]['nombre'],
                    'codigo': cupones[i]['codigo'],
                    'descripcion': cupones[i]['descripcion'],
                    'descuento': cupones[i]['descuento'],
                    'tipo': cupones[i]['tipo']
                };
                banderacu = true;
                cuponesactive.push(cuponaux);
                document.cookie = "cuponesactive = " + JSON.stringify(cuponesactive);
                break;
            }
        }

        if (!banderacu) {
            alert("!! " + cuponin + "  !!  No Existe dentro de nuestros Cupones");
        } else {
            pagecar();
        }
    }

}

function pagecar() {
    prod = carrito;
    var band = false;
    var total = 0;
    var tot = 0;
    var envio = 0;
    var tbody = document.getElementById("tbody"); //modificar el contenido de la tabla
    tbody.innerHTML = "";
    tbody.className = "order-table";

    if (carrito.length == 0) {
        var tdis = document.getElementById("table");
        tdis.innerHTML = "";
        var section = document.createElement("section");
        section.className = "contact-section";

        var h2 = createElement("h2");
        h2.innerHTML = "Tu Carrito Esta Vacio!";
        var h4 = createElement("h4");
        h4.innerHTML = "No Hay TAQUITOS!!";
        var img = createElementh("img");
        img.src = "img/espera.gif";
        img.className = "imgcart";
        img.style = "height: 90%; width: 90%;";
        var h5 = createElement("h5");
        h5.innerHTML = "Los taquitos probablemente se fueron volando...";
        var h6 = createElement("h6");
        h6.innerHTML = "deberias probar comprar mas...";

        section.appendChild(h2);
        section.appendChild(document.createElement("hr"));
        section.appendChild(h4);
        section.appendChild(img);
        section.appendChild(h5);
        section.appendChild(h6);
        section.appendChild(document.createElement("br"));
        tdis.appendChild(section);

        var tcar = document.getElementById("tabla2");
        tcar.innerHTML = tdis;


    } else {


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

            if (prod[i]['cantidad'] > 10) {
                envio += 5;
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
            input.setAttribute("value", prod[i]['cantidad']);

            var buttonmas = document.createElement("button");
            buttonmas.className = "qtybtn";
            var text = "changemas(" + prod[i]['id'] + ")";
            buttonmas.setAttribute("onClick", text);
            buttonmas.innerHTML = " + ";

            var buttonmenos = document.createElement("button");
            buttonmenos.className = "qtybtn";
            var text2 = "changemenos(" + prod[i]['id'] + ")";
            buttonmenos.setAttribute("onClick", text2);
            buttonmenos.innerHTML = " - ";

            div2.appendChild(buttonmenos);
            div2.appendChild(input);
            div2.appendChild(buttonmas);


            td3.appendChild(div2);

            var td4 = document.createElement("td");
            td4.className = "total";
            td4.innerHTML = " $ " + tot;

            var td5 = document.createElement("td");
            td5.className = "product-close";
            var but = document.createElement("button");
            but.className = "qtybtn";
            but.innerHTML = "X";
            var text3 = "del(prod[" + i + "]['id'])";
            but.setAttribute("onClick", text3);
            td5.appendChild(but);



            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);

            tbody.appendChild(tr);


        } //fin for




        //si la cookie de cupones existe anadir a la tabla visualmente solamente otro for


        var bottones = document.getElementById("but");
        bottones.innerHTML = "";
        var but1 = document.createElement("button");
        but1.setAttribute("onClick", "limpiar()");
        but1.className = "site-btn clear-btn";
        but1.innerHTML = "Limpiar";
        var but2 = document.createElement("button");
        but2.className = "site-btn update-btn";
        but2.setAttribute("onClick", "insertcupon()");
        but2.innerHTML = "Actualizar";

        bottones.appendChild(but1);
        bottones.appendChild(but2);



        var gastos = document.getElementById("gastos"); //modificar el contenido de gastos 
        gastos.innerHTML = "";

        var trgasto = document.createElement("tr");
        var tdgasto1 = document.createElement("td");
        tdgasto1.className = "total";
        tdgasto1.innerHTML = " $ " + total;
        var tdgasto2 = document.createElement("td");
        tdgasto2.className = "sub-total";
        tdgasto2.innerHTML = " $ " + (total * 0.16);
        var tdgasto3 = document.createElement("td");
        tdgasto3.className = "shipping";
        tdgasto3.innerHTML = " $ " + envio;
        var tdgasto4 = document.createElement("td");
        tdgasto4.className = "total-cart-p";
        tdgasto4.innerHTML = " $ " + (total + (total * .16) + envio);
        trgasto.appendChild(tdgasto1);
        trgasto.appendChild(tdgasto2);
        trgasto.appendChild(tdgasto3);
        trgasto.appendChild(tdgasto4);
        gastos.appendChild(trgasto);


        band = false;
        total = 0;
        tot;
        var numero = document.getElementById("cartn");
        numero.innerHTML = carrito.length;
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
            img.src = carrito[i]['imagen'];
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

            ptable.appendChild(caritem);

            ptable.appendChild(document.createElement("hr"));

        } //fin for

        var cartotal = document.createElement("div");
        cartotal.className = "cart-total";

        var ctotal1 = document.createElement("span");
        ctotal1.innerHTML = "Total";
        var ctotal2 = document.createElement("p");
        ctotal2.innerHTML = "$" + total;

        cartotal.appendChild(ctotal1);
        cartotal.appendChild(ctotal2);

        ptable.appendChild(cartotal);
        ptable.appendChild(document.createElement("br"));

    }



}