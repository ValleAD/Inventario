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
    <title>Solicitud de Almacén</title>
        
        <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
  </head>
    <body >
                <style>  
         section{
            margin: 5%;
            padding: 1%;
            }
            form{
                margin: 0%;
            }
            #wew{
                margin:1%;
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
            @media (max-width: 952px){
   section{
        margin: -15%6%6%3%;
        width: 92%;
    }
    #inp1{
        margin-top: 5%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }
    #lo-que-vamos-a-copiar{
        width: 100%;
    }
    #Registro{
        width: 100%;
        margin: 0%;
    }
    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        margin-left: 10%;
    }
    #wew{
        margin: 4%;
    }
  }
        </style>
        <br><br><br>
<section id="form" style="background:white;border-radius:15px;">
    <form method="post" style="width: 100%;">
            <div id="Registro" class="row" style="margin: 1%;">
                <div id="lo-que-vamos-a-copiar"  style="background:#bfe7ed;margin-right: 1%;margin-top: 1%; border-radius: 5px;width: 75%;">
                    <div id="lo-que-vamos-a-copiar"  class="col-xs-4 "  style="background: #bfe7ed;margin-right: 1%;margin-top: 1%; width: 75%;border-radius: 5px;" style=" margin: 1%;border-radius: 15px;">
                        <div class="well well-sm" style="margin: 1%;padding-bottom: 2%;">
                            
                                <label>Código del Producto</label> 
                                <input  class="form-control" required type="number" name="codigo[]"  style="width: 100%;" placeholder="Ingrese el código del Producto">
                            
                        </div>
                    </div>            
                </div>
                        <div class="col-xs-4">
                            <div class="well my-4" style="position: initial;">
                                <button  id="btn-agregar" class="btn bg-success" type="button" style="color: white;">Agregar Nueva Casilla</button>                
                            </div>
                        </div>
            </div>
                <hr/>
                    <div class="button21">
                        <input class="btn btn-lg" type="submit" value="Consultar" id="buscar">
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
       <style>
    #w {
            display: none;
       }
   </style>
      
  <form id="w" style="width: 100%; background: transparent; height: 100%;margin-top: 1%;"action="Controller/almacen.php" method="POST">

<div class="row">
      <div class="col-md-4" style="position: initial">
    
    
          <label id="inp1">Solicitud N°</b></label>   
          <?php 
                        $sql = "SELECT * FROM tb_almacen  ORDER BY codAlmacen DESC LIMIT 1";
                        $result = mysqli_query($conn, $sql);
                        $codAlmacen=1;
                        while ($productos = mysqli_fetch_array($result)){    

                            $codAlmacen=$productos['codAlmacen']+1;
                     }
                     ?>
                <input id="inp1"class="form-control" readonly type="number" name="nsolicitud" required value="<?php echo $codAlmacen ?>">
    </div>

    <div class="col-md-4" style="position: initial">
    <font color="black"><label>Departamento</label></font>   
    <input type="text"  class="form-control" name="depto" id="um" required style="background:transparent;" value="Mantenimiento" readonly>
                     </div>
  <div class="col-md-4" style="position: initial">
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
   //$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";


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

<div id="wew" class=" col-md-3 "  style="background: #bfe7ed;position: initial; border-radius: 5px;" >
<div class="  well well-sm" style="position: initial;">

                  <div class="form-group" style="position: ; margin: 2%">
                      <label>Código</label> 
                 <div style="position: initial;" class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#123"/>
                </svg>
                 </label>
                      <input style="position: initial;"  type="number" name="cod[]" class="form-control" id="busqueda" placeholder="Código de producto " value="<?php echo $productos['codProductos'] ?>" required>
                  </div>
                  </div>

                 <div class="form-group" style="position: ; margin: 2%">
                    <label>Descripción Completa</label>
                 <div style="position: initial;" class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#type"/>
                </svg>
                 </label>
                    <textarea style="position: initial;" rows="5" type="text" name="desc[]" class="form-control" placeholder="Descripción" required><?php echo $productos['descripcion']?></textarea>
                </div>
                  </div>    

                  
                <div class="form-group" style="position: ; margin: 2%">
                        <label>Unidad de medida (U/M)</label>

                       <div id="div" style = " max-height: 150px;width: 100%; overflow-y:scroll;"> 
                        
                            <?php
                     $sql = "SELECT * FROM  selects_unidad_medida";
                        $result = mysqli_query($conn, $sql);

                        while ($productos1 = mysqli_fetch_array($result)){ ?>

                        <input required  id="<?php echo $productos1['id'] ?>" type="radio" name="um[]" value="<?php echo $productos1['unidad_medida'] ?>"> <label style="width: 100%;" id="label1" for="<?php echo $productos1['id'] ?>" > <?php echo $productos1['unidad_medida'] ?></label><br>
                    <?php  }   ?>

                        </div>
                    </div>
            
            <div class="form-group" style="position: ; margin: 2%">
                <label>Cantidad disponibles</label>
                <div style="position: initial;" class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#badge-4k"/>
                </svg>
                 </label>
                <input style="position: initial;" disabled  type="number" step="0.001" name="" class="form-control" placeholder="" required value="<?php echo $stock?>">
            </div>
            </div>
            <div class="form-group" style="position: ; margin: 2%">
                <label>Cantidad que va a pedir</label>
                <div style="position: initial;" class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#badge-4k"/>
                </svg>
                 </label>
                <input style="position: initial;"  placeholder="Ingrese la Cantidad" type="number" step="0.01" name="cant[]" class="form-control" placeholder="" required value="">
            </div>
            </div>
           <div class="form-group" style="position: ; margin: 2%">
                <label>Costo Unitario (Estimado)</label>
                 <div style="position: initial;" class="input-group mb-3">
                 <label style="position: initial;" class="input-group-text" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#currency-dollar"/>
                </svg>
                 </label>
               <input style="position: initial;" style="position: initial;" readonly  class="form-control" type="number" name="cu[]" placeholder="Costo unitario" value="<?php echo  $productos['precio'] ?>" required ><br>
            </div>
            </div>
            </div>
    </div>
 <?php }}} ?>
</div>
<div id="w" class="button21">
             <input class="btn btn-success btn-lg my-1" name="submit" type="submit" value="Enviar" id="buscar1">
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