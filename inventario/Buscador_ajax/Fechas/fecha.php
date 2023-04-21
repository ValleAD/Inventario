
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
                   $sql = "SELECT * FROM `tb_productos` WHERE dia =$dia";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
                $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");?>
        <tr>
           <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
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
                   $sql = "SELECT * FROM `tb_productos` WHERE mes =$mes";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
                $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");?>
        <tr>
           <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
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
                   $sql = "SELECT * FROM `tb_productos` WHERE año =$año";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
                $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");?>
        <tr>
           <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
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
                $sql = "SELECT * FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                             $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",","); ?>
                <tr>
            <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
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
<?php if (isset($_POST['Consultar2'])) {

?>
<style>.botones, .q{display: none;}</style>

                  <div class="card ">
    <div class="card-body">

        <table class=" table display  " id="example5" style=" width: 100%;">
            <thead>
                <tr>
                     <th title="Codigo del productos">Cód.</th>
                     <th title="Codigo del Catálogo">Catál.</th>
                     <th title="Descripción Completa">Desc.</th>
                     <th title="Unidad de Medida">U/M</th>
                     <th title="Cantidad (Stock)">Cant.</th>
                     <th title="Costo Unitario">Precio</th>
                     <th title="Fecha de registro">Fecha</th>

                        <?php if($tipo_usuario==1){ 
                        echo '
                    
                     <th title="Editar Producto">Editar</th>
                     <th title="Eliminar Producto">Delete</th>';
                 }  ?>
                </tr>
            </thead>
            <tbody>
                <?php
$q=$conn->real_escape_string($_POST['Busqueda']);
    $query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE codProductos LIKE '%".$q."%' or descripcion LIKE '%".$q."%' GROUP BY codProductos HAVING COUNT(*) ";
        $result = mysqli_query($conn, $query);

            while ($productos = mysqli_fetch_array($result)){
                             $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad,  2,".",","); ?>
                <tr>
            <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario"><?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
           <?php if ($tipo_usuario==1) {
            echo'
            <td data-label="Editar">
            <a title="Editar Producto" class="btn btn-success btn-sm"  href="vistaProductos.php?id='.$productos['codProductos'] .'">
                <svg class="bi" width="18" height="18" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#pencil-square"/>
                        </svg></a>   
            </td>
            <td data-label="Eliminar">
            ';
                        if ($productos['SUM(stock)']==0) {
               
                   
              echo'  <a  data-bs-toggle="tooltip" style="" data-bs-placement="top" title="Eliminar Producto" class="btn btn-danger btn-sm btn-del" onclick="return Eliminar()" id="'.$productos['codProductos'] .'" href="../../Controller/Productos/Delete_producto.php?cod='.$productos['cod'].'&id='. $productos['SUM(stock)'] .'&codProductos='. $productos['codProductos'] .'">
              <svg class="bi" width="18" height="18" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#trash-fill"/>
                        </svg></a>';
            
                
            };
                        if ($productos['SUM(stock)']!=0) {
               echo '
            <button   id="th" style="cursor: not-allowed;background: rgba(255, 0, 0, 0.5); border: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="En este momento no se Puede Eliminar este Producto" class="btn btn-danger btn-sm text-white">
            <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#trash-fill"/>
                        </svg></button>
            ';
            }
        }?>
        </td> 
                </tr>
            <?php } ?>
            </tbody>
        </table>
</div></div>
<?php  } 

