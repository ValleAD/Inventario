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
$idusuario = $_POST['idusuario'];
$jus = $_POST['jus'];
if (isset($_POST['form_compra2'])) {
    $verificar_compra =mysqli_query($conn, "SELECT * FROM detalle_compra WHERE solicitud_compra ='$nSolicitud' ");

if (mysqli_num_rows($verificar_compra)>0) {
  echo '
    <script>
    alert("El codigo ingresado debe se difernte al registrado");
     window.location ="../form_compra1.php"; 
  </script>
  ';
exit();
}
}if (isset($_POST['form_compra'])) {
  $verificar_compra =mysqli_query($conn, "SELECT * FROM detalle_compra WHERE solicitud_compra ='$nSolicitud' ");

if (mysqli_num_rows($verificar_compra)>0) {
  echo '
    <script>
    alert("El codigo ingresado debe se difernte al registrado");
     window.location ="../form_compra.php"; 
  </script>
  ';
exit();
}
}

$insert = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud, usuario,estado,idusuario,justificacion) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud', '$usuario','Comprado','$idusuario','$jus')";
$result = mysqli_query($conn, $insert);



  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $catalogo         = $_POST['cat'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $stock      = $_POST['stock'][$i];
      $cost             = $_POST['cu'][$i];
      $solicitud        = $_POST['nsolicitud'];;

      $insert = "INSERT INTO detalle_compra (codigo, catalogo, descripcion, unidad_medida, stock,cantidad_despachada, precio, solicitud_compra) VALUES ('$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad',0, '$cost', '$solicitud')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../dt_compra.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../form_compra1.php';
        </script>
        ";
      }  
}

  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $cantidad      = $_POST['cant'][$i];
      $stock      = $_POST['stock'][$i];
      $stockt = $cantidad + $stock;
$sql="UPDATE  tb_productos SET stock = '$stockt' WHERE codProductos='$codigo_producto'" ;

$result = mysqli_query($conn, $sql);
    }

?>
