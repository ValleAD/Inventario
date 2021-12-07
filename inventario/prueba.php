<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

<section>
<form action="prueba.php" method="post" style="width:10%">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-3">
                <div class="container">
 <div class="row">
    <div class="col">
     <label for="">Cuantos productos desea buscar</label>
    </div>
   <center> <div class="col-xs-6" style="margin-bottom: 1%; center;">
        <input class="form-control" type="number" name="cantidad" value="1"> 
      
    </div></center>  
   <div class="col-xs-4">
        <input class="btn btn-success" type="submit" value="Aceptar" name="aceptar"> 
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
</form>
<?php
    if(isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        for($x = 1; $x <= $cantidad; $x++){

            echo'
            <form action="prueba.php" method="post" style="margin-top: 2%;">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-3">
                    <input class="form-control" type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">
                    </div>
                </div>
            </div>
            ';
        }
        echo'
        <input type="submit" value="Buscar" name="buscar" id="buscar">
        </form>';
    }
?>
     
<?php  
include 'conexion.php';
if(isset($_POST['codigo'])){

    echo'
    <br>
    <form action="datos_vale.php" method="post">
        
        <div class="container">
            <div class="row">
              <div class="col-6 col-sm-3">
                <label>Departamento</label>   
                <input class="form-control" type="text" name="depto" required>
            </div>
            <div class="col-6 col-sm-3">
                <label>Fecha</label> 
                <input class="form-control" type="date" name="fech" required>
            </div>
        </div>
        
        <br>
        
        <div class="table-responsive">
        <table class="table">
           <tr id="head">
                <td><strong>Código</strong></td>
                <td><strong>Descripción</strong></td>
                <td><strong>U/M</strong></td>
                <td><strong>Cantidad</strong></td>
                <td><strong>Costo unitario</strong></td>
            </tr>';


    for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
    
$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";
$result = mysqli_query($conn, $sql);

    
    while ($productos = mysqli_fetch_array($result)){ ?>

    
            <tr>
               <td><input type="number"  class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td><input type="text"  class="form-control" readonly name="desc[]" value ="<?php  echo $productos['Descripcion']; ?>"></td>
               <td><input type="text"  class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td><input type="number"  class="form-control"  name="cant[]" required></td>
               <td><input type="number"  class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
            </tr>
   
<?php        }
    }

    echo ' 
    </table>
    
    <input type="submit" value="Enviar">
    </form>';
}
?>
</section>

</body>
</html>