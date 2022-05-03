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
    h1 {
  color: white;
}
form{
    margin: 0%;
}
    </style>
    <title>Solicitudes De Bodega</title>
</head>


<body>

            <center><h1 style="margin-top:5px">Solicitudes Bodega</h1></center><br>
      <section class="mx-5 p-2" style="background-color:white; border-radius: 5px;margin-bottom:3%;">
            <?php if ($tipo_usuario==1) {?>
              <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/soli_bodega.php" target="_blank">
             <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/pdf_soli_bodega.php" target="_blank">
             <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
  <table class="table table-responsive table-striped" id="example" style=" width: 100%;">
          
            <thead>
              <tr id="tr">
             <th>#</th>
                <th style="width: 10%"><strong>O. de T. No.</strong></th>
                <th style="width: 40%"><strong>Departamento Solicitante</strong></th>
                <th style="width: 40%"><strong>Encargado</strong></th>
                <th style="width: 30%"><strong>Fecha de solicitud</strong></th>
                <th style="width: 15%"><strong>Estado</strong></th>
                <th  style="width: 50%"><strong>Detalles</strong></th>
                
            </tr>
            
    <style type="text/css">
        
    </style>
         </thead>
<tbody>   
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_bodega ORDER  BY fecha_registro ";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($solicitudes = mysqli_fetch_array($result)){ 
        $n++;
        $r=$n+0;
        if ($tipo_usuario==1) {
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
    
   
</style>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])); ?></td>
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
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">            
            </form> 
            </td>
        </tr>
 <?php } ?> 
           </tbody>
        </table>

<?php } ?>           
 <?php if ($tipo_usuario==2) {?>

              <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/soli_bodega.php" target="_blank">
             <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/pdf_soli_bodega.php" target="_blank">
             <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
            <table class="table table-responsive table-striped" id="example" style=" width: 100%;">
            <thead>
              <tr id="tr">
             <th>#</th>
                <th style="width: 10%"><strong>O. de T. No.</strong></th>
                <th style="width: 40%"><strong>Departamento Solicitante</strong></th>
                <th style="width: 30%"><strong>Fecha de solicitud</strong></th>
                <th style="width: 15%"><strong>Estado</strong></th>
                <th  style="width: 50%"><strong>Detalles</strong></th>
                
            </tr>
            
    <style type="text/css">
        
    </style>
         </thead>
<tbody>   
    <?php
    include 'Model/conexion.php';

    $tipo_usuario = $_SESSION['iduser'];
    $sql = "SELECT * FROM tb_bodega WHERE idusuario='$tipo_usuario' ORDER  BY fecha_registro ";
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
    
   
</style>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])); ?></td>
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
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">            
            </form> 
            </td>
        </tr>
 <?php } ?> 
           </tbody>
        </table>

<?php } ?>
 </section>
   
</body>
</html>
