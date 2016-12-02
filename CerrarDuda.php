<?php

include 'Conexion.php';

?>


<?php

if (isset ( $_REQUEST ['idPeticion'] ) && ($_REQUEST ['idPeticion'] != '')) {
	$id = $_REQUEST ['idPeticion'];
	$sql = "UPDATE `listaespera`.`peticiones` SET `abierta`='0', `fechaFin`=NOW()  WHERE `idPeticion`='" . $id . "';";
	$result = $conn->query ( $sql );
} else if (isset ( $_REQUEST ['Usuario'] ) && ($_REQUEST ['Usuario'] != '')) {
	$select = "SELECT * FROM listaespera.peticiones where usuario = '" . $_REQUEST ['Usuario'] . "' AND abierta = 1;";
	
	$arrayPreguntas = Array ();
	
	$resulta = $conn->query ( $select );
	
	if ($resulta->num_rows > 0) {
		// output data of each row
		while ( $row = $resulta->fetch_assoc () ) {
			
			$array = array (
					"texto" => $row ["texto"],
					"usuario" => $row ["usuario"],
					"fechaInicio" => $row ["fechaInicio"],
					"fechaFin" => $row ["fechaFin"],
					"peticion" => $row ["idPeticion"],
					"direccionIp" => $row ["direccionIP"],
					"abierta" => $row ["abierta"] 
			);
			
			array_push ( $arrayPreguntas, $array );
		}
	} else {
		echo "0 results";
	}
	
}

$conn->close ();
?>



