<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../log/signin.php";
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
    <style type="text/css">
        
     #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
    </style>
     <div id="act">
        <table class="table">
            <center><h1 style="margin-top:5px">Solicitudes de Compra</h1></center>
            <br>
            <thead>
              <tr id="tr">
                <th><strong>No. Solicitud</strong></th>
                <th><strong>Dependencia</strong></th>
                <th><strong>Plazo y No. de Enrtegas</strong></th>
                <th><strong>Unidad Técnica</strong></th>
                <th align="center"><strong>Descripción Solicitud</strong></th>
                <th><strong>Fecha de Registro</strong></th>
                <th><strong>Estado</strong></th>
                <th><strong>Detalles</strong></th>
            </tr>
            <td id="td" colspan="7"><h4 align="center" >No se encontraron resultados 😥</h4></td>
            
    </thead>
        <tbody> 
            
    <?php
    include 'Model/conexion.php';
     $por_pagina = 6;
 if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
 }else{
    $pagina =1;
 }
 $empieza = ($pagina-1) * $por_pagina;

    $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC LIMIT  $empieza,$por_pagina";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
</style>
        <tr>
            <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['estado']; ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Compra.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['nSolicitud']; ?>">             
                <button name='detalle' class="btn btn-primary swal2-styled.swal2-confirm">Ver Detalles</button>             
            </form> 
            </td>
        </tr>
        
 <?php } ?> 
           </tbody>
        </table>
         <p style="margin-top: 2%;"></p>
<?php 
 $sql = "SELECT * FROM tb_compra";
    $result = mysqli_query($conn, $sql);
$total_registro = mysqli_num_rows($result);
$total_pagina = ceil($total_registro / $por_pagina);

echo "<nav aria-label='Page navigation example'>
  <ul class='pagination justify-content-end'><li class='page-item '><a class='page-link' href='solicitudes_compra.php?pagina= 1'>".'Primera'."</a><li>";
for ($i=1; $i <=$total_pagina; $i++) { 
    echo "<li class='page-item '><a class='page-link ' href='solicitudes_compra.php?pagina=".$i."'>".$i."</a></li>";
}
echo "<li class='page-item'><a class='page-link' href='solicitudes_compra.php?pagina=$total_pagina'>".'Ultima'."</a><li></ul></nav>";
?>

</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </div>
</body>
</html>
