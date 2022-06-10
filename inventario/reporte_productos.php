
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
    <title>Reporte Productos</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
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
 @media (max-width: 952px){
   #cat{
    margin-top: 2%;
   }
   #h2{
    padding: 2%;
   }
    }
  </style>
  <section style="background: rgba(255, 255, 255, 0.9);margin: 5%2%2%2%; border-radius: 15px;">
<font color="black"><h2 id="h2" class="text-center">Reporte General de Productos</h2></font>
<br>
<form method="POST" action="">
                <div class="container">
                 <div class="row">
                    <div class="col-md-3" style="position: initial;">
                        <label>Desde</label>
                     <input type="DATE" class="form-control" name="F1" required>
                    
                    </div><div class="col-md-3" style="position: initial">
                        <label class="my-2">Hasta</label>
                     <input type="DATE" class="form-control" name="F2" required>
                    
                    </div>
                    <div id="v" class="col-md-6 mx-0" style="position: initial;">
                       <button id="cat" class="btn btn-success" name="Fecha" type="submit">Filtrar Fechas</button>
                    </div>
                </div>
            </div>
                
               
            </form>   
            <?php 

if (isset($_POST['Fecha'])){
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];?>  <br> 
                   <center> <h1>Filtro por Fechas</h1></center>

               <div class="mx-2">

                <table class="table  table-striped" id="example1" style=" width: 100%">
    <thead>
         <tr id="tr">
                     <th>Código</th>
                     <th>Cod. de Catálogo</th>
                     <th>Descripción Completa</th>
                     <th>U/M</th>
                     <th>Cantidad</th>
                     <th>Costo Unitario</th>
                     <th>Fecha Registro</th>
                     
                   </tr>
    </thead>
    <tbody>
         <?php  
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];
echo'
         <center>
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
         <form id="w" method="POST" action="Plugin/Fechas.php" target="_blank">
             <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="w" method="POST" action="Plugin/pdf_fecha.php" target="_blank">
            <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
<style>
                    form{
                        margin: 0%;
                    }
                    #w{
                        display: none;
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
              </style>
                   <tr>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="text-align: left;padding-left:3%"><?php  echo $productos['descripcion']; ?></td>
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

    <div class="mx-1 p-2" style=" border-radius: 5px;">
        
           <a href="unidad_medidad.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a><br>
                 <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/tproductos.php">
                
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/tpdf_productos.php">
               
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
    </div>
<table class="table  table-striped" id="example" style="width: 100%;">
                <thead>
                     <tr id="tr">
                    <th>#</th>
                     <th>Código</th>
                     <th>Cod. de Catálogo</th>
                     <th>Descripción Completa</th>
                     <th>U/M</th>
                     <th>Cantidad</th>
                     <th>Costo Unitario</th>
                     <th>Fecha Registro</th>
                     <th>Categoría</th>
                
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
             $cat=$productos['categoria'];
                if ($cat=="") {
                    $cat="Sin categorias";
                
                }else{
                $cat=$productos['categoria'];
                }
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
            <td data-label="N°"><?php echo $r ?></td>
           <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" style="position: initial;"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad"><?php  echo $stock; ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
           <td  data-label="Categoría"><?php  echo $cat; ?></td>
          
         </tr>
     
     <?php } ?> 
                </tbody>                
            </table>           
        </div>
         <form method="POST" action="reporte_productos.php" >  
                 <div class="row">
                    <div class="col-md-3 mx-2" style="position: initial">
                      <select class="form-control" name="cat"  required>
                    <option selected disabled value="">Seleccione</option>
             <?php  $sql = "SELECT * FROM tb_productos GROUP BY categoria ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                $categoria=$productos['categoria'];
                if ($categoria1=="") {
                    $categoria1="Sin categorias";
                }else{
                $categoria1=$productos['categoria'];
                }
                ?>
                <option value="<?php echo $categoria ?>" ><?php echo $categoria1 ?></option>
                <?php 
            }
         ?></select>
                    </div>
                     <div class="col-md-6 mx-2 " style="position: initial; ">
                       <button class="btn btn-success" name="categorias" type="submit">Exportar por Categorias</button>
                  
                    </div>
                </div>
            </form> 
            <?php 

if (isset($_POST['categorias'])){  
$categoria=$_POST['cat'];?> 

                <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form id="w" method="POST" action="Plugin/categorias.php">
<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>

                </button>
            </form>
            <form id="w" method="POST" action="Plugin/pdf_categoria.php">
<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
<input type="hidden" name="categoria[]" value="<?php echo $categoria?>">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf"> 
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>

</div>

 <br> 
<div class="mx-1 p-2" style="background-color: transparent; border-radius: 5px;">
   <table class="table table-striped" id="example" style="width: 100%;">
    <thead>
         <tr id="tr">
                     <th>Categoria</th>
                     <th>Código</th>
                     <th>Cod. de Catálogo</th>
                     <th>Descripción Completa</th>
                     <th>U/M</th>
                     <th>Cantidad</th>
                     <th>Costo Unitario</th>
                     <th>Fecha Registro</th> 
                     </tr>
                     
                     
    </thead>
    <tbody>
         <?php 

             // code...
         
                   $sql = "SELECT * FROM tb_productos WHERE categoria='$categoria' ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                     $cat=$productos['categoria'];
                if ($cat=="") {
                    $cat="Sin categorias";
                
                }else{
                $cat=$productos['categoria'];
                }
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");
                 $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
        

                if ($_POST['cat']==$productos['categoria']) {?>
                     <style>
                        #td{
                            display: none;
                        }
                </style>
                   <tr>
                <td data-label="Categoría" ><?php  echo $cat; ?></td>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad"><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
        </tr>
                <?php}}?>
      <?php   }}} ?>
    </tbody>
</table>
  <br>
    </div>
</section>
</body>
</html>