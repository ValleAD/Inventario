<?php 
require '../Model/conexion.php';

//conversion
$id1 =$_POST['id'];
$departamento =$_POST['Departamento'];


 

//sql
$sql="UPDATE tb_vale SET codVale='$id1', departamento='$departamento' WHERE codVale='$id1'" ;
$result = mysqli_query($conn, $sql);
if ($result) {
	echo '
    <script>
       alert("Los datos fueron Actualizados");
        window.location ="../solicitudes_vale.php"; 
                </script>
                ';
} else {
	echo '
    <script>
        alert("No se pudo actualizar");
        window.location ="../solicitudes_vale.php"; 
                </script>
                ';
}
?>