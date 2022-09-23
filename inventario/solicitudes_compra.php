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
    <style type="text/css">
       #x{
        di
       } 
     #act {
    margin-right: 1%;
    margin-left: 1%;
    padding: 1%;
    border-radius: 15px;
    background: white;
  }
  #ssas{
    display: none;
  }
    </style>

    <br><br><br>
    <center><h1 style="margin-top:2% ">Solicitudes de Compra</h1></center>
    <section id="act">
        <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
     
           <?php include ('Buscador_ajax/cabezeraCompra.php') ?>
               
            <?php if ($tipo_usuario==1) {?>
     <div id="div">

    <div id="x" style="position: initial;" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example">
         <form id="x" method="POST" style=" position: initial;" action="Plugin/soli_compra.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="x" method="POST" action="Plugin/pdf_soli_compra.php" class="mx-1" target="_blank">
             <button style="position: initial;"type="submit" class="btn btn-outline-primary" name="id" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
</div>
  <?php if (isset($_POST['Consultar'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
      <div  style="position: initial;" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example">
         <form id="ssas" method="POST" style=" position: initial;" action="Plugin/soli_compra.php" target="_blank">
          <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="Plugin/pdf_soli_compra.php" class="mx-1" target="_blank">
          <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;"type="submit" class="btn btn-outline-primary" name="Consultar" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
<?php } ?>

 <?php include ('Buscador_ajax/tablaCompra.php') ?>
     <div id="x">
        <table class="table table-responsive " id="div" style="width:100%">
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
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
<table class="table">
        <tbody> 

    <?php
    include 'Model/conexion.php';

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
 
<?php } ?>
            <?php if ($tipo_usuario==2) {?>
        <?php include ('Buscador_ajax/cabezeraCompra.php') ?>
<div  id="x" style="position: initial;" class="btn-group mb-3  mx-2" style=" position: initial;" role="group" aria-label="Basic outlined example">
         <form id="ssas" method="POST" action="Plugin/soli_compra.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="Plugin/pdf_soli_compra.php" class="mx-1" target="_blank">
    <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
 <?php if (isset($_POST['Consultar1'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
 <div  style="position: initial;" class="btn-group mb-3  mx-2" style=" position: initial;" role="group" aria-label="Basic outlined example">
         <form id="ssas" method="POST" action="Plugin/soli_compra.php" target="_blank">
            <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
          <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="Plugin/pdf_soli_compra.php" class="mx-1" target="_blank">
    <?php $sql = "SELECT * FROM tb_circulante WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
          <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar1">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
<?php } ?>
<?php include ('Buscador_ajax/tablaCompra.php') ?>
<div id="x">
        <table class="table table-responsive " id="div" style="width:100%">
            <thead>
              <tr id="tr">
               
                <th style="width: 10%;">No. Solicitud</th>
                <th style="width: 10%;">Dependencia</th>
                <th style="width: 10%;">Plazo y No. de Entregas</th>
                <th style="width: 10%;">Unidad Técnica</th>
                <th style="width: 10%;">Descripción Solicitud</th>
                <th style="width: 10%;">Encargado</th>
                <th style="width: 10%;">Fecha de Registro</th>
                <th style="width: 10%;">Estado</th>
                <th style="width: 10%;">Detalles</th>
           </tr>
    </thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
<table class="table">
        <tbody> 

    <?php
    include 'Model/conexion.php';

$tipo_usuario = $_SESSION['iduser'];
    $sql = "SELECT * FROM tb_compra WHERE idusuario='$tipo_usuario' ORDER BY nSolicitud DESC  ";
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
            <td style="width: 11%;min-width: 100%;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="width: 10%;min-width: 100%;" data-label="Descripción" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>

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
</div>
</div>
<?php } ?>

 </section>
   
</body>
</html>
