<?php 
require '../Model/conexion.php';

//conversion
$id = $_POST['id'];
$aprobado =$_POST['estado'];


//sql


$sql="UPDATE detalle_bodega SET estado = '$aprobado' WHERE codigodetallebodega='$id'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
  echo'
    <script>
       alert("Los datos fueron Actualizados");
        window.location ="../solicitudes_bodega.php"; 
                </script>
                ';
}
else {
  echo '
    <script>
        alert("No se pudo actualizar");
         window.location ="../solicitudes_bodega.php"; 
                </script>
                ';
}

?>