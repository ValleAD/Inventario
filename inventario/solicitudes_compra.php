<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" > 
      <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <title>Solicitudes De Compra</title>
</head>


<body>
     <div class="container">
        <table class="table">
            <center><h1 style="margin-top:5px">Solicitudes de Compra</h1></center>
            <thead>
              <tr id="tr">
             
                <th><strong>N. Solicitud</strong></th>
                <th><strong>Dependencia</strong></th>
                <th><strong>Plaza</strong></th>
                <th><strong>Unidad Técnica</strong></th>
                <th><strong>Descripción Solitud</strong></th>
                <th><strong>Fecha de Registro</strong></th>
                <th><strong>Detalles</strong></th>
                
            </tr>
            <td id="td" colspan="8"><h4>No se encontraron ningun  resultados 😥</h4></td>
            
    </thead>
        <tbody> 
            
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
   
</style>
        <tr>
            <td data-label="N. Solicitud"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td data-label="Dependencia"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plaza"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Unidad Técnica"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td data-label="Descripción Solitud"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
            <td data-label="Fecha de solicitud"><?php  echo $solicitudes['fecha_registro']; ?></td>


<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->
            <td data-label="Detalles">
                <a class="btn btn-primary swal2-styled.swal2-confirm" href="datos_compra.php">Ver detalles</a>
            </td>
        </tr>
            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
   
        </div>
 <?php } ?> 
           </tbody>
        </table>
    </div>
</body>
</html>
