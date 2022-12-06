<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imiprimir Circulante</title>   
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
 </head>
 <body>

<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
        <style>
        .table td  { font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
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
<?php if(isset($_POST['desc'])){
    $depto = $_POST['num_sol'];
    $fech = $_POST['fech'];

?>
<h3 align="center" >HOSPITAL NACIONAL "SANTA TERESA" DE ZACATECOLUCA</h3>
<h3 align="center" >FONDO CIRCULANTE DE MONTO FIJO</h3>


<p>Encargado del Fondo Circulante de Monto Fijo Recursos Propios</p>
<p>Hospital Nacional "Santa Teresa" de Zacatecoluca</p>
<br>
<p>Atentamente solicito a usted la compra <b>Urgente</b> de los materiales y/o servicios que se detallan a continuación, a través del Fondo Circulante de Monto Fijo.</p>


     <table style="width: 100%;">
    <tr>
        <td><b>N° de Solicitud:</b> <?php echo $depto ?></td>
        <td align="right"><b>Fecha:</b> <?php echo $fech ?></td>
    </tr>
</table>         
<table class="table" style="width: 100%;margin: 0;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;">Codigo</th>
            <th style="width: 70%;font-size: 14px;">Descripción de los materiales y/o servicios solicitados</th>
            <th style="width: 15%;font-size: 14px;">U/M</th>
            <th style="width: 15%;font-size: 14px;">Cant.<br>Sol.</th>
            <th style="width: 15%;font-size: 14px;">Cant.<br>Desp.</th>
            <th style="width: 15%;font-size: 14px;">C/U</th>
            <th style="width: 15%;font-size: 14px;border-right:1px solid #ccc ;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php
    $total = 0;
    $final = 0;
for($i = 0; $i < count($_POST['desc']); $i++)
{
   
    $cod = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cantidad = $_POST['cant'][$i];
    $cantidad_despachada = $_POST['cantidad_despachada'][$i];
    $cost = $_POST['cost'][$i];
    $tot = $_POST['tot'][$i];

    $tot_f = $_POST['tot_f'];
?>
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código" style="font-size:12px"><?php  echo $cod?></td>
            <td data-label="Descripción" style="font-size:12px"><?php  echo $des?></td>
            <td data-label="Unidad De Medida" style="font-size: 12px;"><?php  echo $um?></td>
            <td data-label="Cantidad" style="font-size: 12px;"><?php echo $cantidad ?></td>
            <td data-label="Cantidad Despachada" style="font-size:12px"><?php echo $cantidad_despachada ?></td>
            <td data-label="Precio" style="font-size: 12px;"><?php echo $cost ?></td>
            <td data-label="total" style=" font-size: 12px;"><?php  echo $tot ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
    </tbody>   
</table>            
    
<br>
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

</body>
</html>
<script type="text/javascript">
window.print();
</script>