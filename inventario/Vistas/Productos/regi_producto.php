<?php
session_start();
if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
    
    window.location ="../../log/signin.php";
    session_destroy();  
    </script>
    die();

    ';
}
?>
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro de Productos</title>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
</head>
<body >
    <style>  
        #NoGuardar{
            display: none;
        }
        #buscar1{
            display: block;
        }
        #section{

            margin-top: 3%;
            margin-bottom: 1%;
            margin-left: 1%;
            margin-right: 1%;
            padding: 1%;
            background: whitesmoke;
            border-radius: 5px;
        }
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
        .a{
            width: 25%;
        }

        @media (max-width: 800px){
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
        }

    }
</style>
<br><br><br>

<form id="section" action="../../Controller/Productos/añadir.php" method="POST" style="height: 30%; ">
    <font color=marballe><h3 style="text-align: center; font-weight: bold">Registro de Productos</h3></font>

    <div class="mx-2 alert alert-warning alert-dismissible fade show" role="alert" style="position: initial;"><b>NOTA IMPORTANTE: </b> El codigo Que sera ingresado en este formulario no debe de ir Repetido cuando Presionen  el boton "Agregar Producto"</div>
    <div id="Registro" class="row container" style="position: all; margin-left: 1%;margin-right: 1%;margin-top: 1%"  >

        <div id="lo-que-vamos-a-copiar"  style="background:#FAE2E2;margin-left: 1%;margin-right: 1%;margin-top: 1%;  border-radius:5px;">
            <div class="col-xs-4 "  style="background: #FAE2E2;margin-left: 1;margin-right: 1%;margin-top: 1%;  border-radius:5px;" >
                <div class="well well-sm" style="position: all; margin: 5%">

                    <div class="form-group" style="position: all; margin: 2%">
                        <label for="">Categoría</label><br> 
                        <div class="input-group mb-3" style="position: initial;">
                         <label class="input-group-text" for="inputGroupSelect01">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#card-list"/>
                            </svg>
                        </label>
                        <select style="position: initial;" class="form-control"  name="categoria[]"  id="div" required style="cursor: pointer" required>
                            <option disabled selected value="">Seleccionar</option>
                            
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

              <div class="form-group" style="position: all; margin: 2%">
                <label style="color: #000">Código</label> 
                <div  class="input-group mb-3" style="position: initial;">
                 <label class="input-group-text" for="inputGroupSelect01">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                    </svg>
                </label>
                <input style="position: initial;"  type="number" name="cod[]" class="form-control" id="busqueda" placeholder="Ingrese código de producto " required>
            </div>
            <section id="tabla_resultado" style="margin: 0px;"></section>
        </div>

        <div class="form-group" style="margin: 2%">
          <label style="color: #000">Codificación de Catálogo</label> 
          <div style="position: initial;" class="input-group mb-3">
             <label class="input-group-text" for="inputGroupSelect01">
                 
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                </svg>
            </label>
            <input style="position: initial;" type="number" name="catal[]" class="form-control" id="busq" placeholder="Ingrese código" required>
        </div>
        <section id="resultado" style="margin: 0px;"></section>
    </div>


    <div class="form-group">
        <label style="color: #000">Descripción Completa</label>
        <div class="input-group mb-3" style="position: initial;">
         <label class="input-group-text" for="inputGroupSelect01">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#type"/>
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
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#card-list"/>
        </svg>
    </label>
    
    <select style="position: initial;" class="form-control"   id="div" name="um[]" id="um" required>
      <option disabled selected value="">Seleccionar</option>

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

<div class="form-group" >
    <label>Costo Unitario</label>
    <div class="input-group mb-3" style="position: initial;">
     <label class="input-group-text" for="inputGroupSelect01">
        <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#currency-dollar"/>
        </svg>
    </label>
    <input style="position: initial;" class="form-control" type="number" step="0.01" name="cu[]" placeholder="$ 0.00" required>
    <input type="hidden" name="dia" id="dia">
    <input type="hidden" name="mes" id="mes">
    <input type="hidden" name="año" id="ano">
    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
    
</div>
</div>

</div>
</div>            
</div>

<div class="col-xs-4" style="position: initial">
    <div class="well" style="margin-top: 7%">
      <button id="btn-agregar" class="btn btn-block btn-default bg-success" type="button" style="color: white;">Agregar Producto</button>                
  </div>
</div>
</div>

<hr />

<center>
   
    <button class="btn btn-success btn-lg" id="Guardar" style="margin-bottom: 2%;" name="submit">Guardar</button>  
    <button class="btn btn-success btn-lg" id="NoGuardar" style="margin-bottom: 2%; cursor: not-allowed;" disabled>Guardar</button>  
    <button type="button" class="btn btn-lg" id="ver" onclick=" return ir()">Ver Productos</button>
</center>
</form>


<script> function ir() {
    window.location.href="vistaProductos.php";
}
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
});
$(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/New_Productos/newProducto.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
    })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
    {
        obtener_registros();
    }
});

$(obtener_registros1());

function obtener_registros1(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/New_Productos/newProducto1.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
    })

    .done(function(resultado){
        $("#resultado").html(resultado);
    })
}

$(document).on('keyup', '#busq', function()
{
    var valorBusqueda=$(this).val();
    if (valorBusqueda!="")
    {
        obtener_registros1(valorBusqueda);
    }
    else
    {
        obtener_registros1();
    }
});

window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
var limpiar = document.getElementById('dia'); limpiar.value = dia
var limpiar1 = document.getElementById('mes'); limpiar1.value = mes;
var limpiar4 = document.getElementById('ano'); limpiar4.value = ano;


}

</script>
</body>
</html>