<?php
    include 'Model/conexion.php';
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

    <title>Egresos</title>
</head>
<body style="max-width: 100%;">
  
<style>
    form{
        margin: 0%;
    }
    @media (max-width: 800px){
        body{
            background: black;
        }
        #ssa{
            margin-left: 7%;
            margin-bottom: 5%;
        }
        #x{
            margin: 3%5%;
        }
    }
</style>
               <font color="white"><h1 style="margin:5px; text-align: center;">Egresos de Productos</h1></font>
    <section style="background: rgba(255, 255, 255, 0.9); margin: 2%;border-radius: 15px; padding: 1%";>
  <div style="position: initial;" class="row" style="position: relative; max-width: 100%;">
        <p id="x" class="mx-3" style="color: #000; font-weight: bold;">Mostrar Ingresos por:</p>
            <form method="POST" style="background:transparent;">
                <div class="row" style="width:100%">
                
                    <?php if(isset($_POST['ingresos'])){

                        $mostrar = $_POST['ingresos'];
                        if($mostrar == "bodega" ){
                         ?> <div class=" col-md-3" style="position: initial;">
                <a id="ssa" href="" class="btn btn-primary">Inicio</a></<div>
            <?php }
            if ( $mostrar == "vale") {
                echo'<div class=" col-md-3" style="position: initial;">
                <a id="ssa" href="" class="btn btn-primary">Inicio</a></<div>';
            }} ?>
            </div>

            <div class="col-md-12" style="position: initial;">
            <select id="ssa" class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option>Seleccionar</option>
                            <option  value="bodega">Solicitud  de Bodega</option>
                            <option value="vale">Solicitud Vale</option>
                        </select>
            </div>          
                </div>  
            </div>
            </form>
    </div> 
<?php
if ($tipo_usuario==1) {

if(isset($_POST['ingresos'])){

    $mostrar = $_POST['ingresos'];
    
    if($mostrar == "bodega"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;
    background-color: white;
  }
  input{
    width: 100%;
  }
</style>
    <br>
    <h3 style="text-align: center;">Egresos de Bodega</h3>

<table class="table  table-striped" id="example" style=" width: 100%">
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
 <form method="POST" action="Plugin/reporte_egreso.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width: 10%">#</th>
                <th  style="width: 15%">Departamento</th>
                <th  style="width: 15%">Encargado</th>
                <th  style="width: 10%">Codigo</th>
                <th  style="width: 100%">Descripción Completa</th>
                <th  style="width: 100%">U/M</th>
                <th  style="width: 100%">Cantidad</th>
                <th  style="width: 100%">Costo Unitario</th>
                <th  style="width: 100%">Ingreso Por</th>
                <th  style="width: 100%">Fecha Registro</th>
              </tr>

              
            </thead>

            <tbody>
 <?php
$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0;
         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }?>

<style type="text/css">


</style>
    <tr id="tr">
        <td data-label="#"><?php echo $r ?></td>
    <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
      <td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td data-label="Fuente de Ingreso"><?php  echo $productos['campo']; ?></td>
      <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      

    
    </tr>

<?php } ?> 

            </tbody>
        </table>


<?php 
    }
    else if($mostrar == "vale"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;
    background-color: white;

  }
    input{
    width: 100%;
  }
</style><br>
<h3 style="text-align: center; color: black;">Egresos Por Vale</h3>

