<?php 
require '../Model/conexion.php';

//conversion
$Nusuario =$_POST['Nusuario'];
$Npassword =$_POST['Npassword'];

 $verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$Nusuario' AND password='$Npassword'");

if (mysqli_num_rows($verificar_usuario)>0) {
    echo '
        <script>
        alert("Este Usuario no se puede Actualizado, porque es la misma información que estas cambiando");
         window.location ="../Empleados.php"; 
    </script>
    ';
exit();
}

//sql
$sql="UPDATE tb_usuarios SET username='$Nusuario', password='$Npassword' WHERE username='$Nusuario'" ;
$result = mysqli_query($conn, $sql);
if ($result) {
session_start();
session_destroy();
echo '
    <script>
        alert("Cuenta Actualizada");
        window.location ="signin.php"; 
                </script>
                ';
} else {
	echo '
    <script>
        alert("No se pudo actualizar");
        window.location ="../home.php"; 
                </script>
                ';
}
?>