<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//estado compra
if(isset($_POST['detalle_compra'])){
$nSolicitud=$_POST['sol_compra'];
$estado =$_POST['estado'];
$sql="UPDATE  tb_compra SET estado = '$estado' WHERE nSolicitud='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
   for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod1'][$i];
       $precio    = $_POST['cost'][$i];
      $cant_aprobada    = $_POST['cant'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
      $cant=$cant_aprobada-$cantidad_despachada;

        $sql="UPDATE  detalle_compra SET stock = '$cant',cantidad_despachada='$cantidad_despachada',precio='$precio' WHERE codigodetallecompra='$codigo_producto'" ;

      $query = mysqli_query($conn, $sql);
}

 for($i = 0; $i < count($_POST['cod1']); $i++)
    {
      $codigo_producto  = $_POST['cod1'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cost             = $_POST['cost'][$i];
      $cant             = $_POST['cant'][$i];
      $cant_aprobada    = $_POST['cantidad_despachada'][$i];
      $catT=$cant+$cant_aprobada;
       $insert = "INSERT INTO tb_productos (codProductos,  descripcion, unidad_medida, stock, precio,solicitudes) VALUES ('$codigo_producto',  '$Descripción', '$u_m',  '$cost','>$cant_aprobada' ,'Solicitud Compra')";
      $query1 = mysqli_query($conn, $insert);
      
    
      if ($result || $query || $query1)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
        location.href = '../solicitudes_compra.php';
        </script>
        ";
        return true;
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
        location.href = '../dt_compra_copy.php';
        </script>
        ";
        return false;
        }
    }
  }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../solicitudes_compra.php';
        </script>
        ";
  }}

  ?>