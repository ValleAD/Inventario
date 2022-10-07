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
?>
<?php include ('../../templates/menu1.php')?>
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
        margin: 0;
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
            <h1 class="text-center mg-t" style="margin-top: 2%;">Solicitudes de Fondo Circulante</h1><br>

<section class="mx-3 p-2" style="background-color:white;border-radius: 5px; position: initial;margin-bottom: 3%;">
     <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
  <?php if ($tipo_usuario==1) { ?>
     <?php include ('../../Buscador_ajax/Cabezeras/cabezeraCirculante.php') ?>
     <div id="x" class="btn-group mb-3   mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="../../Plugin/Imprimir/Circulante/soli_circulante.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas"  method="POST"   style="background: transparent;" action="../../Plugin/PDF/Circulante/pdf_soli_circulante.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
<form id="ssas" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Circulante/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="circulante" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>

</div> <?php if (isset($_POST['Consultar'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
     <div class="btn-group mb-3  mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="../../Plugin/Imprimir/Circulante/soli_circulante.php" target="_blank">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas"  method="POST"   style="background: transparent;" action="../../Plugin/PDF/Circulante/pdf_soli_circulante.php" target="_blank">
             <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
    <form id="ssas" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Circulante/Excel.php" target="_blank">
<?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
                <button type="submit" class="btn btn-outline-primary" name="Consultar" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
<?php } ?>
 <?php include ('../../Buscador_ajax/Tablas/Circulante/tablaCirculante.php') ?>
        <div id="x">
<table class="table  table-striped" id="div" style=" width: 100%;">
          <thead>
              <tr id="tr">
                <th style="width: 10%;"><strong>No. de Solicitud</strong></th>
                <th  style="width: 10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th>
                
            </tr>
            </thead>
        </table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
        <table class="table">
            <tbody>
  
    <?php
    $sql = "SELECT * FROM tb_circulante ORDER BY codCirculante DESC";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
    #ssas{
        display: block;
    }
   #div{
    display: block;
   }
</style>

        <tr>
            
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
    <?php } ?><?php if ($tipo_usuario==2) {?>
            <?php include ('../../Buscador_ajax/Cabezeras/cabezeraCirculante.php') ?>
 <div id="x" class="btn-group mb-3   mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="../../Plugin/Imprimir/Circulante/soli_circulante.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante ";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas"  method="POST"   style="background: transparent;" action="../../Plugin/PDF/Circulante/pdf_soli_circulante.php" target="_blank">
                <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
    <form id="ssas" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Circulante/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="circulante1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
 <?php if (isset($_POST['Consultar1'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>

 <div class="btn-group mb-3   mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="../../Plugin/Imprimir/Circulante/soli_circulante.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante ";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas"  method="POST"   style="background: transparent;" action="../../Plugin/PDF/Circulante/pdf_soli_circulante.php" target="_blank">
                <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
<form id="ssas" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Circulante/Excel.php" target="_blank">
<?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
                <button type="submit" class="btn btn-outline-primary" name="Consultar1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
<?php } ?>
    <?php include ('../../Buscador_ajax/Tablas/Circulante/tablaCirculante.php') ?>
<div id="x">
<table class="table  table-striped" id="div" style=" width: 100%;">
          <thead>
              <tr id="tr">
                <th style="width: 10%;"><strong>No. de Solicitud</strong></th>
                <th  style="width: 10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th>
                
            </tr>
            </thead>
        </table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
        <table class="table">
            <tbody>
           
  
    <?php

    $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' ORDER BY codCirculante DESC  ";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
    #ssas{
        display: block;
    }
    
   #div{
    display: block;
   }
</style>

        <tr>
            
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
       </div>
    <?php } ?>
</section>
   
</body>
</html>