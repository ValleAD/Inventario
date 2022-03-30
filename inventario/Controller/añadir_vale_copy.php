<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//estado compra
if(isset($_POST['detalle_vale'])){


 $nSolicitud=$_POST['vale'];
$estado = $_POST['estado'];
$sql="UPDATE  tb_vale SET estado = '$estado' WHERE codVale='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
     for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $cod_producto  = $_POST['cod'][$i];
      $cant_aprobada    = $_POST['cant'][$i];
      $descripcion= $_POST['desc'][$i];
      $unidadmedida= $_POST['um'][$i];
      $stock = $_POST['cant'][$i];
      $stock_despachado = $_POST['cantidad_despachada'][$i];
      $precio= $_POST['cu'][$i];
      $cantidad_despachada = $_POST['cantidad_despachada'][$i];
echo $unidadmedida;
    $count = "SELECT codProductos, SUM(stock) FROM tb_productos  WHERE codProductos ='$cod_producto' GROUP BY codProductos ";
    $query2 = mysqli_query($conn, $count);
    while ($productos1 = mysqli_fetch_array($query2)){

   $stock = $productos1['SUM(stock)'];
   $stock1= $stock - $cantidad_despachada;
}

 $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio) VALUES ('$cod_producto','$descripcion','$unidadmedida','$stock','$precio')";
$query2 = mysqli_query($conn, $insert);
$sql1="UPDATE tb_productos SET stock ='$stock1' WHERE codProductos ='$cod_producto'";
$query1 = mysqli_query($conn, $sql1);

     
}

 if ($query1 || $query2 || $result)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
       // location.href = '../solicitudes_vale.php';
        </script>
        ";
        return true;
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
        // location.href = '../solicitudes_vale.php';
        </script>
        ";
        return false;
    }

  
   }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
       location.href = '../solicitudes_vale.php';
        </script>
        ";
  }
}

  ?>