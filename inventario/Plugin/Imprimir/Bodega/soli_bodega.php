<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Bodega</title>
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">

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
<table class="table" style="width: 100%;">
    <thead>     
        <tr>
            <th  style="width: 20%;font-size: 14px;">Codigo</th>
            <th  style="width: 20%;font-size: 14px;">Departamento Solicitante </th>
            <th  style="width: 20%;font-size: 14px;">Encargado </th>
            <th  style="width: 20%;font-size: 14px;">Fecha</th>
        </tr>
    </thead> 

    <tbody>

<?php  include '../../../Model/conexion.php';
   $sql = "SELECT * FROM tb_bodega order by codBodega DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){
$des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
?>  <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
  
         <tr>
            <td data-label="Código" style="font-size: 12px;"><?php  echo $solicitudes['codBodega']?></td>
            <td data-label="Departamento" style="font-size: 12px;"><?php  echo $des?></td>
             <td data-label="Encargado" style="font-size: 12px;text-align: center;"><?php  echo $solicitudes['usuario']?>
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
window.print();
</script>
</body>
</html>