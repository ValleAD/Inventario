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

    <title>Solicitudes De Almacen</title>
</head>

<body>
<style>
        #ssas{

        display: none;
    }
    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}
form{
    margin: 0;
    padding: 1%;
}
#div{
    margin: 0;
    display: none;
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
        width: 85%;
    }
    }
    </style>
    <br><br><br>
            <h1 class="text-center mg-t" style="margin-top: -0.5%;" >Solicitudes de Almacen</h1><br>
<section  class="mx-3 p-2" style="background-color:white; border-radius:5px;margin-bottom: 3%;">
    <h1 id="td"class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>        
<?php if ($tipo_usuario==1) {?>
    <?php include ('Buscador_ajax/cabezeraAlmacen.php') ?>
     <div id="x"  style="position: initial;" class="btn-group my-2  mx-2" role="group" style="position: initial;" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/soli_almacen.php" id="ssas" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/pdf_soli_almacen.php" id="ssas" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary"  target="_blank" name="id">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div> 
 <?php if (isset($_POST['Consultar'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
     <div  style="position: initial;" class="btn-group my-2  mx-2" role="group" style="position: initial;" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/soli_almacen.php" id="ssas" target="_blank">
             <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/pdf_soli_almacen.php" id="ssas" target="_blank">
             <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary"  target="_blank" name="Consultar">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
<?php } ?>
<?php include ('Buscador_ajax/tablaAlmacen.php') ?>
        <div id="x">
<table class="table  table-striped" id="div" style=" width: 100%">
          <thead>
              <tr id="tr">
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 20%" >Departamento Solicitante</th>
                <th style=" width: 15%">Usuario</th>
                <th style="width: 15%">Fecha de solicitud</th>
                <th style="width: 2%">Estado</th>
                <th style="width: 15%" >Detalles</th>
                
            </tr>
            </thead>
        </table>

<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
            <tbody>
            <tr id="td" >
                <td colspan="9"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
            </tr>
   
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen ORDER BY codAlmacen DESC  ";
    $result = mysqli_query($conn, $sql);
 
    while ($datos_sol = mysqli_fetch_assoc($result)){
    
        if ($datos_sol['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        ?>
        <style>
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
            
            <td style=" width: 7%;min-width: 100%;" data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codAlmacen']; ?></td>
            <td style=" width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $datos_sol['departamento']; ?></td>
            <td style=" width: 20%;min-width: 100%;" data-label="Usuario" class="delete"><?php  echo $datos_sol['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td data-label="Estado" class="delete"><input readonly <?php
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
                                <?php  if ($datos_sol['estado']=="Aprobado" || $datos_sol['estado']=="Pendiente") {?>        
                     <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 

          <?php } if ($datos_sol['estado']=="Rechazado") {?>
                   
           <button disabled id="ver" style="cursor: not-allowed;"  type="submit" name="detalle" >Ver Detalles</button> 
        
           <?php  } ?>               
            </form> 
            </td>
        </tr>
 <?php } ?>

           </tbody>
        </table>
</div>
 </div>
         <?php } ?>

         <?php if ($tipo_usuario==2) {?>
                <?php include ('Buscador_ajax/cabezeraAlmacen.php') ?>
             <div id="x" style="position: initial;" class="btn-group mb-3 my-2  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/soli_almacen.php" id="ssas" target="_blank">
            <?php $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario'";
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
         <form method="POST" action="Plugin/pdf_soli_almacen.php" id="ssas" target="_blank">
            <?php $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario'";
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
 </div>  <?php if (isset($_POST['Consultar1'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
             <div  style="position: initial;" class="btn-group mb-3 my-2  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/soli_almacen.php" id="ssas" target="_blank">
            <?php $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
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
         <form method="POST" action="Plugin/pdf_soli_almacen.php" id="ssas" target="_blank">
            <?php $sql = "SELECT * FROM tb_almacen WHERE idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($datos_sol = mysqli_fetch_array($result)){?>
 <input type="hidden" name="idusuario" value="<?php echo $datos_sol['idusuario'] ?>">
       
    <?php } ?>
             <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
 </div>
<?php } ?>
    <?php include ('Buscador_ajax/tablaAlmacen.php') ?>
    <div id="x">
<table class="table  table-striped" id="div" style=" width: 100%">
          <thead>
              <tr id="tr">
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 20%" >Departamento Solicitante</th>
                <th style=" width: 15%">Usuario</th>
                <th style="width: 15%">Fecha de solicitud</th>
                <th style="width: 2%">Estado</th>
                <th style="width: 15%" >Detalles</th>
                
            </tr>
            </thead>
        </table>

<div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
            <tbody>
            <tr id="td" >
                <td colspan="9"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
            </tr>
   
    <?php
    include 'Model/conexion.php';
$sql = "SELECT * FROM tb_almacen WHERE  idusuario='$idusuario' ORDER BY fecha_solicitud  ";
    $result = mysqli_query($conn, $sql);

    while ($datos_sol = mysqli_fetch_assoc($result)){
    
        if ($datos_sol['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        ?>
        <style>
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
            
            <td style=" width: 7%;min-width: 100%;" data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codAlmacen']; ?></td>
            <td style=" width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $datos_sol['departamento']; ?></td>
            <td style=" width: 20%;min-width: 100%;" data-label="Usuario" class="delete"><?php  echo $datos_sol['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
            <td data-label="Estado" class="delete"><input readonly <?php
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
                <?php  if ($datos_sol['estado']=="Aprobado" || $datos_sol['estado']=="Pendiente") {?>
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Almacen.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codAlmacen']; ?>">             
                                <?php  if ($datos_sol['estado']=="Aprobado" || $datos_sol['estado']=="Pendiente") {?>        
                     <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 

          <?php } if ($datos_sol['estado']=="Rechazado") {?>
                   
           <button disabled id="ver" style="cursor: not-allowed;"  type="submit" name="detalle" >Ver Detalles</button> 
        
           <?php  } }?>               
            </form> 
            </td>
        </tr>
 <?php } ?>

           </tbody>
        </table>
</div>
</div>
         <?php } ?>
</section>
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
</body>
</html>