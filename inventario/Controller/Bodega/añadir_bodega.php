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
    $orden_trabajo = $_POST['odt'];
    $idusuario = $_POST['idusuario'];
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];

$sql="UPDATE  tb_bodega SET estado = 'Pendiente',departamento='$departamento' WHERE codBodega='$orden_trabajo'" ;

$result = mysqli_query($conn, $sql);

         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $cod= $_POST['cod1'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo')";
      $query = mysqli_query($conn, $insert);

 $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario) VALUES('$descripcion','Solicitud de Trabajo','$unidadmedida','$codigo','$stock','$precio','$orden_trabajo','$idusuario')";

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
        window.location.href='../../Vistas/Bodega/dt_bodega.php?cod=$orden_trabajo';                               
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
        window.location.href='../../Vistas/Bodega/Detalle_Bodega.php';                               
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
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];
      $verificar_bodega =mysqli_query($conn, "SELECT * FROM detalle_bodega WHERE odt_bodega ='$orden_trabajo' ");

if (mysqli_num_rows($verificar_bodega)>0) {
         echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Producto ya esta Registrado, intente con otro diferente',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Bodega/form_bodega_varios.php';                               
               }
                });

        </script>";
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,estado,Mes,Año) VALUES ('$orden_trabajo', '$departamento','$usuario','$idusuario','Pendiente','$mes','$año')";
    $result = mysqli_query($conn, $sql);   
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $cod= $_POST['cod1'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo')";
      $query = mysqli_query($conn, $insert);

 $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario) VALUES('$descripcion','Solicitud de Trabajo','$unidadmedida','$codigo','$stock','$precio','$orden_trabajo' ,'$idusuario')";

       $query1 = mysqli_query($conn, $sql1);
   
      if ($result || $query || $query1) {
       echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Su producto fue registrado correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Bodega/dt_bodega.php?cod=$orden_trabajo';                               
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
        window.location.href='../../Vistas/Bodega/form_bodega_varios.php';                               
               }
                });

        </script>";
      }
    }

}
    

?>
</body>
</html>