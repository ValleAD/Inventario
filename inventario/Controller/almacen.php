<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

    $solicitud_no = $_POST['solicitud_no'];
    $departamento = $_POST['depto'];
    $usuario = $_POST['usuario'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_almacen (cod_solicitud, departamento,encargado) VALUES ('$solicitud_no', '$departamento','$usuario')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $nombre_articulo  = $_POST['nom'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['soli'][$i];
      $cost             = $_POST['precio'][$i];
      $num_sol          = $_POST['solicitud_no'];

      $insert = "INSERT INTO detalle_almacen(cod_producto, unidad_medida, nombre, cantidad, costo_unitario, cod_solicitud) VALUES ('$codigo_producto','$u_m','$nombre_articulo', '$soli', '$cost', '$num_sol')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
        location.href = '../dt_almacen.php';
        </script>
        ";
      }else {
        echo "<script> alert('¡Error! algo salió mal');
        location.href = '../form_almacen.php';
        </script>
        ";
      }
    }
?>
