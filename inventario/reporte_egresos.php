<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../log/signin.php";
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <title>Egresos</title>
</head>
<body>
    <section id="act">
           <h1 style="margin-top:5px; text-align: center;">Egreso de Productos</h1>
<style>
  #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
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

       <table class="table">
            <thead>
              <tr id="tr">
                <th style="width: 175%;">No. Vale</th>
                <th style="width: 275%;">Departamento Solicitante</th>
                <th style="width: 175%;">Encargado</th>
                <th style="width: 175%;">Código</th>
                <th style="width: 225%;">Descripción Completa</th>
                <th style="width: 175%;">U/M</th>
                <th style="width: 175%;">Cantidad</th>
                <th style="width: 175%;">Costo Unitario</th>
                <th style="width: 275%;">Solictud de Salida</th>
                <th style="width: 275%;text-align: center">Fecha</th>
              </tr>

              <tr> <td id="td" colspan="11">
                <h4 align="center">No se encontraron resultados 😥</h4></td>
              </tr>
            </thead>

            <tbody>
 <?php
    include 'Model/conexion.php';
     $por_pagina = 5;
 if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
 }else{
    $pagina =1;
 }
 $empieza = ($pagina-1) * $por_pagina;

    $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale LIMIT  $empieza,$por_pagina";
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
    <td data-label="Departamento"><?php  echo $productos['departamento']; ?></td>
    <td data-label="Encargado"><?php  echo $productos['usuario']; ?></td>
    <td data-label="Codigo"><?php  echo $productos['codigo']; ?></td>
    <td data-label="Descripción Completa"><textarea style="background:transparent; border: none; color: black;" cols="10" rows="1" readonly name="" id="" cols="10" rows="3" class="form-control"><?php  echo $productos['descripcion']; ?></textarea></td>
    <td data-label="Unidad De Medida" style="text-align: center;"><?php  echo $productos['unidad_medida']; ?></td>
    <td data-label="Cantidad" style="text-align: center;"><?php  echo $productos['stock']; ?></td>
    <td data-label="Costo Unitario">$<?php  echo $productos['precio']; ?></td>
    <td data-label="Costo Unitario"><?php  echo $productos['campo']; ?></td>
    <td data-label="No. Vale"><?php  echo date("d-m-Y",strtotime($productos['fecha_registro'])); ?></td>
<?php } ?>      
 
            </tbody>
        </table>
         <p style="margin-top: 2%;"></p>
<?php 
 $sql = "SELECT * FROM `detalle_vale` D JOIN `tb_vale` V ON D.numero_vale=V.CodVale";
    $result = mysqli_query($conn, $sql);
$total_registro = mysqli_num_rows($result);
$total_pagina = ceil($total_registro / $por_pagina);

echo "<nav aria-label='Page navigation example'>
  <ul class='pagination justify-content-end'><li class='page-item '><a class='page-link' href='reporte_egresos.php?pagina= 1'>".'Primera'."</a><li>";
for ($i=1; $i <=$total_pagina; $i++) { 
    echo "<li class='page-item '><a class='page-link ' href='reporte_egresos.php?pagina=".$i."'>".$i."</a></li>";
}
echo "<li class='page-item'><a class='page-link' href='reporte_egresos.php?pagina=$total_pagina'>".'Ultima'."</a><li></ul></nav>";
?>

</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</body>
</html>