<style type="text/css">#h2{margin: 0%;}</style>
<div id="categoria">
<form method="POST" action="" class="well hidden">
                
                 <div class="row">
                    <div class="col-md-4" style="position: initial;">
                        <label>Desde</label>
                     <input type="DATE" id="fechaActual" class="form-control" name="F1" required>
                    
                    </div>
                    <div class="col-md-4" style="position: initial">
                        <label class="">Hasta</label>
                     <input type="DATE" id="fechaActual1" class="form-control" name="F2" required>
                    
                    </div>
                    <div  class="col-md-4 " style="position: initial">
                      <input type="submit"  class="btn btn-success " id="submit"  name="Fecha" value="Filtrar Fechas">
                    </div>
                    
                </div>
        
                
               
            </form> </div>  <br>
<form method="POST" action="" class="h" >
    <div class="row">
    <div class="col-md-4" style="position: initial;">
        <label>Exportar Dia (1-31)</label>
                         <select  class="form-control" name="dia" id="dia" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Dia</option>
                            <?php for ($i=1; $i <=31 ; $i++) { 
                                echo "<option>$i</option>";
                            }
                                 ?>
                        </select>
                        <?php if (isset($_POST['dia'])){?>
                            <style type="text/css">#dia{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $_POST['dia'] ?>
                        <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>
                        </button>

                        <?php } ?>
                    </div>
    <div class="col-md-4" style="position: initial;">
        <label>Exportar Mes (Enero-Diciembre)</label>
                        <select  class="form-control"  name="mes" id="mes" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Mes</option>
                        <?php    
$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

for ($i=1; $i<=12; $i++) {
     if ($i == date('m'))
echo '<option value="'.$i.'">'.$Meses[($i)-1].'</option>';
     else
echo '<option value="'.$i.'">'.$Meses[($i)-1].'</option>';
     }
?>
                        </select>
                        <?php if (isset($_POST['mes'])){ $mes=$_POST['mes'];    
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
                            if ($mes==12) { $mes="Diciembre";}?>

                            <style type="text/css">#mes{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $mes ?>
                            <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>
                        </button>
                        <?php } ?>
                    </div>
    <div class="col-md-4" style="position: initial;">
        <label>Exportar Año (2022-3000)</label>
        <select  class="form-control" name="año" id="año" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Año</option>
                            <?php for ($i=2022; $i <=3000 ; $i++) { 
                                echo "<option>$i</option>";
                            } ?>
                        </select>
                        <?php if (isset($_POST['año'])){?>
                            <style type="text/css">#año{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $_POST['año'] ?>
                            <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>   
                        </button>
                        <?php } ?>
                    </div>
                    </div>
</form>
            <?php 
            if (isset($_POST['dia'])){$dia=$_POST['dia']?><br>
                <p align="center"><b>El Dia Selecionado</b>: <?php echo $_POST['dia'] ?></p>
                <style type="text/css">
                    .hidden{
                display: none;
             }
             #categoria{
                display: none;
             }
                </style>
                <br>
        <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form class="well" method="POST" action="../../Plugin/Fechas.php" target="_blank">
             <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Dia">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="well" method="POST" action="../../Plugin/pdf_fecha.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Dia" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
                <table class="table table-responsive  table-striped" id="div" style=" width: 100%">
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
    </thead></table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
    <tbody>
 <tr>
         <td  colspan="7" id="td1" ><h4 align="center">No se encontraron ningun  resultados 😥</h4></td></tr>
<style>
                    form{
                        margin: 0%;
                    }
                </style>
             <?php       
                   $sql = "SELECT * FROM `tb_productos` WHERE dia =$dia";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");
       //  $stock=round($stock);
              ?>
              <style type="text/css">
                  #w{
                    display: block;
                  }
                  #td1{
                    display: none;
                  }
              </style>
                   <tr>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}?>
      <?php   }} ?>
    </tbody>
</table>
  
