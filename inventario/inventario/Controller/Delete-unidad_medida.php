
<?php 
 include '../Model/conexion.php';

$id = $_POST['id'];
$id1 = $_POST['Habilitado'];
$var1 = "No";
if (strcmp($id1, $var1) === 0){

$eliminar ="DELETE FROM selects_unidad_medida WHERE id='$id' AND Habilitado='$id1'";
$result= mysqli_query($conn, $eliminar);
        if ($result) {
            
        echo '<script>

                alert("Unidad de medida Eliminada");
                window.location ="../unidad_Medidad.php"; 
                        </script>';
        }
} else {
    echo '
    <script>
        alert("No se pudo Eliminar la unidad de Medida");
        window.location ="../unidad_medidad.php"; 
                </script>
                ';
}
 ?>