<?php 

include ('../../../Model/conexion.php');

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../../../styles/estilos_tablas.css">
<?php   if (isset($_POST['consulta'])) {?>
     <title>Productos</title>
<?php }  if (isset($_POST['Historial'])) { ?>
     <title>Historial de Productos</title>
<?php } ?>

 </head>
 <body>
<style>
     #th  { font-size: 11px;border: 1px solid #ccc;border-collapse: collapse;font-size: 12px;}
</style>
<img src="../../../img/hospital.png" style="width:20%">
    <img src="../../../img/log_1.png" style="width:20%; float:right">
<h3 align="center" style="margin-top: 2%;">MINISTERIO DE SALUD</h3>
<h3 align="center" style="margin-top: 2%;">HOSPITAL NACIONAL SANTA TERESA</h3>
<h4 align="center" style="margin-top: 2%;">DEPARTAMENTO DE MANTENIMIENTO</h4>
<?php   if (isset($_POST['consulta'])) {?>
<h5 align="center" style="margin-top: 2%;">TODOS LOS PRODUCTOS</h5>
<?php }  if (isset($_POST['Historial'])) { ?>
<h5 align="center" style="margin-top: 2%;">HISTORIAL DE PRODUCTOS</h5>
<?php } ?>
<section style="margin: 1%;">
  <?php
  if (isset($_POST['consulta'])) {?>

    <table class="table table-responsive table-striped"  style=" width: 100%">

    <thead>
        <tr id="tr">
            <th style="width:20%;font-size: 14px;">Código</th>
            <th style="width:20%;font-size: 14px;">Cod. de Catálogo</th>
            <th style="width:30%;font-size: 14px;">Descripción Completa</th>
            <th style="width:20%;font-size: 14px;">U/M</th>
            <th style="width:20%;font-size: 14px;">Cantidad</th>
            <th style="width:20%;font-size: 14px;">Costo Unitario</th>
            <th style="width:20%;font-size: 14px;">Fecha Registro</th>
            <th style="width:20%;font-size: 14px;">Categoria</th>
            
        </tr>
    </thead>
    <tbody>
    <?php 

              $cod=$_POST['consulta'];

   $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro  FROM `tb_productos` WHERE codProductos LIKE '%".$cod."%' or descripcion LIKE '%".$cod."%' ";

        $result = mysqli_query($conn, $sql);
        
 while ($productos = mysqli_fetch_array($result)){
         $cat=$productos['categoria'];
                if ($cat=="") {
                    $cat="Sin categorias";
                
                }else{
                $cat=$productos['categoria'];
                }
    $cod= $productos['codProductos'];
    $catal= $productos['catalogo'];
    $des= $productos['descripcion'];
    $u_m= $productos['unidad_medida'];
    $precio=$productos['precio'];
    $precio1=number_format($precio, 2,".",",");
    $cantidad=$productos['SUM(stock)'];
    $stock=number_format($cantidad,  2,".",",");
    $fech= $productos['fecha_registro'];
    ?>
     <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style>
 <tr style="border: 1px solid #ccc;border-collapse: collapse;">
        <td id="th" data-label="Código" style="font-size: 12px;"><?php echo $cod ?></td>
        <td id="th" data-label="Catalogo" style="font-size: 12px;"><?php echo $catal ?></td>
        <td id="th" data-label="Descripción" style="font-size: 12px;"><?php echo $des ?></td>
        <td id="th" data-label="Unidad De Medida" style="font-size: 12px;"><?php echo $u_m ?></td>
        <td id="th" data-label="Cantidad" style="font-size: 12px;"><?php echo $stock ?></td>
        <td id="th" data-label="Precio" style="font-size: 12px;"><?php echo $precio1 ?></td>
        <td id="th" data-label="Fecha" style="font-size: 12px;"><?php echo $fech ?></td>
        <td id="th" data-label="Categoría" style="font-size: 12px;"><?php echo $cat ?></td>
        <?php } ?>
    </tr>
    </tbody>
</table> 
<?php } 
  if (isset($_POST['Historial'])) { $Busqueda=$_POST['Busqueda'];?>

<?php $sql = "SELECT Concepto,No_Comprovante,h.descripcion, h.fecha_registro, p.fecha_registro,h.unidad_medida, SUM(Entradas), SUM(Salidas),Saldo, p.precio FROM historial h JOIN tb_productos p ON h.No_Comprovante= p.codProductos WHERE  No_Comprovante = '$Busqueda' GROUP BY Concepto limit 1";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d-m-Y",strtotime($productos['fecha_registro']));
        $fecha1=date("d-m-Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['No_Comprovante'];
        $Concepto= $productos['Concepto'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
        $cod= $productos['No_Comprovante'];
        $descripcion=$productos['descripcion'];
        $um=$productos['unidad_medida'];
?>
<style type="text/css">
#t{
    border-radius: 0.25rem;
    background: rgb(25 255 255);
    float: left;
    width: 20%;
    border: 1px solid #ccc;border-collapse: collapse;
    padding: 1%;

}
#h{
float: left;
margin-left: 2%;
        width: 75%;
}
p{
    font-size: 12px;
}
.table{
    margin: 0;
}
</style>
 <div id="row">
     <div id="t">
         <p><b>PERIODO DE MOVIMIENTO</b></p>
<table class="" style="width: 100%;">
    <tr>
        <td><p><b>DE:</b> <?php echo $fecha ?></p></td>
        <td style="text-align: right;"><p ><b>AL:</b> <?php echo $fecha1 ?></p></td>
    </tr>
    <tr>
        <td><p><b>Codigo del Producto:</b></p> </td>
       <td style="text-align: right;">  <p ><?php echo $cod ?></p></td>
    </tr>
    <tr>
        <td><p><b>Descripción</b></p></td>  
        <td style="text-align: right;"><p ><?php echo $descripcion ?></p></td>
    </tr>
    <tr>
        <td><p><b>Unidad de Medida</b></p>  </td>
        <td style="text-align: right;"><p ><?php echo $um ?></p></td>
    </tr>
</table>

     </div>
     <div id="h">
                 <table class="table">
                   <thead>
             <tr id="tr">
                     <th >Fecha</th>
                     <th >Concepto</th>
                     <th >No. Comprobante</th>
                     <th >Entradas</th>
                     <th >Salidas</th>
                     <th >Saldo</th>
                
            </tr>
           
     </thead>
<tbody>
    <?php $sql = "SELECT fecha_registro,codProductos,SUM(stock), precio FROM tb_productos WHERE  codProductos = '$Busqueda' GROUP BY codProductos";
$result = mysqli_query($conn, $sql);



    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d - m - Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['codProductos'];
        $Saldo= $productos['precio'];?>
        <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td id="th" data-label="Concepto">Inventario Físico</td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $productos['SUM(stock)'] ?></td>
            <td id="th" data-label="Salidas">0.00</td>
            <td id="th" data-label="Saldo"><?php echo $Saldo ?></td>
        </tr> 
    <?php } $sql = "SELECT Concepto,No_Comprovante,h.descripcion, h.fecha_registro,h.unidad_medida, SUM(Entradas), SUM(Salidas),Saldo, p.precio FROM historial h JOIN tb_productos p ON h.No_Comprovante= p.codProductos WHERE  No_Comprovante = '$Busqueda' GROUP BY Concepto";
