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
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" > 
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
  <body>

    <div class="container">
        <table class="table">
            <caption style="margin-top:5px">Inventario de Productos</caption>
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
                    <th>
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
                    <th>
                        Acciones
                    </th>
                </tr>
                <tr>
                  <td id="td" colspan="8">
                    <h4>No se encontraron nigun  resutados 😥</h4></td>
            </tr>
            </thead>
            <tbody>
                    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos WHERE codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
                <tr>
                    <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
                    <td data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
                    <td data-label="Nombre"><?php  echo $productos['nombre']; ?></td>
                    <td data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
                    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
                    <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
                    <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
                    <td data-label="Acciones">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="text-primary"><i class="far fa-edit"></i></a>
                    <a data-toggle="modal" data-target="#delete"  class="btn btn-danger" class="text-danger"> <i class="fas fa-trash"></i> </a></td>
                </tr>
                <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: hsl(100% , 50% , 1 );color: #FDF6F0;  background-image: linear-gradient(90deg, rgb(5, 114, 72), rgb(42, 136, 136));">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Información</h5>
        <button type="button" class="close" style="width: 15%;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="form" action="Controller/Actualizar.php?id=<?php  echo $productos['codProductos']; ?>" method="POST">
      <div class="modal-body">
         <div class="row">
   <input type="hidden"class="form-control" name="codProducto" value="<?php  echo $productos['codProductos']; ?>" style="background-color:rgba(102,255,255,4.5)"><br>

<div class="container">
  <div class="row">
    <div class="col">
      <div class=""><strong>Codificación de catálogo</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="codCatalogo" value="<?php  echo $productos['catalogo']; ?>"style="background-color: #FDF6F0"><br>
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Nombre</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="nombre" value="<?php  echo $productos['nombre']; ?>"style="background-color: #FDF6F0"><br>
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
        <div class=""><strong>Descripción Completa</strong></div>

    </div>
    <div class="col">
<div class="form-floating">
              <textarea id="content" class="form-control"name="descripcion" placeholder="Ingrese la Descripción" id="floatingTextarea"><?php  echo $productos['descripcion']; ?></textarea>
            </div>
            <style>
textarea{
  width: 100%;
  min-height: 50px;
  font-family: Arial, sans-serif;
  font-size: 13px;
  color: #444;
  padding: 5px;
}
.noscroll{
  overflow: hidden;
  resize: none;
}
.hiddendiv{
  display: none;
  white-space: pre-wrap;
  width: 500px;
  min-height: 50px;
  font-family: Arial, sans-serif;
  font-size: 13px;
  padding: 5px;
  word-wrap: break-word;
}
.lbr {
  line-height: 3px;
}
</style>
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Unidad de Medida(U/M)</strong></div>
    </div>
    <div class="col">
          <div class="col-md-16" >
        <div class="invalid-feedback">
          Por favor seleccione una opción.
           </div>
              <select  class="form-control" name="um" id="um" required style="background-color: #FDF6F0">
                <option selected disabled value="">seleccione una opción</option>
                        <option>C/U - Codigo Unico</option>
                        <option>Lb - Libra</option>
                        <option>Mts - Metros</option>
                        <option>Pgo - Pliego</option> 
                        <option>Qq - Quintal</option>
                        <option>Cto - Ciento</option>
              </select>
                      
            </div>
    </div>
   
  </div>
</div><br><br><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Cantidad</strong></div>
    </div>
    <div class="col">
<input class="form-control" name="stock"  value="<?php  echo $productos['stock']; ?>"style="background-color: #FDF6F0"><br><br>
    </div>
   
  </div>
</div><br>
<div class="container">
    <div class="row">
    <div class="col">
      <div class=""><strong>Precio</strong></div>
    </div>

    <div class="col">
      <input class="form-control" name="precio" value="<?php  echo $productos['precio']; ?>"style="background-color: #FDF6F0"><br>
                  </div>
            </div>
        </div>
    </div>
  </div>
  <center>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal"  style="margin-right: 15%;">Cancelar</button>
        <button name="" type="submit" id="Update" class="btn btn-info">Actualizar</button>
      
      </div>  </center>
        </form>
    </div>
  </div>
</div>


<!--***************************************************************************************************************************-->
<!-- Delete -->
<div class="modal fade" id="delete" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"  style="background-color: hsl(100% , 50% , 1 );color: #FDF6F0;  background-image: linear-gradient(90deg, rgb(5, 114, 72), rgb(42, 136, 136));">
            <div class="modal-header">
                <h5 class="modal-title" >Eliminar Productos</h5>
                <button type="button"  class="close"   style="width: 15%;"data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            
     
           
      <div class="modal-body">
           <form action="Controller/Delete_producto.php" method="POST">
         <h3 class="text-center">Este Producto será Eliminado Permanentemente</h3>
   <input type="hidden"class="form-control" name="id" value="<?php  echo $productos['codProductos']; ?>" style="background-color:rgba(102,255,255,4.5)"><br>

      
        
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal" style="margin-right: 15%;">Cancelar</button>
        <button name="" type="submit" id="Update" class="btn btn-danger">Eliminar</button>
      </div>
           </form>
        </div>
    </div>
</div>
</div>
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
</body>
</html>