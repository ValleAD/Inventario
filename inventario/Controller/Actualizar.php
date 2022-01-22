<?php 
require '../Model/conexion.php';

//conversion
$categoria = $_POST['categoria'];
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$nombre =$_POST['nombre'];
$descripcion =$_POST['descripcion'];
$um =$_POST['um'];
$stock =$_POST['stock'];
$stock_obtenido =$_POST['stock_descontar'];
$precio=$_POST['precio'];
$stock_descontado=$stock+$stock_obtenido;

//sql
$sql="UPDATE tb_productos SET categoria = '$categoria' ,codProductos='$id1', catalogo='$codCatalogo',nombre='$nombre',descripcion='$descripcion',unidad_medida='$um',stock='$stock_descontado',precio='$precio' WHERE codProductos='$id1'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
  echo'
    <script>
       alert("Los datos fueron Actualizados");
       window.location ="../vistaProductos.php"; 
                </script>
                ';
}

?>