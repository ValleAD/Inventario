<?php require '../../Model/conexion.php';
include ('menu.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png"> 
    <title>Productos</title>
</head>

<body style="background-image: url(../../../img/4k.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">
                <style type="text/css">
 </style>

<section style="background: rgba(255, 255, 255, 0.9);padding-bottom: 1%;margin: 3%;border-radius: 15px;">
<font color="black"><h2 class="text-center">Inventario de Productos</h2></font>
<?php if (isset($_POST['categorias'])){  ?>
<a class="btn btn-success mx-2" href="productos.php">Ver Productos</a>
<?php } 
if (isset($_POST['Fecha'])){  ?>
<a class="btn btn-success mx-2" href="productos.php">Ver Productos</a>
<?php } ?>
<div class=" row">
<form method="POST" action="productos.php" style="margin-left: 2%;">
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

 <form method="POST" action="productos.php" style="margin-left: 70%;margin-top: -3%;">  
                 <div class="row">
                    <div class="col-md-5" style="position: initial">
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
                    <div class="col-md-6" style="position: initial;">
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
         <h1 style="color:black;">Filtro por Fechas</h1>
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
                    #w{
                        display: none;
                    }
                </style>
                <div  class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form id="w" method="POST" action="../../Plugin/Fechas.php">
                <input type="hidden" name="f1" value="<?php echo $f1 ?>">
                <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                <button type="submit" class="btn btn-outline-primary" name="Fecha"><svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg></button>
            </form>
            <form id="w" method="POST" action="../../Plugin/pdf_fecha.php">
                <input type="hidden" name="f1" value="<?php echo $f1 ?>">
                <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                <button type="submit" class="btn btn-outline-primary" name="pdf"><svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg></button>
            </form>

</div>

                <table class="table table-responsive table-striped" id="example"  style=" width: 100%">
                    
    <thead>
         <tr id="tr">
                     <th style="width:10%">Código</th>
                     <th style="width:10%">Cod. de Catálogo</th>
                     <th style=" width: 100%">Descripción Completa</th>
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
    }#w{
        display: block;
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
            <form id="w" method="POST" action="../../Plugin/categorias.php">
<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                <button type="submit" class="btn btn-outline-primary" name="Fecha"><svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg></button>
            </form>
            <form id="w" method="POST" action="../../Plugin/pdf_categoria.php">
<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                <button type="submit" class="btn btn-outline-primary" ><svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg></button>
            </form>

</div>

 <br> 
<div class="mx-1 p-2" style=" border-radius: 5px;">
   <table class="table table-responsive table-striped" id="example" style=" width: 100%">
    <thead>
         <tr id="tr">
                     <th style=" width: 10%">Categoria</th>
                     <th style=" width: 10%">Código</th>
                     <th style=" width: 10%">Cod. de Catálogo</th>
                     <th style=" width: 100%;padding-left:3%">Descripción Completa</th>
                     <th style=" width: 100%">U/M</th>
                     <th style=" width: 100%">Cantidad</th>
                     <th style=" width: 100%">Costo Unitario</th>
                     <th style=" width: 100%">Fecha Registro</th> 
                     </tr>
                     <tr>
                     <td align="center" id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
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
        $categoria1=$productos['categoria'];
                if ($categoria1=="") {
                    $categoria1="Sin categorias";
                
                }else{
                $categoria1=$productos['categoria'];
                }

                if ($_POST['cat']==$productos['categoria']) {?>
                     <style>
                    #td{
                        display: none;
                    }
                    #w{
                        display: block;
                    }
                </style>
                   <tr>
                <td data-label="Codigo" style="text-align: center;"><?php  echo $categoria1 ?></td>
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
</div>
  <br>
               <div  style=" border-radius: 5px;">
        <div class="row">
            <div class="col">
           <div class="mx-1 p-2" style=" border-radius: 5px;">
        
        <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form id="well" method="POST" action="../../Plugin/tproductos.php" target="_blank">
             
             <button type="submit" class="btn btn-outline-primary" name="tproductos">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="well" method="POST" action="../../Plugin/tpdf_productos.php" target="_blank">
            
             <button type="submit" class="btn btn-outline-primary mx-1" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
            <section>
            <input type="text" name="busqueda" class="form-control" style="width: 30%;" id="busqueda" placeholder="Buscar...">
        </section>
<br>
               <section id="tabla_resultado">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>     
        </div>
    </div>
</div>
</div>
            

                         
</section>
 <script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/consulta_productos.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
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
</body>
</html>