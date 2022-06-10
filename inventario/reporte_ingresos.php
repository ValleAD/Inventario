<?php
    include 'Model/conexion.php';
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
   <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    form{
        margin: 0%;
    }
    @media (max-width: 800px){
        #ssa{
            margin-left: 7%;
            margin-bottom: 5%;
        }
        #x{
            margin: 3%5%;
        }
    }
    </style>
<title>Ingresos</title>
</head>
<body style="max-width: 100%;">
               <font color="white"><h1 style="margin:5px; text-align: center;">Ingreso de Productos</h1></font>
    <section style="background: rgba(255, 255, 255, 0.9); margin: 2%;border-radius: 15px; padding: 1%";>
    <div style="position: initial;" class="row" style="position: relative; max-width: 100%;">
        <p id="x" class="mx-3" style="color: #000; font-weight: bold;">Mostrar Ingresos por:</p>
            <form method="POST" style="background:transparent;">
                <div class="row" style="width:100%">
                
                    <?php if(isset($_POST['ingresos'])){

                        $mostrar = $_POST['ingresos'];
                        if($mostrar == "circulante" ){
                         ?> <div class=" col-md-3" style="position: initial;">
                <a id="ssa" href="reporte_ingresos.php" class="btn btn-primary">Inicio</a></<div>
            <?php }
            if ( $mostrar == "almacen") {
                echo'<div class=" col-md-3" style="position: initial;">
                <a id="ssa" href="reporte_ingresos.php" class="btn btn-primary">Inicio</a></<div>';
            }if ($mostrar == "compra") {
                echo'<div class=" col-md-3" style="position: initial;">
                <a id="ssa" href="reporte_ingresos.php" class="btn btn-primary">Inicio</a></<div>';
            }} ?>
            </div>

            <div class="col-md-7" style="position: initial; width:50%px;">
            <select id="ssa" class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option>Seleccionar</option>
                            <option  value="circulante">Solicitud a Fondo Circulante</option>
                            <option value="almacen">Solicitud a Almacén</option>
                            <option value="compra">Solicitud de Compra</option>
                        </select>
            </div>          
                </div>  
            </div>
            </form>
    </div> 
    
<?php
if ($tipo_usuario==1) {

if(isset($_POST['ingresos'])){

    $mostrar = $_POST['ingresos'];
    
    if($mostrar == "circulante"){
?>

<br>
    <h3 style="text-align: center; color: black;">Ingresos de Solicitud Circulante</h3>

<table class="table table-responsive table-striped" id="example"  style=" width: 100%">
    <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_ingreso.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="circulante">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                 </button>
            </form>
            <form method="POST" action="Plugin/pdf_ingresos.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="circulante">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
            </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width: 10%">#</th>
                <th  style="width: 10%">Codigo</th>
                <th  style="width: 100%">Descripción Completa</th>
                <th  style="width: 100%">U/M</th>
                <th  style="width: 100%">Cantidad</th>
                <th  style="width: 100%">Costo Unitario</th>
                <th  style="width: 100%">Ingreso Por</th>
                <th  style="width: 100%">Fecha Registro</th>
              </tr>
          </thead>

            <tbody>
 <?php

            $idusuario = $_SESSION['iduser'];
  
   $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante";
    $result = mysqli_query($conn, $sql);
        $n=0;
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");$n++;
        $r=$n+0;?>

<style type="text/css">
#td{
    display: none;
}

</style>
    <tr id="tr">
        <td data-label="#"><?php echo $r ?></td>
    <!-- <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
      <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td> -->
      <td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td data-label="Fuente de Ingreso"><?php  echo $productos['campo']; ?></td>
      <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      

    
    </tr>

<?php } ?> 

            </tbody>
        </table>


<?php 
    }
    else if($mostrar == "almacen"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;

  }
    input{
    width: 100%;
  }
</style><br>
<h3 style="text-align: center; color: black;">Ingresos de Almacén</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
        <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_ingreso.php">
                <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="almacen">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </button>
            </form>
            <form method="POST" action="Plugin/pdf_ingresos.php">
                <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="almacen">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </button>
            </form>

