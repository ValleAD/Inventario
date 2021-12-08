
<?php
    $id = $_GET['id'];
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos WHERE  codProductos='$id' " ;
    $result = mysqli_query($conn, $sql);
   // $productos = $result->fetch_array(MYSQLI_ASSOC);
    while ($productos = mysqli_fetch_array($result))
{
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
     integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <title>Productos</title>
    
</head>
<body>
    <style type="text/css">
        input{
            text-align: center;
        }
        option{
            text-align: center;
        }
    </style>
    <div class=" container table-responsive ">
        <h2 class="text-center mg-t">Actualizacion de Productos</h2>
        
        <form style="height:30%" action="Actualizar.php" method="POST">
            <div class="container">


<div style="padding-top:0%">


   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
      <div class=""><strong>Codificación de Productos</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="codProducto" value="<?php  echo $productos['codProductos']; ?>">
    </div>

<div class="container">
  <div class="row">
    <div class="col">
      <div class=""><strong>Codificación de catálogo</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="codCatalogo" value="<?php  echo $productos['catalogo']; ?>">
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Nombre</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="nombre" value="<?php  echo $productos['nombre']; ?>">
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
        <div class=""><strong>Descripción Completa</strong></div>

    </div>
    <div class="col">
      <input  class="form-control" name="descripcion" value="<?php  echo $productos['Descripcion']; ?>">

    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>U/M</strong></div>
    </div>
    <div class="col">
          <div class="form-group" >
               <div class="col-md-16" >
               <div class="invalid-feedback">
                  Por favor seleccione una opción.
                </div>
                <select  class="form-control" name="um" id="um" required>
                  <option value="<?php  echo $productos['unidad_medida']; ?>">U</option>
                  <option value="<?php  echo $productos['unidad_medida']; ?>">M</option>
                </select>
              </div>
            </div>
    </div>
   
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Cantidad</strong></div>
    </div>
    <div class="col">
<input class="form-control" name="stock"  value="<?php  echo $productos['stock']; ?>">
    </div>
   
  </div>
</div><br>
<div class="container">
    <div class="row">
    <div class="col">
      <div class=""><strong>Precio</strong></div>
    </div>

    <div class="col">
      <input class="form-control" name="precio" value="$<?php  echo $productos['precio']; ?>">
    </div>
      </div>
      <div class="form-group">
      <a href="vistaProductos.php" class="btn btn-default">Regresar</a>
      <button type="submit" class="btn btn-primary text-dark">Actualizar Productos</button>
					</div>
				</div>
</div>
  </div>



            
            
            <?php } ?> 
        </table>
    </form>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
 <script src="Plugin/codigo_modal.js"></script>  
</body>
</html>
