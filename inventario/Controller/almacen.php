    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/bootstrap.css">
    <script src="../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body><?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql

include '../Model/conexion.php';

    $solicitud_no     = $_POST['nsolicitud'];
    $departamento     = $_POST['depto'];
    $usuario          = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
      $verificar_almacen =mysqli_query($conn, "SELECT * FROM detalle_almacen WHERE tb_almacen ='$solicitud_no' ");

if (mysqli_num_rows($verificar_almacen)>0) {
  echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'El codigo ingresado debe se difernte al registrado',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../form_almacen.php';                               
               }
                });

        </script>";
exit();
}
    //crud para guardar los productos en la tabla tb_vale
     $sql = "INSERT INTO tb_almacen (codAlmacen, departamento,encargado,estado,idusuario) VALUES ('$solicitud_no', '$departamento','$usuario','Pendiente','$idusuario')";
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

      if ($result || $query) {
        echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Su solicitud fué realizada correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dt_almacen.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
      title:'ERROR',
      text:'¡Error! algo salió mal',
      icon:'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../form_almacen.php';                               
               }
                });

        </script>";
        
      }
    }
    mysqli_close($conn);
    
?>
</body>
</html>