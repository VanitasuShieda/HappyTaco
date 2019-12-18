<?php 
	//Configuracion de la conexion a base de datos
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "bdd";

	$conexion =  new mysqli($bd_host,$bd_usuario,$bd_password,$bd_base);
	if ($conexion->connect_errno){
      die('Error en la conexion');
    }else{
    	//consulta de los productos
		$sql='select * from cupones where 1';
		
		$respuesta = $conexion -> query($sql);
        //Regresa los datos a ajax segun el roman :v solo imito e intento hacer que funcione.. perdon hugito <3
        
        //el tipo seria solo 'envio' o 'descuento' o almenos asi se me ocurre 
		if($respuesta -> num_rows){
			$i=0;
			while($row = $respuesta -> fetch_assoc()){
				$cupon = array(
    				"id" => $row['id'],
    				"nombre"         => $row['nombre'],
    				"codigo"          => $row['codigo'],
    				"descripcion"          => $row['descripcion'],
    				"tipo"          => $row['tipo'],
    				"descuento"       => $row['descuento'],
    				"imagen"          => $row['imagen']
  				);
  				$cupones[$i] = $cupon;
  				$i++;
			}
			echo json_encode($cupones);
		}else{
			echo "";
		}
    }

?>