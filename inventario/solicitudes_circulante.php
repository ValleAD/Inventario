<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    include 'Model/conexion.php';
?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Solicitudes Circulante</title>
</head>

<body>
<style>
    #div{
        display: none;
    }
     #ssas{
        display: none;
    }
    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}
form{
    margin: 0;
    padding: 1%;
    }
    </style>
    <br><br><br>
            <h1 class="text-center mg-t" style="margin-top: -0.5%;">Solicitudes de Fondo Circulante</h1><br>

<section class="mx-3 p-2" style="background-color:white;border-radius: 5px; position: initial;margin-bottom: 3%;">
     <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
<?php if ($tipo_usuario==1) {?>
 <div class="btn-group mb-3  mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="Plugin/soli_circulante.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas"  method="POST"   style="background: transparent;" action="Plugin/pdf_soli_circulante.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
<div id="div" style = " max-height: 370px; overflow-y: auto;margin-bottom: 1%;">
<table class="table  table-striped" id="div" style=" width: 100%;">
          <thead>
              <tr id="tr">
             <th>#</th>
                <th><strong>No. de Solicitud</strong></th>
                <th  style=" text-transform: capitalize"><strong>Fecha de solicitud</strong></th>
                <!-- <th  style=" text-transform: capitalize"><strong>Estado</strong></th> -->
                <th><strong>Detalles</strong></th>
                
            </tr>
            </thead>
        </table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
        <table class="table">
            <tbody>
  
    <?php
    $sql = "SELECT * FROM tb_circulante ORDER BY fecha_solicitud";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
    #ssas{
        display: block;
    }
   
</style>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_circulante.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codCirculante']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">               
            </form> 
    <?php } ?>
            </td>
        </tr>
           </tbody>
        </table>
</div>
    <?php } ?><?php if ($tipo_usuario==2) {?>
 <div class="btn-group mb-3  mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="Plugin/soli_circulante.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas"  method="POST"   style="background: transparent;" action="Plugin/pdf_soli_circulante.php" target="_blank">
                <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
<table class="table  table-striped" id="div" style=" width: 100%;">
          <thead>
              <tr id="tr">
             <th>#</th>
                <th><strong>No. de Solicitud</strong></th>
                <th  style=" text-transform: capitalize"><strong>Fecha de solicitud</strong></th>
                <!-- <th  style=" text-transform: capitalize"><strong>Estado</strong></th> -->
                <th><strong>Detalles</strong></th>
                
            </tr>
            </thead>
        </table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
        <table class="table">
            <tbody>
           
  
    <?php

    $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' ORDER BY fecha_solicitud  ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
    #ssas{
        display: block;
    }
    
   
</style>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_circulante.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codCirculante']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">               
            </form> 
            </td>
        </tr>
 <?php } ?> 
           </tbody>
        </table>
    </div>
       
    <?php } ?>
</section>
   
</body>
</html>