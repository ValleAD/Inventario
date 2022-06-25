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
        <style>  
         #section{
            margin: 1%;
            padding: 1%;
            }
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
            .a{
                width: 25%;
            }
                #lo-que-vamos-a-copiar{
        margin: 1%;
        border-radius: 15%;
        padding: 2%;
    }
    .col-xs-4{
        margin: 2%;
        padding: 2%;
    }
            @media (max-width: 952px){
   #section{
        margin: -15%6%6%1%;
        width: 97%;
    }

    th{
        width: 25%;
    }
    #p{
        margin-top: 5%;
        margin-left: 7%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }

    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        padding-right: 15%;
    }
  }
        </style>
        <br><br><br>

<form id="section" action="Controller/añadir.php" method="POST" >
<font color=black><h3 style="text-align: center; font-weight: bold">Registro de Productos</h3></font>
   <div id="Registro"  class="row container-fluid" style="position: initial;"  >

<div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;  border-radius:15px;">
    <div class="col-xs-4 "  style="background: #bfe7ed;  border-radius:15px;" >
        <div class="well well-sm" style="position: initial;">

            <div class="form-group" style="position: initial; ">
            <label for="">Categoría</label><br> 
             <div class="input-group mb-3" style="position: initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#card-list"/>
                </svg>
                 </label>
                    <select style="position: initial;" class="form-control" name="categoria[]" id="categoria" required style="cursor: pointer" required>
                        <option  selected disabled value="">Seleccione</option>
                     <?php 
                        $sql = "SELECT * FROM  selects_categoria";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos1['categoria'].'</option>
                      ';   
                     } ?>
                       
                    </select>

            </div>
            </div>

            <div class="form-group" style="position: initial; ">
                <label style="color: #000">Código</label> 
                 <div  class="input-group mb-3" style="position: initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                </svg>
                 </label>
                <input style="position: initial;" type="number" name="cod[]" class="form-control" placeholder="Ingrese código de producto " required>
            </div>
            </div>

            <div class="form-group" style="position: initial;">
              <label style="color: #000">Codificación de Catálogo</label> 
                               <div style="position: initial;" class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                 
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                </svg>
                </label>
              <input style="position: initial;" type="number" name="catal[]" class="form-control" placeholder="Ingrese código" required>
          </div>
            </div>

          
            <div class="form-group">
                <label style="color: #000">Descripción Completa</label>
                 <div class="input-group mb-3" style="position: initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#type"/>
                </svg>
                 </label>
              <textarea style="position: initial;" class="form-control" name="descr[]"  placeholder="Ingrese la Descripción" required id="floatingTextarea"></textarea>
           

        </div>
    </div>

        <div class="form-group" >
            <label>Unidad de medida (U/M)</label>
                <div class="input-group mb-3" style="position: initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#card-list"/>
                </svg>
                 </label>
             
                <select style="position: initial;" class="form-control" name="um[]" id="um" required>
                  <option selected disabled value="">Seleccione</option>
                 <?php 
                        $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ 

                          echo'  <option>'.$productos1['unidad_medida'].'</option>
                      ';   
                     } ?>
                </select>  
            
        </div>
    </div>
            
           

            <div class="form-group">
                <label>Costo Unitario</label>
                <div class="input-group mb-3" style="position: initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#currency-dollar"/>
                </svg>
                 </label>
               <input style="position: initial;" class="form-control" type="number" step="0.01" name="cu[]" placeholder="$ 0.00" required>

            </div>
        </div>
        </div>
    </div>            
</div>
<style type="text/css">
  .boton_2{
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    background-color: #28a745;
    border-radius: 6px;
  }
</style>
<div class="col-md-6" style="position: initial;padding: 0%;margin: 0%;">
    <div>
      <button style="cursor: default;color: white; " id="btn-agregar" class=" btn boton_2 my-3" type="button" >Agregar Producto
        <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#plus-circle-fill"/>
        </svg>
      </button>                
    </div>
</div>
    </div>
    
    <hr />
    
    <div class=" col-md-12 text-center" style="padding: 0%;">
        <button id="buscar1" class="btn btn-success btn-lg my-2" name="submit" style="margin-bottom: 2%;">Guardar 
            <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
                        </svg>
        </button>  
        <a id="buscar" class="btn btn-lg my-2" href="vistaProductos.php?productos">Ver Productos
                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#list-check"/>
                        </svg>
        </a>
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