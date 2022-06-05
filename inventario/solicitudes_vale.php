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
  text-shadow: 1px 1px 5px black;
}


    </style>
    <title>Solicitudes De Vale</title>
</head>
<body>
    <center><h1 style="margin-top:5px">Solicitudes Vale</h1></center><br>
          <?php if ($tipo_usuario==1) {?>  
     <div class="mx-5 p-2 mb-5" style="background-color: white; border-radius:5px; ">
              <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form id="w" method="POST" class="mx-1" action="Plugin/soli_vale.php" target="_blank">
             <button type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="w" method="POST" action="Plugin/pdf_soli_vale.php" target="_blank">
             <button type="submit" class="btn btn-outline-primary" name="id" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
     
        <table class="table table-responsive" id="example" style="width:100%">
            <thead>
              <tr id="tr">
                <th>#</th>
                <th style="width:30%" ><strong>Código de Vale</strong></th>
                <th style="width:50%"><strong>Departamento Solicitante</strong></th>
                <th style="width:10%"><strong>Encargado</strong></th>
                <th style="width:50%"><strong>Estado</strong></th>
                <th style="width:10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width:10%"><strong>Detalles</strong></th> 
            </tr>
            
     </thead>
        <tbody>     
    <?php
    include 'Model/conexion.php';

    $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
        $idusuario = $solicitudes['idusuario'];
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
            #w{
                display: none;
            }
        </style>
        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>

             <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])); ?></td>
            <td  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">  
                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>
                
                <form method="POST" action="Controller/Delete_producto.php">
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>
            </div>
           <?php  };
            if ($solicitudes['estado']=="Rechazado") {
                 echo'
                   
           <button disabled  style="cursor: not-allowed;"  type="submit" name="detalle" class="btn btn-primary">Ver Detalles</button> 
                
            ';
            } ?>         
                 
                     
            </form> 
            </td>
        </tr>

    <?php }?>   
           
           </tbody>
        </table>
    </div>
    <?php } if ($tipo_usuario==2) {?>
    <div class="mx-5 p-2 mb-5" style="background-color: white; border-radius:5px;">

     
        <table class="table table-responsive" id="example" style="width:100%">
<div class="btn-group mb-3  mx-2" role="group" aria-label="Basic outlined example">
         <form id="w" method="POST" action="Plugin/soli_vale.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="w" method="POST" action="Plugin/pdf_soli_vale.php" target="_blank">
    <?php $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
            <thead>
              <tr id="tr">
                <th>#</th>
                <th style="width:10%" ><strong>Código de Vale</strong></th>
                <th style="width:30%"><strong>Departamento Solicitante</strong></th>
                <th style="width:30%"><strong>Encargado</strong></th>
                <th style="width:10%"><strong>Estado</strong></th>
                <th style="width:10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width:10%"><strong>Detalles</strong></th> 
            </tr>
            
     </thead>
        <tbody>     
    <?php
    include 'Model/conexion.php';
    
    $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario' ORDER BY fecha_registro ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
        
        ?>
        
        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>

            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])); ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">  
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

    <?php }?>   
           
           </tbody>
        </table>
    </div>
<?php } ?>
       <!-- <a href="Plugin/pdf_soli_vale.php" class="btn btn-danger">Generar Solicidud Vale</a> -->
  

</section>

    
    </div>
</body>
</html>