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
//estado compra


if(isset($_POST['detalle_vale'])){
   $nSolicitud=$_POST['vale'];
$estado = $_POST['estado'];
$jus = $_POST['jus'];
$sql="UPDATE  tb_vale SET estado = '$estado', observaciones='$jus' WHERE codVale='$nSolicitud'" ;
$result = mysqli_query($conn, $sql);
if ($estado=='Aprobado') {
     for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $cod_producto  = $_POST['cod'][$i];
      $cantidad_despachada = $_POST['cantidad_despachada'][$i];
   
   $count = "SELECT codProductos, SUM(stock) FROM tb_productos  WHERE codProductos ='$cod_producto' GROUP BY codProductos, precio";
    $query2 = mysqli_query($conn, $count);

    while ($productos1 = mysqli_fetch_array($query2)){

      $stock = $productos1['SUM(stock)'];
   
      $total = $stock - $cantidad_despachada;
       
       $sql1="UPDATE tb_productos SET stock ='$total' WHERE codProductos ='$cod_producto'";
       $query1 = mysqli_query($conn, $sql1);
       }
   
   }

      for($i = 0; $i < count($_POST['cod_vale']); $i++)
        {
          $cod_vale  = $_POST['cod_vale'][$i];
          $cantidad_despachada = $_POST['cantidad_despachada'][$i];
                
          $update="UPDATE detalle_vale SET cantidad_despachada ='$cantidad_despachada' WHERE codigodetallevale ='$cod_vale'";
          $query_update = mysqli_query($conn, $update);
      
          }
            
          if ($query1 || $query2 || $query_update  || $result)  {
                  echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Su producto fue registrado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../solicitudes_vale.php';                               
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
        window.location.href='../solicitudes_vale.php';                               
               }
                });

        </script>";
        }
     
       }
    
    }
        if(isset($_GET['estado1'])){
$nSolicitud=$_GET['vale'];
$estado = $_GET['estado1'];
$sql="UPDATE  tb_vale SET estado = '$estado' WHERE codVale='$nSolicitud'" ;
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
        window.location.href='../solicitudes_vale.php';                               
               }
                });

        </script>";
      }

}

  ?>
</body>
</html>