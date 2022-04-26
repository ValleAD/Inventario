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

     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" > 

    <style>

h1 {
  color: white;
   text-align: center;
}
    </style>
    <title>Solicitudes De Compra</title>
</head>
<body>
    <style type="text/css">
        
     #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
    </style><center><h1 style="margin-top:5px">Solicitudes de Compra</h1></center>
            <br>
            <?php if ($tipo_usuario==1) {?>
     <div class="mx-5 p-2" id="act" style="background: white; border-radius: 5px;">
        <table class="table table-responsive" id="example" style="width:100%">
            
            <thead>
              <tr id="tr">
                <th>#</th>
                <th style="width:10%">No. Solicitud</th>
                <th  style="width:10%">Dependencia</th>
                <th  style="width:10%">Plazo y No. de Entregas</th>
                <th  style="width:10%">Unidad Técnica</th>
                <th  style="width:20%" align="center">Descripción Solicitud</th>
                <th  style="width:20%" align="center">Encargado</th>
                <th  style="width:20%">Fecha de Registro</th>
                <th  style="width:10%">Estado</th>
                <th  style="width:10%">Detalles</th>
           
    </thead>
        <tbody> 
            
    <?php
    include 'Model/conexion.php';

    $sql = "SELECT * FROM tb_compra  ORDER BY fecha_registro DESC ";
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
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
</style>
        <tr>
            <td><?php echo $r ?></td>
            <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><input readonly <?php
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
       <!-- <a  href="Plugin/pdf_soli_compra.php" class="btn btn-danger">Generar Solicidud de Compra</a>-->

 </div>
<?php } ?>
            <?php if ($tipo_usuario==2) {?>
     <div class="mx-5 p-2" id="act" style="background: white; border-radius: 5px;">
        <table class="table table-responsive" id="example" style="width:100%">
            
            <thead>
              <tr id="tr">
                <th>#</th>
                <th style="width:10%">No. Solicitud</th>
                <th  style="width:10%">Dependencia</th>
                <th  style="width:10%">Plazo y No. de Entregas</th>
                <th  style="width:10%">Unidad Técnica</th>
                <th  style="width:20%" align="center">Descripción Solicitud</th>
                <th  style="width:20%">Fecha de Registro</th>
                <th  style="width:10%">Estado</th>
                <th  style="width:10%">Detalles</th>
           
    </thead>
        <tbody> 
            
    <?php
    include 'Model/conexion.php';

$tipo_usuario = $_SESSION['iduser'];
    $sql = "SELECT * FROM tb_compra WHERE idusuario='$tipo_usuario' ORDER BY fecha_registro DESC ";
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
            <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><input readonly <?php
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
       <!-- <a  href="Plugin/pdf_soli_compra.php" class="btn btn-danger">Generar Solicidud de Compra</a>-->

 </div>
<?php } ?>
   
</body>
</html>
