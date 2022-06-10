<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
    <title>PDF Compra</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">

<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">REPORTE DE SOLICITUD DE COMPRA</h5>
 
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
</style>
<section>
<?php if (isset($_POST['id'])) {?>
<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px;">No. Solicitud</th>
                <th  style="width:10%;font-size: 14px;">Dependencia</th>
                <th  style="width:10%;font-size: 14px;">Plazo y No. de Entregas</th>
                <th  style="width:10%;font-size: 14px;">Unidad Técnica</th>
                <th  style="width:20%;font-size: 14px;" align="center">Descripción Solicitud</th>
                <th  style="width:20%;font-size: 14px;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="font-size: 12px;" data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="font-size: 12px;" data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
            <td style="font-size: 12px;" data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['id1'])) {?>
<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px;">No. Solicitud</th>
                <th  style="width:10%;font-size: 14px;">Dependencia</th>
                <th  style="width:10%;font-size: 14px;">Plazo y No. de Entregas</th>
                <th  style="width:10%;font-size: 14px;">Unidad Técnica</th>
                <th  style="width:20%;font-size: 14px;" align="center">Descripción Solicitud</th>
                <th  style="width:20%;font-size: 14px;">Fecha de Registro</th>
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
    $idusuario=$_POST['idusuario'];
   $sql = "SELECT * FROM tb_compra WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td style="font-size: 12px;" data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td style="font-size: 12px;" data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="font-size: 12px;" data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
            <td style="font-size: 12px;" data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<br>

    <br>
    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</section>

</body>
</html>
<script type="text/javascript">
print('');
</script>
