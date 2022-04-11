<?php 
require '../Model/conexion.php';

//conversion
if(isset($_POST['info'])){
$id = $_POST['id'];
$No =$_POST['Habilitado'];



$sql="UPDATE tb_usuarios SET Habilitado = '$No' WHERE id='$id'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
  echo'
    <script>
       alert("Los datos fueron Actualizados");
         window.location ="../Empleados.php"; 
                </script>
                ';
}
else {
  echo '
    <script>
        alert("No se pudo actualizar");
          window.location ="../Empleados.php"; 
                </script>
                ';
}
}

//sql
if(isset($_POST['submit'])){

$id1 = $_POST['id'];
$u= $_POST['Nombres'];
$ap= $_POST['Apellidos'];
$sql="UPDATE tb_usuarios SET firstname='$u',lastname='$ap' WHERE id='$id1'" ;
$result = mysqli_query($conn, $sql);
if ($result) {
  echo'
    <script>
       alert("Los datos fueron Actualizados");
         window.location ="../Empleados.php"; 
                </script>
                ';
}
else {
  echo '
    <script>
        alert("No se pudo actualizar");
          window.location ="../Empleados.php"; 
                </script>
                ';
}
}
?>