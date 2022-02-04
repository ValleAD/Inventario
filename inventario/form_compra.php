<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
         window.location ="..log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Solicitud de Compra</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css"> 
        <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
        <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">


<section id="section">
<form action="form_compra.php" method="post" style="padding:1%">
<br>
 <div class="container">
        <div class="row">
    <div class="col" style="position: initial">
     <label>¿Cuántos productos desea Comprar?</label>
    </div>
   <div style="margin-bottom: 1%;margin-right: 1%;">
        <input id="inp" style="position: initial;" class="form-control" type="number" name="cantidad" value="1"> 
      
    </div>
   <div>
        <input id="btn" class="btn btn-success" type="submit" value="Aceptar" name="aceptar"> 
    </div>
    <div>
    </div>
    
  </div>
</div>
</form>
<?php
    if(isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        for($x = 1; $x <= $cantidad; $x++){

            echo'
            <form action="form_compra.php" method="post" style="margin-top: 2%;">
            <div class="container" style="position: initial">
                <div class="row">
                    <div class="col-6.5 col-sm-4" style="position: initial">
                    <input  id="inp1" class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;margin-top:5%" placeholder="Ingrese el código del Producto">

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
    <form action="Controller/añadir_compra.php" method="post">
        

          <div class="container">
            <h2 align="center">Compra de Productos</h2><br>
            <div class="container">
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
     $sql = "SELECT * FROM tb_usuarios";
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
                <select  class="form-control" name="categoria[]" id="categoria" style="cursor: pointer">
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
                <td data-label="Codigo"><input   style=" width: 100%; "  type="number" class="form-control"  name="cat[]" value ="<?php  echo $productos['catalogo']; ?>"></td>
            </tr><tr  style="text-align: center;">
                <th style="width: 17%;">Nombre</th>
                <td data-label="Codigo"><input   style=" color:gray;"  type="text" class="form-control"  name="nombre[]" value ="<?php  echo $productos['nombre']; ?>"></td>
            </tr>
            <tr  >
                <th style="width: 20%; padding-top: -33%; text-align: center;">Descripción</th>
                <td data-label="Descripción"><textarea  style="  width: 100%; color:gray;" cols="10" rows="2" type="text" class="form-control"  name="desc[]"><?php  echo $productos['descripcion']; ?></textarea></td>
            </tr>
            <tr  style="text-align: center;">
                <th style="width: 10%;">U/M</th>
                <td data-label="Unidad De Medida">
                     <select class="form-control" name="um[]" id="um" style="cursor: s-resize" required>
                        <option><?php  echo $productos['unidad_medida']; ?></option>
                        <?php 
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['unidad_medida'].'</option>
                      ';   
                     } 
                           ?>
                    </select>
                </td>
                </tr>

            <tr  style="text-align: center;">
                <th style="width: 15%;">Cantidad</th>
                <td data-label="Cantidad"><input  style="width: 100%; " type="number" class="form-control"  name="cant[]" required></td>
            </tr>
            <tr  style="text-align: center;">
                <th style="width: 15%;">Costo unitario</th>
                <td data-label="Precio"><input style="width: 100%; color:gray;"  type="number" class="form-control"  name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td> 
            </tr>
             <tr>
                 <input class="form-control" type="hidden"  name="estado[]" value="Pendiente"><br>
               <input class="form-control" type="hidden"  name="form_compra[]" value="Formulario Compra">
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
    <input align="center" class="btn btn-lg" type="submit" value="Comprar Producto" id="enviar"></center>
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
<style type="text/css">
    @media (min-width: 1080px){
         #section{
        margin-top: 5%;
        margin-left: 2%;
        margin-right: 2%;
        width: 90%;

       }

    }</style>
</section> 
  </body>
  </html>