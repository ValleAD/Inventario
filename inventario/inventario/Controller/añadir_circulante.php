<?php

include '../Model/conexion.php';

    $solicitud_no = $_POST['solicitud_no'];
    $idusuario = $_POST['idusuario'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_circulante (codCirculante,estado,idusuario) VALUES ('$solicitud_no','Pendiente','$idusuario')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['desc']); $i++) 
    {
      $descripcion  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['soli'][$i];
      $cost             = $_POST['costo'][$i];
      $num_sol          = $_POST['solicitud_no'];

      $insert = "INSERT INTO detalle_Circulante(descripcion, unidad_medida, stock, tb_circulante, precio) VALUES ('$descripcion','$u_m', '$soli', '$num_sol', '$cost')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
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
