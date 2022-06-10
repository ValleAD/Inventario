<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imprimir vale</title>
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">  
  
</head>
<body style="font-family: sans-serif;">
    <img src="../img/hospital.png" style="width:20%">
    <img src="../img/log_1.png" style="width:20%; float:right">
    <?php if(isset($_POST['cod'])){
    $depto = $_POST['depto'];
    $fech = $_POST['fech'];
    $encargado = $_POST['usuario'];
    $vale = $_POST['vale'];
    if ($_POST['jus']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $_POST['jus'];
      }
?><section style="margin: 2%;">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<h5 align="center" style="margin-top: 2%;"> SOLICITUD DE MATERIALES</h5>
<p style="float: right;">Vale No.: <?php echo $vale ?></p>
     <style>
     @media (max-width: 952px){
   h3, h4, h5{
    font-size: 1em;
    text-align: center;
   }
   section{
    margin: 2%;
   }
   #hs{
    display: none;
   }
    }
  </style>


              
    <p><b>Depto. o Servicio:</b> <?php echo $depto ?></p>

    <p style="float: right;"><b>Fecha:</b> <?php echo $fech ?></p>
        
    <p><b>Encargado:</b> <?php echo $encargado ?></p>

<table class="table" style="width: 100%; border: 1px solid #ccc;border-collapse: collapse;">
    <thead>     
        <tr style="border: 1px solid #ddd;color: black;">
            <th style="width: 25%;font-size: 14px">Código</th>
            <th style="width: 70%;color:black;font-size: 14px;">Descripción Completa</th>
            <th style="width: 15%;color:black;font-size: 14px">U/M</th>
            <th style="width: 15%;color:black;font-size: 14px">Cantidad Solicitada</th>
            <th style="width: 30%;color:black;font-size: 14px">Cantidad Despachada</th>
            <th style="width: 30%;color:black;font-size: 14px">Precio Unitario</th>
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
    $stock = $_POST['cantidad_despachada'][$i];
    $tot = $_POST['tot'][$i];
     $tot_f = $_POST['tot_f'];
?>
  
         <tr style="border: 1px solid #ccc;border-collapse: collapse;">
            <td data-label="Código" style="font-size: 12px;"><?php  echo $codigo?></td>
            <td data-label="Descripción" style="font-size: 12px;"><?php  echo $des?></td>
            <td data-label="Unidad De Medida" style="font-size: 12px;"><?php  echo $um?></td>
            <td data-label="Cantidad Despachada" style="font-size: 12px;"><?php echo $stock ?></td>
            <td data-label="Cantidad Dispinible" style="font-size: 12px;"><?php echo $cantidad ?></td>
            <td data-label="Precio" style="font-size: 12px;"><?php echo $cost ?></td>
            <td data-label="total" style="font-size: 12px;"><?php  echo $tot ?></td>
        </tr>
     
    </tbody>  
     <?php } } ?> 
    <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $tot_f ?></td>
    </tfoot>
</table>
<br>
<table class="table" style="width: 100%;height: 10%; border: 1px solid #ccc;border-collapse: collapse;">
            <tbody>
            <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
               <p style="padding-left: 1%;"> Observaciones (En qué se ocupará el bien entregado)</p>
               <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
</div>
            </tbody>
        </table>
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