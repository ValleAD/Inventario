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
     
if (isset($_POST['form_bodega'])) {


    $departamento = $_POST['depto'];
    $orden_trabajo = $_POST['odt'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
      $verificar_bodega =mysqli_query($conn, "SELECT * FROM detalle_bodega WHERE odt_bodega ='$orden_trabajo' ");

if (mysqli_num_rows($verificar_bodega)>0) {
         echo "<script>
    Swal.fire(
      'NOTA IMPORTANTE:',
      'Este Producto ya esta Registrado, intente con otro diferente',
      'warning'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../form_bodega.php';                               
               }
                });

        </script>";
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,estado) VALUES ('$orden_trabajo', '$departamento','$usuario','$idusuario','Pendiente')";
    $result = mysqli_query($conn, $sql); 
      
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
       echo "<script>
    Swal.fire(
      'Realizado',
      'Su producto fue registrado correctamente',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dt_bodega.php';                               
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
        window.location.href='../form_bodega.php';                               
               }
                });

        </script>";
      }
    }
}
if (isset($_POST['solicitar'])) {
      $departamento = $_POST['depto'];
    $orden_trabajo = $_POST['odt'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
      $verificar_bodega =mysqli_query($conn, "SELECT * FROM detalle_bodega WHERE odt_bodega ='$orden_trabajo' ");

if (mysqli_num_rows($verificar_bodega)>0) {
         echo "<script>
    Swal.fire(
      'NOTA IMPORTANTE:',
      'Este Producto ya esta Registrado, intente con otro diferente',
      'warning'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../form_bodega_varios.php';                               
               }
                });

        </script>";
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,estado) VALUES ('$orden_trabajo', '$departamento','$usuario','$idusuario','Pendiente')";
    $result = mysqli_query($conn, $sql); 
      
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
       echo "<script>
    Swal.fire(
      'Realizado',
      'Su producto fue registrado correctamente',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dt_bodega.php';                               
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
        window.location.href='../form_bodega_varios.php';                               
               }
                });

        </script>";
      }
    }

}
    

?>
</body>
</html>