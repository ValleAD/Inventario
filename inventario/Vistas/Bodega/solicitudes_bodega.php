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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Solicitud de Bodega</title>
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
            <center><h1 >Solicitud Bodega</h1></center><br>

            <?php if ($tipo_usuario==1) {?>
               

              <div id="x" style="position: initial;" class="btn-group mb-3 my-1 mx-2" style="position: initial;" role="group" aria-label="Basic outlined example">
         <form  method="POST" action="../../Plugin/Imprimir/Bodega/soli_bodega.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form  method="POST" action="../../Plugin/PDF/Bodega/pdf_soli_bodega.php" class="mx-1" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
        <form  method="POST" action="../../Plugin/Excel/Bodega/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="bodega" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>
 <?php }else{ ?>
                 <div  id="x" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form   method="POST" class="mx-1" action="../../Plugin/Imprimir/Bodega/soli_bodega.php" target="_blank">
             <?php $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form   class="mx-1"  method="POST" action="../../Plugin/PDF/Bodega/pdf_soli_bodega.php" target="_blank">
             <?php $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
<?php } ?>

<div id="x"><br>
  <table class="table" id="exampl"  style=" width: 100%;">
          
            <thead>
              <tr id="tr">
                <th style="width: 10%;"><strong>O. de T. No.</strong></th>
                <th style="width: 10%;"><strong>Departamento Solicitante</strong></th>
                <th style="width: 10%;"><strong>Encargado</strong></th>
                <th style="width: 10%;"><strong>Fecha</strong></th>
                <th style="width: 10%;"><strong>Estado</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th>
                
            </tr>
         </thead>
<tbody>   
    <?php
    if ($tipo_usuario==1) {
    $sql = "SELECT * FROM tb_bodega order by codBodega desc";
}else{
     $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario' ORDER  BY codBodega desc ";
}
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){ 
         $des=$solicitudes['departamento'];
        $idusuario=$solicitudes['idusuario'];
if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
        if ($idusuario==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
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
            <td align="center" data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td align="center" data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>
            <td align="center" data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td align="center" data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
               <td align="center"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;pointer-events: none;border: none;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;pointer-events: none;border: none;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;pointer-events: none;border: none;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $solicitudes['estado'] ?>"></td>
             <td align="center"  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Bodega.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codBodega']; ?>">  
                 
          <button type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button>
        
           
            </form> 
        </div>
            </td>
        </tr>

    <?php }?>   
           
           </tbody>
        </table>

</div>
 </section>
<script>
       $(document).ready(function () {
    $('#exampl').DataTable({
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
