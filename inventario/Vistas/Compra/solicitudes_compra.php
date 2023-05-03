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
    <meta charset="UTF-8">

    <style>

        h1 {
          color: white;
          text-align: center;
          text-shadow: 1px 1px 5px black;
      }
      #div{
        margin: 0%;
        display: none;
    }
</style>
<title>Solicitudes De Compra</title>
</head>
<body>
    <style>

        h1 {
          color: white;
          text-shadow: 1px 1px 5px black;
      }


      #section{
        margin: 2%;
        padding:0%;
        border-radius: 15px;
        background: white;
    }
    @media (max-width: 800px){
     #section{
        margin: -15%6%6%7%;
        
    }
}
</style>
<br><br><br>
<section id="section" class="mx-3 p-2" style="background-color:white; border-radius:5px;margin-bottom: 3%;"> 
    <center><h1>Solicitudes de Compra</h1></center>
    
    <?php $verificar =mysqli_query($conn, "SELECT nSolicitud FROM tb_compra ");
        if (!mysqli_num_rows($verificar)>0) {?>
            <style>
                .c{
                    display: none;
                }
            </style>
        <?php }else{?>
            <style>
                .c{
                    display: block;
                }
            </style>
        <?php }if ($tipo_usuario==1) {?>


        <div id="x" style="position: initial;" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example">
           <form id="x" method="POST" style=" position: initial;" action="../../Plugin/Imprimir/Compra/soli_compra.php" target="_blank" class="c">
               <button  data-toggle="tooltip" data-placement="top" title="Imprimir" style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
            </button>
        </form>
        <form id="x" method="POST" action="../../Plugin/PDF/Compra/pdf_soli_compra.php" class="mx-1 c" target="_blank">
           <button  data-toggle="tooltip" data-placement="top" title="Exportar en PDF" style="position: initial;"type="submit" class="btn btn-outline-primary" name="id" target="_blank">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
            </svg>
        </button>
    </form>
    <form id="ssas"  method="POST" action="../../Plugin/Excel/Compra/Excel.php"  class="mr-1 c">
        <button  data-toggle="tooltip" data-placement="top" title="Exportar en Excel" type="submit" class="btn btn-outline-primary" name="compra" target="_blank">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
            </svg>
        </button>
    </form>
    <form method="POST" action="form_compra1.php"  >
     <button  data-toggle="tooltip" data-placement="top" title="Nueva solicitud" style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">➕</button>
 </form>
 
</div>
<?php }else{
    ?>
    <div  id="x" style="position: initial;" class="btn-group mb-3  mx-2" style=" position: initial;" role="group" aria-label="Basic outlined example">
       <form id="ssas" method="POST" action="../../Plugin/Imprimir/Compra/soli_compra.php" target="_blank" class="c">
        <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
        $result = mysqli_query($conn, $sql);
        while ($datos_sol = mysqli_fetch_array($result)){?>
           <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
           
       <?php } ?>
       <button  data-toggle="tooltip" data-placement="top" title="Imprimir" style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
        <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
        </svg>
    </button>
</form>
<form id="ssas" method="POST" action="../../Plugin/PDF/Compra/pdf_soli_compra.php" class="mx-1 c" target="_blank">
    <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
       <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
   <?php } ?>
   <button  data-toggle="tooltip" data-placement="top" title="Exportar en PDF"  style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
    <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
    </svg>
</button>
</form>
<form id="ssas"  method="POST" action="../../Plugin/Excel/Compra/Excel.php" class="mr-1 c">
    <input type="hidden" name="columna" value="<?php echo $columna ?>">
    <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
    <button  data-toggle="tooltip" data-placement="top" title="Exportar en Excel" type="submit" class="btn btn-outline-primary" name="compra1" target="_blank">
        <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
        </svg>
    </button>
</form>
<form method="POST" action="form_compra1.php" >
 <button  data-toggle="tooltip" data-placement="top" title="Nueva solicitud" style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">➕</button>
</form>
</div>
<?php } ?>
<table class="table " id="exam" style="width:100%">
    <thead>
      <tr id="tr">
         
        <th style="width: 10%;">No. Solicitud</th>
        <th style="width: 15%;">Dependencia</th>
        <th style="width: 10%;">Plazo y No. de Entregas</th>
        <th style="width: 10%;">Unidad Técnica</th>
        <th style="width: 10%;">Descripción Solicitud</th>
        <th style="width: 10%;">Encargado</th>
        <th style="width: 10%;">Fecha de Registro</th>
        <th style="width: 10%;">Estado</th>
        <th style="width: 10%;">Detalles</th>
    </tr>
</thead>
<tbody> 

    <?php

    $sql = "SELECT * FROM tb_compra  ORDER by nSolicitud DESC ";
    $result = mysqli_query($conn, $sql);
    while ($solicitudes = mysqli_fetch_array($result)){
        ?>
        <style type="text/css">
           #td{
            display: none;
        }
        #ssas{
            display: block;
        }
        #div{
            display: block;
        }
    </style>
    <tr>
        <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
        <td style="width: 15%;min-width: 100%" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
        <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
        <td data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
        <td data-label="Descripción Solicitud" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
        <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario']; ?></td>
        <td data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
        <td data-label="Estado" class="delete"><input readonly <?php
        if($solicitudes['estado']=='Comprado') {
           echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
       }
   ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td>
   <td  data-label="Detalles">
    <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Compra.php">             
        <input type='hidden' name='id' value="<?php  echo $solicitudes['nSolicitud']; ?>">             
        <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">           
    </form> 
</td>
</tr>
<?php } ?> 

</tbody>
</table>

</div>



</section>
<script>$(document).ready(function () {

 $('#exam').DataTable({

    responsive: true,
    autoWidth:false,
    deferRender: true,
    scroller: true,
    scrollY: 400,
    lengthMenu: [[10, -1], [10,"Todos"]],
    scrollCollapse: true,
    language: {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing":"Procesando...",
    },

});
}); 
</script>
</body>
</html>
