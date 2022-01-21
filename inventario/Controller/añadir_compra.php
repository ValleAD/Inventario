<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
 
$nSolicitud = $_POST['nsolicitud'];
$dependencia = $_POST['dependencia'];
$plazo = $_POST['plazo'];
$u_t= $_POST['unidad_tecnica'];
$descripcion_solicitud = $_POST['descripcion_solicitud'];
$usuario = $_POST['usuario'];


$insert = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud, usuario) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud', '$usurio')";
$result = mysqli_query($conn, $insert);
if ($result)  {
echo "<script> alert('Su producto fue registrado correctamente');
location.href = '../dt_compra.php';
</script>
";
}else {
echo "<script> alert('UUPS!! Algo no fue mal escrito');
location.href = '../form_compra.php';
</script>
";
}



  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $catalogo         = $_POST['cat'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $solicitud        = $_POST['nsolicitud'];;

      $insert = "INSERT INTO detalle_compra (codigo, catalogo, descripcion, unidad_medida, stock, precio, solicitud_compra) VALUES ('$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad', '$cost', '$solicitud')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        //location.href = '../dt_compra.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../form_compra.php';
        </script>
        ";
      }

    }  
?>
