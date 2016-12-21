<?php

include 'Conexion.php';

?>



<?php

// var_dump($_POST);


$obj = json_decode ( $_POST ['json'] );

$usuario = $obj->{'Usuario'};


if (isset ( $_POST ["json"] )) {
	
	
	$sql =  "UPDATE `listaespera`.`peticiones` SET `abierta`='0', `fechaFin`=NOW()  WHERE `usuario`='" . $usuario . "';";


if (isset ( $sql )) { // Si tenemos query, la ejecutamos
	
	$result = $conn->query ( $sql );
	echo "<br>"."<br>";
	
	echo "Modificacion de deposito realizada con exito" . "<br>";
}

$conn->close (); // cierre de conexión con la BBDD

}

?>

