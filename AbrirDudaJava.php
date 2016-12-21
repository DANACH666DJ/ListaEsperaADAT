


<?php
include 'Conexion.php';

?>




<?php

// var_dump($_POST);

$stringJson = file_get_contents ( 'php://input' );

if (isset ( $stringJson )) {
	
	$json = json_decode ( $stringJson );
	
	$usuario = $json->Usuario;
	$pregunta = $json->Pregunta;
	
	// Esto va con el metodo de java withParams
	// $obj = json_decode ( $_POST ['json'] );
	
	// $usuario = $obj->{'Usuario'};
	// $pregunta = $obj->{'Pregunta'};
	
	$ip = $_SERVER ['REMOTE_ADDR'];
	
	// if (isset ( $_POST ["json"] )) {
	
	$sql = "INSERT INTO peticiones (direccionIP,usuario , texto , abierta,fechaInicio,fechaFin )";
	$sql .= "VALUES ('" . $ip . "','" . $usuario . "','" . $pregunta . "',1,NOW(),'0000-00-00 00:00:00');";
	
	if ($conn->query ( $sql ) === TRUE) {
		echo "<br>" . "<br>";
		print_r ( json_encode ( "Nueva pregunta ingresada correctamente", JSON_PRETTY_PRINT ) );
	} else {
		print_r ( json_encode ( "Error: " . $sql . "<br>" . $conn->error ) );
	}
	//Capturamos la ultima insertada
     $last_id = mysqli_insert_id($conn);
	//echo "El último id insertado es : " . $last_id;
	
	
	//Creamos un array auxiliar
	
	
	//$Array=array();
	    
		$miArray = array("id"=>$last_id);
		
		//array_push($Array, $miArray);
		
		print_r(json_encode($miArray,JSON_PRETTY_PRINT));
	
		//var_dump($Array);
		
	
	
	$conn->close ();
	
	
	// }
}

?>
