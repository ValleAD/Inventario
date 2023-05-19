
<?php           
if (isset($_POST['dia'])){$dia=$_POST['dia']?><br>

<style>
    .productos{
        display: none;
    }
</style>
<div class="card" style="margin-top:-3%">
    <div class="card-body">
        <p align="center"><b>El Dia Selecionado</b>: <?php echo $_POST['dia'] ?></p>

        <table class=" table display  " id="example2" style=" width: 100%;">
            <thead>
                <tr>
                    <th style="width:7%"  id="th">Código</th>
                    <th style="width:7%"  id="th">Cod. Catálogo</th>
                    <th style="width: 27%;" id="th"> Descripción Completa</th>
                    <th style="width:8%"  id="th">U/M</th>
                    <th style="width:8%"  id="th">Cantidad</th>
                    <th style="width:10%"  id="th">Costo Unitario</th>
                    <th style="width:10%"  id="th">Fecha Registro</th>

                </tr>
            </thead>
            <tbody>
             <?php       
             $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion,LENGTH(descripcion), unidad_medida, SUM(stock) precio, fecha_registro,Dia FROM `tb_productos` WHERE dia =$dia Group by codProductos,precio" ;
             $result = mysqli_query($conn, $sql);
             while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");
                 $des=$productos['descripcion'];
                 $des1=$productos['LENGTH(descripcion)'];
                 $i=25;
                 if ($i>=$des1) {
                    $des2=$des;
                }else{
                    $des2=substr($des, 0, 25)."...";
                }
                $cantidad=$productos['SUM(stock)'];
                $stock=number_format($cantidad,  2,".",",");?>
                <tr>
                   <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
                   <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
                   <td  data-label="Descripción Completa"  data-toggle="popover" title="Descripción del Producto" data-trigger="hover" data-content="<?php echo $productos['descripcion'] ?>"><?php  echo $des2; ?></td>
                   <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                   <td  data-label="Cantidad" ><?php  echo $stock ?></td>
                   <td  data-label="Costo Unitario"><?php  echo $precio1 ?></td>
                   <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
               <?php } ?>
           </tr>
       </tbody>
   </table>
</div>
</div>
<?php }  ?>

<?php 
if (isset($_POST['mes'])){ $mes=$_POST['mes'];$mes1=$_POST['mes'];
if ($mes==1)  { $mes="Enero";}
if ($mes==2)  { $mes="Febrero";}
if ($mes==3)  { $mes="Marzo";}
if ($mes==4)  { $mes="Abril";}
if ($mes==5)  { $mes="Mayo";}
if ($mes==6)  { $mes="Junio";}
if ($mes==7)  { $mes="Julio";}
if ($mes==8)  { $mes="Agosto";}
if ($mes==9)  { $mes="Septiembre";}
if ($mes==10) { $mes="Octubre";}
if ($mes==11) { $mes="Noviembre";}
if ($mes==12) { $mes="Diciembre";}
if ($mes1=="Enero")     { $mes1=1;}
if ($mes1=="Febrero")   { $mes1=2;}
if ($mes1=="Marzo")     { $mes1=3;}
if ($mes1=="Abril")     { $mes1=4;}
if ($mes1=="Mayo")      { $mes1=5;}
if ($mes1=="Junio")     { $mes1=6;}
if ($mes1=="Julio")     { $mes1=7;}
if ($mes1=="Agosto")    { $mes1=8;}
if ($mes1=="Septiembre"){ $mes1=9;}
if ($mes1=="Octubre")   { $mes1==10;}
if ($mes1=="Noviembre") { $mes1==11;}
if ($mes1=="Diciembre") { $mes1==12;}
if ($mes1 <=9) {$mes2=0;}
if ($mes1 >=10) {$mes2="";} ?><br>
<style>
    .productos{
        display: none;
    }
</style>
<div class="card" style="margin-top:-3%">
    <div class="card-body">
        <p align="center"><b>El Mes selecionado: </b><?php echo $mes." ("."<b>Mes en Numero: </b>".$mes2.$mes1.")" ?></p>


        <table class="table " id="example3" style=" width: 100%">
            <thead>
             <tr id="tr">
                 <th style="width: 20%">Código</th>
                 <th style="width: 10%">Cod. de Catálogo</th>
                 <th  style="width: 23%">Descripción Completa</th>
                 <th style="width: 1%">U/M</th>
                 <th style="width: 25%">Cantidad</th>
                 <th style="width: 1%">Costo Unitario</th>
                 <th style="width: 50%">Fecha Registro</th>

             </tr>
         </thead>
         <tbody>

             <?php       
             if ($mes=="Enero")     { $mes=1;}
             if ($mes=="Febrero")   { $mes=2;}
             if ($mes=="Marzo")     { $mes=3;}
             if ($mes=="Abril")     { $mes=4;}
             if ($mes=="Mayo")      { $mes=5;}
             if ($mes=="Junio")     { $mes=6;}
             if ($mes=="Julio")     { $mes=7;}
             if ($mes=="Agosto")    { $mes=8;}
             if ($mes=="Septiembre"){ $mes=9;}
             if ($mes=="Octubre")   { $mes=10;}
             if ($mes=="Noviembre") { $mes=11;}
             if ($mes=="Diciembre") { $mes=12;}
             $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion,LENGTH(descripcion), unidad_medida, SUM(stock),Mes,Año, precio, fecha_registro FROM `tb_productos` WHERE mes =$mes Group by codProductos,precio";
             $result = mysqli_query($conn, $sql);
             while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");
                 $cantidad=$productos['SUM(stock)'];
                 $stock=number_format($cantidad,  2,".",",");?>
                 <tr>
                   <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
                   <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
                   <td  data-label="Descripción Completa"  data-toggle="popover" title="Descripción del Producto" data-trigger="hover" data-content="<?php echo $productos['descripcion'] ?>"><?php  echo $productos['descripcion']; ?></td>
                   <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                   <td  data-label="Cantidad" ><?php  echo $stock ?></td>
                   <td  data-label="Costo Unitario"><?php  echo $precio1 ?></td>
                   <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
               <?php } ?>
           </tr>
       </tbody>
   </table>
