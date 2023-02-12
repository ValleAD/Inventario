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

include ('../../Model/conexion.php');
if (isset($_POST['NuevaSoli'])) {
    $departamento = $_POST['depto'];
    $orden_trabajo = $_POST['numero_vale'];
    $jus = $_POST['jus'];
    $idusuario = $_POST['idusuario'];
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];

$sql="UPDATE  tb_vale SET estado = 'Pendiente',departamento='$departamento',observaciones='$jus' WHERE codVale='$orden_trabajo'" ;

$result = mysqli_query($conn, $sql);

         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $cod= $_POST['cod1'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];
    $idusuario = $_POST['idusuario'];


  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);


 $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario,Mes,Año) VALUES('$descripcion','Vale Consulta Externa','$unidadmedida','$codigo','$stock','$precio','$numero_vale','$idusuario','$mes','$año')";
       $query1 = mysqli_query($conn, $sql1);

      if ($result || $result1 || $query || $query1) {
       echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Su producto fue registrado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Vale/datos_vale.php?cod=$numero_vale';                               
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
        window.location.href='../../Vistas/Vale/Detalle_Vale.php';                               
               }
                });

        </script>";
      }
    }

}
     if (isset($_POST['form_vale'])) {

    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
    $jus = $_POST['jus'];
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,idusuario,estado,observaciones,Mes,Año) VALUES ('$odt', '$departamento','$usuario','$idusuario','Pendiente','$jus','$mes','$año')";
    $result = mysqli_query($conn, $sql); 
      
        
     for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $cod= $_POST['cod1'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];
    $idusuario = $_POST['idusuario'];


  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);


 $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario,Mes,Año) VALUES('$descripcion','Vale Consulta Externa','$unidadmedida','$codigo','$stock','$precio','$numero_vale','$idusuario','$mes','$año')";
       $query1 = mysqli_query($conn, $sql1);

      if ($result || $query || $query1) {
                       echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Vale/datos_vale.php?cod=$numero_vale';                               
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
   } ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Vale/form_vale1.php';                               
               }
                });

        </script>";
      }
    }
}
?>
</body>
</html>