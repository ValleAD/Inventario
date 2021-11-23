<?php
session_start();
 if (!isset($_SESSION['username'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?><?php
include('conexion.php');
        $fecha=$_POST['fech'];
        $Depto=$_POST['depto'];
        $Vale=$_POST['orden'];
        $codigo = $_POST['cod'];
        $des = $_POST['desc'];
        $um = $_POST['um'];
        $cantidad = $_POST['cant'];
        $cost = $_POST['cu'];

    $total = $cost * $cantidad;

$query ="INSERT INTO vale(`Codigo`, `orden`, `fecha`, `DEPTO_SERVICIO`, `Descripcion`, `U_M`, `Cantidad`, `Cos_Unitario`, `Total`)
VALUES('$codigo','$fecha','$Depto','$des','$cantidad','$um','$cost','$total')";
$ejecutar = mysqli_query($conexion,$query);

if ($ejecutar) {
	echo '

	<script>
		alert("Usuario Almacenado Exitosamente");
		window.location ="dt_from_vale.php"
	</script>

	';
}else{
	echo '

	<script>
		alert("Intento de Nuevo, Usuario Almacenado");
		window.location ="form_vale.php"
	</script>

	';
}
mysqli_close($conexion);
?>