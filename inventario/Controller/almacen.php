<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
if(isset($_POST['submit'])){
include '../Model/conexion.php';

    $solicitud_no     = $_POST['nsolicitud'];
    $departamento     = $_POST['depto'];
    $usuario          = $_POST['usuario'];
    //crud para guardar los productos en la tabla tb_vale
     $sql = "INSERT INTO tb_almacen (codAlmacen, departamento,encargado,estado) VALUES ('$solicitud_no', '$departamento','$usuario','Pendiente')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $nombre_articulo  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $num_sol          = $_POST['nsolicitud'];

      $insert = "INSERT INTO detalle_almacen(codigo, nombre, unidad_medida, cantidad_solicitada, tb_almacen, precio) VALUES ('$codigo_producto', '$nombre_articulo','$u_m', '$soli', '$num_sol', '$cost')";
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
  }
    
?>
