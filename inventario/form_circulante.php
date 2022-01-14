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

<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Solicitud de Fondo Circulante</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        
        <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">  
        <style>

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

</style>
</head>
<body >


  <form style="width: 70%; height: 100%;margin-bottom: 5%;margin-top: 5%;" action="Controller/añadir_circulante.php" method="POST">

    <ol class="breadcrumb">
      <li><a id="a" href="home.php">Inicio</a></li>&nbsp; / &nbsp;
      <li  class="active">Solicitud de Fondo Circulante</li>

         <style type="text/css">
            #a:hover{
                background: transparent;
                    
                }
            
    
        @media (max-width: 952px){
form{
    margin-left: 15%;
}
.active{
    margin-top: 1%;
    font-size: 13px;
}

    </style>
    </ol>
  <center>
    <div class="container">
        
    </div><br>
  </center>
    <div id="Registro" class="row container-fluid" style="position: all; margin-left: 1%;margin-right: 1%;"  >

<div id="lo-que-vamos-a-copiar"  style="background:#FAE2E2;margin-left: 1%;margin-right: 1%;">
    <div class="col-xs-4 "  style="background: #FAE2E2;margin-left: 1;margin-right: 1%;" >
        <div class="well well-sm" style="position: all; margin: 5%">
            <div class="form-group" style="position: all; margin: 2%">
                    <label>Descripción de material</label>
                    <input type="text" name="desc[]" class="form-control" placeholder="Ingrese la descripción del material" required=""/>
                    </div>
                    <br>

                    <div class="form-group" >
                        <label>Unidad de medida (U/M)</label>
                        <div class="col-md-16" >
                            <div class="invalid-feedback">
                            Por favor seleccione una opción.
                            </div>
                        <select  class="form-control" name="um[]" id="um" required>
                            <option selected disabled value="">Unidad de Medida</option>
                            <option value="U">U</option>
                            <option value="M">M</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cantidad Solicitada</label>
                        <input type="number" name="soli[]" class="form-control" placeholder="Ingrese la Cantidad" required="" />
                    </div>

                    <div class="form-group">
                        <label>Costo Estimado</label>
                        <input class="form-control" type="number" step="0.01" name="costo[]" placeholder="Costo unitario del producto" required=""><br>
                    </div>
            </div>
        </div>            
    </div>

    <div class="col-xs-4">
        <div class="well" style="position: all; margin:5%">
            <button id="btn-agregar" class="btn btn-block btn-default bg-success" type="button" style="color: white;">Agregar Producto</button>
        </div>
    </div>
    </div>
    
    <hr>
    
    <div class="button21">
        <button  class="button"  style="margin-bottom:3%;">Guardar</button>
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
<?php include ('templates/footer.php');?>
  </body>
  </html>