</div>
     <thead>
       <tr>
        <th style="width: 10%">#</th>
         <th style="width: 15%">Departamento</th>
         <th style="width: 15%">Encargado</th>
         <th style="width: 15%">Codigo</th>
         <th style="width: 50%">Descripción Completa</th>
         <th style="width: 15%">U/M</th>
         <th style="width: 15%">Cantidad</th>
         <th style="width: 15%">Costo Unitario</th>
         <th style="width: 15%">Ingreso Por</th>
         <th style="width: 15%">Fecha Registro</th>
         
       </tr>
       
     </thead>

     <tbody>
<?php

         $idusuario = $_SESSION['iduser'];

$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0;
         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }?>

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
<tr id="tr">
    <td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado" class="delete"><?php  echo $productos['encargado'],"<br> ","(",$u,")"; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción"><?php  echo $productos['nombre']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $productos['cantidad_solicitada']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td data-label="Fuente de Ingreso">Solicitud a Almacén</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php
    }
    else if($mostrar == "compra"){

?>
<style>
  #act {
    margin-right: 3%;
    margin-left: 3%;
    padding: 0.5%;
    border-radius: 5px;
  }
    input{
    width: 100%;
  }
</style><br>
<h3 style="text-align: center; color: black;">Ingresos de Compra</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
        <div  style="position: initial;"class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_ingreso.php">
                <button  style="position: initial;"type="submit" class="btn btn-outline-primary" name="compra">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </button>
            </form>
            <form method="POST" action="Plugin/pdf_ingresos.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="compra">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </button>
            </form>

</div>
     <thead>
       <tr>
        <th style="width: 10%">#</th>
         <th  style="width:15%">Departamento</th>
         <th  style="width:15%">Encargado</th>
         <th  style="width:10%">Codigo</th>
         <th  style="width:100%">Descripción Completa</th>
         <th  style="width:100%">U/M</th>
         <th  style="width:100%">Cantidad</th>
         <th  style="width:100%">Costo Unitario</th>
         <th  style="width:100%">Ingreso Por</th>
         <th  style="width:100%">Fecha Registro</th>
            </tr>
     </thead>

     <tbody>
<?php


$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");
    $n++;
        $r=$n+0;
         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        ?>
<style>
    #td{
        display: none;
    }
</style>
<tr>
    <td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento">Mantenimiento</td>
<td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
<td data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
<td data-label="Fuente de Ingreso">Solicitud de Compra</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>


<?php
    }
}
}
?><?php
if ($tipo_usuario==2) {

if(isset($_POST['ingresos'])){

    $mostrar = $_POST['ingresos'];
    
    if($mostrar == "circulante"){
?>

<br>
    <h3 style="text-align: center; color: black;">Ingresos de Solicitud Circulante</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
    <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_ingreso.php">
                <button type="submit" class="btn btn-outline-primary" name="circulante">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                    </form>
            <form method="POST" action="Plugin/pdf_ingresos.php">
                <button type="submit" class="btn btn-outline-primary" name="circulante">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width: 10%">#</th>
                <th  style="width: 10%">Codigo</th>
                <th  style="width: 100%">Descripción Completa</th>
                <th  style="width: 100%">U/M</th>
                <th  style="width: 100%">Cantidad</th>
                <th  style="width: 100%">Costo Unitario</th>
                <th  style="width: 100%">Ingreso Por</th>
                <th  style="width: 100%">Fecha Registro</th>
              </tr>

              
            </thead>

            <tbody>
 <?php
            $idusuario = $_SESSION['iduser'];
   $sql = "SELECT * FROM tb_circulante db JOIN detalle_circulante b ON db.codCirculante = b.tb_circulante WHERE db.idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
        $n=0;
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");$n++;
        $r=$n+0;?>

<style type="text/css">

#td{
    display: none;
}
</style>
    <tr id="tr">
        <td data-label="#"><?php echo $r ?></td>
    <!-- <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
      <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td> -->
      <td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td data-label="Fuente de Ingreso"><?php  echo $productos['campo']; ?></td>
      <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      

    
    </tr>

<?php } ?> 

            </tbody>
        </table>


<?php 
    }
    else if($mostrar == "almacen"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;

  }
    input{
    width: 100%;
  }
