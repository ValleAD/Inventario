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
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">



    <link rel="stylesheet" type="text/css" href="styles/style.css" >
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.css"/>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.css"/>
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Egresos</title>
</head>
<body style="max-width: 100%;">
  
<style>
    form{
        margin: 0%;
    }
</style>
               <font color="white"><h1 style="margin:5px; text-align: center;">Egresos de Productos</h1></font>
    <section style="background: rgba(255, 255, 255, 0.9); margin: 2%;border-radius: 15px; padding: 1%";>
    <div class="row" style="position: relative; max-width: 100%; margin: 2% 0% 0% 10%;">
        <p style="color: #000; font-weight: bold; margin: 0.2% 4% 2%;">Mostrar Egresos por:</p>
            <form method="POST" style="background:transparent;">
               <div class="row" style="width:100%">  
              <div class=" col-sm-3" style="position: initial; margin-top: 2%   ;">  
                <a href="reporte_ingresos.php" class="btn btn-primary btn-sm">Inicio</a>
            </div>

            <div class=" col-sm-9" style="position: initial; ">
                        <select class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option value="">Seleccionar</option>
                            <option value="bodega">Solicitud a Bodega</option>
                            <option value="vale">Solicitud a Vale</option>
                        </select>
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
    <h3 style="text-align: center; color: black;">Egresos de Bodega</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_egreso.php">
                <button type="submit" class="btn btn-outline-primary" name="bodega"><i class="bi bi-printer"></i></button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button type="submit" class="btn btn-outline-primary" name="bodega"><i class="bi bi-file-pdf-fill"></i></button>
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
      <td data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
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

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_egreso.php">
                <button type="submit" class="btn btn-outline-primary" name="vale"><i class="bi bi-printer"></i></button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button type="submit" class="btn btn-outline-primary" name="vale"><i class="bi bi-file-pdf-fill"></i></button>
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
    <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
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
    <h3 style="text-align: center; color: black;">Egresos de Bodega</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_egreso.php">
                <button type="submit" class="btn btn-outline-primary" name="bodega"><i class="bi bi-printer"></i></button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button type="submit" class="btn btn-outline-primary" name="bodega"><i class="bi bi-file-pdf-fill"></i></button>
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
              <tr> <td align="center" id="td" colspan="10"><h4>No se encontraron resultados 😥</h4></td></tr>
              
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
      <td data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
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

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/reporte_egreso.php">
                <button type="submit" class="btn btn-outline-primary" name="vale"><i class="bi bi-printer"></i></button>
            </form>
            <form method="POST" action="Plugin/pdf_egresos.php">
                <button type="submit" class="btn btn-outline-primary" name="vale"><i class="bi bi-file-pdf-fill"></i></button>
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
    <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
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




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.js"></script>
    <script>
   $(document).ready(function(){
 $('#example').DataTable({        
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
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
    </script>
</body>
</html>