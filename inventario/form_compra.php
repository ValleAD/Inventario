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
<?php include ('menu.php')?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Solicitud de Compra</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">

        <style>
                  @media (max-width: 952px){
form{
    margin-left: 15%;
}
.button:hover{
    text-decoration: none;
}
}
.button21 {

  text-align: center;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 12px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
 

}

.button2 {  background-color: #008CBA;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 12px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
  </head>
    <body >


  <form style="width: 70%; height: 100%;margin-bottom: 5%;margin-top: 5%;"action="Controller/añadir_compra.php" method="POST">
<ol class="breadcrumb">
  <li><a id="a" href="home.php">Inicio</a></li>/
  <li class="active">Solicitud de Compra</li>
</ol>
<center>
<div class="container">
<div class="row">
    <div class="col-6.5 col-sm-4" style="position: initial">
       <label>Número de Solicitud</label> 
      <input class="form-control" type="number" name="nsolicitud" id="como1" required>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
      <label>Dependencia que Solicita</label>   
      <input class="form-control" type="text" name="dependencia" id="como2" required>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
      <label>Plazo y Numero de Entregas</label> 
      <input class="form-control" type="text" name="plazo" id="como3" required>
      <br>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
      <label>Unidad Tecnica</label> 
      <input class="form-control" type="text" name="unidad_tecnica" id="como3" required>
      <br>
    </div>
    <div class="col-6.5 col-sm-4" style="position: initial">
      <label>Suministros Solicita</label> 
      <input class="form-control" type="text" name="descripcion_solicitud" id="como3" required>
      <br>
  </div>
    </div>
</div>
</center>
    <div id="Registro" class="row container-fluid" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%">

<div id="lo-que-vamos-a-copiar"  style="background:#FAE2E2;margin-left: 1%;margin-right: 1%;margin-top: 1%">
    <div class="col-xs-4 "  style="background: #FAE2E2;margin-left: 1;margin-right: 1%;margin-top: 1%;" >
        <div class="well well-sm" style="position: all; margin: 5%">
            <div class="form-group" style="position: all; margin: 2%">
                        <label>Código</label> 
                      <input type="number" name="cod[]" class="form-control" placeholder="Ingrese código de producto " required>
                  </div>

                  <div class="form-group" style="position: all; margin: 2%">
                        <label>Codificación de Catálogo de NA</label> 
                      <input type="number" name="cat[]" class="form-control" placeholder="Ingrese código" required>
                  </div>

                  <div class="form-group">
                    <label>Descripción Completa</label>
                    <input type="text" name="desc[]" class="form-control" placeholder="Descripción con especificaciones" required>
                  </div>



                  <div class="form-group" style="position: initial">
                    <label>Unidad de medida (U/M)</label>
                    <div class="col-md-16" >
                    <div class="invalid-feedback">
                        Por favor seleccione una opción.
                      </div>
                      <select  class="form-control" name="um[]" id="um" required>
                        <option selected disabled value="">U/M</option>
                        <option value="U">U</option>
                        <option value="M">M</option>
                      </select>
                      
                    </div>
                  </div>
            
            <div class="form-group">
                <label>Cantidad</label>
                <input type="number" name="cant[]" class="form-control" placeholder="Ingrese la Cantidad" required>
            </div>

            <div class="form-group">
                <label>Costo Unitario (Estimado)</label>
               <input class="form-control" type="number" step="0.01" name="cu[]" placeholder="Costo unitario del producto" required><br>
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
        <button  class="button " name="submit" style="margin-bottom:3%;">Guardar</button>
        <a class="button button2" href="vistaProductos.php">Ver Productos</a>
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
<?php include ('footer.php');?>
  </body>
  </html>