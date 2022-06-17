
<?php 
 include '../Model/conexion.php';

$id1 = $_POST['id'];
$id2 = $_POST['idusuario'];
if ($id2==1) {
   echo '<script>

        alert("La Cuenta Administrador no de puede Eliminar");
        window.location ="../Empleados.php"; 
                </script>';     
}else{
$eliminar ="DELETE FROM tb_usuarios WHERE id='$id1' and tipo_usuario='$id2'";
$result= mysqli_query($conn, $eliminar);
if ($result) {
    
echo '<script>

        alert(" Empleado Eliminado Corectamente");
        window.location ="../Empleados.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo Eliminar el Empleado");
        window.location ="../Empleados.php"; 
                </script>
                ';
}
}
 ?>