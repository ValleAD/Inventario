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
<?php include ('templates/menu.php');



?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Solicitud de Compra</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">

        <style>
            form{
            margin: auto;
}
                  @media (max-width: 952px){
form{
    margin-left: 15%;
}
.button .button2 :hover{
    text-decoration: none;
}
}
.button21 {

  text-align: center;
}


.EstiloTexto{
    color:#FE0000;
    font-weight: bold;
    text-align: center;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size: 25px;
}

</style>
  </head>
    <body >

<form action="" method="post" style=" width: 50%; height: 50%;padding: 1%;" >
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
  </form>
  <?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){?>


  <form style="width: 70%; height: 100%;margin-bottom: 5%;margin-top: 5%;"action="Controller/añadir_compra.php" method="POST">

  <br>
<div class="container">
<div class="row">

    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Número de Solicitud</label> </font>
      <input style="background:transparent; color: black;" class="form-control" type="number" name="nsolicitud" id="como1" required>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Dependencia que Solicita</label></font>   
    <input type="text"  class="form-control" name="dependencia" id="um" required style="background:transparent;" value="Mantenimiento" readonly>
                     
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
  <?php     $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
 ?>
    <font color="black"><label>Encargado</label> </font>
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
      <br>
      <?php }?>
    </div>
    </div>
</div>
</center>
 <div class="container">
  <div class="col-xs-4 "  style="background: #bfe7ed;border-radius: 5px;margin: 1%;padding:1%" >
<div class="well well-sm" style="position: all; margin: 1%">

        <?php  for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
   //$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";


   $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos = $codigo GROUP BY codProductos, precio";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];

       $precio1=number_format($precio, 2,".",",");

       echo'
 <div class="form-group" style="position: all; margin: 2%">
                      <label>Categoría</label> 
                      <select  class="form-control" name="categoria[]" id="um" >
                        <option>'.$productos['categoria'].'</option>
                        ';
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos1['unidad_medida'].'</option>
                      ';   
                     } 
                        echo'
                    
                      </select>
                  </div> 

                  <div class="form-group" style="position: all; margin: 2%">
                      <label>Código</label> 
                      <input  type="number" name="cod[]" class="form-control" id="busqueda" placeholder="Código de producto " value="'.$productos['codProductos'] .'" required>
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                        <label>Codificación de Catálogo de NA</label> 
                      <input  type="number" name="cat[]" class="form-control" placeholder="Código" value="'.$productos['catalogo'] .'">
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                    <label>Descripción Completa</label>
                    <input type="text" name="desc[]" class="form-control" placeholder="Descripción" required value="'.$productos['descripcion'] .'">
                  </div>

                  
                     <div class="form-group" style="position: all; margin: 2%">
                        <label>Unidad de medida (U/M)</label>
                        <div class="col-md-16" >
                            <div class="invalid-feedback">
                            Por favor seleccione una opción.
                            </div>
                        <select  class="form-control" name="um[]" id="um" >
                            <option >'.$productos['unidad_medida'] .'</option>
                            ';
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos1['unidad_medida'].'</option>
                      ';   
                     } 
                        echo'
                        </select>
                        </div>
                    </div>
            
            <div class="form-group" style="position: all; margin: 2%">
                <label>Cantidad</label>
                <input type="number" name="cant[]" class="form-control" placeholder="Ingrese la Cantidad" required value="'.$productos['SUM(stock)'] .'">
            </div>

           <div class="form-group" style="position: all; margin: 2%">
                <label>Costo Unitario (Estimado)</label>
               <input  class="form-control" type="number" step="0.01" name="cu[]" placeholder="Costo unitario" value="'. $productos['precio'] .'" required><br>
            </div>
            </div>
    </div>
    </div>
<br>
            <div class="button21">
             <button ';  
                if($productos['codProductos']=="" || $productos['descripcion']=="" || $productos['unidad_medida']=="" || $productos['precio']) {
                    echo ' #enviar{
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
            } "';
                }else{
                    echo ' style="display:none"';
                }
        echo' class="btn btn-success btn-lg" name="submit" style="margin-bottom:2%;">Guardar</button>
       
        <a id="ver" class="btn btn-lg" href="vistaProductos.php">Ver Productos</a>

        </div>';
         

 }} ?> 
       
     
         <style>
               #ver{
                margin-left: 2%; 
                background: rgb(5, 65, 114); 
                color: #fff; margin-bottom: 2%;  
                border: rgb(5, 65, 114);
               }
               #ver:hover{
                background: rgb(9, 100, 175);
               } 
               #ver:active{
                transform: translateY(5px);
               } 
        </style>
    



</form> <?php }?>


  </body>
  </html>