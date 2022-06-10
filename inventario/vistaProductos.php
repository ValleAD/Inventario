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
</head>
<body> 
  <style>
 @media (max-width: 952px){
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

<br><br><br>
<form action="Controller/Actualizar.php" method="post">
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
                <input class="form-control" type="text" name="precio" id="act" value="<?php  echo $precio1 ?>">
    </div>
    <div class="col-md-6" style="position: initial; margin-top: 2%">
         <label>Código</label>
        <input class="form-control"  type="hidden" name="cod"  value="<?php  echo $productos1['cod']; ?>">
        <input class="form-control"  type="text" name="codProducto" id="act" value="<?php  echo $productos1['codProductos']; ?>">
        <label class="my-2">Descripción</label>
                <textarea rows="1" class="form-control" type="text"  name="descripcion"><?php  echo $productos1['descripcion']; ?></textarea>
                <label class="my-2">Cantidad Actual</label>
                <input class="form-control" type="decimal" step="0.1" name="stock" id="act" value="<?php echo $stock?>">
                <label class="my-2">Costo unitario</label>
                <input class="form-control" type="text" name="precio" id="act" value="<?php  echo $precio1 ?>">
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
  <section style="background: rgba(255, 255, 255, 0.9);margin: 5%2%2%2%; border-radius: 15px;">
<h2 id="h2" class="text-center">Inventario de Productos</h2>
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
         <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
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
<a  href="unidad_medidad.php" class="btn btn-primary"  style="position: initial; float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a>

           <div class="mx-1 p-2" style=" border-radius: 5px;">
        
        <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form id="well" method="POST" action="Plugin/tproductos.php" target="_blank">
             
             <button type="submit" class="btn btn-outline-primary" name="tproductos">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="well" method="POST" action="Plugin/tpdf_productos.php" target="_blank">
            
             <button type="submit" class="btn btn-outline-primary mx-1" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
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


 <form method="POST" action="">
                 <div class="row">
                    <div class="col-md-4 mx-2" style="position: initial">
                      <select class="form-control" name="cat" id="w" required>
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
                    <div class="col-md-6 mx-2 my-2" style="position: initial">
                       <button id="cat" class="btn btn-success" name="categorias" type="submit">Exportar por Categorias</button>
                  
                    </div>
                </div>
                
               
            </form>   
            <?php 

if (isset($_POST['categorias'])){$categoria=$_POST['cat'];  ?>  <br> 
<div class="mx-2 p-2 r-5" style="background-color: transparent; border-radius: 5px;">
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
                   
        
         <form method="POST" action="Plugin/categorias.php" target="_blank">
              <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
             <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/pdf_categoria.php" target="_blank">
            <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button style="position: initial;"  type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
 <div class="mx-2">
                <table class="table  table-striped" id="example1" style=" width: 100%">
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
         <?php $categoria=$_POST['cat'];
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
                   <tr>
                <td data-label="Categoría"><?php  echo $categoria1 ?></td>
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
  
            </div>

        <br>

                         
</section>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#busqueda').load('Buscador_ajax/consulta.php');
    });
</script>

    <script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?                                                                                                                   NOTA:                                                                            El Producto que tenga la cantidad igual a 0.00 sera eliminado ")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>

</body>
</html>