<?php 
require '../Model/conexion.php';

//conversion
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$nombre =$_POST['nombre'];
$descripcion =$_POST['descripcion'];
$um =$_POST['um'];
$stock =$_POST['stock'];
$precio=$_POST['precio'];

 

//sql
$sql="UPDATE tb_productos SET codProductos='$id1', catalogo='$codCatalogo',nombre='$nombre',Descripcion='$descripcion',unidad_medida='$um',stock='$stock',precio='$precio' WHERE codProductos='$id1'" ;
$result = mysqli_query($conn, $sql);
if ($result) {
	echo '
    <script>
       alert("Los datos fueron Actualizados");
        window.location ="../vistaProductos.php"; 
                </script>
                ';
} else {
	echo '
    <script>
        alert("No se pudo actualizar");
        window.location ="../vistaProductos.php"; 
                </script>
                ';
}

?>