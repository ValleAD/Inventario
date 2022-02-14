
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VistaProductos</title>
   
      <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
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
   
  
 
$sql = "SELECT codProductos, categoria, catalogo,  descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
?>


<form action="Controller/Actualizar.php" method="post">
  <h3 align="center">Actualizar Producto</h3>
    <div class="container" style="background: rgba(0, 0, 0, 0.6); border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%; margin-top: 2%">
                <label for="">Categoría</label><br> 
                    <select  class="form-control" name="categoria" id="categoria" style="cursor: pointer">
                        <option><?php  echo $productos['categoria']; ?></option>
                        <option>Agropecuarios y Forestales</option>
                        <option>Cuero y Caucho</option>
                        <option>Químicos</option>
                        <option>Combustibles y Lubricantes</option> 
                        <option>Minerales no Metálicos</option>
                        <option>Minerales Metálicos</option>
                        <option>Herramientas y Repuestos</option>
                        <option>Materiales Eléctricos</option>
                    </select>
            </div>
           
            <div class="col-6 col-sm-4" style="position: initial; margin-top: 2%;">
                <label for="">Código</label>
                <input class="form-control" readonly style="cursor: not-allowed;" type="text" name="codProducto" id="act" value="<?php  echo $productos['codProductos']; ?>">
            </div>
        </div> 

        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%;">
                <label for="">Codificación de Catálogo</label>
                <input class="form-control" readonly style="cursor: not-allowed;" type="text" name="codCatalogo" id="act" value="<?php  echo $productos['catalogo']; ?>">
            </div>

            
        </div>

        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%;">
                <label for="">Descripción</label>
                <textarea cols="50" rows="1" class="form-control" type="text" name="descripcion" id="act" style="width: 100%"><?php  echo $productos['descripcion']; ?></textarea>                     
            </div>

            <div class="col-6 col-sm-4" style="position: initial">
                <div class="form-group" >
                    <label>Unidad de medida (U/M)</label>
                    <div class="col-md-16" >
                        <div class="invalid-feedback">
                        Por favor seleccione una opción.
                    </div>
                    <select class="form-control" name="um" id="um" style="cursor: s-resize" required>
                        <option><?php  echo $productos['unidad_medida']; ?></option>
                        <option>c/u</option>
                        <option>lb</option>
                        <option>mts</option>
                        <option>Pgo</option> 
                        <option>Qq</option>
                        <option>cto</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%;">
                <label for="">Cantidad Actual</label>
                <input class="form-control" type="text"style="cursor: not-allowed;" readonly name="stock" id="act" value="<?php  echo $productos['SUM(stock)']; ?>">
            </div>
            <div class="col-6 col-sm-4" style="position: initial;">
                <label for="">Costo unitario</label>
                <input class="form-control" type="text" name="precio" id="act" value="<?php  echo $productos['precio']; ?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin-left: 17%; margin-bottom: 2%;">
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
</div>
    <div class="container-fluid" >
        <div class="row">
            <div  class="col-6 col-sm-4" style="position: initial;">
                <a href="buscar.php" class="btn btn-primary">Buscar Productos</a>
            </div>
    
        </div>
    </div>
<br>
    <div class="mx-5 p-2 r-5" style="background-color: white; border-radius: 5px;">
        <div class="row">
            <div class="col">
            
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
                <thead>
                     <tr id="tr">
                     <th style=" width: 20%">Código</th>
                     <th style=" width: 20%">Cod. de Catálogo</th>
                     <th style=" width: 100%">Descripción Completa</th>
                     <th style=" width: 100%">U/M</th>
                     <th style=" width: 100%">Cantidad</th>
                     <th style=" width: 100%">Costo Unitario</th>
                     <th style=" width: 100%">Fecha Registro</th>
                     <th style=" width: 100%">Editar</th>
                     <th style=" width: 100%">Eliminar</th>
                   </tr>
                </thead>
                <tbody>
<?php
    $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST['cat_buscar'])){

        $buscar_cat = $_POST['cat_buscar'];

        $sql = "SELECT * FROM tb_productos WHERE categoria = $buscar_cat";
        $result = mysqli_query($conn, $sql);
       
    }

    if(isset($_POST['cod_buscar'])){
        $buscar_cod = $_POST['cod_buscar'];

        $sql = "SELECT * FROM tb_productos WHERE codProductos = $buscar_cod";
        $result = mysqli_query($conn, $sql);
    }
?>

<?php
    while ($productos = mysqli_fetch_array($result)){
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
           <td data-label="Codigo" style="text-align: center;"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo" style="text-align: center;"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa"><textarea style="background:transparent; border: none; color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
           <td  data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
           <td  data-label="Editar">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="vistaProductos.php">             
                <input type='hidden' name='id' value="<?php  echo $productos['codProductos']; ?>">             
                <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form>  
            </td>
            <td  data-label="Eliminar">
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" href="Controller/Delete_producto.php?id=<?php  echo $productos['cod']; ?>" onclick="return confirmaion()">Eliminar</a>
            </td>
         </tr>
     
     <?php } ?> 
                </tbody>                
            </table>           
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  


    <script>
    $(document).ready(function(){
        $('#example').DataTable({
             language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "sProcessing":"Procesando...", 
            }
        });

    });
    </script>
    <script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
</body>
</html>