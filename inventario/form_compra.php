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
  <form style="width: 70%; height: 100%;margin: auto;padding: 1%;" action="" method="POST">

   <br>
  <style type="text/css">
            #a:hover{
                background: transparent;
                    
                }
            form{
            margin: auto;
        }
    
        @media (max-width: 952px){
form{
    margin-left: 15%;
}
.active{
    margin-top: 2%;
    font-size: 12px;
}#a{
    font-size: 13px;
}
        }
    </style>
</ol>
<center>

</center>
<div class="container">
          
        <div class="row">
            <div class="col-.5 col-sm-4" style="position: initial">

            </div>
        </div>


       <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >

    <div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-left: 1%;margin-right: 1%;margin-top: 1%; border-radius: 5px;width: 100%;">
    <div class="col-xs-4 "  style="background: #bfe7ed;margin-left: 1;margin-right: 1%;margin-top: 1%;border-radius: 5px;width: 100%;" >

        <div class="well well-sm" style="position: all; margin: 5%">

            <div class="form-group" style="position: all; margin: 2%">
                        <label>Código del Producto</label> 
                      <input  id="inp1" class="form-control" required type="number" name="codigo[]" id="codigo" style="margin-bottom: 2%;" placeholder="Ingrese el código del Producto">
                  </div>   
        </div>
    </div>            
</div>

<div class="col-xs-4">
    <div class="well" style="position: all; margin:5%">
      <button id="btn-agregar" class="btn btn-block btn-default bg-success" type="button" style="color: white;">Agregar Nueva Casilla</button>                
    </div>
</div>
    </div>
    
    <hr/>
    
    <div class="button21">
        <input class="btn btn-lg" type="submit" value="Consultar" id="enviar">
    </div>
</form>



<!-- <form action="" method="post" style=" width: 50%; height: 50%;padding: 1%;" >
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
  </form> -->
  <?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){ ?>
  <form style="width: 100%; height: 100%;margin-bottom: 5%;margin-top: 5%;"action="Controller/añadir_compra.php" method="POST">

  <br>

<div style="padding-top:1%;margin: 1%;">

<div class="row">
      <div class="col-.5 col-sm-4" style="position: initial">
                
  <?php 
          
          $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          while ($datos_sol = mysqli_fetch_array($result)){
        
          echo '<p style="color: red; margin-top: -8%; margin-bottom: -0.5%">Última solicitud: '; 
          echo $datos_sol['nSolicitud']; 
          echo '</p>'; }
          ?>
          <label id="inp1">Solicitud N°</b></label>   
          <input id="inp1"class="form-control" type="number" name="nsolicitud" required> 
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
       <?php  for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
   //$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";


   $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos = $codigo GROUP BY codProductos, precio";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];

       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 0,",");

       ?>

 <div class="container">
  <div class="col-xs-4 "  style="background: #bfe7ed;border-radius: 5px;margin: 1%;padding:1%" >
<div class="well well-sm" style="position: all; margin: 1%">

     <div class="form-group" style="position: all; margin: 2%">
                      <label>Categoría</label> 
                      <select  class="form-control" name="categoria[]" id="um" >
                        <option><?php echo $productos['categoria']?></option>
                        <?php 
                        $sql = "SELECT * FROM  selects_categoria";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos1['categoria'].'</option>
                      ';   
                     } ?>
                       
                    
                      </select>
                  </div> 

                  <div class="form-group" style="position: all; margin: 2%">
                      <label>Código</label> 
                      <input  type="number" name="cod[]" class="form-control" id="busqueda" placeholder="Código de producto " value="<?php echo $productos['codProductos'] ?>" required>
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                        <label>Codificación de Catálogo de NA</label> 
                      <input  type="number" name="cat[]" class="form-control" placeholder="Código" value="<?php echo $productos['catalogo']?>">
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                    <label>Descripción Completa</label>
                    <input type="text" name="desc[]" class="form-control" placeholder="Descripción" required value="<?php echo $productos['descripcion']?>">
                  </div>

                  
                     <div class="form-group" style="position: all; margin: 2%">
                        <label>Unidad de medida (U/M)</label>
                        <div class="col-md-16" >
                            <div class="invalid-feedback">
                            Por favor seleccione una opción.
                            </div>
                        <select  class="form-control" name="um[]" id="um" >
                            <option ><?php echo $productos['unidad_medida'] ?></option>
                            <?php
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos1['unidad_medida'].'</option>
                      ';   
                     } 
                        ?>
                        </select>
                        </div>
                    </div>
            
            <div class="form-group" style="position: all; margin: 2%">
                <label>Cantidad</label>
                <input type="number" name="cant[]" class="form-control" placeholder="Ingrese la Cantidad" required value="<?php echo $stock?>">
            </div>

           <div class="form-group" style="position: all; margin: 2%">
                <label>Costo Unitario (Estimado)</label>
               <input  class="form-control" type="number" step="0.01" name="cu[]" placeholder="Costo unitario" value="<?php echo  $productos['precio'] ?>" required><br>
            </div>
            </div>
    </div>
    </div>
<br>
           
 
         

 <?php }}
echo '<div class="button21">
             <input class="btn btn-lg" type="submit" value="Enviar" id="enviar">
        </div>';} ?> 
        
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
    



</form>

<script>
    $(document).ready(function(){
        
        // El formulario que queremos replicar
        var formulario_registro = $("#lo-que-vamos-a-copiar").html();
        
// El encargado de agregar más formularios
$("#btn-agregar").click(function(){
    // Agregamos el formulario
    $("#Registro").prepend(formulario_registro);

    // Agregamos un boton para retirar el formulario
    $("#Registro .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-registro" type="button">Retirar</button>');

    // Hacemos focus en el primer input del formulario
    $("#Registro .col-xs-4:first .well input:first").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
});
        
        // Cuando hacemos click en el boton de retirar
        $("#Registro").on('click', '.btn-retirar-registro', function(){
            $(this).closest('.col-xs-4').remove();
        })
            
        $("#frm-registro").submit(function(){
            return $(this).validate();
        });
    })
</script>
  </body>
  </html>