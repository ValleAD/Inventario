 <?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

if(isset($_POST['detalle_bodega'])){
$nSolicitud=$_POST['odt'];
$estado =$_POST['estado'];
     $sql="UPDATE  tb_bodega SET estado = '$estado'  WHERE codBodega ='$nSolicitud'" ;
 
$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
         for($i = 0; $i < count($_POST['cod1']); $i++)
    {
      $codigo_producto  = $_POST['cod1'][$i];
      $cant_aprobada    = $_POST['cant'][$i];
      $precio1   = $_POST['cost'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
      $cant=$cant_aprobada-$cantidad_despachada;

      $count = "SELECT codProductos, SUM(stock) FROM tb_productos  GROUP BY codProductos";
        $query2 = mysqli_query($conn, $count);
        while ($productos1 = mysqli_fetch_array($query2)){
           $stock =$productos1['SUM(stock)'];
           $stock1= $stock-$cant;
    }

$sql1="UPDATE tb_productos SET stock='$stock1' WHERE cod ='$codigo_producto'" ;
$query1 = mysqli_query($conn, $sql1);

         $sql="UPDATE detalle_bodega SET cantidad_despachada='$cantidad_despachada' WHERE codigodetallebodega  ='$codigo_producto'" ;

      $query = mysqli_query($conn, $sql);
}
 if ($query || $query1 || $result)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
       location.href = '../solicitudes_bodega.php';
        </script>
        ";
        return true;
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
         location.href = '../solicitudes_bodega.php';
        </script>
        ";
        return false;
    }

  
   }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../solicitudes_bodega.php';
        </script>
        ";
  }
}
?>