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
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" > 
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
    <title>Solicitudes De Almacen</title>
</head>


<body>
<section id="act">
    <style type="text/css">
        
     #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
    </style>
        <table class="table">
            <h1 class="text-center mg-t" style="margin-top: -0.5%;">Solicitudes de Almacen</h1><br>
          <thead>
              <tr id="tr">
                <th class="table-info text-dark"><strong>Código</strong></th>
                <th class="table-info text-dark"><strong>Nombre</strong></th>
                <th class="table-info text-dark"><strong>U/M</strong></th>
                <th class="table-info text-dark"><strong>Cantidad Solicitada</strong></th>
                <th class="table-info text-dark"><strong>Costo Unitario</strong></th>
                <th class="table-info text-dark"><strong>Fecha</strong></th>
                <th class="table-info text-dark"><strong>Detalles</strong></th>
               
                
                
            </tr>
            <tr>
                  <td id="td" colspan="7" >
                    <h4 align="center">No se encontraron resultados 😥</h4></td>
            </tr>
            </thead>
            <tbody>
            
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen ORDER BY fecha_registro DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Codigo"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="cod[]" value ="<?php  echo $solicitudes['codigo']; ?>"></td>

            <td data-label="Nombre"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="nombre[]" value ="<?php  echo $solicitudes['nombre']; ?>"></td>

            <td data-label="Unidad De Medida"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="um[]" value ="<?php  echo $solicitudes['unidad_medida']; ?>"></td>

            <td data-label="Cantidad Despachada"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="cantidad_solicitada[]" value ="<?php  echo $solicitudes['cantidad_solicitada']; ?>"></td>

            <td data-label="Precio"><input style="background:transparent; border: none; width: 100%;color: black;" type="number"  class="form-control" readonly name="costo[]" value ="<?php  echo $solicitudes['precio']; ?>"></td>
            
            <td data-label="Precio"><input style="background:transparent; border: none; width: 100%;color: black;" type="text"  class="form-control"  name="Fecha[]" value ="<?php  echo $solicitudes['fecha_registro']; ?>"></td>

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->
            <td>
                <form style="margin:0;background: transparent;" action="dt_almacen.php" method="POST">
                    <a href="Detalle_Almacen.php?id=<?php  echo $solicitudes['codigo']; ?>" class="btn btn-primary swal2-styled.swal2-confirm">Ver detalles</a>
                </form>
                
            </td>
        </tr>
           
 <?php } ?> 
      
            </tbody>
        </table>
    </section>
</body>
</html>
