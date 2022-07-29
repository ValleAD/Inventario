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

<style>
    #ssas{
        display: none;
    }
    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}
form{
    margin: 0%;
}
#div{
    margin: 0%;
    display: none;
}
    </style>
    <title>Solicitudes De Bodega</title>
</head>


<body>
<br><br><br><br>
            <center><h1 style="margin-top:5px">Solicitudes Bodega</h1></center><br>
      <section class="mx-3 p-2" style="background-color:white; border-radius: 5px;">
        <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
            <?php if ($tipo_usuario==1) {?>
              <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" style="position: initial;" role="group" aria-label="Basic outlined example">
         <form id="ssas" method="POST" action="Plugin/soli_bodega.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="Plugin/pdf_soli_bodega.php" class="mx-1" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
  <table class="table table-striped" id="div"  style=" width: 100%;">
          
            <thead>
              <tr id="tr">
             <th style="width: 10%;">#</th>
                <th style="width: 10%;"><strong>O. de T. No.</strong></th>
                <th style="width: 10%;"><strong>Departamento Solicitante</strong></th>
                <th style="width: 10%;"><strong>Encargado</strong></th>
                <th style="width: 10%;"><strong>Fecha</strong></th>
                <th style="width: 10%;"><strong>Estado</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th>
                
            </tr>
         </thead>
     </table>

  <div id="div" style = "max-height: 442px; overflow-y:scroll;margin: 0%;">
    <table class="table">
<tbody>   
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_bodega order by codBodega desc";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($solicitudes = mysqli_fetch_array($result)){ 
        $idusuario=$solicitudes['idusuario'];
        $n++;
        $r=$n+0;
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
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
               <td><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $solicitudes['estado'] ?>"></td>
             <td  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Bodega.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codBodega']; ?>">  
                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>
                
                <form method="POST" action="Controller/Delete_producto.php">
                   <button style="position: initial;"  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>
            <style>
                 #ver{
                margin-left: 2%; 
                background: rgba(0,123,255,.5); 
                color: #fff; margin-bottom: 2%;  
                border: rgb(5, 65, 114);
                border-radius: 4px;
                padding: 6% 12px;
               }
               #ver:hover{
                transition: 1s;
                color: lawngreen;
                transform: translateY(2px);
               } 
            </style>
           <?php  };

            if ($solicitudes['estado']=="Rechazado") {?>
                   
           <button disabled id="ver" style="cursor: not-allowed;"  type="submit" name="detalle" >Ver Detalles</button> 
        
           <?php  } ?>         
                 
                     
            </form> 
        </div>
            </td>
        </tr>

    <?php }?>   
           
           </tbody>
        </table>

</div>
<?php } ?>           
 <?php if ($tipo_usuario==2) {?>

              <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form id="ssas" method="POST" action="Plugin/soli_bodega.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="Plugin/pdf_soli_bodega.php" class="mx-1" target="_blank">
            <?php $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
            <table class="table  table-striped" id="div" style=" width: 100%;">
            <thead>
              <tr id="tr">
             <th style="width: 10%;">#</th>
                <th style="width: 10%;"><strong>O. de T. No.</strong></th>
                <th style="width: 10%;"><strong>Departamento Solicitante</strong></th>
                <th style="width: 10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width: 10%;"><strong>Estado</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th>
                
            </tr>

         </thead>
     </table>
            <div id="div" style = " max-height: 442px;  overflow-y:scroll;margin: 0%;">
                <table class="table">
<tbody>   
                <tr id="td" >
                <td colspan="6"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
            </tr>
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_bodega WHERE idusuario='$idusuario' ORDER  BY fecha_registro ";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($solicitudes = mysqli_fetch_array($result)){ 
        $n++;
        $r=$n+0;
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
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d/m/Y",strtotime($solicitudes['fecha_registro'])); ?></td>
               <td><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $solicitudes['estado'] ?>"></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Bodega.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codBodega']; ?>">          
                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>
                <form method="POST" action="Controller/Delete_producto.php">
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>
           <?php  };
            if ($solicitudes['estado']=="Rechazado") {
                 echo'
           <button disabled  style="cursor: not-allowed;"  type="submit" name="detalle" class="btn btn-primary">Ver Detalles</button> 
            ';
            } ?>            
            </form> 
            </td>
        </tr>
 <?php } ?> 
           </tbody>
        </table>
</div>
<?php } ?>
 </section>
   
</body>
</html>
