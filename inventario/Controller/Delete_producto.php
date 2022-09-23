    
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

$cod = $_POST['cod'];
$id1 = $_POST['id'];
if ($id1<1) {

        $eliminar ="DELETE FROM tb_productos WHERE cod='$cod' AND stock='$id1'";
        $result= mysqli_query($conn, $eliminar);

        if ($result) {
            
        echo "<script>
    Swal.fire(
      'Eliminado',
      'El Producto fue Eliminado Sastisfactoriamente',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../vistaProductos.php';                               
               }
                });

        </script>";
        }
} else {
       echo "
        <script>
            Swal.fire(
      'EL Producto no se pudo Eliminar',
      'error'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../vistaProductos.php';                               
               }
                });
 </script>";
}

 ?>
    </body>
    </html>

