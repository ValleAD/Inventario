<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  

    <title>Productos</title>
</head>
<body>
    <div class="container">
      <table class="table">
        
           <h1 style="margin-top:5px; text-align: center;">Inventario de Productos</h1>

<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT codProductos, categoria, catalogo, nombre, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$id'";
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

            <div class="col-6 col-sm-4" style="position: initial">
                <label for="">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="act" value="<?php  echo $productos['nombre']; ?>">
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
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial;">
                <a  href="regi_producto.php" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Nuevo Registro"> Nuevo Producto</a>
                <a href="buscar.php" class="btn btn-primary">Buscar Productos</a>
            </div>
    
        </div>
    </div>
<br>
    <div class="container">
       <div class="row" >
       <table class="table">
            <thead>
              <tr id="tr">
                <th style="width: 175%;">Categoría</th>
                <th>Código</th>
                <th style="width: 135%;">Cod. de Catálogo</th>
                <th style="width: 200%;">Nombre</th>
                <th style="width: 225%;">Descripción Completa</th>
                <th>U/M</th>
                <th style="width: 115%;">Cantidad</th>
                <th>Costo Unitario</th>
                <th style="width: 145%;">Fecha Registro</th>
                <th>Editar</th>
                <th style="width: 125%;">Eliminar</th>
              </tr>

              <tr>

 <?php
    include 'Model/conexion.php';


    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT codProductos, categoria, catalogo, nombre, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){?>

       
                <td id="td" colspan="9">
                <h4 align="center">No se encontraron resultados 😥</h4></td>
              </tr>
            </thead>

            <tbody>


<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr id="tr">
    <td data-label="Categoría"><?php  echo $productos['categoria']; ?></td>
      <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td data-label="Nombre"><?php  echo $productos['nombre']; ?></td>
      <td data-label="Descripción Completa"><textarea style="background:transparent; border: none; color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
      <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['SUM(stock)']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
      <td data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
      <td data-label="Editar">
        <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="vistaProductos.php">             
          <input type='hidden' name='id' value="<?php  echo $productos['codProductos']; ?>">             
          <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>  
      </td>

      <td data-label="Eliminar">
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" href="Controller/Delete_producto.php?id=<?php  echo $productos['codProductos']; ?>" onclick="return confirmaion()">Eliminar</a>
      </td>
    </tr>

<?php } ?> 

            </tbody>
        </table>
    </div>
</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
$(function(){
    var textArea = $('#content'),
    hiddenDiv = $(document.createElement('div')),
    content = null;
    
    textArea.addClass('noscroll');
    hiddenDiv.addClass('hiddendiv');
    
    $(textArea).after(hiddenDiv);
    
    textArea.on('keyup', function(){
        content = $(this).val();
        content = content.replace(/\n/g, '<br>');
        hiddenDiv.html(content + '<br class="lbr">');
        $(this).css('height', hiddenDiv.height());
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
let linkDelete =document.querySelectorAll("delete");
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>