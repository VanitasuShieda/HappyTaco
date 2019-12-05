$(document).ready(function (e){
    $.ajaxSetup({cache: false});
    setInterval(function(){

        // Esta muestra TODOS los mensajes que se han mandado al administrador

        var editame = document.getElementById("editame");

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if (xhttp.readyState == 4 && xhttp.status == 200){
                editame.innerHTML = xhttp.responseText;
            }
        }

        // Nuestra informacion la vamos a enviar a insert.php, de manera asincrona, y con el metodo GET
        xhttp.open('GET', 'PHP/todos_logs.php', true);
        xhttp.send();
    }, 2000);

    refrescar();
});

function elegir_usuario(){
    var usuario = document.getElementById('usuario').value;

    document.getElementById("uname").innerHTML = usuario;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200){
            chat.value = xhttp.responseText;
            var $text = $('#chat');
            $text.scrollTop($text[0].scrollHeight); 
        }
    }

    // Nuestra informacion la vamos a enviar a insert.php, de manera asincrona, y con el metodo GET
    xhttp.open('GET', 'PHP/logs.php?uname=' + usuario, true);
    xhttp.send();
}

$(document).ready(function (e){
    $.ajaxSetup({cache: false});
    setInterval(function(){

        var uname = document.getElementById("uname").innerHTML;
        var chat = document.getElementById("chat");

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if (xhttp.readyState == 4 && xhttp.status == 200){
                chat.value = xhttp.responseText;
            }
        }

        // Nuestra informacion la vamos a enviar a insert.php, de manera asincrona, y con el metodo GET
        xhttp.open('GET', 'PHP/logs.php?uname=' + uname, true);
        xhttp.send();
    }, 2000);
});

function mandar_mensaje(){
    var msg = document.getElementById("msg").value;
    var chat = document.getElementById("chat");
    var destino = document.getElementById("uname").innerHTML;
    var caja_msg = document.getElementById("msg");

    if (msg == ""){
        alert("No puedes mandar un mensaje vacio.");
        return;
    }

    var peticion = new XMLHttpRequest();

    peticion.onreadystatechange = function(){
        if (peticion.readyState == 4 && peticion.status == 200){
            chat.value = peticion.responseText;
            caja_msg.value = "";
            caja_msg.focus();
        }
    }

    peticion.open('GET', 'PHP/mensaje_admin.php?msg=' + msg + "&destino=" + destino, true);
    peticion.send();
    
}

function refrescar(){
    // Esta parte es para mostrar un select y elegir la conversacion que queramos ver

    var editame2 = document.getElementById("usuarios");

    var xhttp2 = new XMLHttpRequest();

    xhttp2.onreadystatechange = function(){
        if (xhttp2.readyState == 4 && xhttp2.status == 200){
            editame2.innerHTML = xhttp2.responseText;
        }
    }

    xhttp2.open('GET', 'PHP/usuarios_existentes.php', true);
    xhttp2.send();
}

function checar_enter(){

    var key = window.event.keyCode;

    // If the user has pressed enter
    if (key === 13) {
        mandar_mensaje();
    }
}