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
    <title>Productos</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
</head>
<body> 
  
<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT cod, codProductos, categoria, catalogo,  descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos1 = mysqli_fetch_array($result)){
           $precio=$productos1['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos1['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
         //$stock=round($stock);
?>


<form action="Controller/Actualizar.php" method="post">
    <div class="container py-2" style="background: rgba(255, 255, 255, 0.9); border-radius: 9px; color:#000; font-weight: bold;">
  <h3 align="center">Actualizar Producto</h3>
        <div class="row">
            <div class="col-6" style="position: initial; ">
                <label class="my-3" for="">Categoría</label><br> 
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
            </div>
           
            <div class="col-6" style="position: initial;">
                <label class="my-3" for="">Código</label>
                <input class="form-control"  type="hidden" name="cod" id="act" value="<?php  echo $productos1['cod']; ?>">
                <input class="form-control"  type="text" name="codProducto" id="act" value="<?php  echo $productos1['codProductos']; ?>">
            </div>
        </div> 

        <div class="row">
            <div class="col-6" style="position: initial;">
                <label class="my-3" for="">Codificación de Catálogo</label>
                <input class="form-control"  type="text" name="codCatalogo" id="act" value="<?php  echo $productos1['catalogo']; ?>">
            </div>

            
        </div>

        <div class="row">
            <div class="col-6" style="position: initial;">
                <label class="my-3" for="">Descripción</label>
                <textarea cols="50" rows="1" class="form-control" type="text"  name="descripcion" id="act" style="width: 100;height: 90%"><?php  echo $productos1['descripcion']; ?></textarea>                     
            </div>

            <div class="col-6 " style="position: initial">
                    <label  style="margin-bottom: -17%;">Unidad de medida (U/M)</label>
                    
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

               
            </div>
        </div>
<br>
        <div class="row">
            <div class="col-6" style="position: initial; ">
                <label class="my-5" for="">Cantidad Actual</label>
                <input style="margin-top: -7%;" class="form-control" type="decimal" step="0.1" name="stock" id="act" value="<?php echo $stock?>">
            </div>
            <div class="col-6" style="position: initial;">
                <label class="my-7" for="">Costo unitario</label>
                <input class="form-control" type="text" name="precio" id="act" value="<?php  echo $precio1 ?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-bottom: 2%;">
                <button type="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="vistaProductos.php?productos" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
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

<section style="background: rgba(255, 255, 255, 0.9);padding-bottom: 1%;margin: 3%;border-radius: 15px;">
<font color="black"><h2 class="text-center">Inventario de Productos</h2></font>
<?php if (isset($_POST['categorias'])){  ?>
<a class="btn btn-success mx-2" href="vistaProductos.php?productos">Ver Productos</a>
<?php } 
if (isset($_POST['Fecha'])){  ?>
<a class="btn btn-success mx-2" href="vistaProductos.php?productos">Ver Productos</a>
<?php } ?>
<form method="POST" action="vistaProductos.php" style="margin-left: 2%;">
                 <div class="row">
                    <div class="col-5" style="position: initial;">
                        <label>Desde</label>
                     <input type="DATE" class="form-control" name="F1" required>
                    
                    </div><div class="col-5" style="position: initial">
                        <label>Hasta</label>
                     <input type="DATE" class="form-control" name="F2" required>
                    
                    </div>
                    <div class="col-md-2" style="position: initial; margin-top: auto;">
                       <button class="btn btn-success" name="Fecha" type="submit">Filtrar Fechas</button>
                    </div>
                </div>
            </form> 

 

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
                    #w{
                        display: none;
                    }
                </style>
                <div  class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form id="w" method="POST" action="Plugin/Fechas.php" target="_blank"> 
                <input type="hidden" name="f1" value="<?php echo $f1 ?>">
                <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                <button type="submit" class="btn btn-outline-primary" name="Fecha"><i class="bi bi-printer"></i></button>
            </form>
            <form id="w" method="POST" action="Plugin/pdf_fecha.php" target="_blank">
                <input type="hidden" name="f1" value="<?php echo $f1 ?>">
                <input type="hidden" name="f2" value="<?php echo $f2 ?>">
                <button type="submit" class="btn btn-outline-primary" name="pdf"><i class="bi bi-file-pdf-fill"></i></button>
            </form>

</div>

                <table class="table table-responsive table-striped"  style=" width: 100%">
                    
    <thead>
         <tr id="tr">
                     <th style="width:10%">Código</th>
                     <th style="width:10%">Cod. de Catálogo</th>
                     <th style=" width: 100%; padding-left:3%">Descripción Completa</th>
                     <th style="width:10%">U/M</th>
                     <th style="width:10%">Cantidad</th>
                     <th style="width:10%">Costo Unitario</th>
                     <th style="width:10%">Fecha Registro</th>
                     
                   </tr>
                   <tr> <td align="center" id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td></tr>
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


  <br>
</div>
    <div class="mx-1 p-2" style=" border-radius: 5px;">
        
           <a href="unidad_medidad.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a><br>
                 <style> p{
                    display: none;
                 }</style>
                    <section>
            <input type="text" name="busqueda" class="form-control" style="width: 30%;" id="busqueda" placeholder="Buscar...">
        </section>

        <section id="tabla_resultado" style="position: initial">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>        
        </div>
        <form method="POST" action="vistaProductos.php" class=" my-3 mx-3">  
               <div class="row">
                    <div class="col-10" style="position: initial">
                      <select class="form-control" name="cat"  required>
                    <option selected disabled value="">Seleccione</option>
                <?php  $sql = "SELECT * FROM tb_productos GROUP BY categoria ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                echo "<option>".$productos['categoria']."</option>";

            }
         ?></select>
                    </div>
                    <div class="col-md-2 my-2" style="position: initial">
                       <button class="btn btn-success" name="categorias" type="submit">Exportar por Categorias</button>
                  
                    </div>
                </div>
               
                
               
            </form> 
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
            <form id="w" method="POST" action="Plugin/categorias.php" target="_blank">
<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                <button type="submit" class="btn btn-outline-primary" name="Fecha"><i class="bi bi-printer"></i></button>
            </form>
            <form id="w" method="POST" action="Plugin/pdf_categoria.php" target="_blank">
<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
<input type="hidden" name="categoria[]" value="<?php echo $categoria?>">
                <button type="submit" class="btn btn-outline-primary" name="pdf"><i class="bi bi-file-pdf-fill"></i></button>
            </form>

</div>

 <br> 
<div class="mx-1 p-2" style="background-color: white;  border-radius: 5px;">
   <table class="table table-responsive table-striped"  style=" width: 100%">
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
            </section>       
</body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.js"></script>
 

    <script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?                                                                                                                   NOTA:                                                                            El Producto que tenga la cantidad igual a 0 sera eliminado ")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
<script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : 'Buscador_ajax/consulta.php',
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