$result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
        $fecha=date("d - m - Y",strtotime($productos['fecha_registro']));
        $Comprovante= $productos['No_Comprovante'];
        $Concepto= $productos['Concepto'];
        $Entradas=$productos['SUM(Entradas)'];
        $Salida=$productos['SUM(Salidas)'];
        $Saldo=$productos['Saldo'];
?>
        <tr>
            <td id="th" data-label="Fecha"><?php echo $fecha ?></td>
            <td id="th" data-label="Concepto"><?php echo $Concepto ?></td>
            <td id="th" data-label="No. Comprovante"><?php echo $Comprovante ?></td>
            <td id="th" data-label="Entradas"><?php echo $Entradas ?></td>
            <td id="th" data-label="Salidas"><?php echo $Salida ?></td>
            <td id="th" data-label="Saldo"><?php echo $Saldo ?></td>
        </tr>        
<?php } ?>
           </tbody>
        </table>
     </div>
 </div>

<?php } ?>


<?php } ?>
</section>
 </body>
 </html>
<script type="text/javascript">

window.print();

let linkDelete =document.querySelectorAll("delete");
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("p").innerHTML ="<b>AL:</b> "+ day + "-" + month + "-" + year;
document.getElementById("p1").value = day + "-" + month + "-" + year;
document.getElementById("p2").value = day + "-" + month + "-" + year;
document.getElementById("p3").value = day + "-" + month + "-" + year;
</script>