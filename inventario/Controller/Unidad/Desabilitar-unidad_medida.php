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
require '../../Model/conexion.php';

//conversion
$id = $_POST['id'];
$No =$_POST['Habilitado'];


//sql


$sql="UPDATE selects_unidad_medida	 SET Habilitado = '$No' WHERE id='$id'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
                 echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'La Unidad de Medida ha sido Desabilitada correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Unidad/unidad_medidad.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
     title: 'ERROR',
     text: '¡Error! algo salió mal',
     icon: 'error',
     allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Unidad/unidad_medidad.php';                               
               }
                });

        </script>";
}

?>
</body>
</html>