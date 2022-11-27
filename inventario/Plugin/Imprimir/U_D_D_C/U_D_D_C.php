<?php 

include ('../../../Model/conexion.php');
?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>
<style>
    .table td  {text-align:center; font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
</style>
<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center">HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>
<h4 align="center">DEPARTAMENTO DE MANTENIMIENTO</h4>
 
<?php if (isset($_POST['unidad'])) {?>
    
    <h5 align="center">UNIDAD DE MEDIDA</h5><br>
   <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
                <th  style="width:70%;font-size: 12px;height: 3%;">UNIDAD DE MEDIDA</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_unidad_medida";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Unidad_Medida";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {

                    $c='Categoria Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    $c='Categoria no Disponible';
                }
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['unidad_medida']; ?></td>
           <td data-label="Habilitado" style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
<?php if (isset($_POST['departamento'])) {?>
    
    <h5 align="center">DEPARTAMENTOS</h5><br>
   <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
                <th  style="width:70%;font-size: 12px;height: 3%;">DEPARTAMENTOS</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Departamentos";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {

                    $c='Departamento Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    $c='Departamento no Disponible';
                }
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
           <td data-label="Habilitado" style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['categorias'])) {?>
    
    <h5 align="center">CATEGORIAS</h5><br>
   <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
                <th  style="width:70%;font-size: 12px;height: 3%;">CATEGORIAS</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_categoria";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Categorias";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {

                    $c='Categoria Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    $c='Categoria no Disponible';
                }
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['categoria']; ?></td>
           <td data-label="Habilitado" style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } if (isset($_POST['dependencia'])) {?>   
    <h5 align="center">DEPENDENCIAS</h5><br>
   <table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
        <thead style="background-color: #46466b;color: white;">   
        <tr style="border: 1px solid #ddd;" >
          <th style="width:10%;font-size: 12px;height: 3%; text-align: center;">#</th>
            <th  style="width:70%;font-size: 12px;height: 3%;">DEPENDENCIAS</th>
        <th style="font-size: 12px;">HABILITADO</th>       
        </tr>
        
        <td id="td" colspan="6" ><h4 align="center">No se encontraron resultados </h4></td>
    </thead> 

    <tbody>
<?php 
   $sql = "SELECT * FROM selects_dependencia";
    $result = mysqli_query($conn, $sql);
    $n=0;
    $w="Dependencias";
    while ($solicitudes = mysqli_fetch_array($result)){
$n++;
        $r=$n+0;
                        if($solicitudes['Habilitado']=='Si') {

                    $c='Dependencia Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    $c='Dependencia no Disponible';
                }
?>
  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
   <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="No. Solicitud" class="delete"><?php  echo $r; ?></td>
            <td style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
           <td data-label="Habilitado" style=" font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;"><?=   $c ?></td> 
            </tr>
       <?php }  ?> 
    </tbody>  
   
   
</table>
<?php } ?>
</body>
 </html>
<script type="text/javascript">
window.print();
</script>