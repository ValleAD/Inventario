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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <title>Solicitudes De Vale</title>
</head>
<body>
        <style>
            #div{
                margin: 0%;
                display: none;
            }
    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}
#sass{
    display: none;
}

    </style>
    <br><br><br>
    <center><h1 style="margin-top:2%">Solicitudes Vale</h1></center><br>
     <div  class="mx-3 p-2 mb-5" style="background-color: white; border-radius:5px; ">

 <?php include ('Buscador_ajax/cabezeraVale.php') ?>  
 <?php if ($tipo_usuario==1) { ?>
         <div class="row">   
    <div  class="btn-group mb-3  mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form method="POST" class="mx-1 x" action="Plugin/soli_vale.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">    
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="x" method="POST" action="Plugin/pdf_soli_vale.php" target="_blank" class="mx-1">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>   
 <?php if (isset($_POST['Consultar'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
    <div  class="btn-group mb-3  mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form  method="POST" class="mx-1" action="Plugin/soli_vale.php" target="_blank">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar">    
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form  method="POST" action="Plugin/pdf_soli_vale.php" target="_blank" class="mx-1">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>     
<?php  } } ?> 
            
 <div class="col-md-3 x"style="position: initial;">
            <section class="well" >
                <div style="position: initial;" class="input-group">
                 
            <input type="number" style="position: initial;" name="busqueda" class="form-control"  id="busqueda" placeholder="Buscar Codigo del Producto">
                      <label onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x"/>
                </svg>
                 </label>
                 </div> 
        </section>
    </div> 
   




<br>         
       </div>
 
 
 <?php include ('Buscador_ajax/tablaVale.php'); ?>  


        <section id="tabla_resultado" >
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>
 
</div>


 <script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : 'Buscador_ajax/consultaVale.php',
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
    var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});
</script> <!-- <script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : 'Buscador_ajax/consultaVale1.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado1").html(resultado);
    })
}

$(document).on('keyup', '#busqueda1', function()
{
    var valorBusqueda=$(this).val();
    var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});
</script> -->

 <script type="text/javascript">
         var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }  
 </script>
<script>
    var limpiar1 = document.getElementById('busqueda1');
                    function validar1() {
                        limpiar1.value = '';
                    }
</script>
</body>
</html>