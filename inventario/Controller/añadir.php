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

for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria        = $_POST['categoria'][$i];
      $catalogo         = $_POST['catal'][$i];
      $Descripción      = $_POST['descr'][$i];
      $u_m              = $_POST['um'][$i];
      $cost             = $_POST['cu'][$i];
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];
$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_productos WHERE codProductos ='$codigo_producto'");

if (mysqli_num_rows($verificar_usuario)>0) {
         echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Producto ya esta Registrado, intente con otro diferente',
      icon:'warning',
      closeOnClickOutside: false,
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../regi_producto.php';                               
               }
                });

        </script>";

exit();
}
      $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, descripcion, unidad_medida,  precio,dia,mes,año) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$Descripción', '$u_m', '$cost','$dia','$mes','$año')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Su producto fue registrado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../vistaProductos.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
      title:'ERROR',
      text:'¡Error! algo salió mal',
      icon'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../regi_producto.php';                               
               }
                });

        </script>";
        }
    }
?>
</body>
</html>
