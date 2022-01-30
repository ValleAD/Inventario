
<?php 
 include '../Model/conexion.php';

$id1 = $_GET['id'];
if ($id1==0) {

        $eliminar ="DELETE FROM tb_productos WHERE stock='$id1'";
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
