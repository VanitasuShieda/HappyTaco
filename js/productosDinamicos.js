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
    console.log(carrito);
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