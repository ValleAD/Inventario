
<?php 
 include '../Model/conexion.php';

$id1 = $_GET['id'];
$eliminar ="DELETE FROM tb_usuarios WHERE id='$id1'";
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
 ?>