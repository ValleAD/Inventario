<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//estado compra
if(isset($_POST['detalle_vale'])){
 $nSolicitud=$_POST['vale'];
$estado =$_POST['estado'];
$sql="UPDATE  tb_vale SET estado = '$estado' WHERE codVale='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
     for($i = 0; $i < count($_POST['cod1']); $i++)
    {
      $codigo_producto  = $_POST['cod1'][$i];
      $cant_aprobada    = $_POST['cant'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
      $cant=$cant_aprobada-$cantidad_despachada;
     
        $sql="UPDATE   detalle_circulante SET stock = '$cant',cantidad_despachada='$cantidad_despachada',precio='$cost' WHERE codigodetallecirculante ='$codigo_producto'" ;

      $query = mysqli_query($conn, $sql);
}
 if ($query)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
       location.href = '../solicitudes_vale.php';
        </script>
        ";
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
         location.href = '../solicitudes_vale.php';
        </script>
        ";
    }



for ($i=0; $i < count($_POST['cod']) ; $i++) {

  $codigo= $_POST['cod'][$i];
  $stocks =$_POST['cant'][$i];   
  $stock_obtenido =$_POST['cantidad_despachada'][$i];
  $precio= $_POST['cost'][$i];
  $stock_descontado=$stocks - $stock_obtenido;
   
//sql
$count = "SELECT codProductos, SUM(stock), fecha_registro FROM tb_productos GROUP BY codProductos";
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE codProductos ='$codigo' && precio = '$precio'" ;
$result = mysqli_query($conn, $sql1);
}
   }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../solicitudes_vale.php';
        </script>
        ";
  }
}
  ?>