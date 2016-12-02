<?php

include 'conexion.php';

?>

	
<?php




$sql = "SELECT idPeticion ,direccionIP , usuario , texto , fechaInicio,fechaFin  FROM peticiones";
$sql=$sql." WHERE abierta = 1";



$result = $conn->query ( $sql );
if ($result->num_rows > 0) {
$Array=array();
	while ( $row = $result->fetch_assoc () ) {
		

		$id=$row ["idPeticion"];
		$ip=$row ["direccionIP"];
		$usuario=$row ["usuario"];
		$texto=$row ["texto"];
		$fechaInicio=$row["fechaInicio"];
		$fechaFin=$row["fechaFin"];
		
		$miArray = array("id"=>$id, "ip"=>$ip, "usuario"=>$usuario ,
				"texto"=>$texto , "fechaInicio"=>$fechaInicio , "fechaFin"=>$fechaFin  );
		
		
		array_push($Array, $miArray);
		
       
	}
	
	
	print_r(json_encode($Array,JSON_PRETTY_PRINT));
	//print_r(json_encode($_POST));
	
} else {
	
}



$conn->close (); // cierre de conexion con la BBDD

?>
