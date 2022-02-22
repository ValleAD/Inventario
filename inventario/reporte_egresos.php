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
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">



    <link rel="stylesheet" type="text/css" href="styles/style.css" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <title>Egresos</title>
</head>
<body>
           <font color="white"><h1 style="margin: 0% 0% 2% 0%; text-align: center;">Egreso de Productos</h1></font>
    <section id="act">
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
    padding: 1%;
            border-radius: 15px;
   background: rgba(255, 255, 255, 0.9);
  }
</style>

<br>
    <style>
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } 
    </style>
    <div class="row" style="position: relative; max-width: 100%; margin: 2% 0% 0% 0%;">
        <p style="color: #000; font-weight: bold; margin: 0.2% 4% 2%;">Mostrar Egresos por:</p>
            <form method="POST" style="background:transparent;">
                <div class="row">
                    <div class="col-32 col-sm-12" style="position: in;">
                        <select class="form-control" name="ingresos" id="ingresos" onchange="this.form.submit()">
                            <option value="">Seleccionar</option>
                            <option value="bodega">Solicitud a Bodega</option>
                            <option value="vale">Solicitud a Vale</option>
                        </select>
                    </div>
                </div>  
            </form>
    </div> 
    <section id="act">
<?php

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

    <h3 style="text-align: center; color: black;">Egresos de Bodega</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <thead>
              <tr id="tr">
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
    include 'Model/conexion.php';
     
   $sql = "SELECT * FROM tb_bodega db JOIN detalle_bodega b ON db.codBodega = b.odt_bodega";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){?>

<style type="text/css">


</style>
    <tr id="tr">
    <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
      <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
      <td data-label="Código Producto"><?php  echo $productos['codigo']; ?></td>
      <td data-label="Descripción" style="text-align: left"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
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
</style>
<h3 style="text-align: center; color: black;">Egresos Por Vale</h3>

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
            <thead>
              <tr id="tr">
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
    include 'Model/conexion.php';
   
 

    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale ";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){?>

       
            
<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr id="tr">
    <td data-label="No. Vale"><?php  echo $productos['numero_vale']; ?></td> 
    <td data-label="Departamento" style="text-align: left;"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Descripción Completa" style="text-align: left;"><?php  echo $productos['descripcion']; ?></td>
    <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
    <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
    <td data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 
            </tbody>
        </table>
<?php
    }}?>



</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

    <!-- searchPanes   -->
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <!-- select -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
    
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
                "sProcessing":"Procesando...", 
            }
        });

    });
    </script>
</body>
</html>