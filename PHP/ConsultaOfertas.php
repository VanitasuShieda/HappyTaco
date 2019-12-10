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
		$sql='select * from oferta where 1';
		$respuesta = $conexion -> query($sql);
		//Regresa los datos a ajax
		if($respuesta -> num_rows){
			$i=0;
			while($row = $respuesta -> fetch_assoc()){
				$oferta = array(
    				"id_prod" => $row['id_prod'],
    				"porcentaje"  => $row['porcentaje']
  				);
  				$ofertas[$i] = $oferta;
  				$i++;
			}
			echo json_encode($ofertas);
		}else{
			echo "";
		}
    }
?>