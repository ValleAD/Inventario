
<?php 
 include '../Model/conexion.php';

$id1 = $_GET['id'];
$eliminar ="DELETE FROM tb_productos WHERE codProductos='$id1'";
$result= mysqli_query($conn, $eliminar);
if ($result) {
    
echo '<script>

        alert(" Producto Eliminado Corectamente");
        window.location ="../vistaProductos.php"; 
                </script>';
} else {
    echo '
    <script>
        alert("No se pudo Eliminar el Producto");
        window.location ="../vistaProductos.php"; 
                </script>
                ';
}
 ?>
