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

include '../../Model/conexion.php';

    $solicitud_no = $_POST['solicitud_no'];
    $idusuario = $_POST['idusuario'];
      $dia              = $_POST['dia'];
      $mes              = $_POST['mes'];
      $año              = $_POST['año'];
  $verificar_circulante =mysqli_query($conn, "SELECT * FROM detalle_circulante WHERE tb_circulante ='$solicitud_no' ");

if (mysqli_num_rows($verificar_circulante)>0) {
         echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Producto ya esta Registrado, intente con otro diferente',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Circulante/form_circulante1.php';                               
               }
                });

        </script>";
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_circulante (codCirculante,estado,idusuario,Mes,Año) VALUES ('$solicitud_no','Pendiente','$idusuario','$mes','$año')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['desc']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $cod= $_POST['cod1'][$i];
      $descripcion  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $num_sol          = $_POST['solicitud_no'];

      $insert = "INSERT INTO detalle_Circulante(codigo, descripcion, unidad_medida, stock, tb_circulante, precio) VALUES ('$codigo_producto','$descripcion','$u_m', '$soli', '$num_sol', '$cost')";
      $query = mysqli_query($conn, $insert);

 $sql1="INSERT INTO historial(descripcion,Concepto,unidad_medida,No_Comprovante,Entradas,Saldo,Detalles,idusuario) VALUES('$descripcion','Entrada Por Circulante','$u_m','$codigo_producto','$soli','$cost','$num_sol','$idusuario')";

       $query1 = mysqli_query($conn, $sql1);

      if ($result || $query || $query1) {
                echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'El Registrado fue Guardado Correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Circulante/dt_circulante.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
      title:'ERROR',
      text:'¡Error! algo salió mal',
      icon:'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Circulante/form_circulante1.php';                               
               }
                });

        </script>";
      }
    }
    
?>
</body>
</html>