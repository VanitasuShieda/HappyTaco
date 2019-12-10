<?php 
	//Configuracion de la conexion a base de datos
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "bdd";
	$cat=$_GET['categoria'];

	$conexion =  new mysqli($bd_host,$bd_usuario,$bd_password,$bd_base);
	if ($conexion->connect_errno){
      die('Error en la conexion');
    }else{
    	//consulta de los productos
		$sql='select * from producto where categoria="'.$cat.'"';
		if($cat=="Todos") $sql='select * from producto where 1';
		$respuesta = $conexion -> query($sql);
		//Regresa los datos a ajax
		if($respuesta -> num_rows){
			$i=0;
			while($row = $respuesta -> fetch_assoc()){
				$producto = array(
    				"id" => $row['id'],
    				"nombre"         => $row['nombre'],
    				"categoria"          => $row['categoria'],
    				"descripcion"          => $row['descripcion'],
    				"existencia"          => $row['existencia'],
    				"precio"       => $row['precio'],
    				"imagen"          => $row['imagen']
  				);
  				$productos[$i] = $producto;
  				$i++;
			}
			echo json_encode($productos);
		}else{
			echo "";
		}
    }

?>