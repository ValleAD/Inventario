<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//estado compra

 $nSolicitud=$_POST['num_sol'];
$estado =$_POST['estado'];
$sql="UPDATE  tb_circulante SET estado = '$estado' WHERE codCirculante='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
 if ($result)  {
        echo "<script> alert('El Estado fue Cambiado correctamente')
       location.href = '../solicitudes_circulante.php';
        </script>
        ";
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
         location.href = '../solicitudes_circulante.php';
        </script>
        ";
    }

//  for($i = 0; $i < count($_POST['cod']); $i++)
//     {
//       $codigo_producto  = $_POST['cod1'][$i];
//       $cant_aprobada    = $_POST['cantidad_despachada'][$i];
//        $sql="UPDATE  detalle_almacen SET cantidad_despachada = '$cant_aprobada' WHERE codigoalmacen='$codigo_producto'" ;

//       $query = mysqli_query($conn, $sql);
// }
//      for($i = 0; $i < count($_POST['cod']); $i++)
//     {
//       $codigo_producto  = $_POST['cod'][$i];
//       // $categoria        = $_POST['cat'][$i];
//         //$catalogo         = $_POST['catalogo'][$i];
//       //  $nombre_articulo  = $_POST['nombre'][$i];
//       $Descripción      = $_POST['desc'][$i];
//       $u_m              = $_POST['um'][$i];
//       $cost             = $_POST['cost'][$i];
//       $cant             = $_POST['cant'][$i];
//       // $cant_aprobada    = $_POST['cantidad_despachada'][$i];
//       // $catT=$cant-$cant_aprobada;
//        $insert = "INSERT INTO tb_productos (codProductos,  descripcion, unidad_medida, stock, precio,solicitudes) VALUES ('$codigo_producto',  '$Descripción', '$u_m',  '$cost','>$cant' ,'Solicitud Compra')";
//       $query = mysqli_query($conn, $insert);
//       if ($query)  {
//         echo "<script> alert('El Estado fue Cambiado correctamente')
//         // location.href = '../solicitudes_vale.php';
//         </script>
//         ";
//         }else {
//         echo "<script> alert('UUPS!! Algo no fue mal escrito')
//         // location.href = '../solicitudes_almacen.php';
//         </script>
//         ";
    //     }
    // }
   }elseif ($estado=='Rechazado') {
     echo "<script> alert('Producto Rechazado')
        location.href = '../solicitudes_circulante.php';
        </script>
        ";
  }
  ?>