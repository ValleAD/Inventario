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
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Solicitudes Circulante</title>
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
            <h1 class="text-center mg-t" style="margin-top: 2%;">Solicitudes de Fondo Circulante</h1><br>
<?php if ($tipo_usuario==1) {?>
     <div id="x"  style="position: initial;" class="btn-group my-2  mx-2" role="group" style="position: initial;" aria-label="Basic outlined example">
         <form method="POST" action=" ../../Plugin/Imprimir/Circulante/soli_circulante.php" id="ssas" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href=" ../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action=" ../../Plugin/PDF/Circulante/pdf_soli_circulante.php" id="ssas" target="_blank" class="mx-1">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary"  target="_blank" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href=" ../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form id="ssas"  method="POST" action="../../Plugin/Excel/Circulante/Excel.php">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
                <button type="submit" class="btn btn-outline-primary" name="circulante" >
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div> 
<?php } if ($tipo_usuario==2) {
 ?>
              <div id="x" style="position: initial;" class="btn-group mb-3 my-2  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action=" ../../Plugin/PDF/Circulante/soli_circulante.php" id="ssas" target="_blank">
 
 <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
       

             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href=" ../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form class="mx-1" method="POST" action=" ../../Plugin/PDF/Circulante/pdf_soli_circulante.php" id="ssas" target="_blank">
 <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
              <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href=" ../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
         <form id="ssas" style="" method="POST" action="../../Plugin/Excel/Circulante/Excel.php" target="_blank">
 <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
                <button type="submit" class="btn btn-outline-primary" name="circulante1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>
<?php } ?>
<table class="table  " id="exam" style=" width: 100%;">
          <thead>
              <tr id="tr">
                <th style="width: 10%;">No. de Solicitud</th>
                <th  style="width: 10%;">Fecha de solicitud</th>
                <th style="width: 10%;">Detalles</th>
                
            </tr>
            </thead>
            <tbody>
           
  
    <?php
if ($tipo_usuario==1) {
   $sql = "SELECT * FROM tb_circulante ORDER BY codCirculante DESC  ";
}else{

    $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario' ORDER BY codCirculante DESC  ";
}
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){
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
            
            <td data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_circulante.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codCirculante']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">               
            </form> 
            </td>
        </tr>
 <?php } ?> 
           </tbody>
        </table>
</section>
   <script>   $(document).ready(function () {
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