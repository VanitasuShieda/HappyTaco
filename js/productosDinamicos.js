var productos;
var ofertas;
var carrito = new Array();

window.onload = function() {
    var cat = getParameterByName("categoria");
    console.log(cat);
    verOfertas();
    verProductos(cat);
};

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function verOfertas() {
    var peticion = new XMLHttpRequest(); //objeto para realizar el request
    peticion.open("GET", "php/ConsultaOfertas.php", true);
    peticion.setRequestHeader("Content-type", "application/json");
    peticion.onreadystatechange = function(aEvt) {
        if (peticion.readyState == 4) {
            if (peticion.status == 200) {
                if (peticion.responseText != "") { //si la peticion fue exitosa obtenemos los datos
                    ofertas = JSON.parse(peticion.responseText);
                }
            }
        }
    };
    peticion.send(null);
}

function agregarProducto(id_prod) {
    var band;
    var id = id_prod;
    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i]['cantidad'] > 0 && carrito[i]['id'] == id_prod) {
            carrito[i]['cantidad']++;
            band = true;
        }
    }
    if (!band) {
        var precio;
        for (var i = 0; i < productos.length; i++) {
            if (productos[i]['id'] == id) {
                precio = productos[i]['precio'];
                for (var j = 0; j < ofertas.length; j++) {
                    if (ofertas[j]['id_prod'] == productos[i]['id']) {
                        precio = productos[i]['precio'] - productos[i]['precio'] * ofertas[j]['porcentaje'] / 100;
                    }
                }
                var prod = {
                    'id': productos[i]['id'],
                    'imagen': productos[i]['imagen'],
                    'nombre': productos[i]['nombre'],
                    'precio': precio,
                    'descripcion': productos[i]['descripcion'],
                    cantidad: 1
                };
                carrito.push(prod);
            }
        }
    }

    console.log(carrito, Object);

}

function myFunction() {
    prod = carrito;
    var band;
    var total = 0;
    var tot;
    var ptable = document.getElementById("table"); //modificar el contenido de la tabla
    ptable.innerHTML = "";
    ptable.className = "order-table";
    for (var i = 0; i < prod.length; i++) {
        tot = 0;
        band = false;

        var caritem = document.createElement("div");
        caritem.className = "cart-item";

        var caritem1 = document.createElement("span");
        caritem1.innerHTML = "Producto: ";

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
        var caritem5 = document.createElement("span");
        caritem5.innerHTML = "Cantidad";
        var caritem6 = document.createElement("p");
        caritem6.innerHTML = prod[i]['cantidad'];
        var caritem7 = document.createElement("span");
        caritem7.innerHTML = "SubTotal";
        var caritem8 = document.createElement("p");
        caritem8.innerHTML = " $" + tot;

        caritem.appendChild(caritem1);
        caritem.appendChild(caritem2);

        caritem.appendChild(document.createElement("br"));
        caritem.appendChild(caritem3);
        caritem.appendChild(caritem4);
        caritem.appendChild(caritem41);
        caritem.appendChild(document.createElement("br"));
        caritem.appendChild(caritem5);
        caritem.appendChild(caritem6);
        caritem.appendChild(document.createElement("br"));
        caritem.appendChild(caritem7);
        caritem.appendChild(caritem8);


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
            caritem.appendChild(caritem9);
            caritem.appendChild(caritem10);
        }

        ptable.appendChild(caritem);
        ptable.appendChild(document.createElement("br"));


    } //fin for

    var cartotal = document.createElement("div");
    cartotal.className = "cart-total";

    var ctotal1 = document.createElement("span");
    ctotal1.innerHTML = "Total";
    var ctotal2 = document.createElement("p");
    ctotal2.innerHTML = total;

    cartotal.appendChild(ctotal1);
    cartotal.appendChild(ctotal2);

    ptable.appendChild(cartotal);

}

function verProductos(categoria) {
    var cat = categoria; //valor de la categoria 
    var peticion = new XMLHttpRequest(); //objeto para realizar el request
    peticion.open("GET", "PHP/ConsultaProductos.php?categoria=" + cat, true);
    peticion.setRequestHeader("Content-type", "application/json");
    peticion.onreadystatechange = function(aEvt) {
        if (peticion.readyState == 4) {
            if (peticion.status == 200) {
                if (peticion.responseText != "") { //si la peticion fue exitosa obtenemos los datos
                    productos = JSON.parse(peticion.responseText);
                    var padre = document.getElementById("producto"); //obtenemos el objeto donde meteremos toda la informacion
                    padre.innerHTML = "";
                    padre.className = "row";
                    for (var i = 0; i < productos.length; i++) {
                        //creamos un contenedor por producto
                        var hijo = document.createElement("div");
                        hijo.className = "col-md-3";
                        //inicializamos cada elemento del contenedor
                        var img = document.createElement("img");
                        var nombre = document.createElement("h3");
                        var descripcion = document.createElement("h5");
                        var precio = document.createElement("span");
                        var existencia = document.createElement("span");
                        var but_agregar = document.createElement("button");
                        var oferta = document.createElement("strong");
                        for (var j = 0; j < ofertas.length; j++) {
                            if (ofertas[j]['id_prod'] == productos[i]['id']) {
                                precio = document.createElement("strike");
                                oferta.innerHTML = " $" + (productos[i]['precio'] - productos[i]['precio'] * ofertas[j]['porcentaje'] / 100);
                            }
                        }
                        //agregamos los atributos y valores necesarios a cada elemento
                        img.src = productos[i]['imagen'];
                        img.className = "imgprod";
                        nombre.innerHTML = productos[i]['nombre'];
                        descripcion.innerHTML = productos[i]['descripcion'];
                        precio.innerHTML = "Precio Unitario $" + productos[i]['precio'];
                        existencia.innerHTML = "Aun quedan " + productos[i]['existencia'];
                        but_agregar.innerHTML = "Carrito";
                        but_agregar.setAttribute("onclick", "agregarProducto(" + productos[i]['id'] + ")");
                        //agregamos cada elemento al contenedor del producto y el contenedor del producto al contenedor principal
                        hijo.appendChild(img);
                        hijo.appendChild(document.createElement("br"));
                        hijo.appendChild(nombre);
                        hijo.appendChild(document.createElement("br"));
                        hijo.appendChild(descripcion);
                        hijo.appendChild(document.createElement("br"));
                        hijo.appendChild(precio);
                        hijo.appendChild(oferta);
                        hijo.appendChild(document.createElement("br"));
                        hijo.appendChild(existencia);
                        hijo.appendChild(document.createElement("br"));
                        hijo.appendChild(but_agregar);
                        padre.appendChild(hijo);
                    }
                    console.log("src");
                } else {
                    alert("No OK");
                }
            }
        }
    };
    peticion.send(null);
}