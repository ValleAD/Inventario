<?php 
require '../Model/conexion.php';

//conversion
$id2 =$_POST['cod'];
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$descripcion =$_POST['descripcion'];
$categoria = $_POST['categoria'];
 $um =$_POST['um'];
 $stock=$_POST['stock'];
$precio=$_POST['precio'];

      

//sql


$sql="UPDATE tb_productos SET cod='$id2', codProductos='$id1',categoria='$categoria',catalogo='$codCatalogo',descripcion='$descripcion',stock='$stock',unidad_medida='$um',precio='$precio' WHERE cod='$id2'" ;
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