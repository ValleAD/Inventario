<?php

include '../Model/conexion.php';

    $solicitud_no = $_POST['solicitud_no'];
    $idusuario = $_POST['idusuario'];
  $verificar_circulante =mysqli_query($conn, "SELECT * FROM detalle_circulante WHERE tb_circulante ='$solicitud_no' ");

if (mysqli_num_rows($verificar_circulante)>0) {
  echo '
    <script>
    alert("El codigo ingresado debe se difernte al registrado");
     window.location ="../form_circulante.php"; 
  </script>
  ';
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_circulante (codCirculante,estado,idusuario) VALUES ('$solicitud_no','Pendiente','$idusuario')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['desc']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];

      $descripcion  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $num_sol          = $_POST['solicitud_no'];

      $insert = "INSERT INTO detalle_Circulante(codigo, descripcion, unidad_medida, stock, tb_circulante, precio) VALUES ('$codigo_producto','$descripcion','$u_m', '$soli', '$num_sol', '$cost')";
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
