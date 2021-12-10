<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="Plugin/bootstrap-5.1.3-dist/css/bootstrap.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

      <link rel="stylesheet" href="bootstap-icon/fontawesome.all.min.css">
      <link rel="stylesheet" type="text/css" href="sweetalert2/sweetalert2.min.css">
    <title>Productos</title>
</head>
<!--######################################################################################################################################-->
 <style type="text/css">
   #form{
    background: transparent;
    margin: 0;
    padding: 0;
   }
 </style>

<body>
<!--######################################################################################################################################-->
    <div class=" container table-responsive ">
        <h2 class="text-center mg-t" style="color: #fff; margin-top: 2%;">Inventario de productos</h2>
        <table class="table table-dark table-hover table-bordered " style="vertical-align: bottom;">
            <tr>
                <a href="regi_producto.php" class="text btn btn-info "><i class="bi bi-file-earmark-plus-fill"></i> <span>Nuevo Producto</span> </a><br>
                <td class="table-info text-dark"><strong>Código</strong></td>
                <td class="table-info text-dark"><strong>Codificación de catálogo</strong></td>
                <td class="table-info text-dark"><strong>Nombre</strong></td>
                <td class="table-info text-dark"><strong>Descripción Completa</strong></td>
                <td class="table-info text-dark"><strong>U/M</strong></td>
                <td class="table-info text-dark"><strong>Cantidad</strong></td>
                <td class="table-info text-dark"><strong>Costo unitario</strong></td>
                <td  class="table-info text-dark"><strong>Accion</strong></td>
                
            </tr>
<?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result))
{
?>
            <tr >
               <td class="delete"><?php  echo $productos['codProductos']; ?></td>
               <td class="delete"><?php  echo $productos['catalogo']; ?></td>
               <td class="delete"><?php  echo $productos['nombre']; ?></td>
               <td class="delete"><?php  echo $productos['Descripcion']; ?></td>
               <td class="delete"><?php  echo $productos['unidad_medida']; ?></td>
               <td class="delete"><?php  echo $productos['stock']; ?></td>
               <td class="delete">$<?php  echo $productos['precio']; ?></td>
  <!--Botones para actualizar y eliminar-->
               <td><a class="btn btn-primary swal2-styled.swal2-confirm" data-toggle="modal" data-target="#exampleModal" class="text-primary"><i class="far fa-edit"></i></a> 
              
        
               <a id="delete" onclick="confirmaion()" href="Controller/Delete_producto.php?id=<?php  echo $productos['codProductos']; ?>" class="btn btn-danger" class="text-danger"> <i class="fas fa-trash"></i> </a></td>
            </tr>

             <script type="text/javascript">
  
function confirmaion(e) {

  if (confirm("¿Esras seguro que deseas Eliminar este Producto?")) {
        e.preventDefault();
    return true;
  } else {
     e.preventDefault();
    return false;
  }
}

</script>

    
<!--######################################################################################################################################-->

            <div  class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: hsla( 0.75turn , 100% , 50% , 0.5 );color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="form" action="Actualizar.php?id=<?php  echo $productos['codProductos']; ?>" method="POST">
      <div class="modal-body">
         <div class="row">
   <input type="hidden"class="form-control" name="codProducto" value="<?php  echo $productos['codProductos']; ?>" style="background-color:rgba(102,255,255,4.5)"><br>

<div class="container">
  <div class="row">
    <div class="col">
      <div class=""><strong>Codificación de catálogo</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="codCatalogo" value="<?php  echo $productos['catalogo']; ?>"style="background-color:rgba(102,255,255,4.5)"><br>
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Nombre</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="nombre" value="<?php  echo $productos['nombre']; ?>"style="background-color:rgba(102,255,255,4.5)"><br>
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
        <div class=""><strong>Descripción Completa</strong></div>

    </div>
    <div class="col">
      <input  class="form-control" name="descripcion" value="<?php  echo $productos['Descripcion']; ?>"style="background-color:rgba(102,255,255,4.5)"><br>

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
              <select  class="form-control" name="um" id="um" required style="background-color:rgba(102,255,255,4.5)">
                <option selected disabled value="">seleccione una opción</option>
                <option value="U">U</option>
                <option value="M">M</option>
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
<input class="form-control" name="stock"  value="<?php  echo $productos['stock']; ?>"style="background-color:rgba(102,255,255,4.5)"><br><br>
    </div>
   
  </div>
</div><br>
<div class="container">
    <div class="row">
    <div class="col">
      <div class=""><strong>Precio</strong></div>
    </div>

    <div class="col">
      <input class="form-control" name="precio" value="<?php  echo $productos['precio']; ?>"style="background-color:rgba(102,255,255,4.5)"><br>
                  </div>
            </div>
        </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="" type="submit" id="Update" class="btn btn-primary">Actualizar</button>
      </div>
        </form>
    </div>
  </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">    
                <p class="text-center">Are you sure you want to Delete</p>
                <input type="text" name="id" id="delete_id">
                <h2 class="text-center fullname"></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="button" class="btn btn-danger id"><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
        </div>
    </div>
</div>
 <?php } ?> 
           
        </table>
    </div>



<!--######################################################################################################################################-->


   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
 <script src="codigo_modal.js"></script>  
 <script type="text/javascript" src="Plugin/jquery/comfirmacion.js"></script>
  <script src="sweetalert2/sweetalert2.min.js"></script> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="Plugin/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="Plugin/bootstrap-5.1.3-dist/js/bootstrap.js"></script>


</body>
</html>
