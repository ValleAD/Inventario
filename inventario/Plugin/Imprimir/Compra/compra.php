<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Compra</title>
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <style>
     @media (max-width: 952px){
   h3, h4{
    font-size: 1em;
    text-align: center; 
   }
   section{
    margin: 2%;
   }
    }
  </style>
    <?php if(isset($_POST['cod'])){

    $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];
    $estado=$_POST['estado'];

   if ($_POST['jus']=="") {
    $jus = "Sin Justificación por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
      
?>
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">UNIDAD DE ADQUISICIONES Y CONTRATACIONES INSTITUCIONAL</h4>
<h4 align="center" style="margin-top: 2%;">SOLICITUD DE COMPRA</h4>
 

<br>
<table style="width: 100%;" >
    <tr>
        <td style="width: 30%;"><b>Solicitud No.:</b> <?php echo $solicitud ?></td>
        <td ><b>Depenencia Solicitante:</b> <?php echo $dependencia ?></td>
        <td align="right"><b>Plazo y No. de Entregas:</b> <?php echo $plazo ?></td>
    </tr>
    <tr>
        <td style="width: 30%;"><b>Unidad Técnica:</b> <?php echo $unidad ?></td>
        <td ><b>Suministro Solicitado:</b> <?php echo $suministro ?></td>
        <td align="right"><b>Encargado:</b> <?php echo $usuario ?></td>
    </tr>
    <tr>
    <td style="width: 30%;"><b>Estado:</b> <?php echo $estado ?></td>
    <td ><b>Fecha De Creación: </b> <?php echo $fecha ?></td>
    <td align="right"><b>Fecha De Impreción:</b> <?php echo date("d-m-Y")?></td>
    </tr>
</table>
<br>
<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;">
            <th>Código</th>
            <th>Descripción Completa</th>
            <th>U/M</th>
            <th>Cantidad Solicitada</th>
            <th>C/U</th>
            <th style="width: 15%;color:black;font-size: 14px;border-right:1px solid #ccc ;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php
    $total = 0;
    $final = 0;
for($i = 0; $i < count($_POST['cod']); $i++)
{
   
        $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
     $cantidad = $_POST['cant'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];
     $tot_f = $_POST['tot_f'];
?>
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código" style="font-size: 12px;"><?php  echo $codigo?></td>
            <td data-label="Descripción" style="font-size: 12px;"><?php  echo $des?></td>
            <td data-label="Unidad De Medida" style="font-size: 12px;"><?php  echo $um?></td>
            <td data-label="Cantidad" style="font-size: 12px;"><?php echo $cantidad ?></td>
            <td data-label="Precio" style="font-size: 12px;"><?php echo $cost ?></td>
            <td data-label="total" style="font-size: 12px;"><?php  echo $tot ?></td>
        </tr>
     
    </tbody>  
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="5"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
<br>
    <table style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
        <tbody>
            <div style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
           <p style="padding-left: 1%;"> Observaciones (En qué se ocupará el bien entregado)</p>
           <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
            <p style="padding-left: 1%;"><?php echo $jus ?></p>
        </div>
        </tbody>
    </table>


</body>
</html>
<script type="text/javascript">
print('');
</script>