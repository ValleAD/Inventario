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
  <section  style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2 id="h2" class="text-center">Inventario de Productos</h2>
<br>
<?php include('Buscador_ajax/fecha.php') ?>



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
            <input type="number" name="busqueda" class="form-control"  id="busqueda" placeholder="Buscar Codigo del Producto">
        </section>
    </div>
</div>
<br>    


               <section id="tabla_resultado" >
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>     
       </div>


<?php include('Buscador_ajax/categoria.php') ?>

                         
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