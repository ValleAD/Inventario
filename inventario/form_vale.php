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
<!--Es para la version de mobile-->
<style type="text/css">
      @media (max-width: 952px){
    #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    #lab{
        margin-left: 5%;

    }
    .w{
        margin-top: 5%;
    }
    #inp{
            margin-left: 10%;
    }  #inp1{
         margin-top: 2%;
          margin-left: 5%;
    }  #buscar{
         margin-top: 2%;
          margin-left: 25%;
          margin-bottom: 25%;
    }
    #btn{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
    }
    #buscar{
        margin-top: 5%;
        margin-left: 35%;
        margin-bottom: 15%;
        background: whitesmoke;
    }
form{
 margin-right: 15%;

}
      }
</style>

<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css"> 
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

<section id="section">
<form action="form_vale.php" method="post">
<br>
 <div class="container">
        <div class="row">
    <div class="col" style="position: initial">
     <label>¿Cuántos productos desea solicitar en VALE?</label>
    </div>
   <div style="margin-bottom: 1%;margin-right: 1%;">
        <input id="inp" style="position: initial;" class="form-control" type="number" name="cantidad" value="1"> 
      
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
            <form action="form_vale.php" method="post" style="margin-top: 2%;">
            <div class="container" style="position: initial">
                <div class="row">
                    <div class="col-6.5 col-sm-4" style="position: initial">
                    <input  id="inp1" class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">
                    </div>
                </div>
            </div>
            ';
        }
        echo'
        <input   type="submit" class=" btn btn-success" value="Buscar" name="buscar" id="buscar" >
        <style>
            #buscar{
            margin-bottom: 5%;
            margin-left: 2.5%;
            margin-top: 0.5%; 
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
    <form action="Controller/añadir_vale.php" method="post">
        
        <div class="container" style="position: initial">
            <div class="row">
              <div class="col-6.5 col-sm-4" style="position: initial">
                <label id="inp1">Departamento que solicita</label>   
                <input id="inp1" class="form-control" type="text" name="departamento" required>
            </div>
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Vale N°</label>   
                <input id="inp1"class="form-control" type="number" name="numero_vale" required>
            </div>
        </div>
        <br>
          <div class="container">
        <table class="table" style="color:black;">
        <thead>
           <tr id="tr">
                <th style="width: 12%;"><strong>Código</strong></th>
                <th><strong>Descripción</strong></th>
                <th style="width: 15%;"><strong>U/M</strong></th>
                <th style="width: 15%;"><strong>Cantidad</strong></th>
                <th style="width: 15%;"><strong>Costo unitario</strong></th>
            </tr>
              <tr>
              <center> <td id="td" colspan="5"><h4>No se encontraron ningun resutados 😥</h4></td></center> 

            </tr>
            </thead>
            <tbody>';


           


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
               <td data-label="Codigo"><input type="number" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td data-label="Descripción"><textarea cols="10" rows="1" type="text" class="form-control" readonly name="desc[]"><?php  echo $productos['descripcion']; ?></textarea></td>
               <td data-label="Unidad De Medida"><input type="text" class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td data-label="Cantidad"><input type="number" class="form-control"  name="cant[]" values = "<?php  echo $productos['stock']; ?>"></td>
               <td data-label="Precio"><input type="number" class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
            </tr>
   
        <?php }
    }
    


    echo ' 
   </tbody>
        </table>

    </div>
    
    <input class="btn btn-lg" type="submit" value="Enviar" id="enviar">
        <style>
            #enviar{
                margin-bottom: 5%;
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