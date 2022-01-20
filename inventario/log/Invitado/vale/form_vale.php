
<!DOCTYPE html>
<!--Es para la version de mobile-->
<style type="text/css">
    
        #a:hover{
   text-decoration: none;
   color: lawngreen;
}
 #b:hover{
   text-decoration: none;
   color:whitesmoke;
}
.children{
background:burlywood;
}

      @media (max-width: 952px){
    #section{
        margin-top: 5%;
        margin-left: 12%;
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


      }
       form{
        background: whitesmoke;

        padding: 1%;
        border-radius: 7px;
    }
    #section{
        margin-top: 5%;
        margin-left: 12%;
        width: 75%;
       }
</style>

<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" type="text/css" href="../../../styles/estilo_men.css">
   <link rel="stylesheet" type="text/css" href="../../../Plugin/bootstrap/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png">  
    <title>Vale</title>
</head>
<body style="background-image: url(../../../img/ias.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;">
 <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="fas fa-bars"></span>Menú</a>
        </div>

        <nav>
            <ul>
                <li>
                    <a id="a" href="../home.php"><span class="icon-house"></span>Inicio</a></li>
                   
                </li>
                <li class="submenu">
                    <a id="a" href="#"><span class="icon-rocket"></span>Solicitud Vale<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="solicitudes_vale.php">Mostrar</a></li>
                        <li><a id="b" href="form_vale.php">Nuevo</a></li>
                    </ul>
                </li>
                 <li class="submenu" style="float:right;">
                    <a id="a" href="#"><span class="icon-rocket"></span><i class="bi bi-person"></i> Invitado<span> <i id="bi" class="bi bi-caret-down-fill"></i></span></a>
                    <ul class="children">
                        <li><a id="b" href="../logout_invitado.php">Cerrar Session</a></li>
                        
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
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
include '../../../Model/conexion.php';
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
         <table class="table" style="margin-bottom:3%;">
        <thead>
           <tr id="tr" style="text-align: left">
                <th style="width: 12%;">Código</th>
                <th>Descripción</th>
                <th style="width: 15%;">U/M</th>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 15%;">Costo unitario</th>
            </tr>
              <tr>
              <center> <td id="td" colspan="5"><h4>No se encontraron resultados 😥</h4></td></center> 
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
               <td data-label="Codigo"><input style="background:transparent; border: none; width: 100%; color: black;"  type="number" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td data-label="Descripción"><textarea  style="background:transparent; border: none; width: 100%; color: black;" cols="10" rows="1" type="text" class="form-control" readonly name="desc[]"><?php  echo $productos['descripcion']; ?></textarea></td>
               <td data-label="Unidad De Medida"><input  style="background:transparent; border: none; width: 100%; color: black;" type="text" class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="number" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><input style="background:transparent; border: none; width: 100%; color: black;"  type="number" class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
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