<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?><!DOCTYPE html>
<html lang="es">
  <head>
    <title>Vale</title>
        
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 

        <link rel="stylesheet" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  </head>
    <body >


  <div id="head"  style="position: absolute;
  height: 17% ;margin-top: -15"> 
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>
  </div>
    <br>


  <form style="position: all;" action="dt_form_vale.php" method="POST" style="height: 10%;margin-top: -15">

    <ol class="breadcrumb">
      <li><a href="home.php">Inicio</a></li>
      <li class="active">Vale</li>
    </ol>
<center>
<div class="container">
  <div class="row">
    <div class="col-6 col-sm-3">
       <label>Número de Vale</label> 
      <input class="form-control" type="number" name="vale" id="como1" required=""></div>
    <div class="col-6 col-sm-3">
      <label>Departamento</label>   
      <input class="form-control" type="text" name="depto" id="como2" required=""></div>

    <!-- Force next columns to break to new line -->
    <div class="w-100"></div>

    <div  class="col-6 col-sm-3"> 
      <label>Fecha</label> 
      <input class="form-control" type="date" name="fech" id="como3" required><br></div>
   
  </div>
</div></center>
    <div id="Registro" class="row" style="position: all; m">
<div id="lo-que-vamos-a-copiar">
    <div class="col-xs-4">
        <div class="well well-sm" style="position: all; margin: 5%">
            <div class="form-group" style="position: all; margin: 2%">

                  <label style="color: #000">Código</label> 
                <input type="number" name="cod[]" class="form-control" placeholder="Ingrese código de producto " required=""/>
            </div>

            <div class="form-group">
                 <label style="color: #000">Descripción</label>
                <input type="text" name="desc[]" class="form-control" placeholder="Ingrese la descripción del producto" required=""/>
            </div><br>

            <div class="form-group" >
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
                <input type="number" name="cant[]" class="form-control" placeholder="Ingrese la Cantidad" required="" />
            </div>
            <div class="form-group">
                <label>Costo Unitario</label>
               <input class="form-control" type="number" name="cu[]" placeholder="Costo unitario del producto" required=""><br>
            </div>

        
        </div>
    </div>            
</div>

<div class="col-xs-4">
    <div class="well" style="position: all; margin:5%">
        <button id="btn-agregar" class="btn btn-lg btn-block btn-default" type="button">Agregar Producto</button>                
    </div>
</div>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button  class="btn btn-success btn-lg btn-block">Guardar</button>
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