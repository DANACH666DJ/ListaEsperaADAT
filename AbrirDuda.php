<?php

include 'conexion.php';

?>


<?php



$ip=$_SERVER['REMOTE_ADDR'];





if (isset ( $_REQUEST ["Usuario"] ) && ! empty ( $_REQUEST ['Usuario'] ) && isset ( $_REQUEST ["Pregunta"] )
	&& ! empty ( $_REQUEST ['Pregunta'] )) {
		
	$usuario = $_REQUEST ["Usuario"];
	$pregunta = $_REQUEST ["Pregunta"];
	
	
	$sql = "INSERT INTO peticiones (direccionIP,usuario , texto , abierta,fechaInicio,fechaFin )";
	$sql .= "VALUES ('" . $ip . "','" . $usuario . "','" . $pregunta . "',1,NOW(),'0000-00-00 00:00:00');";
	

	
	
	if ($conn->query ( $sql ) === TRUE) {
		echo "<br>" . "<br>";
		print_r ( json_encode ( "Nueva pregunta ingresada correctamente", JSON_PRETTY_PRINT ) );
	} else {
		print_r ( json_encode ( "Error: " . $sql . "<br>" . $conn->error ) );
	}
	$conn->close ();
}

?>
