
<?php 
 include '../Model/conexion.php';

$id = $_POST['id'];
$id1 = $_POST['Habilitado'];
$var1 = "No";
if (strcmp($id1, $var1) === 0){

$eliminar ="DELETE FROM selects_categoria WHERE id='$id' AND Habilitado='$id1'";
$result= mysqli_query($conn, $eliminar);
        if ($result) {
            
        echo '<script>

                alert("Categoria Eliminada");
                window.location ="../categorias.php"; 
                        </script>';
        }
} else {
    echo '
    <script>
        alert("No se pudo Eliminar la Categoria");
        window.location ="../categorias.php"; 
                </script>
                ';
}
 ?>