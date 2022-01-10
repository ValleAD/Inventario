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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <title>Solicitudes De Almacen</title>
</head>


<body>
    <div class=" container table-responsive " >
      
        <h2 class="text-center mg-t" style="color: #fff; margin-top: -0.5%;">Solicitudes Vale</h2>
        <p style="margin-top: 5%;" ></p>
        <table class="table table-dark table-hover table-bordered container-fluid" style="vertical-align: bottom;">
            <tr>
             
                <td class="table-info text-dark"><strong>Código de Vale</strong></td>
                <td class="table-info text-dark"><strong>Departamento Solicitante</strong></td>
                <td class="table-info text-dark"><strong>Fecha de solicitud</strong></td>
                <td class="table-info text-dark"><strong>Detalles</strong></td>
                
            </tr>
            <td id="td" colspan="8"><h4>No se encontraron nigun  resutados 😥</h4></td>
            </tr>
    
            
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>


<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->
            <td>
                <a class="btn btn-primary swal2-styled.swal2-confirm" href="datos_vale.php">Ver detalles</a>
            </td>
        </tr>
            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
   
        </div>
 <?php } ?> 
           
        </table>
    </div>
</body>
</html>
