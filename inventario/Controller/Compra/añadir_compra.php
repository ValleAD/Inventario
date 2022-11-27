    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
    <script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body><?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../../Model/conexion.php';
 
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
         echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Producto ya esta Registrado, intente con otro diferente',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Compra/form_compra1.php';                               
               }
                });

        </script>";
exit();
}
}if (isset($_POST['form_compra'])) {
  $verificar_compra =mysqli_query($conn, "SELECT * FROM detalle_compra WHERE solicitud_compra ='$nSolicitud' ");

if (mysqli_num_rows($verificar_compra)>0) {
         echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Producto ya esta Registrado, intente con otro diferente',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Compra/form_compra.php';                               
               }
                });

        </script>";
exit();
}
}

$insert = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud, usuario,estado,idusuario,justificacion) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud', '$usuario','Comprado','$idusuario','$jus')";
$result = mysqli_query($conn, $insert);



  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $Descripción      = $_POST['desc'][$i];
      $catalogo      = $_POST['cat'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $stock      = $_POST['stock'][$i];
      $cost             = $_POST['cu'][$i];
      $solicitud        = $_POST['nsolicitud'];;

      $insert = "INSERT INTO detalle_compra (codigo, catalogo, descripcion, unidad_medida, stock,cantidad_despachada, precio, solicitud_compra) VALUES ('$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad',0, '$cost', '$solicitud')";
      $query = mysqli_query($conn, $insert);

 $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo) VALUES('$Descripción','Solicitud compra','$u_m','$codigo_producto','$cantidad','$cost')";

       $query1 = mysqli_query($conn, $sql1);
      if ($result || $query || $query1) {
                 echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Compra/dt_compra.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
     title: 'ERROR',
      text:'¡Error! algo salió mal',
      icon:'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Compra/form_compra.php';                               
               }
                });

        </script>";
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
</body>
</html>