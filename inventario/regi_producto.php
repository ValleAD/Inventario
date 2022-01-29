<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        
         window.location ="../log/signin.php";
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
    @media (min-width: 1080px){
         #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 70%;

       }

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
<form action="regi_producto.php" method="post">
<br>
 <div class="container">
        <div class="row">
    <div class="col" style="position: initial">
     <label>¿Cuántos productos desea Registrar?</label>
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
            <form action="regi_producto.php" method="post" style="margin-top: 2%;">
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
    <form action="Controller/añadir.php" method="post">
        

          <div class="container">
            <h2 align="center">Registro de Productos</h2>
        ';


           


    for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
   //$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";


   $sql = "SELECT codProductos,categoria, catalogo, nombre, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE  codProductos = '$codigo'";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){ ?>    
        <style type="text/css">
        #td{
        display: none;
    }

</style> 

<table class="table" style="margin-bottom:3%;">
        <thead>
           <tr id="tr" style="text-align: center;">
                <th  style="width: 20%;">Código</th>
               <td data-label="Codigo"> <input class="form-control" readonly style="cursor: not-allowed;" type="text" name="cod[]" id="act" value="<?php  echo $codigo ?>"></td>
            </tr>
            <tr  style="text-align: center;">
                <th  style="width: 20%;">Categoria</th>
               <td data-label="Codigo">  
                <select  class="form-control" name="categoria" id="categoria" style="cursor: pointer">
                        <option><?php  echo $productos['categoria']; ?></option>
                        <option>Agropecuarios y Forestales</option>
                        <option>Cuero y Caucho</option>
                        <option>Químicos</option>
                        <option>Combustibles y Lubricantes</option> 
                        <option>Minerales no Metálicos</option>
                        <option>Minerales Metálicos</option>
                        <option>Herramientas y Repuestos</option>
                        <option>Materiales Eléctricos</option>
                    </select></td>
            </tr>
            <tr  style="text-align: center;">
                <th style="width: 17%;">Catalogo</th>
                <td data-label="Codigo"><input   style=" width: 100%; "  type="number" class="form-control"  name="catal[]" value ="<?php  echo $productos['catalogo']; ?>"></td>
            </tr><tr  style="text-align: center;">
                <th style="width: 17%;">Nombre</th>
                <td data-label="Codigo"><input   style=" color:gray;"  type="text" class="form-control"  name="nombre[]" value ="<?php  echo $productos['nombre']; ?>"></td>
            </tr>
            <tr  >
                <th style="width: 20%; padding-top: -33%; text-align: center;">Descripción</th>
                <td data-label="Descripción"><textarea  style="  width: 100%; color:gray;" cols="10" rows="2" type="text" class="form-control"  name="descr[]"><?php  echo $productos['descripcion']; ?></textarea></td>
            </tr>
            <tr  style="text-align: center;">
                <th style="width: 10%;">U/M</th>
                <td data-label="Unidad De Medida">
                     <select class="form-control" name="um" id="um" style="cursor: s-resize" required>
                        <option><?php  echo $productos['unidad_medida']; ?></option>
                        <option>c/u</option>
                        <option>lb</option>
                        <option>mts</option>
                        <option>Pgo</option> 
                        <option>Qq</option>
                        <option>cto</option>
                    </select>
                </td>
                </tr>
            <tr  style="text-align: center;">
                <th style="width: 15%;">Productos Disponibles</th>
                <td data-label="Productos Disponibles"><input  style="width: 100%; color:gray;" type="text" class="form-control"   name="stock[]"  value ="<?php  echo $productos['SUM(stock)']; ?>"></td>
            </tr>
            <tr  style="text-align: center;">
                <th style="width: 15%;">Cantidad</th>
                <td data-label="Cantidad"><input  style="width: 100%; " type="number" class="form-control"  name="cant[]" required></td>
            </tr>
            <tr  style="text-align: center;">
                <th style="width: 15%;">Costo unitario</th>
                <td data-label="Precio"><input style="width: 100%; color:gray;"  type="text" class="form-control"  name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td> 
            </tr>
              <tr  style="text-align: center;">
              <center> <td id="td" colspan="7"  style="background: red;"><h4 align="center";>No se encontraron resultados 😥</h4></td></center> 
            </tr>
        </thead>
        <tbody>
            
               
               
               
               
               
                  
            </tr>
   
        <?php }
    }
    


    echo ' 
   </tbody>
        </table>

    </div>
    <center>
    <input align="center" class="btn btn-lg" type="submit" value="Registrar Producto" id="enviar"></center>
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