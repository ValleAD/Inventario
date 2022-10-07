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
 include '../../Model/conexion.php';

$id = $_POST['id'];
$id1 = $_POST['Habilitado'];
$var1 = "No";
if (strcmp($id1, $var1) === 0){

$eliminar ="DELETE FROM selects_dependencia WHERE id='$id' AND Habilitado='$id1'";
$result= mysqli_query($conn, $eliminar);
        if ($result) {
echo "<script>
    Swal.fire({
      title:'Realizado',
     text: 'Su Dependencia fue Desabilitado correctamente',
    icon:'success',
    allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Dependencia/dependencias.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
      title:'ERROR',
     text: '¡Error! algo salió mal',
      icon:'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Dependencia/dependencias.php';                               
               }
                });

        </script>";
}
}
 ?>
</body>
</html>