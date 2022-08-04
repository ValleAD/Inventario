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
?>
<?php include ('templates/menu.php') ?>
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
    #div{
        margin: 0%;
        display: none;
    }
    #ssas{
        display: none;
    }
    .well{
        display: none;
    }
    #w{
        display: none;
    }
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
   #hidden{
    margin-top: 3%;
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
  <section style="background: rgba(255, 255, 255, 0.9);margin: 4%1%1%1%;padding: 1%; border-radius: 15px;">
<h2 id="h2" class="text-center">Inventario de Productos</h2>
<br>
<form method="POST" action="" class="well hidden">
                <div class="container">
                 <div class="row">
                    <div class="col-md-3" style="position: initial;">
                        <label>Desde</label>
                     <input type="DATE" class="form-control" name="F1" required>
                    
                    </div><div class="col-md-3" style="position: initial">
                        <label class="">Hasta</label>
                     <input type="DATE" class="form-control" name="F2" required>
                    
                    </div>
                    <div  class="col-md-6 " style="position: initial;margin-top: 3.3%;">
                       <input type="submit"  class="btn btn-success" name="Fecha" value="Filtrar Fechas">
                    </div>
                </div>
            </div>
                
               
            </form>   
            <?php 
if (isset($_POST['Fecha'])){
         $f1=$_POST['F1']; 
         $f2=$_POST['F2'];?>  <br> 
         <style>
            #div{
                display: none;
            }
             #hidden{
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
         <form class="well" method="POST" action="Plugin/Fechas.php" target="_blank">
             <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                 <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="well" method="POST" action="Plugin/pdf_fecha.php" target="_blank">
            <input type="hidden" name="f1" value="<?php echo $f1 ?>">
             <input type="hidden" name="f2" value="<?php echo $f2 ?>">
             <button   style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
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



           <div class="mx-1 p-2 hidden" id="hidden" style=" border-radius: 5px;">
        
        <div style="position: initial;" class="btn-group mb-3 my-3 mx-2 " role="group" aria-label="Basic outlined example">
         <form id="well" class="well" method="POST" action="Plugin/tproductos.php" target="_blank">
             
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="tproductos">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="well" class="well" method="POST" action="Plugin/tpdf_productos.php" target="_blank">
            
             <button  style="position: initial;"type="submit" class="btn btn-outline-primary mx-1" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>     
 <a  href="unidad_medidad.php" class="btn btn-primary" id="td"  style="position: initial; float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a>
 <div class="row">   
 <div class="col-md-3"style="position: initial;">
            <section class="well" >
            <input type="number" name="busqueda" class="form-control"  id="busqueda" placeholder="Buscar...">
        </section>
    </div>
</div>
<br>    


               <section id="tabla_resultado" >
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>     
       </div>



 <form method="POST" action="" class="well" style="padding: 1%;">
                 <div class="row">
                    <div class="col-md-4 mx-2" style="position: initial">
                      <select id="hidden" class="form-control" name="cat"  required>
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
                    </div>
                    <div class="col-md-6 mx-2 " style="position: initial">
                       <button id="hidden" class="btn btn-success" name="categorias" type="submit">Exportar por Categorias</button>
                  
                    </div>
                </div>
                
               
            </form>   
            <?php 

if (isset($_POST['categorias'])){$categoria=$_POST['cat'];  ?>  <br> 
         <style>
             .hidden{
                display: none;
             }
         </style>
<div class="mx-2 p-2 r-5" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
        
         <form method="POST" action="Plugin/categorias.php" target="_blank">
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
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

 
  <table class="table  table-striped" id="div" style=" width: 100%">
    <thead>
         <tr id="tr">
                     <th style="width: 10%;">Categorias</th>
                     <th style="width: 10%;">Código</th>
                     <th style="width: 10%;">Cod. de Catálogo</th>
                     <th style="width: 50%;">Descripción Completa</th>
                     <th style="width: 10%;">U/M</th>
                     <th style="width: 10%;">Cantidad</th>
                     <th style="width: 10%;">Costo Unitario</th>
                     <th style="width: 10%;">Fecha Registro</th>
                     
                   </tr>
    </thead>
</table>
    <div id="div" style = " max-height: 442px;  overflow-y:scroll;">
        <table class="table">
    <tbody>
        <tr>
        <td id="td1" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
         <?php $categoria=$_POST['cat'];
             // code...
         
                   $sql = "SELECT * FROM tb_productos WHERE categoria='$categoria' ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                 $precio=$productos['precio'];
                 $precio1=number_format($precio, 2,".",",");
                 $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
           $categoria=$productos['categoria'];
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
        

                if ($_POST['cat']==$productos['categoria']) {?>
                    <style type="text/css">
                        #td1{
                            display: none;
                        }
                    </style>
                <td data-label="Categoría"><?php  echo $categoria ?></td>
                <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td style="width: 30%;min-width: 100%;"  data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
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

        </div>

                         
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