</div> 
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
                <p align="center"><b>El Mes selecionado: </b><?php echo $mes." ("."<b>Mes en Numero: </b>".$mes2.$mes1.")" ?></p>

                                <style type="text/css">
                    .hidden{
                display: none;
             }
             #categoria{
                display: none;
             }
                </style>
                <br>
        <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form class="well" method="POST" action="../../Plugin/Fechas.php" target="_blank">
             <input type="hidden" name="mes" value="<?php echo $mes ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="well" method="POST" action="../../Plugin/pdf_fecha.php" target="_blank">
            <input type="hidden" name="mes" value="<?php echo $mes ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
                <table class="table table-responsive  table-striped" id="div" style=" width: 100%">
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
    </thead></table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
    <tbody>
 <tr>
         <td  colspan="7" id="td1" ><h4 align="center">No se encontraron ningun  resultados 😥</h4></td></tr>
<style>
                    form{
                        margin: 0%;
                    }
                </style>
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

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");
       //  $stock=round($stock);
              ?>
              <style type="text/css">
                  #w{
                    display: block;
                  }
                  #td1{
                    display: none;
                  }
              </style>
                   <tr>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}?>
      <?php   }} ?>
    </tbody>
</table>
  
</div> 
            <?php 
            if (isset($_POST['año'])){ $año=$_POST['año']?><br>
                <p align="center"><b>El Año selecionado</b>: <?php echo $_POST['año'] ?></p>

                                <style type="text/css">
                    .hidden{
                display: none;
             }
             #categoria{
                display: none;
             }
                </style>
                <br>
        <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form class="well" method="POST" action="../../Plugin/Fechas.php" target="_blank">
             <input type="hidden" name="año" value="<?php echo $año ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="well" method="POST" action="../../Plugin/pdf_fecha.php" target="_blank">
            <input type="hidden" name="año" value="<?php echo $año ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
                <table class="table table-responsive  table-striped" id="div" style=" width: 100%">
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
    </thead></table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
    <tbody>
 <tr>
         <td  colspan="7" id="td1" ><h4 align="center">No se encontraron ningun  resultados 😥</h4></td></tr>
<style>
                    form{
                        margin: 0%;
                    }
                </style>
             <?php       
                   $sql = "SELECT * FROM `tb_productos` WHERE año =$año";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");
       //  $stock=round($stock);
              ?>
              <style type="text/css">
                  #w{
                    display: block;
                  }
                  #td1{
                    display: none;
                  }
              </style>
                   <tr>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}?>
      <?php   }} ?>
    </tbody>
</table>
  
</div> 
            <?php 
if (isset($_POST['Fecha'])){
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];?>  <br> 
         <style>

             #hidden{
                display: none;
             }
            .h{
                display: none;
            }
         </style>
  <div class="mx-2">
         <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                   <center> <h1>Filtro por Fechas</h1></center>

      </div>
         <?php  
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];
          echo'<center>

        <div class="container">
          <div class="row">
                    <div class="col-md-6" style="position: initial">
                        <label>Desde</label>
                   <p>'. $f1.'</p>
                    </div><div class="col-md-6" style="position: initial">
                        <label>Hasta</label>
                    <p>'.$f2.'</p>                
                    </div>
                    
                </div> 
                </div> </center>';?>
                <div  class="mx-1 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
        <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;margin-top: 0%;margin-left: 1%;" class="btn-group" role="group" aria-label="Basic outlined example">
         <form class="well" method="POST" action="../../Plugin/Fechas.php" target="_blank">
             <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="well" method="POST" action="../../Plugin/pdf_fecha.php" target="_blank">
            <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
                <table class="table table-responsive  table-striped" id="div" style=" width: 100%">
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
    </thead></table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
    <tbody>
 <tr>
         <td  colspan="7" id="td1" ><h4 align="center">No se encontraron ningun  resultados 😥</h4></td></tr>
<style>
                    form{
                        margin: 0%;
                    }
                </style>
             <?php       
                   $sql = "SELECT * FROM `tb_productos` WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",",");
       //  $stock=round($stock);
              ?>
              <style type="text/css">
                  #w{
                    display: block;
                  }
                  #td1{
                    display: none;
                  }
              </style>
                   <tr>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}?>
      <?php   }} ?>
    </tbody>
</table>
  
</div>
<script type="text/javascript">
    window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
  document.getElementById('fechaActual1').value=ano+"-"+mes+"-"+dia;
}

</script>