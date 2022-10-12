<?php require '../../Model/conexion.php';
include ('menu.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png"> 
    <title>Productos</title>
</head>

<body>
<style>
  #h2{
    margin: 0;
  }
    #div{
        margin: 0%;
        display: none;
    }
    #ssas{
        display: none;
    }
    .well{
        display: none;
    }
    #w{
        display: none;
    }

 @media (max-width: 952px){
   #cat{
    margin-top: 2%;
   }
      #h2{
    padding: 1%;
   }
   #h3{
    color: white;
   }
   #hidden{
    margin-top: 3%;
   }
    }
  </style>
  <section style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2 id="h2" class="text-center">Inventario de Productos</h2>
<br>
<div id="OcultarDiv">
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
<br>    
</div>
       </div>
   </div>
</div>
  


               <section id="tabla_resultado" >
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>     
    



<div id="OcultarDiv">
    <?php include('../../Buscador_ajax/Categorias/categoria.php') ?>
   </div> 

    

   

                         
</section>
 <script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/Consultas/consulta_productosInvitado.php',
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

</script>
</body>
</html>