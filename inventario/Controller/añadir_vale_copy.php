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
      $cod_vale = $_POST['cod_vale'];
      $cant_aprobada    = $_POST['cant'][$i];
      $descripcion= $_POST['desc'][$i];
      $unidadmedida= $_POST['um'][$i];
      $stock = $_POST['cant'][$i];
      $precio= $_POST['precio'][$i];
      $cantidad_despachada = $_POST['cantidad_despachada'][$i];
   $count = "SELECT codProductos, SUM(stock) FROM tb_productos  WHERE codProductos ='$cod_producto' GROUP BY codProductos ";
    $query2 = mysqli_query($conn, $count);


    while ($productos1 = mysqli_fetch_array($query2)){

   $stock = $productos1['SUM(stock)'];
   $stock1= $stock - $cantidad_despachada;
}


$sql1="UPDATE tb_productos SET stock ='$stock1' WHERE codProductos ='$cod_producto'";
$query1 = mysqli_query($conn, $sql1);

                for($i = 0; $i < count($_POST['cod_vale']); $i++)
                {
                  $cod_vale  = $_POST['cod_vale'][$i];
                  $cantidad_despachada = $_POST['cantidad_despachada'][$i];
                
                $update="UPDATE detalle_vale SET cantidad_despachada ='$cantidad_despachada' WHERE codigodetallevale ='$cod_vale'";
                $query_update = mysqli_query($conn, $update);

                
                }
}

 if ($query1 || $query2 || $query_update  || $result)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
       location.href = '../solicitudes_vale.php';
        </script>
        ";
        return true;
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
        location.href = '../solicitudes_vale.php';
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