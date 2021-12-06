<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
                <?php
    $id = $_GET['id'];
    include 'conexion.php';
    $sql = "SELECT * FROM tb_productos WHERE  codProductos='$id' " ;
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result))
{
?>
<div style="padding-top: 4%">
<input type="hidden"   class="form-control" name="id" value="<?php  echo $productos['codProductos']; ?> ">

   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
      <div class=""><strong>Codificación de catálogo</strong></div>
    </div>
    <div class="col">
       <input  class="form-control" name="codct" value="<?php  echo $productos['catalogo']; ?>">
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
       <div class=""><strong>Nombre</strong></div>
    </div>
    <div class="col">
       <input  class="form-control"name="nom" value="<?php  echo $productos['nombre']; ?>">
    </div>
   
  </div>
</div><br>
<div class="container">
  <div class="row">
    <div class="col">
        <div class=""><strong>Descripción Completa</strong></div>

    </div>
    <div class="col">
      <input  class="form-control" name="desc" value="<?php  echo $productos['Descripcion']; ?>">

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
<input class="form-control" name="cant"  value="<?php  echo $productos['stock']; ?>">
    </div>
   
  </div>
</div><br>
<div class="container">
    <div class="row">
    <div class="col">
      <div class=""><strong>Costo unitario</strong></div>
    </div>

    <div class="col">
      <input class="form-control" name="cant_uni" value="$<?php  echo $productos['precio']; ?>">
    </div>
      </div>
</div>
            <center><button style="margin-bottom:3%;margin-top: 5%;" type="submit" class="btn btn-primary text-dark">Actualizar Productos</button></center> 
               
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
 <script src="codigo_modal.js"></script>  
</body>
</html>
