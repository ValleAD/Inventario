<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo ' 
    <script>
        window.location ="../../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('../../templates/menu1.php') ?>
<?php include ('../../Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Productos</title>
</head>
<body> 
  <style>

#h2{
    margin: 0;
}


    .input:hover{
        background: pink;
        color: white;
    }
 @media (max-width: 952px){
    #dia, #mes, #año{
        text-align: left;
    }
   #cat{
    margin-top: 2%;
   }
      #h2{
    padding: 1%;
   }
   #h3{
    color: white;
   }

    }
  </style>
<?php      
$total = 0;
$final = 0;
$final1 = 0;
$final2 = 0;
$final3 = 0;
$final4 = 0;
$final5 = 0;
$final6 = 0;
$final7 = 0;
$final8 = 0;
$final9 = 0;
if (isset($_GET['id'])){       
    $id = $_GET['id'];       
   
  
 
$sql = "SELECT cod, codProductos, categoria, catalogo,  descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos1 = mysqli_fetch_array($result)){
           $precio=$productos1['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos1['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
         //$stock=round($stock);
?>

<br><br><br>
<style type="text/css">section{display: none;}</style>
<form action="../../Controller/Productos/Actualizar.php" method="post">
    <div class="container" style="background: rgba(0, 0, 0, 0.6); border-radius: 9px; color:#fff; font-weight: bold;">
  <h3 id="h3" align="center">Actualizar Producto</h3>
  <div class="row">
    <div class="col-md-6" style="position: initial; margin-top: 2%">
         <label for="">Categoría</label><br> 
                <select  class="form-control" name="categoria" id="um" >
                        <option   ><?php  echo $productos1['categoria']; ?></option>
                        <?php 
                     $sql = "SELECT * FROM  selects_categoria";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['categoria'].'</option>
                      ';   
                     } 
                           ?>
                      </select>
        <label class="my-2">Codificación de Catálogo</label>
                <input class="form-control"  type="text" name="codCatalogo" id="act" value="<?php  echo $productos1['catalogo']; ?>">
         <label class="my-2">Unidad de medida (U/M)</label>
            
                    <select  class="form-control" name="um" id="um" >
                            <option  ><?php  echo $productos1['unidad_medida']; ?></option>
                            <?php 
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['unidad_medida'].'</option>
                      ';   
                     } 
                           ?>
                        </select>
        <label class="my-2">Costo unitario</label>
                <input class="form-control" type="number" name="precio" id="act" step="0.01" value="<?php  echo $precio1 ?>">
    </div>
    <div class="col-md-6" style="position: initial; margin-top: 2%">
         <label>Código</label>
        <input class="form-control"  type="hidden" name="cod"  value="<?php  echo $productos1['cod']; ?>">
        <input class="form-control"  type="text" name="codProducto" id="act" value="<?php  echo $productos1['codProductos']; ?>">
        <label class="my-2">Descripción</label>
                <textarea rows="1" class="form-control" type="text"  name="descripcion"><?php  echo $productos1['descripcion']; ?></textarea>
                <label class="my-2">Cantidad Actual (Stock)</label>
                <input class="form-control" type="number" step="0.01" name="stock" id="act" value="<?php echo $stock?>">
                
    </div>
</div>
        <hr style="background: white;">
        <div class="row">
            <div class="col-md-12" style="position: initial; margin-bottom: 2%;">
                <button type="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="vistaProductos.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
            </div>
        </div>
    </div>
</form>

<style>
  #act {
    margin-top: 0.5%;
  }
</style>
<?php 
  }
} 
?>
<br>
    <style>
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } 
    </style>
</table>
  <section  style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2  class="text-center">Inventario de Productos</h2>
<br>
<div class="row">
<div class="col-md-4">


 <div class="card" style="height: 100%;">
    <div class="card-body">
        <form method="POST" action="" class="well hidden">
                        <label>Desde</label>
                     <input type="DATE" id="fechaActual" class="form-control" name="F1" required>

                        <label class="">Hasta</label>
                     <input type="DATE" id="fechaActual1" class="form-control" name="F2" required>
                      <input type="submit"  class="btn btn-success my-2 w-100" id="submit"  name="Fecha" value="Filtrar Fechas">
                  </form>
                  </div>
