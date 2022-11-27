
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
        <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
             <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Dia">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Fecha/pdf_fecha.php" target="_blank" class="mx-1">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Dia" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>         

         <form method="POST" action="../../Plugin/Excel/Productos/Fechas.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Dia" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
    <table class=" table display   table-striped" id="example2" style=" width: 100%;">
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
            if ($mes==7)  { $mes="Junio";}
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
            if ($mes1=="Junio")     { $mes1=7;}
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


                <br>
        <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
             <input type="hidden" name="mes" value="<?php echo $mes ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Fecha/pdf_fecha.php" target="_blank" class="mx-1">
            <input type="hidden" name="mes" value="<?php echo $mes ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="mes" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                  <form method="POST" action="../../Plugin/Excel/Productos/Fechas.php" target="_blank">
            <input type="hidden" name="mes" value="<?php echo $mes ?>">
            <input type="hidden" name="mes1" value="<?php echo $mes1 ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
                <table class="table table-responsive  table-striped" id="example3" style=" width: 100%">
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
            if ($mes=="Junio")     { $mes=7;}
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
        <div  class="mx-1 p-2 " style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
             <input type="hidden" name="año" value="<?php echo $año ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Fecha/pdf_fecha.php" target="_blank" class="mx-1">
            <input type="hidden" name="año" value="<?php echo $año ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary " name="Año" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                  <form method="POST" action="../../Plugin/Excel/Productos/Fechas.php" target="_blank">
            <input type="hidden" name="año" value="<?php echo $año ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
                <table class="table table-responsive  table-striped" id="example4" style=" width: 100%">
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
         <div class="card mt-3">
      
    <div class="card-body">
  <div class="mx-2">
         <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                   <center> <h4>Filtro por Fechas</h4></center>

      </div>
          <div class="row">
                    <div class="col-md-6" style="position: initial">
                        <label>Desde</label>
                   <p>'. $f1.'</p>
                    </div><div class="col-md-6" style="position: initial">
                        <label>Hasta</label>
                    <p>'.$f2.'</p>                
                    </div>
                    
                 </center>';?>

                  <div class="card mt-3">
    <div class="card-body">

                <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
             <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Fecha/pdf_fecha.php" target="_blank" class="mx-1">
            <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary mx-1" name="Fecha" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                  <form method="POST" action="../../Plugin/Excel/Productos/Fechas.php" target="_blank">
            <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>


        <table class=" table display   table-striped" id="example5" style=" width: 100%;">
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

<br>
                  <div class="card ">
    <div class="card-body">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
 <div style="position: initial;" class="btn-group mb-3"  role="group" aria-label="Basic outlined example">
            <form id="form1" style=" margin-top:5%" method="POST" action="../../Plugin/Imprimir/Producto/productos.php" target="_blank">
                <?php 
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

                echo '
                <input type="hidden" name="consulta" value="'. $ee=$_POST['Busqueda'].'">
            ';} echo '
                <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form><br>
            <form id="form2" style="margin-top:5%;margin-left: 2.6%;" method="POST" action="../../Plugin/PDF/Productos/pdf_productos.php" target="_blank">
              ';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
echo'             
                <input type="hidden" name="consulta" value="'. $ee=$_POST['Busqueda'].'">
            ';} echo'
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
        <form id="form2" style="margin-top:5%;margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Productos/Buscador_Excel.php" target="_blank">
              ';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);
        echo '

';
    while ($productos = mysqli_fetch_array($result)){
echo'             
                <input type="hidden" name="consulta" value="'. $ee=$_POST['Busqueda'].'">
            ';}
              echo'  <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
    </div>';
 ?>


        <table class=" table display   table-striped" id="example5" style=" width: 100%;">
            <thead>
                <tr>
                    <th style="width:7%"  id="th">Código</th>
                     <th style="width:7%"  id="th">Cod. Catálogo</th>
                     <th style="width: 27%;" id="th"> Descripción Completa</th>
                     <th style="width:8%"  id="th">U/M</th>
                     <th style="width:8%"  id="th">Cantidad</th>
                     <th style="width:10%"  id="th">Costo Unitario</th>
                     <th style="width:10%"  id="th">Fecha Registro</th>
                     <?php if($tipo_usuario==1){ 
                        echo '<th style="width:10%" id="th">Editar</th>
                     <th style="width:10%" id="th">Eliminar</th>'; 
                 }  ?>
                </tr>
            </thead>
            <tbody>
                <?php
$q=$conn->real_escape_string($_POST['Busqueda']);
    $query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE
        codProductos LIKE '%".$q."%' or descripcion LIKE '%".$q."%' GROUP BY codProductos HAVING COUNT(*) ORDER BY codProductos desc ";
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
            <td>
                <form style="margin: 0%;position: 0;float:right; background: transparent;" method="POST" action="vistaProductos.php">             
                <input type="hidden" name="id" value="'.$productos['codProductos'] .'">               
                <button  id="th" name="editar" class="btn btn-success btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form> </td>
            <td>
            ';
                        if ($productos['SUM(stock)']==0) {
               
                   
              echo'  <a  data-bs-toggle="tooltip" style="float:right;" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm btn-del" id="'.$productos['codProductos'] .'" href="../../Controller/Productos/Delete_producto.php?cod='.$productos['cod'].'&id='. $productos['SUM(stock)'] .'">Eliminar</a>';
            
                
            };
                        if ($productos['SUM(stock)']!=0) {
               echo'
            <button   id="th" style="cursor: not-allowed;float:right;background: rgba(255, 0, 0, 0.5); border: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm text-white">Eliminar</button>
            ';
            }
        }?>
        </td> 
                </tr>
            <?php } ?>
            </tbody>
        </table>
</div></div>
<?php  } ?>
