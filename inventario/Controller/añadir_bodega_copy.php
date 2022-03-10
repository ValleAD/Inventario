 <?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';


$nSolicitud=$_POST['odt'];
$estado =$_POST['estado'];
     $sql="UPDATE  tb_bodega SET estado = '$estado'  WHERE codBodega ='$nSolicitud'" ;
 
$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
     for($i = 0; $i < count($_POST['cod1']); $i++)
    {
      $codigo_producto  = $_POST['cod1'][$i];
      $cant_aprobada    = $_POST['cant'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
      $cant=$cant_aprobada-$cantidad_despachada;
     
        $sql="UPDATE  detalle_vale SET stock = '$cant',cantidad_despachada='$cantidad_despachada' WHERE codigodetallevale ='$codigo_producto'" ;

      $query = mysqli_query($conn, $sql);
       if ($query)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
        location.href = '../solicitudes_almacen.php';
        </script>
        ";
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
        location.href = '../solicitudes_almacen.php';
        </script>
        ";
        }
}
for ($i=0; $i < count($_POST['cod']) ; $i++) {

  $codigo= $_POST['cod'][$i];
  $stocks =$_POST['cantidad_despachada'][$i];   
  $stock_obtenido =$_POST['cant'][$i];
  $stock_descontado=$stocks - $stock_obtenido;
   
//sql
$count = "SELECT codProductos, SUM(stock), fecha_registro FROM tb_productos GROUP BY codProductos";
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE codProductos ='$codigo'" ;
$result = mysqli_query($conn, $sql1);
}

     }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../solicitudes_bodega.php';
        </script>
        ";
  }
  