</div>
</div>
<?php }  ?>
<?php 
if (isset($_POST['año'])){ $año=$_POST['año']?><br>
<style>
    .productos{
        display: none;
    }
</style>
<div class="card" style="margin-top:-3%">
    <div class="card-body">
        <p align="center"><b>El Año selecionado</b>: <?php echo $_POST['año'] ?></p>

        <table class="table " id="example4" style=" width: 100%">
            <thead>
             <tr id="tr">
                 <th style="width: 20%">Código</th>
                 <th style="width: 10%">Cod. de Catálogo</th>
                 <th  style="width: 23%">Descripción Completa</th>
                 <th style="width: 1%">U/M</th>
                 <th style="width: 25%">Cantidad</th>
                 <th style="width: 1%">Costo Unitario</th>
                 <th style="width: 50%">Fecha Registro</th>

             </tr>
         </thead>
         <tbody>
             <?php       
             $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion,LENGTH(descripcion), unidad_medida, SUM(stock),Mes,Año, precio, fecha_registro FROM `tb_productos` WHERE año =$año Group by codProductos,precio";
             $result = mysqli_query($conn, $sql);
             while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");
                 $des=$productos['descripcion'];
                 $des1=$productos['LENGTH(descripcion)'];
                 $i=25;
                 if ($i>=$des1) {
                    $des2=$des;
                }else{
                    $des2=substr($des, 0, 25)."...";
                }
                $cantidad=$productos['SUM(stock)'];
                $stock=number_format($cantidad,  2,".",",");?>
                <tr>
                   <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
                   <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
                   <td  data-label="Descripción Completa"  data-toggle="popover" title="Descripción del Producto" data-trigger="hover" data-content="<?php echo $productos['descripcion'] ?>"><?php  echo $des2; ?></td>
                   <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                   <td  data-label="Cantidad" ><?php  echo $stock ?></td>
                   <td  data-label="Costo Unitario"><?php  echo $precio1 ?></td>
                   <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
               <?php } ?>
           </tr>
       </tbody>
   </table>
</div>
</div>
<?php }  ?>
<?php if (isset($_POST['Fecha'])) {

 $f1=$_POST['F1']; 
 $f2=$_POST['F2'];
 echo'<center>
 <style>
 .productos{
    display: none;
}
</style>
';?>
<br>
<div class="card ">
    <div class="card-body">



        <table class=" table display  " id="example5" style=" width: 100%;">
            <thead>
                <tr>
                    <th style="width:7%"  id="th">Código</th>
                    <th style="width:7%"  id="th">Cod. Catálogo</th>
                    <th style="width: 27%;" id="th"> Descripción Completa</th>
                    <th style="width:8%"  id="th">U/M</th>
                    <th style="width:8%"  id="th">Cantidad</th>
                    <th style="width:10%"  id="th">Costo Unitario</th>
                    <th style="width:10%"  id="th">Fecha Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion,LENGTH(descripcion), unidad_medida, SUM(stock),Mes,Año, precio, fecha_registro FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' Group by codProductos,precio";
                $result = mysqli_query($conn, $sql);
                while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");

                 $cantidad=$productos['SUM(stock)'];
                 $stock=number_format($cantidad,  2,".",","); ?>
                 <tr>
                    <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
                    <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
                    <td  data-label="Descripción Completa"  data-toggle="popover" title="Descripción del Producto" data-trigger="hover" data-content="<?php echo $productos['descripcion'] ?>"><?php  echo $productos['descripcion']; ?></td>
                    <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                    <td  data-label="Cantidad" ><?php  echo $stock ?></td>
                    <td  data-label="Costo Unitario"><?php  echo $precio1 ?></td>
                    <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div></div>
<?php  } ?>
