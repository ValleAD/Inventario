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


  <form style="width: 70%; height: 100%;margin-bottom: 5%;margin-top: 5%;"action="Controller/añadir_compra.php" method="POST">
<center>
  <br>
<div class="container">
<div class="row">
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Número de Solicitud</label> </font>
      <input style="background:transparent; color: black;" class="form-control" type="number" name="nsolicitud" id="como1" required>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
    <font color="black"><label>Dependencia que Solicita</label></font>   
      <input  style="background:transparent; color: black;" class="form-control" type="text" name="dependencia" id="como2" required>
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

    <div id="Registro" class="row container-fluid" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%">

<div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-left: 1%;border-radius: 5px;margin-right: 1%;margin-top: 1%">
    <div class="col-xs-4 "  style="background: #bfe7ed;margin-left: 1;border-radius: 5px;margin-right: 1%" >
        <div class="well well-sm" style="position: all; margin: 5%">
        
                  <div class="form-group" style="position: all; margin: 2%">
                      <label>Categoría</label> 
                      <select  class="form-control" name="categoria[]" id="um" required>
                        <option selected disabled value="">Categoría</option>
                        <?php 
                     $sql = "SELECT * FROM  selects_categoria";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['categoria'].'</option>
                      ';   
                     } 
                           ?>
                      </select>
                  </div> 

                  <div class="form-group" style="position: all; margin: 2%">
                      <label>Código</label> 
                      <input  type="number" name="cod[]" class="form-control" placeholder="Código de producto " value="<?php echo $codigo ?>" required>
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                        <label>Codificación de Catálogo de NA</label> 
                      <input  type="number" name="cat[]" class="form-control" placeholder="Código" value="<?php echo $productos['catalogo'] ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Descripción Completa</label>
                    <input type="text" name="desc[]" class="form-control" placeholder="Descripción" required>
                  </div>

                  
                    <div class="form-group" >
                        <label>Unidad de medida (U/M)</label>
                        <div class="col-md-16" >
                            <div class="invalid-feedback">
                            Por favor seleccione una opción.
                            </div>
                        <select  class="form-control" name="um[]" id="um" required>
                            <option selected disabled value="">Unidad de Medida</option>
                            <?php 
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['unidad_medida'].'</option>
                      ';   
                     } 
                           ?>
                        </select>
                        </div>
                    </div>
            
            <div class="form-group">
                <label>Cantidad</label>
                <input type="number" name="cant[]" class="form-control" placeholder="Ingrese la Cantidad" required>
            </div>

            <div class="form-group">
                <label>Costo Unitario (Estimado)</label>
               <input  class="form-control" type="number" step="0.01" name="cu[]" placeholder="Costo unitario" value="<?php echo $productos['precio'] ?>" required><br>
            </div>
        </div>
    </div>            
</div>

<div class="col-xs-4" style="position: initial">
    <div class="well" style="position: all; margin:5%">
       <button id="btn-agregar" class="btn btn-block btn-default bg-success" type="button" style="color: white;">Agregar Producto</button> 
    </div>
</div>
    </div>
    
    <div class="button21">
        <button  class="btn btn-success btn-lg" name="submit" style="margin-bottom:2%;">Guardar</button>
        <a id="ver" class="btn btn-lg" href="vistaProductos.php">Ver Productos</a>
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
    </div>


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