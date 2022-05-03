
<?php 
 include '../Model/conexion.php';

$cod = $_POST['cod'];
$id1 = $_POST['id'];
if ($id1<1) {

        $eliminar ="DELETE FROM tb_productos WHERE codProductos='$cod' AND stock='$id1'";
        $result= mysqli_query($conn, $eliminar);
        if ($result) {
            
        echo '<script>

                alert(" Producto Eliminado Correctamente");
                window.location ="../vistaProductos.php"; 
                        </script>';
        }
} else {
       echo '
    <script>
        alert("No tiene Permitido Eliminar el Producto");
        window.location ="../vistaProductos.php"; 
                </script>
                ';
}

 ?>
