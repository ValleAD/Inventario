<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        
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

<html lang="es">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" type="text/css" href="styles/estilo.css"> 
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Vale</title>
</head>
<body>

<section  style="margin:2%">
<center>
            <form action="form_bodega.php" method="post" style=" width: 50%;" >
            <div class="container-fluid" style="position: initial">
                <div class="row">
                    <div class="col-sm-10" style="position: initial">
                    <input  id="inp1" class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">

                    </div>
                     <div style="position: initial">
                      <input   type="submit" class=" btn btn-success" value="Buscar" name="buscar" id="buscar" >
                    </div>
                </div>
            </div>
      </center>
    
       
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
        </form>
     
<?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){

    echo'
    <br>
    <form action="Controller/añadir_vale.php" method="post">
        
        <div class="container" style="position: initial">
            <div class="row">
              <div class="col-6.5 col-sm-4" style="position: initial">
                <label id="inp1">Departamento que solicita</b></label>   
                <select  class="form-control" name="depto" id="depto" required>
                        <option selected disabled value="">Selecione</option>
                      ';?>
                      <?php 
                        $sql = "SELECT * FROM selects_departamento";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['departamento'].'</option>
                      ';   
                     }


                         ?>
                      </select>
                  </div>
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Vale N°</b></label>   
                <input id="inp1"class="form-control" type="number" name="numero_vale" required>
            </div>
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Nombre de la persona</label>
                <?php     $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
 ?>
    <font color="black"><label>Encargado</label> </font>
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
      <br>
      <?php }?> 
               
            </select>
                </label>   
            </div>
        </div>
        <br>
          <div class="container">
         <table class="table" style="margin-bottom:3%; ">
        <thead>
           <tr id="tr" style="text-align: left;">
                <th style="width: 10%;">Código</th>
                <th style="width: 20%;">Descripción</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 15%;">Productos Disponibles</th>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 15%;">Costo unitario</th>
            </tr>
              <tr>
              <center> <td id="td" colspan="6" ><h4 align="center";>No se encontraron resultados 😥</h4></td></center> 
            </tr>
        </thead>
        <tbody>


           
<?php 

    for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
   //$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";


   $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos = $codigo GROUP BY codProductos, precio";
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
               <td data-label="Productos Disponibles"><input  style="background:transparent; border: none; width: 100%; color: gray;" type="text" class="form-control" readonly  name="stock[]"  value ="<?php  echo $productos['SUM(stock)']; ?>"></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="text" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><input style="background:transparent; border: none; width: 100%; color: black;"  type="text" class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
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