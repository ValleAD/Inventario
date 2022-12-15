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
     if (isset($_POST['form_vale'])) {

    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
    $jus = $_POST['jus'];
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];
  $verificar_vale =mysqli_query($conn, "SELECT * FROM detalle_vale WHERE numero_vale ='$odt' ");

if (mysqli_num_rows($verificar_vale)>0) {
          echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Producto ya esta Registrado, intente con otro diferente',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Vale/form_vale1.php';                               
               }
                });

        </script>";
exit();
}
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

$sql = "SELECT cod FROM tb_productos WHERE cod='$cod'";
    $result1 = mysqli_query($conn, $sql);
        $id=0;
    while ($productos = mysqli_fetch_array($result1)){
        $id=$productos['cod']+1;
 $sql1="INSERT INTO historial(ID,descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario) VALUES('$cod','$descripcion','Vale Consulta Externa','$unidadmedida','$codigo','$stock','$precio','$numero_vale','$idusuario')";
       $query1 = mysqli_query($conn, $sql1);
}
      if ($result || $query || $query1) {
                       echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Vale/datos_vale.php';                               
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