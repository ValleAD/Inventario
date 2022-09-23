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
    <body>
<?php 
 include '../Model/conexion.php';

$id1 = $_POST['id'];
$id2 = $_POST['idusuario'];
if ($id2==1) {
                          echo "<script>
    Swal.fire(
      'Realizado',
      'La Cuenta Administrador no de puede Eliminar',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
 
   echo '<script>

        alert("");
        window.location ="../Empleados.php"; 
                </script>';     
}else{
$eliminar ="DELETE FROM tb_usuarios WHERE id='$id1' and tipo_usuario='$id2'";
$result= mysqli_query($conn, $eliminar);
if ($result) {
                  echo "<script>
    Swal.fire(
      'Realizado',
      'Empleado ha sido Eliminado',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire(
      'ERROR',
      '¡Error! algo salió mal',
      'error'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
}
}
 ?>
</body>
</html>