</div>
</div>
 <div class="col-md-4">
     <div class="card" style="height: 100%;">
    <div class="card-body">
                                     <form method="POST" action="">
                               <label>Exportar Dia (1-31)</label>
                         <select  class="form-control" name="dia" id="dia" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Dia</option>
                            <?php for ($i=1; $i <=31 ; $i++) { 
                                echo "<option>$i</option>";
                            }
                                 ?>
                        </select>
                        <?php if (isset($_POST['dia'])){?>
                            <style type="text/css">#dia, #tabla_resultado{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $_POST['dia'] ?>
                        <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>
                        </button>

                        <?php } ?>
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
                            if ($mes==7)  { $mes="Julio";}
                            if ($mes==8)  { $mes="Agosto";}
                            if ($mes==9)  { $mes="Septiembre";}
                            if ($mes==10) { $mes="Octubre";}
                            if ($mes==11) { $mes="Noviembre";}
                            if ($mes==12) { $mes="Diciembre";}?>

                            <style type="text/css">#mes, #tabla_resultado{display: none;}</style>
                            
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $mes ?>
                            <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>
                        </button>
                        <?php } ?>
                                <label>Exportar Año</label>
        <select  class="form-control" name="año" id="año" onchange="this.form.submit()">
                        <option disabled selected>Seleccione el Año</option>
                            <?php for ($i=2022; $i <=2100 ; $i++) { 
                                echo "<option>$i</option>";
                            } ?>
                        </select>
                        <?php if (isset($_POST['año'])){?>
                            <style type="text/css">#año, #tabla_resultado{display: none;}</style>
                        <button type="button" readonly style="width: 100%;background-color:green ;position: initial; border-radius:5px;text-align:center; color: white;" class="form-control "><?php echo $_POST['año'] ?>
                            <a href="" style="float: right;color: white;">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#arrow-counterclockwise"/>
                        </svg>
                            </a>   
                        </button>
                        <?php } ?>
                  </form>

</div>
</div>
</div>
 <div class="col-md-4" >
     <div class="card" style="height: 100%;">
    <div class="card-body">
                   <form method="POST" action="" class="well hidden" style="margin: 0;">
                    <label>Categoria</label>
                     <select id="hidden" class="form-control " name="cat"  required>
                    <option selected disabled value="">Seleccione</option>
                <?php  $sql = "SELECT * FROM tb_productos GROUP BY categoria ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                $categoria=$productos['categoria'];
                if ($categoria=="") {
                    $categoria="Sin categorias";
                }else{
                $categoria=$productos['categoria'];
                }
                ?>
                <option value="<?php echo $categoria ?>" ><?php echo $categoria ?></option>
                <?php 
            }
         ?></select>
         
                       <button id="hidden" class="btn btn-secondary my-2 w-100" name="categorias" type="submit">Exportar por Categorias</button>

                   </form>

                   
                  </div>
              </div>          
          </div>
      </div>
<br>
            <div class="card productos">
    <div class="card-body">
<div class="col-md-3">
            <section class="well">
                <form method="POST" action="" class="well hidden"> 
                <div style="position: initial;" class="input-group">
            <input required type="text" style="position: initial;" name="Busqueda"  class="form-control"  placeholder="Buscar Código ó Descripción">
                      <button name="Consultar2" type="submit" onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#search"/>
                </svg>
                 </button>
                 </div> 
             </form>
        </section>
    </div>
<div class="col-md-12">
    
                    <?php if ($cliente=="egchoto") { ?>
    <button title="Respaldo de la base de datos completa" id="b" onclick="return Exportar_bd()" class="btn btn-outline-primary"  style="position: initial; float: right; margin-top: -3%; margin-right: 15px;">Exportar bd</button>
                    <?php } ?>
     <a  href="../Unidad/unidad_medidad.php" class="btn btn-outline-secondary" id="b" style="position: initial; float: right;margin-bottom: 1%;margin-top: -3%; margin-right: 15px;">Unidad de medidas</a>
