<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../../Model/conexion.php';
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
      $cost    = $_POST['cost'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];
      $cant=$cant_aprobada-$cantidad_despachada;
        $sql="UPDATE  detalle_circulante  SET codigo='$codigo_n', stock = '$cant',cantidad_despachada='$cantidad_despachada', precio='$cost' WHERE codigodetallecirculante ='$codigo_producto'" ;

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
       if ($codigo_producto==$codigo_producto) {
        $sql = "SELECT * FROM tb_productos WHERE codProductos='$codigo_producto' ";
        $result = mysqli_query($conn, $sql);
        $ncodigo=1;
            while ($productos = mysqli_fetch_array($result)){
              $ncodigo=$productos['codProductos']+1;
         $insert = "INSERT INTO tb_productos (codProductos,  descripcion, unidad_medida, stock, precio,solicitudes) VALUES ('$ncodigo',  '$Descripción', '$u_m',  '$cost','>$cant_aprobada' ,'Solicitud Compra')";
      $query1 = mysqli_query($conn, $insert);
       }else{
        $insert = "INSERT INTO tb_productos (codProductos,  descripcion, unidad_medida, stock, precio,solicitudes) VALUES ('$codigo_producto',  '$Descripción', '$u_m',  '$cost','>$cant_aprobada' ,'Solicitud Compra')";
      $query1 = mysqli_query($conn, $insert);
       }
      
    }
   }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../../Vistas/Circulante/solicitudes_circulante.php';
        </script>
        ";
  }
   if ($query || $result ||$query1)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
        location.href = '../../Vistas/Circulante/solicitudes_circulante.php';
        </script>
        ";
        return true;
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
        location.href = '../../Vistas/Circulante/solicitudes_circulante.php';
        </script>
        ";
        return false;
        }
}
  ?>