<table class="table  table-striped" id="example" style=" width: 100%">
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_egreso.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width:10%">#</th>
                <th style="width: 15%;">No. Vale</th>
                <th style="width: 15%;">Departamento Solicitante</th>
                <th style="width: 15%;">Encargado</th>
                <th style="width: 15%;">Código</th>
                <th style="width: 100%;">Descripción Completa</th>
                <th style="width: 15%;">U/M</th>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 100%;">Costo Unitario</th>
                <th style="width: 100%;">Solictud de Salida</th>
                <th style="width: 100%;text-align: center">Fecha</th>
              </tr>

              
            </thead>

            <tbody>
 <?php
    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
        $n++;
        $r=$n+0;
         if ($productos['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }if ($productos['idusuario']==0) {
            $u='Invitado';
        }
        ?>

       
            
<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr id="tr">
        <td data-label="#"><?php echo $r ?></td>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Departamento" style="text-align: left;"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
    <td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
    <td data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 
            </tbody>
        </table>
<?php
    }
}
}
if ($tipo_usuario==2) {

if(isset($_POST['ingresos'])){

    $mostrar = $_POST['ingresos'];
    
    if($mostrar == "bodega"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;
    background-color: white;
  }
  input{
    width: 100%;
  }
</style>
    <br>
    <h3color: black;">Egresos de Bodega</h3>

<table class="table  table-striped" id="example" style=" width: 100%">
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
 <form method="POST" action="Plugin/reporte_egreso.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="bodega">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width: 10%">#</th>
                <th  style="width: 15%">Departamento</th>
                <th  style="width: 15%">Encargado</th>
                <th  style="width: 10%">Codigo</th>
                <th  style="width: 100%">Descripción Completa</th>
                <th  style="width: 100%">U/M</th>
                <th  style="width: 100%">Cantidad</th>
                <th  style="width: 100%">Costo Unitario</th>
                <th  style="width: 100%">Ingreso Por</th>
                <th  style="width: 100%">Fecha Registro</th>
              </tr>
              
            </thead>

            <tbody>
 <?php
          $idusuario = $_SESSION['iduser'];

$sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega WHERE db.idusuario='$idusuario'";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($productos = mysqli_fetch_array($result)){
         $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $n++;
        $r=$n+0;?>

<style type="text/css">

#td{
    display: none;
}
</style>
    <tr id="tr">
        <td data-label="#"><?php echo $r ?></td>
    <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
      <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
      <td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
      <td data-label="Fuente de Ingreso"><?php  echo $productos['campo']; ?></td>
      <td data-label="Fecha Registro"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
      

    
    </tr>

<?php } ?> 

            </tbody>
        </table>


<?php 
    }
    else if($mostrar == "vale"){
?>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 3%;
    margin-left: 3%;
    padding: 1%;
    border-radius: 5px;
    background-color: white;

  }
    input{
    width: 100%;
  }
</style><br>
<h3color: black;">Egresos Por Vale</h3>

<table class="table  table-striped" id="example" style=" width: 100%">
            <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_egreso.php">
                <button type="submit" class="btn btn-outline-primary" name="vale">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button type="submit" class="btn btn-outline-primary" name="vale">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width:10%">#</th>
                <th style="width: 15%;">No. Vale</th>
                <th style="width: 15%;">Departamento Solicitante</th>
                <th style="width: 15%;">Encargado</th>
                <th style="width: 15%;">Código</th>
                <th style="width: 100%;">Descripción Completa</th>
                <th style="width: 15%;">U/M</th>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 100%;">Costo Unitario</th>
                <th style="width: 100%;">Solictud de Salida</th>
                <th style="width: 100%;text-align: center">Fecha</th>
              </tr>

              
            </thead>

            <tbody>
 <?php
          $idusuario = $_SESSION['iduser'];

    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale WHERE V.idusuario='$idusuario' ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($productos = mysqli_fetch_array($result)){
 $precio=$productos['precio'];
       $precio2=number_format($precio, 2,".",",");
        $n++;
        $r=$n+0?>

       
            
<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr id="tr">
        <td data-label="#"><?php echo $r ?></td>
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Departamento" style="text-align: left;"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad"><?php  echo $productos['stock']; ?></td>
    <td data-label="Costo Unitario">$<?php  echo $precio2 ?></td>
    <td data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 
            </tbody>
        </table>
<?php
    }
}
}?>



   
</body>
</html>