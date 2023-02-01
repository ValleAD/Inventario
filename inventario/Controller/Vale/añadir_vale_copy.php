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

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../../Model/conexion.php';
//estado compra


if(isset($_POST['detalle_vale'])){
   $nSolicitud=$_POST['vale'];
   $numero_vale=$_POST['numero_vale'];
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
          $codigo= $_POST['cod'][$i];
            $nSolicitud=$_POST['vale'];  
            $descripcion= $_POST['desc'][$i];
            $unidadmedida= $_POST['um'][$i];
            $idusuario = $_POST['idusuario'];
            $stock = $_POST['cant'][$i];
            $precio= $_POST['cost'][$i];    
          $update="UPDATE detalle_vale SET cantidad_despachada ='$cantidad_despachada' WHERE codigodetallevale ='$cod_vale'";

          $query_update = mysqli_query($conn, $update);
  $verificar =mysqli_query($conn, "SELECT * FROM historial WHERE Concepto='Vale Consulta Externa' and idusuario='$idusuario' and Entradas='$stock' AND Saldo='$precio' and descripcion='$descripcion' and No_Comprovante='$codigo' and Detalles='$nSolicitud'  and No_Comprovante='$codigo'");

if (mysqli_num_rows($verificar)>0) {

      $sql2="UPDATE historial SET Salidas='$cantidad_despachada' WHERE Concepto='Vale Consulta Externa' and idusuario='$idusuario' and Entradas='$stock' AND Saldo='$precio' and descripcion='$descripcion' and No_Comprovante='$codigo' and Detalles='$nSolicitud'  and No_Comprovante='$codigo'";
      $query3 = mysqli_query($conn, $sql2);

}else{

     $sql4="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Salidas,Saldo,Detalles,idusuario,Mes,Año) VALUES('$descripcion','Vale Consulta Externa','$unidadmedida','$codigo','$stock','$cantidad_despachada','$precio','$numero_vale','$idusuario','$mes','$año')";
          $query4 = mysqli_query($conn, $sql4);
      
}
  
}
            
          if ($query1 || $query2 || $query3 || $query_update  || $result)  {
                  echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Vale/solicitudes_vale.php';                               
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
        window.location.href='../../Vistas/Vale/solicitudes_vale.php';                               
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
        window.location.href='../../Vistas/Vale/solicitudes_vale.php';                               
               }
                });

        </script>";
      }

}

  ?>
</body>
</html>