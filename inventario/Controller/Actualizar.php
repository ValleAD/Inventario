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
require '../Model/conexion.php';

//conversion
$id2 =$_POST['cod'];
$id1 =$_POST['codProducto'];
$codCatalogo =$_POST['codCatalogo'];
$descripcion =$_POST['descripcion'];
$categoria = $_POST['categoria'];
 $um =$_POST['um'];
 $stock=$_POST['stock'];
$precio=$_POST['precio'];

      

//sql


$sql="UPDATE tb_productos SET cod='$id2', codProductos='$id1',categoria='$categoria',catalogo='$codCatalogo',descripcion='$descripcion',stock='$stock',unidad_medida='$um',precio='$precio' WHERE cod='$id2'" ;
$result = mysqli_query($conn, $sql);

if ($result) {
  echo "<script>
    Swal.fire(
      'Actualizado',
      'Los Datos Fueron Actualizados Correctamente',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../vistaProductos.php';                               
               }
                });

        </script>";
}else {
  echo "<script>
    Swal.fire(
      'ERROR',
      'Nos Se pudo Actualizar',
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
