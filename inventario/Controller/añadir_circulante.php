<?php

include '../Model/conexion.php';

    $solicitud_no = $_POST['solicitud_no'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_circulante (codCirculante) VALUES ('$solicitud_no')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['desc']); $i++) 
    {
      $descripcion  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['soli'][$i];
      $cost             = $_POST['costo'][$i];
      $num_sol          = $_POST['solicitud_no'];

<<<<<<< Updated upstream
      $insert = "INSERT INTO  detalle_circulante(descripcion, unidad_medida, cantidad_solicitada, costo) VALUES ('$descripcion','$u_m', '$soli', '$costo')";
=======
      $insert = "INSERT INTO detalle_Circulante(descripcion, unidad_medida, stock, tb_circulante, precio) VALUES ('$descripcion','$u_m', '$soli', '$num_sol', '$cost')";
>>>>>>> Stashed changes
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
        location.href = '../dt_circulante.php';
        </script>
        ";
      }else {
        echo "<script> alert('¡Error! algo salió mal');
        location.href = '../form_circulante.php';
        </script>
        ";
      }
    }
?>
