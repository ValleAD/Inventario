<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
    <title>Imprimir Bodega</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){

   $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
     $vale = $_POST['bodega'];
     $estado=$_POST['estado'];

      
?>
<style>.table td  {font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
</style>
<h3>HOSPITAL NACIONAL SANTA TERESA DE ZACATECOLUCA</h3>

<h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center">SOLICITUD DE MATERIALES</h5>
 
<p style="float: right;">O. de T.: <?php echo $vale ?></p>
<p><b>Depto. o Servicio:</b> <?php echo $depto ?></p>  
   <table style="width: 100%;">
       <tr>
           <td style="text-align: left;;width:50%;"><b>Encargado:</b> <?php echo $encargado ?></td>
           <td><b>Fecha:</b> <?php echo $fech ?><br></td>
           <td style="text-align: right;"><b>Estado:</b> <?php echo $estado ?></td>
       </tr>
   </table> 

        <br> 
<table class="table" style="width: 100%;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;">
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 70%;font-size: 14px;text-align: center;">Descripción Completa</th>
            <th style="width: 15%;font-size: 14px;text-align: center;">U/M</th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Cantidad Solicitada</th>
            <th style="width: 30%;font-size: 14px;text-align: center;">Cantidad Despachada</th>
            <th style="width: 30%;font-size: 14px;text-align: center;">C/U</th>
            <th style="width: 15%;font-size: 14px;text-align: center;">Total</th>
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
    $stock = $_POST['cantidad_despachada'][$i];
    $tot = $_POST['tot'][$i];
     $tot_f = $_POST['tot_f'];
?>
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código"style="font-size: 12px;"><?php  echo $codigo?></td>
            <td data-label="Descripción"style="font-size: 12px;"><?php  echo $des?></td>
            <td data-label="Unidad De Medida"style="font-size: 12px;"><?php  echo $um?></td>
            <td data-label="Cantidad"style="font-size: 12px;"><?php echo $stock ?></td>
            <td data-label="Cantidad Despachada"style="font-size: 12px;"><?php echo $cantidad ?></td>
            <td data-label="Precio"style="font-size: 12px;"><?php echo $cost ?></td>
            <td data-label="total"style="font-size: 12px;"><?php  echo $tot ?></td>
        </tr>
     
    </tbody>  
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
<br>

    <p style="float: right;"> Entrega: ________________</p>
    <p style="text-align:left;">Solicita: ________________ <p><?php echo $encargado ?></p> </p>
    <br>
    <p style="text-align: center;">Autoriza: ________________</p>
</section>

</body>
</html>
<script type="text/javascript">
window.print();
</script>