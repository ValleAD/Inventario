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
    <body>
<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../../Model/conexion.php';
//estado compra
if(isset($_POST['detalle_almacen'])){
 $nSolicitud=$_POST['num_sol'];
$estado =$_POST['estado'];
$sql="UPDATE  tb_almacen SET estado = '$estado' WHERE codAlmacen='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);

 for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod1'][$i];
      $cantidad_despachada    = $_POST['cantidad_despachada'][$i];

       $sql="UPDATE  detalle_almacen SET  cantidad_despachada='$cantidad_despachada' WHERE codigoalmacen='$codigo_producto'" ;

      $query = mysqli_query($conn, $sql);


  
      if ($result || $query)  {
                 echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Almacen/solicitudes_almacen.php';                               
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
        window.location.href='../../Vistas/Almacen/solicitudes_almacen.php';                               
               }
                });

        </script>";
        }
    
  }
}
if(isset($_GET['estado1'])){
$nSolicitud=$_GET['almacen'];
$estado = $_GET['estado1'];
$sql="UPDATE  tb_almacen SET estado = '$estado' WHERE codAlmacen='$nSolicitud'" ;
$result = mysqli_query($conn, $sql);
if ($estado=='Rechazado') {
     echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Producto Rechazado',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Bodega/solicitudes_almacen.php';                               
               }
                });

        </script>";
      }

}

  ?>
</body>
</html>