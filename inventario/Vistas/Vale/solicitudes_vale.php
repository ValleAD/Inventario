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


    <title>Solicitudes De Vale</title>
</head>
<body>
        <style>

    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}


    </style>
    <br><br><br>
    <center><h1 style="margin-top:2%">Solicitudes Vale</h1></center><br>
     <div  class="mx-3 p-2 mb-5" style="background-color: white; border-radius:5px; ">

          <?php if ($tipo_usuario==1) {?>  
     
         <div id="x" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form id="sass" method="POST" class="mx-1" action="../../Plugin/Imprimir/Vale/soli_vale.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">    
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="sass" method="POST" action="../../Plugin/PDF/Vale/pdf_soli_vale.php" target="_blank" class="mx-1">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
        <form id="sass" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Vale/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="vale" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>    
<?php }if ($tipo_usuario==2) {?>
                 <div  id="x" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form id="ssas"  method="POST" class="mx-1" action="../../Plugin/Imprimir/Vale/soli_vale.php" target="_blank">
             <?php $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'";
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
         <form id="ssas"  class="mx-1"  method="POST" action="../../Plugin/PDF/Vale/pdf_soli_vale.php" target="_blank">
             <?php $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'";
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
                  <form id="ssas"    method="POST" action="../../Plugin/Excel/Vale/Excel.php" target="_blank">
             <?php $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>
 </div>
<?php } ?>
 <table class="table table-striped" id="exam" >
            <thead>
              <tr id="tr">
                <th ><strong>Código de Vale</strong></th>
                <th><strong>Departamento Solicitante</strong></th>
                <th ><strong>Encargado</strong></th>
                <th><strong>Fecha</strong></th>
                <th ><strong>Estado</strong></th>
                <th ><strong>Detalles</strong></th> 
            </tr>
            
     </thead>
        <tbody>     


<?php if ($tipo_usuario==1) {

    $sql = "SELECT * FROM tb_vale ORDER BY codVale   DESC";
    } if ($tipo_usuario==2) {

    $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario' ORDER BY codVale desc ";
}
    $result = mysqli_query($conn, $sql);
        while ($solicitudes = mysqli_fetch_array($result)){

        $idusuario = $solicitudes['idusuario'];
                 $des=$solicitudes['departamento'];
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
        if ($idusuario==0) {
            $u='Invitado';
        }
        ?>
        <style type="text/css">
            #sass{
                display: block;
            }

            #td{
                display: none;
            }
            #div{
                display: block;
            }
        </style>
        <tr>
            <td  data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td  data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>

             <td  data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
           <td  data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td  data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td   data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">  
                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>
                
                <form method="POST" action="Controller/Delete_producto.php">
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>

           <?php  }else{?>    
            <button type="button" class="btn btn-primary" style="opacity: .7;">Ver Detalles</button>
           <?php } ?>     
                 
                     
            </form> 
        </div>
            </td>
        </tr>
            
    <?php }?>   
           
           </tbody>
        </table>

</div>
<script>
       $(document).ready(function () {
    $('#exam').DataTable({

responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
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