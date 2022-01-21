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
$sql="UPDATE tb_productos SET categoria = '$categoria' ,codProductos='$id1', catalogo='$codCatalogo',nombre='$nombre',Descripcion='$descripcion',unidad_medida='$um',stock='$stock_descontado',precio='$precio' WHERE cod='$id1'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
  echo'
    <script>
       alert("Los datos fueron Actualizados");
       window.location ="../vistaProductos.php"; 
                </script>
                ';
}

$verificar_usuario =mysqli_query($conn, "SELECT  FROM tb_productos WHERE stock ='$stock'");
if (mysqli_num_rows($verificar_usuario)>=0) {

        echo '
                <script>
                alert("Ya no hay productos Almacenados");
              window.location ="../vistaProductos.php"; 
        </script>
        ';
exit(); 
}

?>