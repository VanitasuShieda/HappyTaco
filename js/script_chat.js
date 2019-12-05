// Esta funcion es para una pueba
function actualiza(){
    
    var usuario = document.getElementById("prueba_usuario");
    var uname = document.getElementById("uname");

    uname.innerHTML = usuario.value;

    usuario = usuario.value;

    var input = document.getElementById("input_inside");

    var cadena = "";

    // Si el usuario esta vacio lo contare como que no
    // ha iniciado sesion
    if (usuario == "guest"){
        cadena = "<h4>Inicia sesion para poder mandar mensajes</h4>";
    } else {
        cadena = "<table><tr><td>";
        cadena += "<textarea id='msg' placeholder='Ingresa tu mensaje' onkeypress='checar_enter()'></textarea>";
        cadena += "</td><td><button type='button' id='enviar' onclick='submitChat()'>Submit</button>";
        cadena += "</td></tr></table>";
    }

    input.innerHTML = cadena;
}

// Esta parte del JS es para mostrar el div del chat
function mostrarChat(){
    var chat = document.getElementById("chat");
    var boton = document.getElementById("botonMostrarChat");

    // Aparecemos el chat, se hace una pequeña animacion con el CSS fadein
    chat.className = "chat mostrar";

    // Desaparecemos el boton
    boton.style.display = "none";
}

function cerrarChat(){
    var chat = document.getElementById("chat");
    var boton = document.getElementById("botonMostrarChat");

    chat.className = "chat";

    // Aparecemos el boton
    boton.style.display = "inline";
    boton.className = "mostrar2 btn btn-warning btn-circle btn-xl";
}

// Esta parte del JS es para el funcionamiento del chat
function submitChat(){

    var uname = document.getElementById("uname").innerHTML;
    var msg = document.getElementById("msg").value;

    // Comprobamos que los campos esten llenados
    if (uname == '' || msg == ''){
        alert("Todos los campos son obligatorios");
        return;
    }
    
    // En este punto ya tenemos los dos campos llenados
    // Creamos nuestra peticion para mandar el mensaje
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("mensajes").value = xhttp.responseText;
            var $text = $('#mensajes');
            $text.scrollTop($text[0].scrollHeight);
            // Vaciamos el contenedor de mensaje
            document.getElementById("msg").value = "";
            // Obtenemos el foco
            document.getElementById("msg").focus();
        }
    }

    // Nuestra informacion la vamos a enviar a insert.php, de manera asincrona, y con el metodo GET
    xhttp.open('GET','PHP/insert.php?uname=' + uname + '&msg=' + msg, true);
    xhttp.send();
}

var band = true;

$(document).ready(function (e){
    $.ajaxSetup({cache: false});
    setInterval(function(){

        var uname = document.getElementById("uname").innerHTML;

        var loader = document.getElementById("loader");
        loader.classList.remove('active');

        var mensajes = document.getElementById("mensajes");
        mensajes.style.display = "block";

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if (xhttp.readyState == 4 && xhttp.status == 200){
                mensajes.value = xhttp.responseText;
                if (band == true){
                    var $text = $('#mensajes');
                    $text.scrollTop($text[0].scrollHeight);
                    band = false;
                }
            }
        }

        // Nuestra informacion la vamos a enviar a insert.php, de manera asincrona, y con el metodo GET
        xhttp.open('GET', 'PHP/logs.php?uname=' + uname, true);
        xhttp.send();
    }, 2000);
});

function checar_enter(){

    var key = window.event.keyCode;

    // If the user has pressed enter
    if (key === 13) {
        submitChat();
    }
}