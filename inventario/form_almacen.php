<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        
         window.location ="../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Solicitud de materiales a almacén</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        
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


  <form style="width: 70%; height: 100%;margin-bottom: 5%;margin-top: 5%;" action="Controller/almacen.php" method="POST">

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
                <label id="inp1">Solicitud N°</b></label>   
                <input id="inp1"class="form-control" type="number" name="solicitud_no" required>
            </div>
              <div class="col-6.5 col-sm-4" style="position: initial">
                <label id="inp1">Departamento que solicita</b></label>   
                <select  class="form-control" name="depto" id="depto" required>
                        <option selected disabled value="">Selecione</option>
                        <option>Direccion Hospital</option>
                        <option selected disabled>Seleccionar</option>
                        <?php 
                        $sql = "SELECT * FROM selects_departamento";
                        $result = mysqli_query($conn, $sql);

                        while ($productos = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos['departamento'].'</option>
                      ';   
                     }


                         ?>
                      </select>
            </div>
            
            <div class="col-.5 col-sm-4" style="position: initial">
                <label id="inp1">Nombre de la persona</label>
                <select  class="form-control" name="usuario" id="usuario" required style="cursor: pointer">
                <option selected disabled value="">Seleccionar</option>
                <option>Juan Martinez</option>
                <option>Miguel Roscencio</option>
                <option>Francisco Guevarra </option>
                <option>Rocio Amilcar</option> 
            </select>
                </label>   
            </div>
        </div>


       <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >

<div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-left: 1%;margin-right: 1%;margin-top: 1%; border-radius: 5px;">
    <div class="col-xs-4 "  style="background: #bfe7ed;margin-left: 1;margin-right: 1%;margin-top: 1%;border-radius: 5px;" >

        <div class="well well-sm" style="position: all; margin: 5%">

            <div class="form-group" style="position: all; margin: 2%">
                        <label>Código</label> 
                      <input type="number" name="cod[]" class="form-control" placeholder="Ingrese código de producto " required>
                  </div>


                  <div class="form-group" >
                    <label>Unidad de medida (U/M)</label>
                    <div class="col-md-16" >
                    <div class="invalid-feedback">
                        Por favor seleccione una opción.
                      </div>
                      <select  class="form-control" name="um[]" id="um" required>
                        <option selected disabled value="">U/M</option>
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
                 <label>Nombre del Artículo</label>
                <input type="text" name="nom[]" class="form-control" placeholder="Nombre y descripción del producto" required>
            </div>

            
            <div class="form-group">
                <label>Cantidad Solicitada</label>
                <input type="number" name="soli[]" class="form-control" placeholder="Ingrese la Cantidad Solicitada" required>
            </div>

            
            
            <div class="form-group">
                <label>Costo Unitario</label>
               <input class="form-control" type="number" step="0.01" name="precio[]" placeholder="Costo unitario del producto" required><br>
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
    
    <hr/>
    
    <div class="button21">
        <button class="btn btn-success btn-lg" name="submit" style="margin-bottom:2%;">Guardar</button>
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