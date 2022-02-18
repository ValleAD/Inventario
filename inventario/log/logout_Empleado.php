<?php 
require '../Model/conexion.php';

//conversion
$usuario =$_POST['usuario'];
$Nusuario =$_POST['Nusuario'];
$Npassword =$_POST['Npassword'];
//$Npassword= hash('sha512',$Npassword);

 

//sql
$sql="UPDATE tb_usuarios SET username='$Nusuario', password='$Npassword' WHERE username='$usuario'" ;
$result = mysqli_query($conn, $sql);
if ($result) {
session_start();
session_destroy();

header("Location: signin.php");
} else {
	echo '
    <script>
        alert("No se pudo actualizar");
        window.location ="../solicitudes_vale.php"; 
                </script>
                ';
}
?>