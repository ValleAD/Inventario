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
<html lang="es">
  <head>
    <title>Registro de Productos</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
  </head>
    <body >
<style type="text/css">
    form{
    margin: auto;
}
        table { table-layout: fixed;}
        td{width: calc(100%/3);}

                  @media (max-width: 952px){
form{
    margin: auto;
}
#Registro{
    margin: auto;
}
}
</style>

<form style="width: 70%; height: 100%;margin-bottom: 5%;margin-top: 5%; padding: 1%" action="Controller/añadir.php" method="POST" style="height: 30%; margin-top: -15">
<font color=#023859><h3 style="text-align: center; font-weight: bold">Registro de Productos</h3></font>
</center>
<p style="margin-top: 5%;" ></p>
   <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >

<div id="lo-que-vamos-a-copiar"  style="background:#FAE2E2;margin-left: 1%;margin-right: 1%;margin-top: 1%;  border-radius:5px;">
    <div class="col-xs-4 "  style="background: #FAE2E2;margin-left: 1;margin-right: 1%;margin-top: 1%;  border-radius:5px;" >
        <div class="well well-sm" style="position: all; margin: 5%">

            <div class="form-group" style="position: all; margin: 2%">
            <label for="">Categoría</label><br> 
                    <select  class="form-control" name="categoria[]" id="categoria" required style="cursor: pointer">
                        <option selected disabled value="">Seleccionar</option>
                        <option>Agropecuarios y Forestales</option>
                        <option>Cuero y Caucho</option>
                        <option>Químicos</option>
                        <option>Combustibles y Lubricantes</option> 
                        <option>Minerales no Metálicos</option>
                        <option>Minerales Metálicos</option>
                        <option>Herramientas y Repuestos</option>
                        <option>Materiales Eléctricos</option>
                    </select>
            </div>

            <div class="form-group" style="position: all; margin: 2%">
                <label style="color: #000">Código</label> 
                <input type="number" name="cod[]" class="form-control" placeholder="Ingrese código de producto " required>
            </div>

            <div class="form-group" style="margin: 2%">
              <label style="color: #000">Codificación de Catálogo</label> 
              <input type="number" name="catal[]" class="form-control" placeholder="Ingrese código" required>
            </div>

          
            <div class="form-group">
                <label style="color: #000">Descripción Completa</label>

            <div class="form-floating" >
              <textarea class="form-control" name="descr[]"  placeholder="Ingrese la Descripción" id="floatingTextarea"></textarea>
            </div>

        </div>

        <div class="form-group" >
            <label>Unidad de medida (U/M)</label>
              <div class="col-md-16" >
                <div class="invalid-feedback">
                  Por favor seleccione una opción.
                </div>
                <select  class="form-control" name="um[]" id="um" required>
                  <option selected disabled value="">Seleccione</option>
                    <option>c/u</option>
                    <option>lb</option>
                    <option>mts</option>
                    <option>Pgo</option> 
                    <option>Qq</option>
                    <option>cto</option>
                </select>  
              </div>
        </div>
            
            <div class="form-group" >
                <label>Cantidad</label>
                <input type="number" name="cant[]" class="form-control" placeholder="Ingrese la Cantidad" required>
            </div>

            <div class="form-group">
                <label>Costo Unitario</label>
               <input class="form-control" type="number" step="0.01" name="cu[]" placeholder="$ 0.00" required><br>
            </div>
        </div>
    </div>            
</div>
 
<div class="col-xs-4" style="position: initial">
    <div class="well" style="margin:5%">
      <button id="btn-agregar" class="btn btn-block btn-default bg-success" type="button" style="color: white;">Agregar Producto</button>                
    </div>
</div>
    </div>
    
    <hr />
    
    <div class="text-center">
        <button class="btn btn-success btn-lg" name="submit" style="margin-bottom: 2%;">Guardar</button>  
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