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
    <title>Productos</title>
</head>
<body>
    <div class="container">
      <table class="table">
        <h1 style="margin-top:5px">Inventario de Productos</h1>

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
    <label for="">Categoría</label><br>
    <label for="">Código</label><br>
    <label for="">Codificación de Catálogo</label><br>
    <label for="">Nombre</label><br>
    <label for="">Descripción</label><br>
    <label for="">Unidad de medida (u/m)</label><br>
    <label for="">Cantidad</label><br>
    <label for="">Costo unitario</label><br>
  </section>

  <section>
    <input type="text" name="categoria"  value=""><br>
    <input type="text" name="codProducto" id="act" value="<?php  echo $productos['codProductos']; ?>"><br>
    <input type="text" name="codCatalogo" id="act" value="<?php  echo $productos['catalogo']; ?>"><br>
    <input type="text" name="nombre" id="act" value="<?php  echo $productos['nombre']; ?>"><br>
    <textarea type="text" name="descripcion" id="act" style="width: 21%"><?php  echo $productos['descripcion']; ?></textarea><br>
    <input type="text" name="um" id="act" value="<?php  echo $productos['unidad_medida']; ?>"><br>
    <input type="text" name="stock" id="act" value="<?php  echo $productos['stock']; ?>"><br>
    <input type="text" name="precio" id="act" value="<?php  echo $productos['precio']; ?>">
  </section>
  <button type="submit" class ="btn btn-primary" style="background:rgb(26, 2, 92); margin-right: 1%">Guardar Cambios</button>
  <a href="vistaProductos.php"><button type="button" class ="btn btn-primary" style="background:rgb(146, 5, 5)"">Cancelar</button></a>
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
          <a id="ver" class="btn btn-lg" href="regi_producto.php">Nuevo Producto</a>
          <a id="ver" class="btn btn-lg" href="regi_producto.php" style=" background: rgb(5, 114, 5); ">Buscar Producto</a>
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

    <div class="container">
        <table class="table">
            <center><h1 style="margin-top:5px">Inventario de Productos</h1></center>

            <thead>
              <tr id="tr">
                    <th>
                        Código
                    </th>
                    <th>
                        Codificación de catálogo
                    </th>
                    <th>
                        Nombre
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
                  <td id="td" colspan="8">
                    <h4>No se encontraron resultados 😥</h4></td>
            </tr>
            </thead>
            <tbody>

<?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos WHERE fecha_registro";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
?>

<style type="text/css">

     #td{
        display: none;
    }
   
</style>

      <tr>
      <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td data-label="Nombre"><?php  echo $productos['nombre']; ?></td>
      <td data-label="Descripción Completa" style="width: 100%;"><textarea cols="10" rows="3" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
      <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
      <td data-label="Editar">
        <form style="margin: 0%; background: transparent;" method='POST' action="vistaProductos.php">             
          <input type='hidden' name='id' value="<?php  echo $productos['codProductos']; ?>">             
          <button name='editar' class='btn btn-info btn-sm'  >Editar</button>             
        </form>  
      </td>

      <td data-label="Eliminar">
        <form style="margin: 0%; background: transparent;" onsubmit=\"return confirm('¿Realmente desea eliminar el registro?');\" method='POST' action="">             
          <input type='hidden' name='id' value="<?php  echo $productos['codProductos']; ?>">             
          <button name='eliminar' class='btn btn-danger btn-sm'>Eliminar</button>             
        </form> 
      </td>
    </tr>

<?php } ?> 


            </tbody>
        </table>

    </div>

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

</body>
</html>