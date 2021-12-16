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
<?php include ('menu.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

<section>
<form action="form_vale.php" method="post">
<br>
    <div class="container">
        <div class="row">
    <div class="col">
     <label>¿Cuántos productos desea solicitar?</label>
    </div>
   <div style="margin-bottom: 1%;margin-right: 1%;">
        <input class="form-control" type="number" name="cantidad" value="1"> 
      
    </div>
   <div>
        <input class="btn btn-success" type="submit" value="Aceptar" name="aceptar"> 
    </div>
  </div>
</div>
</form>
<?php
    if(isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        for($x = 1; $x <= $cantidad; $x++){

            echo'
            <form action="form_vale.php" method="post" style="margin-top: 2%;">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-3">
                    <input class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">
                    </div>
                </div>
            </div>
            ';
        }
        echo'
        <input type="submit" class="btn btn-success" value="Buscar" name="buscar" id="buscar" >
        <style>
            #buscar{
            margin-left: 1.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #buscar:hover{
            background: rgb(9, 100, 175);
            } 
            #buscar:active{
            transform: translateY(5px);
            } 
        </style>
        </form>';
    }
?>
     
<?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){

    echo'
    <br>
    <form action="datos_vale.php" method="post">
        
        <div class="container">
            <div class="row">
              <div class="col-4 col-sm-4">
                <label>Departamento que solicita</label>   
                <input class="form-control" type="text" name="departamento" required>
            </div>
            <div class="col-4 col-sm-4">
                <label>Orden de trabajo</label>   
                <input class="form-control" type="text" name="odt" required>
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
            </tr>
              <tr>
              <center> <td id="td" colspan="5"><h4>No se encontraron ningun resutados 😥</h4></td></center> 

            </tr>';


           


    for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
    $sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";
    $result = mysqli_query($conn, $sql);

    
    while ($productos = mysqli_fetch_array($result)){ ?>    
        <style type="text/css">
        #td{
        display: none;
    }

</style>
    
            <tr>
               <td><input type="number"  class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td><input type="text"  class="form-control" readonly name="desc[]" value ="<?php  echo $productos['descripcion']; ?>"></td>
               <td><input type="text"  class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td><input type="number"  class="form-control"  name="cant[]" required></td>
               <td><input type="number"  class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
            </tr>
   
        <?php }
    }
    


    echo ' 
    </table>
    
    <input class="btn btn-lg" type="submit" value="Enviar" id="enviar" name="submits">
        <style>
            #enviar{
            margin-left: 1.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #enviar:hover{
            background: rgb(9, 100, 175);
            } 
            #enviar:active{
            transform: translateY(5px);
            } 
        </style>
    </form>';
                if (isset($_POST['submit'])) {
                $departamento = $_POST['departamento'];
                $odt = $_POST['odt'];

                $insert = "INSERT INTO tb_vale (departamento, odt) VALUES ('$departamento','$odt')";
                $query = mysqli_query($conn, $insert);

            if ($query) {
            echo "<script> alert('Su producto fue registrado correctamente');
        
            </script>
            ";
            }else {
            echo "<script> alert('UUPS!! Algo no fue mal escrito');
            location.href = 'form_vale.php';
            </script>
            ";
            }
                }
}
?>
</section>

</body>
</html>