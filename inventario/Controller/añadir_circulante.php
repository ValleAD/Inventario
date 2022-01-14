<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
//     , 
for($i = 0; $i < count($_POST['desc']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $descripcion  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['soli'][$i];
      $costo             = $_POST['costo'][$i];

      $insert = "INSERT INTO tb_circulante(descripcion, unidad_medida, cantidad_solicitada, costo) VALUES ('$descripcion','$u_m', '$soli', '$costo')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../dt_circulante.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../form_circulante.php';
        </script>
        ";
      }
    }
?>
