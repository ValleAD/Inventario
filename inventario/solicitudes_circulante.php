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
            <h1 class="text-center mg-t" style="margin-top: -0.5%;">Solicitudes de Fondo Circulante</h1><br>

<section class="mx-3 p-2" style="background-color:white;border-radius: 5px; position: initial;margin-bottom: 3%;">
     <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
       <div id="div">
<form method="POST" action="" style="float: right;margin-left: -1%;">
    <input type="hidden" name="columna" value="codCirculante">
    <input type="hidden" name="tipo" value="desc">
    
       <button id="desc" type="submit" name="Consultar" class="form-control">Descendente</button>
    
<?php if (isset($_POST['Consultar'])) {

        if ($_POST['tipo']=="desc") {?>
             <style>
           #desc{
            display: none;
           }
           #desc1{
            display: block;
           }
       </style>
<button id="desc1" name="Consultar" class="form-control" type="button" style="background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;">Descendente</button>
    <?php } }?>
</form>


<form method="POST" action="" style="float: right;margin-left: 0%;">
    <input type="hidden" name="columna" value="codCirculante">
    <input type="hidden" name="tipo" value="asc">
    
       <button id="asc" type="submit" name="Consultar" class="form-control">Ascendente</button>
    
<?php if (isset($_POST['Consultar'])) {

        if ($_POST['tipo']=="asc") {?>
             <style>
           #asc{
            display: none;
           }
           #asc1{
            display: block;
           }
       </style>
<button id="asc1" name="Consultar" class="form-control" type="button" style="background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;">Ascendente</button>
    <?php } }?>
</form>
<p style="float: right;margin-left: 0.5%;margin-top: 1.5%;">Ordenar por</p>
      
</div>
<?php if ($tipo_usuario==1) {?>
 <div class="btn-group mb-3 my-2  mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="Plugin/soli_circulante.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante ";
    $result = mysqli_query($conn, $sql);
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
<?php 
         if (isset($_POST['Consultar'])) { 
        $columna=$_POST['columna'];
        $tipo=$_POST['tipo'];?>
        <style>
            #x{
                display: none;
            }
        </style>
           <div id="y">    
        <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 10%;"><strong>No. de Solicitud</strong></th>
                <th  style="width: 10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th>
                
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_circulante  Order by $columna $tipo";
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
            </form></td>
        </tr>
    <?php } ?>
          
    </tbody>
</table>
</div>
</div>
<?php }?>
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
    $sql = "SELECT * FROM tb_circulante ORDER BY fecha_solicitud";
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
    <?php } ?>
            </td>
        </tr>
           </tbody>
        </table>
</div>
    <?php } ?><?php if ($tipo_usuario==2) {?>
 <div class="btn-group mb-3 my-2  mx-2" style="position: initial;"  role="group" aria-label="Basic outlined example"> 
        <form id="ssas" method="POST" style="background: transparent;" action="Plugin/soli_circulante.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante ";
    $result = mysqli_query($conn, $sql);
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

    $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' ORDER BY fecha_solicitud  ";
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
       
    <?php } ?>
</section>
   
</body>
</html>