</style><br>
<h3 style="text-align: center; color: black;">Ingresos de Almacén</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
        <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_ingreso.php">
                <button type="submit" class="btn btn-outline-primary" name="almacen">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                    </form>
            <form method="POST" action="Plugin/pdf_ingresos.php">
                <button type="submit" class="btn btn-outline-primary" name="almacen">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </button>
            </form>

</div>
     <thead>
       <tr>
        <th style="width: 10%">#</th>
         <th style="width: 15%">Departamento</th>
         <th style="width: 15%">Encargado</th>
         <th style="width: 15%">Codigo</th>
         <th style="width: 50%">Descripción Completa</th>
         <th style="width: 15%">U/M</th>
         <th style="width: 15%">Cantidad</th>
         <th style="width: 15%">Costo Unitario</th>
         <th style="width: 15%">Ingreso Por</th>
         <th style="width: 15%">Fecha Registro</th>
         </tr>
       
     </thead>

     <tbody>
<?php

         $idusuario = $_SESSION['iduser'];

$sql = "SELECT * FROM tb_almacen db JOIN detalle_almacen b ON db.codAlmacen = b.tb_almacen WHERE db.idusuario='$idusuario'";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
     $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0?>

<style type="text/css">

#td{
 display: none;
}
th{
width: 100%;
}
</style>
<tr id="tr">
    <td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
<td data-label="Encargado"><?php  echo $productos['encargado']; ?></td>
<td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción"><?php  echo $productos['nombre']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $productos['cantidad_solicitada']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
<td data-label="Fuente de Ingreso">Solicitud a Almacén</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>



</tr>

<?php } ?> 

     </tbody>
 </table>

<?php
    }
    else if($mostrar == "compra"){

?>
<style>
  #act {
    margin-right: 3%;
    margin-left: 3%;
    padding: 0.5%;
    border-radius: 5px;
  }
    input{
    width: 100%;
  }
</style><br>
<h3 style="text-align: center; color: black;">Ingresos de Compra</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
        <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_ingreso.php">
                <button type="submit" class="btn btn-outline-primary" name="compra">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                    </form>
            <form method="POST" action="Plugin/pdf_ingresos.php">
                <button type="submit" class="btn btn-outline-primary" name="compra">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </button>
            </form>

</div>
     <thead>
       <tr>
        <th style="width: 10%">#</th>
         <th  style="width:15%">Departamento</th>
         <th  style="width:15%">Encargado</th>
         <th  style="width:10%">Codigo</th>
         <th  style="width:100%">Descripción Completa</th>
         <th  style="width:100%">U/M</th>
         <th  style="width:100%">Cantidad</th>
         <th  style="width:100%">Costo Unitario</th>
         <th  style="width:100%">Ingreso Por</th>
         <th  style="width:100%">Fecha Registro</th>
         </tr>
     </thead>

     <tbody>
<?php

         $idusuario = $_SESSION['iduser'];

$sql = "SELECT * FROM tb_compra db JOIN detalle_compra b ON db.nSolicitud = b.solicitud_compra WHERE db.idusuario='$idusuario'";
$result = mysqli_query($conn, $sql);
$n=0;
while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio3=number_format($precio, 2,".",",");
    $n++;
        $r=$n+0;?>
<style>
    #td{
        display: none;
    }
</style>
<tr>
    <td data-label="#"><?php echo $r ?></td>
<td data-label="Departamento">Mantenimiento</td>
<td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
<td data-label="Código de Producto"><?php  echo $productos['codigo']; ?></td>
<td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
<td data-label="Unidad De Medida" ><?php  echo $productos['unidad_medida']; ?></td>
<td data-label="Cantidad" ><?php  echo $productos['stock']; ?></td>
<td data-label="Costo Unitario">$<?php  echo $precio3 ?></td>
<td data-label="Fuente de Ingreso">Solicitud de Compra</td>
<td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
</tr>

<?php } ?> 

     </tbody>
 </table>


<?php
    }
}
}
?>
 
</body>
</html>