<?php 
require '../Model/conexion.php';

//conversion
$id2 =$_POST['cod'];
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$descripcion =$_POST['descripcion'];

$precio=$_POST['precio'];
for($i = 0; $i < count($_POST['categoria']); $i++) 
    {
      $categoria = $_POST['categoria'][$i];
      $um =$_POST['um'][$i];
    }
//sql


$sql="UPDATE tb_productos SET cod='$id2', codProductos='$id1',descripcion='$descripcion',precio='$precio' WHERE cod='$id2'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
  echo'
    <script>
       alert("Los datos fueron Actualizados");
       window.location ="../vistaProductos.php"; 
                </script>
                ';
}else {
  echo '
    <script>
        alert("No se pudo actualizar");
      window.location ="../vistaProductos.php"; 
                </script>
                ';
}

?>