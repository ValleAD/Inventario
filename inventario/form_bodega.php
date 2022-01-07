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
<html lang="en">
<!--Espara la version de mobile-->
<style type="text/css">
      @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    #lab{
        margin-left: 15%;

    }
    .w{
        margin-top: 5%;
    }
  #inp{
            margin-left: 10%;
    }  #inp1{
         margin-top: 2%;
          margin-left: 5%;
    }
    #btn{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
    }

form{
 margin-right: 15%;

}
</style>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Solicitud Bodega</title>
</head>
<body>

<section id="section">
<form action="form_bodega.php" method="post">
<br>
    <div class="container">
        <div class="row">
    <div class="col" style="position: initial">
     <label>¿Cuántos productos desea solicitar de la bodega?</label>
    </div>
   <div style="margin-bottom: 1%;margin-right: 1%;">
        <input id="inp" style="position: initial" class="form-control" type="number" name="cantidad" value="1"> 
      
    </div>
   <div>
        <input id="btn" class="btn btn-success" type="submit" value="Aceptar" name="aceptar"> 
    </div>
  </div>
</div>
</form>
<?php
    if(isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        for($x = 1; $x <= $cantidad; $x++){

            echo'
            <form action="form_bodega.php" method="post" style="margin-top: 2%;">
            <div class="container" style="position: initial">
                <div class="row">
                    <div style="position: initial;" class="col-6 col-sm-3">
                    <input id="inp1 "  class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">
                    </div>
                </div>
            </div>
            ';
        }
        echo'
        <input  type="submit" class="btn btn-success" value="Buscar" name="buscar" id="buscar" >
        <style>
            #buscar{
            margin-top: 1%;
            margin-left: 2.5%; 
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
    <form action="Controller/añadir_bodega.php" method="post">
        
        <div class="container" style="position: initial">
            <div class="row">
              <div  style="position: initial;"  class="col-6.5 col-sm-4">
                <label id="inp1">Departamento que solicita</label>   
                <input id="inp1" class="form-control" type="text" name="departamento" required>
            </div>
            <div style="position: initial;" class="w col-6.5 col-sm-4">
                <label id="inp1" >O. DE .T N°</label>   
                <input id="inp1" class="form-control" type="number" name="odt" required>
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
               <td><input type="number"  class="form-control"  name="cant[]" values = "<?php  echo $productos['stock']; ?>"></td>
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
}
?>
</section>

</body>
</html>