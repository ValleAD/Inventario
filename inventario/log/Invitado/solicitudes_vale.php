<?php require '../../Model/conexion.php';
include ('menu.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Productos</title>
</head>

<body style="background-image: url(../../../img/4k.jpg);  
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;">
                <style type="text/css">
        #a:hover{
   text-decoration: none;
   color: lawngreen;
}
 #b:hover{
   text-decoration: none;
   color:whitesmoke;
}
.children{
background:burlywood;
}
 </style>
    <center><h1 style="margin-top:5px">Solicitudes Vale</h1></center><br>
            
     <div class="mx-5 p-2" style="background-color: white;color: black; border-radius:5px">

     
        <table class="table table-responsive" id="example" style="width:100%;color: black;">
            <thead>
              <tr id="tr">
                <th style="width:10%" ><strong>#</strong></th>
                <th style="width:10%" ><strong>Código de Vale</strong></th>
                <th style="width:50%"><strong>Departamento Solicitante</strong></th>
                <th style="width:50%"><strong>Estado</strong></th>
                <th style="width:100%;"><strong>Fecha de solicitud</strong></th>
                <th style="width:100%"><strong>Detalles</strong></th> 
            </tr>
            
     </thead>
        <tbody>     
    <?php
    $idusuario=0;
    $sql = "SELECT * FROM tb_vale WHERE idusuario='$idusuario' ORDER BY fecha_registro DESC ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="#"><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
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
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>"><?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>
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
       <!-- <a href="Plugin/pdf_soli_vale.php" class="btn btn-danger">Generar Solicidud Vale</a> -->
  

</section>

    </div>
</body>
</html>