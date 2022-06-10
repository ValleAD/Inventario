<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Bodega</title>
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE BODEGA</h5>
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
<section>
<?php if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;">Código</th>
            <th style="width: 50%;color:black;font-size: 14px;text-align: left;">Departamento Solicitante</th>
            <th style="width: 15%;color:black;font-size: 14px;">Fecha</th>
        </tr>
        <td id="td" colspan="8"><h4>No se encontraron resultados</h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM tb_bodega ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código" style="font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td data-label="Departamento" style="font-size: 12px;"><?php  echo $solicitudes['departamento']?></td>
            <td data-label="Fecha" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
     
    </tbody>  
     <?php }  ?>
   
</table>
          <?php } if (isset($_POST['id1'])) { ?>
          <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;">Código</th>
            <th style="width: 50%;color:black;font-size: 14px;text-align: left;">Departamento Solicitante</th>
            <th style="width: 15%;color:black;font-size: 14px;">Fecha</th>
        </tr>
        <td id="td" colspan="8"><h4>No se encontraron resultados</h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
$id=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_bodega WHERE idusuario='$id' ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código" style="font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td data-label="Departamento" style="font-size: 12px;"><?php  echo $solicitudes['departamento']?></td>
            <td data-label="Fecha" style="font-size: 12px;"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
     
    </tbody>  
     <?php }  ?> 
   
</table>
<?php } ?> 
    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</section>
<script type="text/javascript">
print('');
</script>
</body>
</html>