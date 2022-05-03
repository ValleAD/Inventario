<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
    <title>Imprimir almacen</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){

    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
     $vale = $_POST['num_sol'];
      
?>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA  DE ZACATECOLUCA</h3>
<h4 align="center" style="margin-top: 2%;">ALMACÉN DE MEDICAMENTOS, INSUMOS MÉDICOS,</h4>
<h4 align="center" style="margin-top: 2%;">PAPELERÍA Y OTROS ARTICULOS</h4>
 
 <table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;" >
            <th style="width: 25%;font-size: 14px;text-align: center;">Código</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">U/M</th>
            <th style="width: 70%;color:black;font-size: 14px;text-align: left;">Descripción</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cant.<br>Sol.</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cant.<br>Desp.</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">C/U</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;border-right:1px solid #ccc ;">Total</th>
        </tr>
    </thead> 

    <tbody>
<?php
for($i = 0; $i < count($_POST['cod']); $i++)
{
   
    $codigo = $_POST['cod'][$i];
    $des = $_POST['desc'][$i];
    $um = $_POST['um'][$i];
    $cant = $_POST['cant'][$i];
    $cantidad = $_POST['cantidad_despachada'][$i];
    $precio = $_POST['cost'][$i];
    $total = $_POST['tot'][$i];
    $tot_f = $_POST['tot_f'];
?>
  
        <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td style="text-align:center; font-size: 12px; "><?php  echo $codigo?></td>
            <td style="text-align:center; font-size: 12px; "><?php  echo $um?></td>
            <td style="text-align:left; font-size: 12px; "><?php  echo $des?></td>
            <td style="text-align:center; font-size: 12px; "><?php echo $cant ?></td>
            <td style="text-align:center; font-size: 12px; "><?php echo $cantidad ?></td>
            <td style="text-align: center; font-size: 12px; "><?php echo $precio ?></td>
            <td style="text-align: center; font-size: 12px; "><?php  echo $total ?></td>
        </tr>
     
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td style="text-align: center; font-size: 12px; font-weight: bold;">Subtotal</td>
        <td colspan="5"></td>
        <td style="text-align: center; font-size: 12px; border: 1px solid #ccc; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
    <table style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;">
        <tbody>
            <tr style="border: 1px solid #ddd;color: black;" >
                <td style="height: 35px;"><b>DEPARTAMENTO QUE SOLICITA:</b> MANTENIMIENTO</td>
            </tr>
            <tr style="border: 1px solid #ddd;color: black;" >
                <td style="height: 35px;"><b>FECHA: </b><?php echo $fech?> <div align="center" style="margin-top: -2.5%;">FIRMA</div> <div style="float: right; margin-top: -3%;">SELLO</div></td>
            </tr>
            <tr style="border: 1px solid #ddd;color: black;" >
                <td style="height: 35px;"><b>AUTORIZA:</b> DIRECTOR HOSPITAL NACIONAL "SANTA TERESA"</td>
            </tr>
        </tbody>
    </table>   
</body>
</html>
<script type="text/javascript">
print('');
</script>