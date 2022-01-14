<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//     , 
for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $nombre_articulo  = $_POST['nom'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['soli'][$i];
      $cost             = $_POST['precio'][$i];

      $insert = "INSERT INTO tb_almacen(codigo, nombre, unidad_medida, cantidad_solicitada, precio) VALUES ('$codigo_producto','$nombre_articulo','$u_m', '$soli', '$cost')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../home.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../regi_producto.php';
        </script>
        ";
      }
    }
?>
