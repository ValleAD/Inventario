<?php
//$mysqli = new mysqli("localhost", "root", "", "bd_ventas");
/*if ($mysqli) {
	echo "Conectado Exitosamente a la base de datos";
}else{
	echo "No se ha podido conectar a la base de datos";
}*/

//$conexion = new mysqli("localhost", "root", "", "hospital");
/*if ($conexion) {
	echo "Conectado Exitosamente a la base de datos";
}else{
	echo "No se ha podido conectar a la base de datos";
}*/

$server = "localhost";
$user = "root";
$pass = "";
$database = "db_usuarios";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>