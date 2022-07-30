<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Solicitudes Circulante</title>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h3 align="center" style="margin-top: 2%;">FONDO CIRCULANTE DE MONTO FIJO</h3>
<style>
     @media (max-width: 952px){
   h3, h4, h5{
    font-size: 1em;
    text-align: center;
   }
   section{
    margin: 2%;
   }
    }
  </style>

<section style="font-size: 14px;">
<p>Encargado del Fondo Circulante de Monto Fijo Recursos Propios</p>
<p>Hospital Nacional "Santa Teresa" de Zacatecoluca</p>
<br>
<p>Atentamente solicito a usted la compra <b>Urgente</b> de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.</p>
</section>
 <?php if (isset($_POST['Consultar'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];
        $tipo=$_POST['tipo'];
     if ($tipo=="desc"){
       $tipo1='Descendente'; 
    }
    if ($tipo=="asc") {
        $tipo1='Ascendente';
     } ?>
    <p style="float: right;">Ordenado: <?php echo $tipo1 ?></p><br><br>
    <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;color:black;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
                
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
    $sql = "SELECT * FROM tb_circulante  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
           <td style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['codCirculante']?></td>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
       <?php }  ?> 
    </tbody>  
</table>
<?php } ?>
 <?php if (isset($_POST['Consultar1'])) {
    $columna=$_POST['columna'];
    $tipo=$_POST['tipo'];
        $tipo=$_POST['tipo'];
     if ($tipo=="desc"){
       $tipo1='Descendente'; 
    }
    if ($tipo=="asc") {
        $tipo1='Ascendente';
     } ?>
    <p style="float: right;">Ordenado: <?php echo $tipo1 ?></p><br><br>
    <table class="table" class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;color:black;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
            
        </tr>
        
        <td id="td" colspan="3" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
$idusuario=$_POST['idusuario'];
    $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'  Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align: center;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
            <td style="text-align: center;" data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            
       <?php }  ?> 
    </tbody>  
</table>
<?php } ?>
<?php if (isset($_POST['id'])) { ?>
<table class="table" style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;color:black;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
        </tr>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM tb_circulante Order by codCirculante DESC";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['codCirculante']?></td>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
     
     <?php }  ?> 
    </tbody>  
   
</table>
     <?php }?>

     <?php if (isset($_POST['id1'])) { ?>
<table class="table" style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 10%;color:black;font-size: 14px;text-align: center;">No. de Solicitud </th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Fecha de Solicitud</th>
        </tr>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
$idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' Order by codCirculante DESC";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['codCirculante']?></td>
            <td style="text-align:center; font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            </tr>
     
     <?php }  ?> 
    </tbody>  
</table>
     <?php }?>
<p>Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.</p>  
<p>Sin más particular</p>

<div align="right">
<p style="float: right;"> Dá fe de no haber existencia: <br><br>F. ________________ <br>Sra. Isabel Romero <br>Guardalmacén</p>
</div>

<div align="">
    <p style="text-align:left;">Solicita: <br><br>F. ________________ <br>Ing. Ernesto González Choto <br>Jefe de Mantenimiento</p>
</div>

<div align="">
    <p style="text-align: center;">Autoriza: <br><br>F. ________________ <br>Dr. William Antonio Fernández Rodríguez <br>Director del Hospital Nacional “ Santa Teresa”</p>
</div>


<script type="text/javascript">
print('');
</script>
</body>
</html>