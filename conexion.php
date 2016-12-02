<?php
// Conecto con la BBDD
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "listaespera";
$conn = new mysqli ( $servername, $user, $password, $dbname );
// Check connection
if ($conn->connect_error) {
	die ( "Error: " . $conn->connect_error );
} // else
// echo "Conexión con BBDD correcta";

?>


