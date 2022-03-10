<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//estado compra
if (isset($_POST['detalle_circulante'])) {

 $nSolicitud=$_POST['num_sol'];
$estado =$_POST['estado'];
$sql="UPDATE  tb_circulante SET estado = '$estado' WHERE codCirculante='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
     for($i = 0; $i < count($_POST['cod1']); $i++)
    {
      $codigo_n  = $_POST['codn'][$i];
      $codigo_producto = $_POST['cod1'][$i];
      $cant_aprobada    = $_POST['cant'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
      $cant=$cant_aprobada-$cantidad_despachada;
     echo $codigo_n;
        $sql="UPDATE  detalle_circulante SET codigo='$codigo_n' stock = '$cant',cantidad_despachada='$cantidad_despachada' WHERE codigodetallecirculante  ='$codigo_producto'" ;

      $query = mysqli_query($conn, $sql);
}

    //  for($i = 0; $i < count($_POST['cod']); $i++)
    // {
    //   $codigo_producto  = $_POST['cod'][$i];
    //   $Descripción      = $_POST['desc'][$i];
    //   $u_m              = $_POST['um'][$i];
    //   $cost             = $_POST['cost'][$i];
    //   $cant             = $_POST['cant'][$i];
    //   $cant_aprobada    = $_POST['cantidad_despachada'][$i];
    //   $catT=$cant+$cant_aprobada;
    //    $insert = "INSERT INTO tb_productos (codProductos,  descripcion, unidad_medida, stock, precio,solicitudes) VALUES ('$codigo_producto',  '$Descripción', '$u_m',  '$cost','>$cant_aprobada' ,'Solicitud Compra')";
    //   $query = mysqli_query($conn, $insert);
    //   if ($query)  {
    //     echo "<script> alert('El Estado fue Cambiado correctamente')
    //     location.href = '../solicitudes_circulante.php';
    //     </script>
    //     ";
    //     }else {
    //     echo "<script> alert('UUPS!! Algo no fue mal escrito')
    //     location.href = '../solicitudes_circulante.php';
    //     </script>
    //     ";
    //     }
    // }
   }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../solicitudes_circulante.php';
        </script>
        ";
  }
}
  ?>