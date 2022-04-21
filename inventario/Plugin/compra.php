<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
    <title>Imprimir Compra</title>
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){

    $solicitud = $_POST['sol_compra'];
    $dependencia = $_POST['dependencia'];
    $plazo = $_POST['plazo'];
    $unidad = $_POST['unidad'];
    $suministro = $_POST['suministro'];
    $usuario = $_POST['usuario'];
    $fecha = $_POST['fech'];
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
 
<section style="font-size: 14px;">
    <div style="float: right">
        <label>FECHA DE IMPRESIÓN:</label><?php echo date("d-m-Y")?><br>
        <label>FECHA DE CREACIÓN: <?php echo $fecha ?></label>
    </div>
              
    <p style="margin-top: -1.5%;"><b>Solicitud No.:</b> <?php echo $solicitud ?></p>
    <p style="margin-top: -1.5%;"><b>DEPENDECIA SOLICITANTE:</b> <?php echo $dependencia ?></p> 
    <p style="margin-top: -1.5%;"><b>PLAZO Y NÚMERO DE ENTREGAS:</b> <?php echo $plazo ?></p>
    <p style="margin-top: -1.5%;"><b>UNIDAD TÉCNICA:</b> <?php echo $unidad ?></p>
    <p style="margin-top: -1.5%;"><b>SUMINISTROS SOLICITADOS:</b> <?php echo $suministro ?></p>
    <p style="margin-top: -1.5%;"><b>ENCARGADO:</b> <?php echo $usuario ?></p>
</section>
<table style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;">
            <th style="width: 25%;font-size: 16px;text-align: center;">Código</th>
            <th style="width: 70%;color:black;font-size: 16px;text-align: left;">Descripción Completa</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;">U/M</th>
            <th style="width: 15%;color:black;font-size: 14px;text-align: center;">Cantidad Solicitada</th>
            <th style="width: 30%;color:black;font-size: 14px;text-align: center;">Cantidad Despachada</th>
            <th style="width: 30%;color:black;font-size: 16px;text-align: center;">C/U</th>
            <th style="width: 15%;color:black;font-size: 16px;text-align: center;border-right:1px solid #ccc ;">Total</th>
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
  
        <tr>
            <td style="text-align:center;border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $codigo?></td>
            <td style="border: 1px solid #ccc;border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $des?></td>
            <td style="text-align:center;border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $um?></td>
            <td style="text-align:center;border-collapse: collapse; border-right: none; border-left: none;"><?php echo $stock ?></td>
            <td style="text-align:center;border-collapse: collapse; border-right: none; border-left: none;"><?php echo $cantidad ?></td>
            <td style="text-align: center;border-collapse: collapse; border-right: none; border-left: none;;"><?php echo $cost ?></td>
            <td style="text-align: center;border-collapse: collapse; border-right: none; border-left: none;"><?php  echo $tot ?></td>
        </tr>
     
    </tbody>  
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td style="text-align: center; font-weight: bold;">Subtotal</td>
        <td colspan="5"></td>
        <td style="text-align: center; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
<br>
    <table style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
        <tbody>
           <p style="padding-left: 1%;"> Observaciones (En qué se ocupará el bien entregado)</p>
           <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
            <p style="padding-left: 1%;"><?php echo $jus ?></p>
        </tbody>
    </table>


</body>
</html>
<script type="text/javascript">
print('');
</script>