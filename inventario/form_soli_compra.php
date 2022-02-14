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

<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" type="text/css" href="styles/estilo.css"> 
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
    <title>Compra</title>
</head>
<body>
<p style="margin-top: 10%"></p>
<section id="section" style="margin: auto ;%">


<?php
echo '
    <form action="Controller/añadir_vale.php" method="post">
        
        
           
<div class="row">
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Número de Solicitud</label> </font>
      <input style="background:transparent; color: black;" class="form-control" type="number" name="nsolicitud" id="como1" required>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Dependencia que Solicita</label></font>   
    <select class="form-control" name="dependencia" style="background:transparent; color: black;"  required>
    <option disabled selected>Selecione</option> '; 


     $sql = "SELECT * FROM selects_dependencia";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){ 

      echo'  <option>'.$productos['dependencia'].'</option>
  ';  
 } echo'
</select>
      
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Plazo y Numero de Entregas</label></font> 
      <input  style="background:transparent; color: black;" class="form-control" type="text" name="plazo" id="como3" required>
      <br>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Unidad Tecnica</label> </font>
      <input style="background:transparent; color: black;"  class="form-control" type="text" name="unidad_tecnica" id="como3" required>
      <br>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Suministros Solicita</label>  </font>
      <input style="background:transparent; color: black;"  class="form-control" type="text" name="descripcion_solicitud" id="como3" required>
      <br>
  </div>
  <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Usuario</label> </font>
           <label id="inp1">Nombre de la persona</label>
             
            
<select class="form-control" name="usuario" style="background:transparent; color: black;" >
    <option disabled selected>Selecione</option> 

';

     $sql = "SELECT * FROM tb_usuarios" ;
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){ 

      echo'  <option>'.$productos['firstname']." ".$productos['lastname'].'</option>
  ';   
 } echo'
</select>
      <br>
    </div>
    </div>
</div>
        <br>
          
         <table class="table" style="margin-bottom:3%;">
        <thead>
           <tr id="tr" style="text-align: left">
                <th style="width: 10%;">Código</th>
                <th style="width: 17%;">Nombre</th>
                <th style="width: 20%;">Descripción</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 15%;">Productos Disponibles</th>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 15%;">Costo unitario</th>
            </tr>
              <tr>
              <center> <td id="td" colspan="7"  style="background: red;"><h4 align="center";>No se encontraron resultados 😥</h4></td></center> 
            </tr>
        </thead>
        <tbody>';


       if(isset($_POST['codProductos'])){    
    for($i = 0; $i < count($_POST['id']); $i++){


    $codigo = $_POST['id'][$i];
   
   $sql = "SELECT codProductos, nombre, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE $codigo";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){ ?>    
        <style type="text/css">
        #td{
        display: none;
    }

</style>
            <tr>
               <td data-label="Codigo"><input style="background:transparent; border: none; width: 100%; color: black;"  type="number" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td data-label="Codigo"><input style="background:transparent; border: none; width: 100%; color: black;"  type="text" class="form-control" readonly name="nombre[]" value ="<?php  echo $productos['nombre']; ?>"></td>
               <td data-label="Descripción"><textarea  style="background:transparent; border: none; width: 100%; color: black;" cols="10" rows="1" type="text" class="form-control" readonly name="desc[]"><?php  echo $productos['descripcion']; ?></textarea></td>
               <td data-label="Unidad De Medida"><input  style="background:transparent; border: none; width: 100%; color: black;" type="text" class="form-control" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td data-label="Productos Disponibles"><input  style="background:transparent; border: none; width: 100%; color: gray;" type="text" class="form-control" readonly  name="stock[]"  value ="<?php  echo $productos['SUM(stock)']; ?>"></td>
               <td data-label="Cantidad"><input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="text" class="form-control"  name="cant[]" required></td>
               <td data-label="Precio"><input style="background:transparent; border: none; width: 100%; color: black;"  type="text" class="form-control" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td>    
            </tr>
   
        <?php }
     }
}

    echo ' 
   </tbody>
        </table>

    
    <input align="center" class="btn btn-lg" type="submit" value="Guardar" id="enviar">
        <style>
            #enviar{
                text-align: center;
            margin-left: 5; 
            background: rgb(5, 65, 114); 
            color: #fff;  
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

?>
</section>

</body>
</html>