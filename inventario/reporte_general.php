
<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo ' 
    <script>
        window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?><?php include ('templates/menu.php') ?>
<?php include ('Model/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Egresos General</title> 
    <style>

</head>
<body> 
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

<section style="background: rgba(255, 255, 255, 0.9);padding-bottom: 1%;margin: 3%;border-radius: 15px;">
<font color="black"><h2 class="text-center">Reporte General de Solicitudes</h2></font>
<div class=" row">
<form method="POST" action="reporte_general.php" style="margin-left: 2%;">
                 <div class="row">
                    <div class="col-md-4" style="position: initial;">
                        <label>Desde</label>
                     <input type="DATE" class="form-control" name="F1" required>
                    
                    </div><div class="col-4" style="position: initial">
                        <label>Hasta</label>
                     <input type="DATE" class="form-control" name="F2" required>
                    
                    </div>
                    <div class="col-md-4" style="position: initial; margin-top: auto;">
                       <button class="btn btn-success" name="Fecha" type="submit">Filtrar Fechas</button>
                    </div>
                </div>
            </form> 

 <form method="POST" action="reporte_general.php" style="margin-left: 70%;margin-top: -3%;">  
                 <div class="row">
                    <div class="col-md-5" style="position: initial">
                      <select class="form-control" name="cat"  required>
                    <option selected disabled value="">Seleccione</option>
                <?php  $sql = "SELECT * FROM tb_productos GROUP BY categoria ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                echo "<option>".$productos['categoria']."</option>";

            }
         ?></select>
                    </div>
                    <div class="col-md-6" style="position: initial;margin-top: 2%;">
                       <button class="btn btn-success" name="categorias" type="submit">Exportar por Categorias</button>
                  
                    </div>
                </div>
                
               
            </form> 
            </div>


            <?php 
if (isset($_POST['Fecha'])){
?> 
<div class="mx-1 p-2" style="background-color: transparent; border-radius: 5px;">
         <?php  
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];?>
         <h1>Filtro por Fechas</h1>
         <center>

        <div class="container">
          <div class="row">
                    <div class="col-md-6" style="position: initial">
                        <label>Desde</label>
                   <p><?php echo $f1 ?></p>
           
                    </div>
                    <div class="col-md-6" style="position: initial">
                        <label>Hasta</label>
                    <p><?php echo $f2 ?></p>                
                    </div>
                    
                </div> 
                </div> </center>
                <style>
                    form{
                        margin: 0%;
                    }
                    
                </style>
                <div  class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form id="w" method="POST" action="Plugin/Fechas.php">
                <input type="hidden" name="f1" value="<?php echo $f1 ?>">
                <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form id="w" method="POST" action="Plugin/pdf_fecha.php">
                <input type="hidden" name="f1" value="<?php echo $f1 ?>">
                <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                <button type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>

</div>

                <table class="table table-responsive table-striped" id="example" style=" width: 100%">
                    
    <thead>
         <tr id="tr">
                     <th style="width:10%">Código</th>
                     <th style="width:10%">Cod. de Catálogo</th>
                     <th style="width: 100%;">Descripción Completa</th>
                     <th style="width:10%">U/M</th>
                     <th style="width:10%">Cantidad</th>
                     <th style="width:10%">Costo Unitario</th>
                     <th style="width:10%">Fecha Registro</th>
                     
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
        $stock=number_format($cantidad,  2,".",",");
       //  $stock=round($stock);
              ?>
 <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
</style> 
                   <tr>
                <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="text-align: left;padding-left:3%"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad"  style="text-align: center;"><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}?>
      <?php   }} ?>
    </tbody>
</table>
  
</div>

<?php 

if (isset($_POST['categorias'])){  
$categoria=$_POST['cat'];?> 
 <style>
                    form{
                        margin: 0%;
                    }
                    #w{
                        display: none;
                    }
                </style>
                <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <div class="mx-2 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
                   
        
              <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/categorias.php" target="_blank">
             <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/pdf_categoria.php" target="_blank">
            <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>


</div>

 <br> 
<div class="mx-1 p-2" style="background-color: white; border-radius: 5px;">
   <table class="table table-responsive table-striped" id="example1"  style=" width: 100%">
    <thead>
         <tr id="tr">
                     <th style=" width: 10%">Categoria</th>
                     <th style=" width: 10%">Código</th>
                     <th style=" width: 10%">Cod. de Catálogo</th>
                     <th style=" width: 100%;">Descripción Completa</th>
                     <th style=" width: 100%">U/M</th>
                     <th style=" width: 100%">Cantidad</th>
                     <th style=" width: 100%">Costo Unitario</th>
                     <th style=" width: 100%">Fecha Registro</th> 
                   </tr>
    </thead>
    <tbody>
         <?php 

             // code...
         
                   $sql = "SELECT * FROM tb_productos WHERE categoria='$categoria' ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");
                 $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
        

                if ($_POST['cat']==$productos['categoria']) {?>
                     <style>

                    #w{
                        display: block;
                    }
                </style>
                   <tr>
                <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['categoria']; ?></td>
                <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="text-align: left;padding-left:3%"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" style="text-align: center;"><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}}?>
      <?php   }}} ?>
    </tbody>
</table>
  <br>
    <div class="mx-1 p-2" style=" border-radius: 5px;">
        
           <a href="unidad_medidad.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a><br>
                 <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/tproductos.php">
                
                <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/tpdf_productos.php">
               
                <button type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
    </div>
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
                <thead>
                     <tr id="tr">
                    <th style="max-width: 5%;">#</th>
                     <th style="max-width: 10%;">Código</th>
                     <th style="max-width: 10%;">Cod. de Catálogo</th>
                     <th style="max-width: 50%;">Descripción Completa</th>
                     <th style="max-width: 10%;">U/M</th>
                     <th style="max-width: 10%;">Cantidad</th>
                     <th style="max-width: 10%;">Costo Unitario</th>
                     <th style="max-width: 40%;">Fecha Registro</th>
                     <th style="max-width: 100%; max-width: 50%;">Categoría</th>
                
                   </tr>
                </thead>
                <tbody>
<?php
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);
?>

<?php
$n=0;
    while ($productos = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
?>
     
            
                  
     <style type="text/css">
     
         #td{
             display: none;
         }
        th{
            width: 100%;
        }
     </style>
         <tr id="tr">
            <td><?php echo $r ?></td>
           <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" style="text-align: center;"><?php  echo $stock; ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
           <td  data-label="Categoría"><?php  echo $productos['categoria']; ?></td>
          
         </tr>
     
     <?php } ?> 
                </tbody>                
            </table>           
        </div>
                         
</section>

</body>
</html>