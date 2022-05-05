<?php 

include ('../Model/conexion.php');
?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
 </head>
 <body>

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">

<img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    <h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
    
<h4>DEPARTAMENTO DE MANTENIMIENTO</h4><br><br>
<?php if (isset($_POST['unidad'])) {?>
    <title>Unidad de Medida</title>
    <h5 align="center">UNIDAD DE MEDIDA</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px; text-align: center;">#</th>
                <th  style="width:100%;font-size: 14px;text-align: left;">UNIDAD DE MEDIDA</th>
               
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM selects_unidad_medida";
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
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="font-size: 12px;text-align: left;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['unidad_medida']; ?></td>
            
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<?php if (isset($_POST['departamento'])) {?>
    <title>Departamentos</title>
    <h5 align="center">DEPARTAMENTOS</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px; text-align: center;">#</th>
                <th  style="width:100%;font-size: 14px;text-align: left;">DEPARTAMENTOS</th>
               
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="font-size: 12px;text-align: left;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['categorias'])) {?>
    <title>Categorias</title>
    <h5 align="center">CATEGORIAS</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px; text-align: center;">#</th>
                <th  style="width:100%;font-size: 14px;text-align: left;">CATEGORIAS</th>
               
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM selects_categoria";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="font-size: 12px;text-align: left;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['categoria']; ?></td>
            
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['dependencia'])) {?>
    <title>Dependencias</title>
    <h5 align="center">DEPENDENCIAS</h5><br>
   <table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
          <th style="width:10%;font-size: 14px; text-align: center;">#</th>
                <th  style="width:100%;font-size: 14px;text-align: left;">DEPENDENCIAS</th>
               
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php  include '../Model/conexion.php';
   $sql = "SELECT * FROM selects_dependencia";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="font-size: 12px;text-align: center;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style="font-size: 12px;text-align: left;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
</body>
 </html>
<script type="text/javascript">
print('');
</script>