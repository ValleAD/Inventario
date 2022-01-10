<?php 
 include '../Model/conexion.php';

$id1 = $_POST['id'];
$eliminar ="DELETE FROM tb_vale WHERE codVale='$id1'";
$result= mysqli_query($conn, $eliminar);
if ($result) {
    
echo '<script>

        alert("Se Eliminino la solicitud '.$id1.'");
        window.location ="../solicitudes_vale.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo Eliminar el Producto");
        window.location ="../solicitudes_vale.php"; 
                </script>
                ';
}
 ?>