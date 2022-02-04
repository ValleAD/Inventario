
<?php 
 include '../Model/conexion.php';

$id1 = $_GET['id'];
$eliminar ="DELETE FROM selects_categoria WHERE id='$id1'";
$result= mysqli_query($conn, $eliminar);
if ($result) {
    
echo '<script>

        alert(" Empleado Eliminado Corectamente");
        window.location ="../categorias.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo Eliminar el Empleado");
        window.location ="../categorias.php"; 
                </script>
                ';
}
 ?>