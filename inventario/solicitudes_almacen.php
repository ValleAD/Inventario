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
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Solicitudes De Almacen</title>
</head>

<body>
<style>
    h1 {
  color: white;
}
    </style>
            <h1 class="text-center mg-t" style="margin-top: -0.5%;" >Solicitudes de Almacen</h1><br>
<section class="mx-5 p-2" style="background-color:white; border-radius:5px;margin-bottom: 3%;">
<?php if ($tipo_usuario==1) {?>
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
          <thead>
              <tr id="tr">
                <th>#</th>
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 30%" >Departamento Solicitante</th>
                <th style=" width: 20%">Usuario</th>
                <th style=" width: 20%;">Fecha de solicitud</th>
                <th style=" width: 15%">Estado</th>
                <th style=" width: 10%" >Detalles</th>
                
            </tr>
            </thead>
            <tbody>
   
    <?php
    include 'Model/conexion.php';
    $tipo_usuario = $_SESSION['iduser'];
    $sql = "SELECT * FROM tb_almacen WHERE  idusuario='$tipo_usuario' ORDER BY fecha_solicitud DESC ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_assoc($result)){
        $n++;
        $r=$n+0;
        if ($datos_sol['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        ?>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codAlmacen']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $datos_sol['departamento']; ?></td>
            <td data-label="Encargado" class="delete"><?php  echo $datos_sol['encargado'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td data-label="Fecha de solicitud" class="delete"><input readonly <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" readonly type="text" name="" value="<?php echo $datos_sol['estado'] ?>"><br>
              </td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Almacen.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codAlmacen']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">                 
            </form> 
            </td>
        </tr>
 <?php } ?>

           </tbody>
        </table>
     <!--   <a href="Plugin/pdf_soli_almacen.php" class="btn btn-danger">Generar Solicidud Almacen</a>-->
 
         <?php } ?>

         <?php if ($tipo_usuario==2) {?>
<table class="table table-responsive table-striped" id="example" style=" width: 100%">
          <thead>
              <tr id="tr">
                <th>#</th>
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 30%" >Departamento Solicitante</th>
                <th style=" width: 20%">Usuario</th>
                <th style=" width: 20%;">Fecha de solicitud</th>
                <th style=" width: 15%">Estado</th>
                <th style=" width: 10%" >Detalles</th>
                
            </tr>
            </thead>
            <tbody>
   
    <?php
    include 'Model/conexion.php';
    $tipo_usuario = $_SESSION['iduser'];
    $sql = "SELECT * FROM tb_almacen WHERE  idusuario='$tipo_usuario' ORDER BY fecha_solicitud DESC ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_assoc($result)){
        $n++;
        $r=$n+0;
        ?>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codAlmacen']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $datos_sol['departamento']; ?></td>
            <td data-label="Usuario" class="delete"><?php  echo $datos_sol['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td data-label="Fecha de solicitud" class="delete"><input readonly <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" readonly type="text" name="" value="<?php echo $datos_sol['estado'] ?>"><br>
              </td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Almacen.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codAlmacen']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">                 
            </form> 
            </td>
        </tr>
 <?php } ?>
           </tbody>
        </table>
     <!--   <a href="Plugin/pdf_soli_almacen.php" class="btn btn-danger">Generar Solicidud Almacen</a>-->
 
         <?php } ?>
</section>
 
</body>
</html>