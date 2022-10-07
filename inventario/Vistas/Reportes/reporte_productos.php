
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
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Productos</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
</head>
<body> 
<br>
    <style>
        .input:hover{
        background: pink;
        color: white;
    }
        #div{
            margin: 0%;
            display: none;
        }
        .well{
            display: none;
        }
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } 
           #cat{
    margin-top: 3.3%;
   }
 @media (max-width: 952px){
    #hidden{
        margin-top: 3%;
    }
   #cat{
    margin-top: 2%;
   }
   #h2{
    padding: 2%;
   }
    }
  </style>
  <section style="background: rgba(255, 255, 255, 0.9);margin: 7%2%2%2%; padding: 1%; border-radius: 15px;">
<h2 id="h2" class="text-center">Reporte de Productos</h2>
<br><div id="OcultarDiv">
<?php include('../../Buscador_ajax/Fechas/fecha.php') ?>

<div id="OcultarDiv">

           <div class="mx-1 p-2 hidden" id="hidden" style=" border-radius: 5px;">
        
        <div style="position: initial;" class="btn-group mb-3 my-3 mx-2 " role="group" aria-label="Basic outlined example">
         <form id="well" class="well" method="POST" action="../../Plugin/Imprimir/Producto/tproductos.php" target="_blank">
             
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="tproductos">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="well" class="well" method="POST" action="../../Plugin/PDF/Productos/tpdf_productos.php" target="_blank">
            
             <button  style="position: initial;"type="submit" class="btn btn-outline-primary mx-1" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
         <form id="well" class="well" method="POST" action="../../Plugin/Excel/Productos/Excel.php" target="_blank">
            
             <button style="position: initial;"type="submit" class="btn btn-outline-primary" name="tproductospdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
 </div>     
 <a  href="../Unidad/unidad_medidad.php" class="btn btn-primary" id="div"  style="position: initial; float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Unidad de medidas</a>
 <div class="row">   
 <div class="col-md-3"style="position: initial;">
            <section class="well" >
            <div style="position: initial;" class="input-group">
                 
            <input type="text" style="position: initial;" name="busqueda" class="form-control"  id="busqueda" placeholder="Buscar Código ó Descripción">
                      <label onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x"/>
                </svg>
                 </label>
                 </div>
        </section>
    </div>
</div>
<br>    
</div>
</div>

               <section id="tabla_resultado" >
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>     
       </div>

<div id="OcultarDiv">
<?php include('../../Buscador_ajax/Categorias/categoria.php') ?>  
</div>    
</section>
<script>
        $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/Consultas/consulta_productos.php',
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
var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
</script>
</body>
</html>