</div>
</div>
</div>


<br>
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
                    
                 </center>'; }?>
<div class="row">
                    <div class="col-md-9 mb-3" >
     
<?php include('../../Buscador_ajax/Fechas/fecha.php') ?>
<?php include('../../Buscador_ajax/Categorias/categoria.php') ?>


            <section id="tabla_resultado">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->


        </section>


                </div>
<div class="col-md-3 productos ">
     <div class="card">
    <div class="card-body">
         <div style="position: initial;" class="btn-group  mb-3 my-3 mx-2 " role="group" aria-label="Basic outlined example">
         <form class="botones" method="POST" action="../../Plugin/Imprimir/Producto/tproductos.php" target="_blank">
             
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="tproductos">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="botones" method="POST" action="../../Plugin/PDF/Productos/tpdf_productos.php" target="_blank" class="mx-1">
            
             <button  style="position: initial;"type="submit" class="btn btn-outline-primary mx-1" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
         <form class="botones" method="POST" action="../../Plugin/Excel/Productos/Excel.php" target="_blank">
            
             <button style="position: initial;"type="submit" class="btn btn-outline-primary" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
   <?php if (isset($_POST['Consultar2'])) {?> 
        
 <div style="position: initial;" class="btn-group mb-3"  role="group" aria-label="Basic outlined example">
            <form  method="POST" action="../../Plugin/Imprimir/Producto/productos.php" target="_blank">
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
            <form class="mx-1" method="POST" action="../../Plugin/PDF/Productos/pdf_productos.php" target="_blank">
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
        <form  method="POST" action="../../Plugin/Excel/Productos/Buscador_Excel.php" target="_blank">
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
    </div>'; }?>

</div>
        <?php 

         $sql="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY fecha_registro DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$total = $productos['SUM(stock)'] * $productos['precio'];

       $final += $total;
        $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $final2 += $cant_aprobada;
        $final3   =    number_format($final2, 2, ".",",");

        
        $final8 += $precio;
        $final9   =    number_format($final8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $final3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $final9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>

</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
        <h6 >Stock Por Mes</h6>
       <div id="div1" > 
        <?php $sql="SELECT Mes,SUM(stock),Año FROM tb_productos GROUP BY Mes,Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?> (<?php echo $productos['Año'] ?>): </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
          <div id="div1" > 
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
   </div>
<?php if (isset($_POST['categorias'])){$categoria=$_POST['cat'];
$totalc = 0;
$finalc = 0;
$finalc1 = 0;
$finalc2 = 0;
$finalc3 = 0;
$finalc4 = 0;
$finalc5 = 0;
$finalc6 = 0;
$finalc7 = 0;
$finalc8 = 0;
$finalc9 = 0;  ?> 
 <div class="col-md-3 ">
     <div class="card">
    <div class="card-body">
        <div class="mx-2  r-5" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
        
         <form method="POST" action="../../Plugin/Imprimir/Categoria/categorias.php" target="_blank">
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
             <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Categoria/pdf_categoria.php" target="_blank" class="mx-1">
            <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button style="position: initial;"  type="submit" class="btn btn-outline-primary mx-1" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/Excel/Productos/Categorias.php" target="_blank">
            <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button style="position: initial;"  type="submit" class="btn btn-outline-primary " name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>

 </div>
        <?php 

         $sql="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE categoria='$categoria' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY fecha_registro DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$totalc = $productos['SUM(stock)'] * $productos['precio'];

       $finalc += $totalc;
        $total1= number_format($totalc, 2, ".",",");
      $finalc1=number_format($finalc, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalc2 += $cant_aprobada;
        $finalc3   =    number_format($finalc2, 2, ".",",");

        
        $finalc8 += $precio;
        $finalc9   =    number_format($finalc8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalc3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $finalc9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalc1?></p>

</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
        <h6 >Stock Por Mes</h6>
       <div id="div1" > 
        <?php $sql="SELECT Mes,SUM(stock),Año FROM tb_productos WHERE categoria='$categoria' GROUP BY Mes,Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?> (<?php echo $productos['Año'] ?>): </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
          <div id="div1" > 
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE categoria='$categoria' GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
   </div>
   <?php } ?>  <?php if (isset($_POST['dia'])){$dia=$_POST['dia'];
$totalc = 0;
$finalc = 0;
$finalc1 = 0;
$finalc2 = 0;
$finalc3 = 0;
$finalc4 = 0;
$finalc5 = 0;
$finalc6 = 0;
$finalc7 = 0;
$finalc8 = 0;
$finalc9 = 0;  ?> 
 <div class="col-md-3 ">
     <div class="card">
    <div class="card-body">
        <div class="mx-2  r-5" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
              <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            
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

        <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE Dia='$dia' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY dia DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$totalc = $productos['SUM(stock)'] * $productos['precio'];

       $finalc += $totalc;
        $total1= number_format($totalc, 2, ".",",");
      $finalc1=number_format($finalc, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalc2 += $cant_aprobada;
        $finalc3   =    number_format($finalc2, 2, ".",",");

        
        $finalc8 += $precio;
        $finalc9   =    number_format($finalc8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalc3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $finalc9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalc1?></p>

</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
        <h6 >Stock Por Mes</h6>
       <div id="div1" > 
        <?php $sql="SELECT Mes,SUM(stock),Año FROM tb_productos WHERE Dia='$dia'  GROUP BY Mes,Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?> (<?php echo $productos['Año'] ?>): </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
          <div id="div1" > 
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE Dia='$dia'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
   </div>
   <?php } ?> <?php if (isset($_POST['mes'])){$dia=$_POST['mes'];
$totalc = 0;
$finalc = 0;
$finalc1 = 0;
$finalc2 = 0;
$finalc3 = 0;
$finalc4 = 0;
$finalc5 = 0;
$finalc6 = 0;
$finalc7 = 0;
$finalc8 = 0;
$finalc9 = 0;  ?> 
 <div class="col-md-3 ">
     <div class="card">
    <div class="card-body">
        <div class="mx-2  r-5" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
              <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
  <form method="POST" action="../../Plugin/PDF/Fecha/pdf_fecha.php" target="_blank" class="mx-1">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>         

         <form method="POST" action="../../Plugin/Excel/Productos/Fechas.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Mes" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>

</div>

        <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE Mes='$dia' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY Mes DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$totalc = $productos['SUM(stock)'] * $productos['precio'];

       $finalc += $totalc;
        $total1= number_format($totalc, 2, ".",",");
      $finalc1=number_format($finalc, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalc2 += $cant_aprobada;
        $finalc3   =    number_format($finalc2, 2, ".",",");

        
        $finalc8 += $precio;
        $finalc9   =    number_format($finalc8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalc3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $finalc9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalc1?></p>

</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
        <h6 >Stock Por Mes</h6>
       <div id="div1" > 
        <?php $sql="SELECT Mes,SUM(stock),Año FROM tb_productos WHERE Mes='$dia'  GROUP BY Mes,Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?> (<?php echo $productos['Año'] ?>): </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
          <div id="div1" > 
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE Mes='$dia'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
   </div>
   <?php } ?>  <?php if (isset($_POST['año'])){$dia=$_POST['año'];
$totalc = 0;
$finalc = 0;
$finalc1 = 0;
$finalc2 = 0;
$finalc3 = 0;
$finalc4 = 0;
$finalc5 = 0;
$finalc6 = 0;
$finalc7 = 0;
$finalc8 = 0;
$finalc9 = 0;  ?> 
 <div class="col-md-3 ">
     <div class="card">
    <div class="card-body">
        <div class="mx-2  r-5" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
         <form method="POST" action="../../Plugin/Imprimir/Fecha/Fechas.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
              <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
  <form method="POST" action="../../Plugin/PDF/Fecha/pdf_fecha.php" target="_blank" class="mx-1">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>         

         <form method="POST" action="../../Plugin/Excel/Productos/Fechas.php" target="_blank">
            <input type="hidden" name="dia" value="<?php echo $dia ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="Año" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>

</div>

        <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE Año='$dia' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY Año DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$totalc = $productos['SUM(stock)'] * $productos['precio'];

       $finalc += $totalc;
        $total1= number_format($totalc, 2, ".",",");
      $finalc1=number_format($finalc, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalc2 += $cant_aprobada;
        $finalc3   =    number_format($finalc2, 2, ".",",");

        
        $finalc8 += $precio;
        $finalc9   =    number_format($finalc8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalc3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $finalc9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalc1?></p>

</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
        <h6 >Stock Por Mes</h6>
       <div id="div1" > 
        <?php $sql="SELECT Mes,SUM(stock),Año FROM tb_productos WHERE Año='$dia'  GROUP BY Mes,Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?> (<?php echo $productos['Año'] ?>): </b><?php echo $stock ?></p>
   <?php  } ?>
   </div>
</div>
</div>
   </div>
   <?php } ?> <?php 
    if (isset($_POST['Fecha'])) {
         
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];
$totalc = 0;
$finalc = 0;
$finalc1 = 0;
$finalc2 = 0;
$finalc3 = 0;
$finalc4 = 0;
$finalc5 = 0;
$finalc6 = 0;
$finalc7 = 0;
$finalc8 = 0;
$finalc9 = 0;  ?> 
 <div class="col-md-3 mt-4">
     <div class="card">
    <div class="card-body">
        <div class="" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
               <div  class="pt-2 pb-2" style="background-color: transparent; border-radius: 5px;">
              <div  style="position: initial;margin-top: 0%;" class="btn-group" role="group" aria-label="Basic outlined example">
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


        <?php 

         $sql="SELECT SUM(stock), precio, fecha_registro FROM tb_productos WHERE fecha_registro BETWEEN ' $f1' AND ' $f2' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY Año DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$totalc = $productos['SUM(stock)'] * $productos['precio'];

       $finalc += $totalc;
        $total1= number_format($totalc, 2, ".",",");
      $finalc1=number_format($finalc, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");

        $finalc2 += $cant_aprobada;
        $finalc3   =    number_format($finalc2, 2, ".",",");

        
        $finalc8 += $precio;
        $finalc9   =    number_format($finalc8, 2, ".",",");
        ?>
    <?php } ?>
    <p align="right"><b style="float: left;">Cantidad (Stock): </b><?php echo $finalc3 ?></p>
                  <p align="right"><b style="float: left;">Costo Unitario: </b><?php echo $finalc9 ?></p>
                  <p align="right"><b style="float: left;">SubTotal</b><?php echo $finalc1?></p>

</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
        <h6 >Stock Por Mes</h6>
       <div id="div1" > 
        <?php $sql="SELECT Mes,SUM(stock),Año FROM tb_productos WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'  GROUP BY Mes,Año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $mes=$productos['Mes'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
                            ?>
               <p align="right"><b style="float: left;"><?php echo $mes ?> (<?php echo $productos['Año'] ?>): </b><?php echo $stock ?></p>
   <?php  } ?>
</div>
</div>
</div>
 <br>
     <div class="card">
    <div class="card-body">
   <h6> Stock Por Año</h6>
          <div id="div1" > 
    <?php $sql="SELECT año,SUM(stock) FROM tb_productos WHERE fecha_registro BETWEEN ' $f1' AND ' $f2'  GROUP BY año;";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
        $año=$productos['año'];
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");?>
        <p align="right"><b style="float: left;"><?php echo $año ?>: </b><?php echo $stock ?></p>
    <?php } ?>
</div>
</div>
</div>
   </div>
   <?php } ?>     

                 
</section>
 <script>
    function Exportar_bd() {
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Este Momento Va a Hacer un Respaldo de la Base de Datos',
      icon:'warning',
      confirmButtonText: "Exportar",
      showCancelButton:true,
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Database/Respaldos_sql/Respaldos.php';                               
               }
                });
        return false;
    }
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/Consultas/consulta.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
        .done(function(resultado){
        $("#tabla_resultado1").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#busqueda').load('../../Buscador_ajax/Consultas/consulta.php');
    });





         var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    $(document).ready( function () {
    $('#div').DataTable();
} );
 </script>

</body>
</html>