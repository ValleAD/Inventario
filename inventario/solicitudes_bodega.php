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
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css"> 
      <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <title>Solicitudes De Bodega</title>
</head>


<body>

      <section id="act">
        <style type="text/css">
            
     #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
        </style>
        <table class="table">
            <center><h1 style="margin-top:5px">Solicitudes Bodega</h1></center>
            <thead>
              <tr id="tr">
             
                <th class="table-info text-dark"><strong>O. de T. No.</strong></th>
                <th class="table-info text-dark"><strong>Departamento Solicitante</strong></th>
                <th class="table-info text-dark"><strong>Fecha de solicitud</strong></th>
                <th class="table-info text-dark"><strong>Detalles</strong></th>
                
            </tr>
            <td id="td" colspan="4"><h4 align="center">No se encontraron resultados 😥</h4></td>
            
    <style type="text/css">
        
    </style>
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

    $sql = "SELECT * FROM tb_bodega ORDER BY fecha_registro DESC LIMIT $empieza,$por_pagina";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
    
   
</style>

        <tr>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Bodega.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codBodega']; ?>">             
                <button name='detalle' class="btn btn-primary swal2-styled.swal2-confirm">Ver Detalles</button>             
            </form> 
            </td>
        </tr>
 <?php } ?> 
           </tbody>
        </table>
 <p style="margin-top: 2%;"></p>
<?php 
 $sql = "SELECT * FROM tb_bodega";
    $result = mysqli_query($conn, $sql);
$total_registro = mysqli_num_rows($result);
$total_pagina = ceil($total_registro / $por_pagina);

echo "<center><a id='cb' href='solicitudes_bodega.php?pagina= 1'>".'Primera'."</a>";
for ($i=1; $i <=$total_pagina; $i++) { 
    echo "<a id='c' href='solicitudes_bodega.php?pagina=".$i."'>".$i."</a>";
}
echo "<a  id='cbq' href='solicitudes_bodega.php?pagina=$total_pagina'>".'Ultima'."</a></center>";
?>

</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
                #cb{
            border-radius: 15px 0px 0px 15px;
            padding: 20px 10px;
            background: whitesmoke;
            }
            #cbq{
            border-radius: 0px 15px 15px 0px;
            padding: 20px 10px;
            background: whitesmoke;
            }
            #c{
            padding: 20px 10px;
            color: violet; 
            flex-wrap: wrap-reverse;
            text-decoration-style: dotted;
            background: whitesmoke;
     }
</style>
    </section>
</body>
</html>
