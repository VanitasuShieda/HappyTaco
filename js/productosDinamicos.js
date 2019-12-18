var productos;
var ofertas;
var carrito;


window.onload = function() {
    var cat = getParameterByName("categoria");
    verOfertas();
    verProductos(cat);

    
    document.getElementById("cartn").innerHTML = "0"; 

    if( getCookie("cartshop")  ) {
        var aux = JSON.parse(getCookie("cartshop"));
        for(var  k=0; k<aux.length; k++){
            carrito.push(aux[k]);
        }
    }else{
        carrito = new Array();
    }
    console.log(carrito);
    ofertas= aux.length;
    myFunction();   
         
}

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

    myFunction();   

   
    document.cookie = "cartshop = " + JSON.stringify(carrito);


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

function myFunction() {

    prod = carrito;
    var band;
    var total = 0;
    var tot;
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