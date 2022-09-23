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
require '../Model/conexion.php';
//conversion
 $id = $_POST['id'];
 $No =$_POST['Habilitado'];


      //sql


      $sql="UPDATE selects_dependencia SET Habilitado = '$No' WHERE id='$id'" ;
      $result = mysqli_query($conn, $sql);

      if ($result) {
                        echo "<script>
    Swal.fire(
      'Realizado',
      'La Dependencia ha sido Desabilitada correctamente',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dependencias.php';                               
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
        window.location.href='../dependencias.php';                               
               }
                });

        </script>";
      }
 ?>
</body>
</html>