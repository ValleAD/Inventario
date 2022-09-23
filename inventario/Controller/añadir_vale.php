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

include ('../Model/conexion.php');
     if (isset($_POST['form_vale'])) {

    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
    $jus = $_POST['jus'];
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
        window.location.href='../form_vale.php';                               
               }
                });

        </script>";
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,idusuario,campo,estado,observaciones) VALUES ('$odt', '$departamento','$usuario','$idusuario','Solicitud Vale','Pendiente','$jus')";
    $result = mysqli_query($conn, $sql); 
      
        
     for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];

  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
                       echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../datos_vale.php';                               
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
        window.location.href='../form_vale.php';                               
               }
                });

        </script>";
      }
    }
}
         if (isset($_POST['form_vale2'])) {

    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
    $jus = $_POST['jus'];
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
        window.location.href='../form_vale2.php';                               
               }
                });

        </script>";
exit();
}

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,idusuario,campo,estado,observaciones) VALUES ('$odt', '$departamento','$usuario','$idusuario','Solicitud Vale','Pendiente','$jus')";
    $result = mysqli_query($conn, $sql); 
      
        
     for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];

  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
                      echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Estado fue Cambiado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../datos_vale.php';                               
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
        window.location.href='../form_vale2.php';                               
               }
                });

        </script>";
      }
    }
}


?>
</body>
</html>