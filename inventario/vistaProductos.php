<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="log/signin.php";
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
    <link rel="stylesheet" type="text/css" href="styles/style.css"> 
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
        
            <center><h1 style="margin-top:5px">Inventario de Productos</h1></center>

<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
    $sql = "SELECT * FROM tb_productos WHERE codProductos = $id";
    $result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
?>

<form action="Controller/Actualizar.php" method="post">
  <h3 align="center">Actualizar Producto</h3>
  <section style="float: left">
        <div class="container">
                <div class="row">
                    <div class="col-6.5 col-sm-6" style="position: initial">
                        <label for="">Categoría</label><br> 
             <select  class="form-control" name="categoria" id="um" required style="background-color: #FDF6F0; cursor: s-resize">
                        <option selected disabled value="">Seleccionar</option>
                        <option value="agro">Agropecuarios y Forestales</option>
                        <option value="cuero">Cuero y Caucho</option>
                        <option value="quimicos">Químicos</option>
                        <option value="combus">Combustibles y Lubricantes</option> 
                        <option value="minNo">Minerales no Metálicos</option>
                        <option value="min">Minerales Metálicos</option>
                        <option value="repuestos">Herramientas y Repuestos</option>
                        <option value="elec">Materiales Eléctricos</option>
                      </select>
                    </div>
                    <div class="col-6.5 col-sm-6" style="position: initial">
                      <label for="">Código</label>
          <input class="form-control" disabled type="text" style="cursor: not-allowed;" name="codProducto" id="act" value="<?php  echo $productos['codProductos']; ?>">
                    </div>
                </div>
                <div class="row">

                    <div class="col-6.5 col-sm-6" style="position: initial">
                      <label for="">Codificación de Catálogo</label>
                        <input class="form-control" type="text" name="codCatalogo" id="act" value="<?php  echo $productos['catalogo']; ?>">
                    </div>
                    <div class="col-6.5 col-sm-6" style="position: initial">
                      <label for="">Nombre</label>
                       <input class="form-control" type="text" name="nombre" id="act" value="<?php  echo $productos['nombre']; ?>">
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-6.5 col-sm-6" style="position: initial">
                     <label for="">Descripción</label>
                        <textarea cols="50" rows="1" class="form-control" type="text" name="descripcion" id="act" style="width: 100%"><?php  echo $productos['descripcion']; ?></textarea>
                      
                  </div>
                  <div class="col-6.5 col-sm-6" style="position: initial">
                          <div class="form-group" >
                    <label>Unidad de medida (U/M)</label>
                    <div class="col-md-16" >
                    <div class="invalid-feedback">
                        Por favor seleccione una opción.
                      </div>
                      <select  class="form-control" name="um" id="um" style="cursor: s-resize" required>
                        <option selected disabled value="">Seleccione</option>

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
                    <div class="col-6.5 col-sm-6" style="position: initial">
                        <label for="">Cantidad</label>
                        <input class="form-control" type="text" name="stock" id="act" value="<?php  echo $productos['stock']; ?>">
                      
                  </div>
                  <div class="col-6.5 col-sm-6" style="position: initial">
                         <label for="">Costo unitario</label>
                         <input class="form-control" type="text" name="precio" id="act" value="<?php  echo $productos['precio']; ?>">
                  </div>
                </div><hr>
                <button type="submit" class ="btn btn-primary" style="background:rgb(26, 2, 92); margin-right: 1%">Guardar Cambios</button>
  <a href="vistaProductos.php" class ="btn btn-primary" style="background:rgb(146, 5, 5)">Cancelar</a>
            </div>
    

  </section>
  
</form>
<style>
  #act {
    margin-top: 0.5%;
  }
</style>
<?php 
  }
} 
?><br>
          
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
        <table class="table">
            <div class="row" >
         <?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="hospital";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
    die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";



////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{


$nombre=$_POST['xnombre'];

    if (empty($_POST['xcarrera']))
    {
        $where="where nombre like '".$nombre."%'";
    }

}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$productos="SELECT * FROM tb_productos $where";
$resAlumnos=$conexion->query($productos);

if(mysqli_num_rows($resAlumnos)==0)
{
    $mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>


        <section>
            <form method="post">
                <div class="row">
                     <a style="cursor: crosshair; margin-right: 10px;" href="regi_producto.php" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Nuevo Registro"> Nuevo Producto</a>
  <div class="col-6" style="position: initial">

                <input data-bs-toggle="tooltip" data-bs-placement="top" title="Buscar por Producto" width="50%" type="text" class="form-control" placeholder="Productos..." name="xnombre"/>
            </div>
                <button name="buscar" type="submit" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Buscar">Buscar</button>
            
            </div>
            </form>
            <table class="table">
                
                   <thead>
              <tr id="tr">
                    <th>
                        Código
                    </th>
                    <th>
                        Codificación de catálogo
                    </th>
                    <th>
                        Nombre de Producto
                    </th>
                    <th style="width: 25%;">
                        Descripción Completa</th>
                    <th>
                       
                        Unidad De Medida
                    </th>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Costo Unitario
                    </th>
                    <th>Editar
                    </th> 
                    <th> Eliminar
                    </th>
                </tr>
                <tr>
                  <td id="td" colspan="9">
                    <h4>No se encontraron resultados 😥</h4></td>
            </tr>
            </thead>
            <tbody>


                <?php

                while ($productos = $resAlumnos->fetch_array(MYSQLI_BOTH)){?>
<style type="text/css">

     #td{
        display: none;
    }
   
</style>
                      <tr>
      <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td data-label="Nombre"><?php  echo $productos['nombre']; ?></td>
      <td data-label="Descripción Completa"><textarea style="background:transparent; border: none; width: 100%;color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
      <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
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