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

.button .button2 :hover{
    text-decoration: none;
}
}
.button21 {
  margin-top: 1%;
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
    <body>
  <form style="width: 73%; height: 100%;margin: auto;padding: 1%; margin-bottom: 2%;" action="" method="POST">


<div class="container" >
 
       <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >

    <div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-left: 1%;margin-right: 1%;margin-top: 1%; border-radius: 5px;width: 70%;">
    <div class="col-xs-4 "  style="background: #bfe7ed;margin-left: 1;margin-right: 1%;margin-top: 1%;border-radius: 5px;width: 100%;" >

        <div class="well well-sm" style="position: all; margin: 1%">

            <div style="position: all; margin: 1%;">
                        <label>Código del Producto</label> 
                      <input  class="form-control" required type="number" name="codigo[]"  style="width: 100%;" placeholder="Ingrese el código del Producto">
                  </div>   
        </div>
    </div>            
</div>

<div class="col-xs-4">
    <div class="well my-4" style="position: all; margin:5%">
      <button id="btn-agregar" class="btn btn-block  bg-success" type="button" style="color: white;">Agregar Nueva Casilla</button>                
    </div>
</div>
    </div>
    
    <hr/>
    
    <div class="button21">
        <input class="btn btn-lg" type="submit" value="Consultar" id="enviar">
    </div>
</form>
       <style>
    #w {
            display: none;
       }
   </style>
  <?php  
include 'Model/conexion.php';
if(isset($_POST['codigo'])){ ?>
           
    <p class="text-center bg-danger my-4" style="color:white;border-radius: 5px;font-size: 1.5em;padding: 3%;">No se Encontró la información que busca, intentelo de nuevo</p>

  <form id="w" style="width: 100%; height: 100%;margin-top: 5%;background: transparent;"action="Controller/añadir_compra.php" method="POST">

   
<div style="padding-top:1%;margin: 1%; ">

<div class="row">
      <div id="w" class="col-5 col-sm-4" style="position: initial">
         
          <label id="inp1">Solicitud N°</b></label>  
           <?php 
          
          $sql = "SELECT * FROM tb_compra ORDER BY fecha_registro DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          $compra=1;
          while ($datos_sol = mysqli_fetch_array($result)){
            $compra=$datos_sol['nSolicitud']+1;
            } ?> 
          <input readonly id="inp1"class="form-control" type="number" name="nsolicitud" value="<?php echo $compra ?>" required> 
    </div>

    <div id="w" class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Dependencia que Solicita</label></font>   
    <input type="text"  class="form-control" name="dependencia" id="um" required style="color: black;" value="Mantenimiento" readonly>
                     
    </div>
    <div id="w" class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Plazo y Numero de Entregas</label></font> 
      <input  style=" color: black;" class="form-control" type="text" name="plazo" id="como3" required>
      <br>
    </div>
    <div id="w" class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Unidad Tecnica</label> </font>
      <input style=" color: black;"  class="form-control" type="text" name="unidad_tecnica" id="como3" required>
      <br>
    </div>
    <div id="w" class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Suministros Solicita</label>  </font>
      <input style=" color: black;"  class="form-control" type="text" name="descripcion_solicitud" id="como3" required>
      <br>
  </div>
  <div id="w" class="col-6.5 col-sm-4" style="position: initial">
  <?php     $cliente =$_SESSION['signin'];
    $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
    while ($consulta =mysqli_fetch_array($data)) {
 ?>
    <font color="black"><label>Encargado</label> </font>
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
      <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>">
      <br>
      <?php }?>
    </div>
    
   <?php  for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
   $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos = $codigo GROUP BY codProductos, precio";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];

       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 1,".");

       ?>
       <style>
    p{
            display: none;
       }#w{
            display: block;
       }
   </style>
 

  <div class="col-xs-4 "  style="background: #bfe7ed;border-radius: 5px;margin: 1%;padding:1%" >
<div class="well well-sm" style="position: all; margin: 1%">

                  <div class="form-group" style="position: all; margin: 2%">
                      <label>Código</label> 
                 <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                </svg>
                 </label>
                      <input  type="number" name="cod[]" class="form-control" id="busqueda" placeholder="Código de producto " value="<?php echo $productos['codProductos'] ?>" required>
                  </div>
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                        <label>Codificación de Catálogo de NA</label>
                 <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                </svg>
                 </label>
                      <input  type="number" name="cat[]" class="form-control" placeholder="Código" value="<?php echo $productos['catalogo']?>">
                  </div>
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                    <label>Descripción Completa</label>
                 <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#type"/>
                </svg>
                 </label>
                    <textarea rows="4" type="text" name="desc[]" class="form-control" placeholder="Descripción" required><?php echo $productos['descripcion']?></textarea>
                </div>
                  </div>

                  
                     <div class="form-group" style="position: all; margin: 2%">
                        <label>Unidad de medida (U/M)</label>

                <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#card-list"/>
                </svg>
                 </label>           
                        <select  class="form-control" name="um[]" id="um" >
                            <option ><?php echo $productos['unidad_medida'] ?></option>
                            <?php
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ ?>

                        <option><?php echo $productos1['unidad_medida']?></option> 
                    <?php  }   ?>
                        </select>
                        </div>
                    </div>
            
            <div class="form-group" style="position: all; margin: 2%">
                <label>Cantidad disponibles</label>
                <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#badge-4k"/>
                </svg>
                 </label>
                <input disabled  type="number" step="0.001" name="" class="form-control" placeholder="" required value="<?php echo $stock?>">
            </div>
            </div>
            <div class="form-group" style="position: all; margin: 2%">
                <label>Cantidad que va a pedir</label>
                <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#badge-4k"/>
                </svg>
                 </label>
                <input  placeholder="Ingrese la Cantidad" type="number" step="0.01" name="cant[]" class="form-control" placeholder="" required value="">
            </div>
            </div>
           <div class="form-group" style="position: all; margin: 2%">
                <label>Costo Unitario (Estimado)</label>
                 <div class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#currency-dollar"/>
                </svg>
                 </label>
               <input readonly  class="form-control" type="number" step="0.01" name="cu[]" placeholder="Costo unitario" value="<?php echo  $productos['precio'] ?>" required><br>
            </div>
            </div>
            </div>
    </div>
<?php }}} ?>
<br>
 
</div> 
            <div id="w" class="form-floating" style="position: all;" >
                <label>Justificación por el OBS solicitado</label>
              <textarea rows="7" class="form-control" name="jus"  placeholder="" required id="floatingTextarea"></textarea>
            </div>
<div id="w" class="button21">
             <input class="btn btn-lg" type="submit" value="Enviar" id="enviar">
        </div>
       
  <style>
            #enviar{
                margin-bottom: 5%;
            margin-left: 1.5%; 
            margin-top: 1%;
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
    $("#Registro .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-registro my-1" type="button">Retirar</button>');

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