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
    <title>Solicitudes De Fondo Circulante</title>
</head>


<body>
    <div id="act">
        <style type="text/css"> 
     #act {
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }</style>
        <h2 class="text-center mg-t" style=" margin-top: -0.5%;">Solicitudes Circulante</h2><br>
        <table class="table">
        
        <thead>
              <tr id="tr">
                <th class="table-info text-dark"><strong>Código</strong></th>
                <th class="table-info text-dark"><strong>Departamento</strong></th>
                <th class="table-info text-dark"><strong>Encargado</strong></th>
                
                <th class="table-info text-dark"><strong>Fecha de Solicitud</strong></th>
                <th>Detalles</th>
                
            </tr>
            <tr>
            <td id="td" colspan="5"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
            </tr>
     </thead>
            <tbody>
            
    <?php
    include 'Model/conexion.php';
     $por_pagina = 6;
 if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
 }else{
    $pagina =1;
 }
 $empieza = ($pagina-1) * $por_pagina;

    $sql = "SELECT * FROM tb_circulante ORDER BY fecha_solicitud DESC LIMIT  $empieza,$por_pagina";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Codigo" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="cod" value="<?php  echo $solicitudes['codCirculante']; ?>"></td>

            <td data-label="Descripción" class="delete"><textarea readonly name="desc" style="width:100%;border:none;background: transparent;"><?php  echo $solicitudes['departamento']; ?></textarea></td>

            <td data-label="Unidad De Medida" class="delete"><input readonly style="width:100%;border:none;background: transparent;" name="um" type="text"  value="<?php  echo $solicitudes['usuario']; ?>"></td>

            

            

            <td data-label="Eliminar" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="fecha" value="<?php  echo $solicitudes['fecha_solicitud']; ?>"></td>


<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->
            <td>
                <a href="Detalle_circulante.php?id=<?php  echo $solicitudes['codCirculante']; ?>" class="btn btn-primary swal2-styled.swal2-confirm">Ver detalles</a>
            </td>
        </tr>
            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
   
        </div>
 <?php } ?> 
           </tbody>
        </table>
    <p style="margin-top: 2%;"></p>
<?php 
 $sql = "SELECT * FROM tb_circulante";
    $result = mysqli_query($conn, $sql);
$total_registro = mysqli_num_rows($result);
$total_pagina = ceil($total_registro / $por_pagina);

echo "<center><a id='cb' href='solicitudes_circulante.php?pagina= 1'>".'Primera'."</a>";
for ($i=1; $i <=$total_pagina; $i++) { 
    echo "<a id='c' href='solicitudes_circulante.php?pagina=".$i."'>".$i."</a>";
}
echo "<a  id='cbq' href='solicitudes_circulante.php?pagina=$total_pagina'>".'Ultima'."</a></center>";
?>

</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
               #cb{
            border-radius: 15px 0px 0px 15px;
            padding: 20px 10px;
            background: whitesmoke;
            }
            #cbq{
            border-radius: 0px 15px 15px 0px;
            padding: 20px 10px;
            background: whitesmoke;
            }
            #c{
            padding: 20px 10px;
            color: violet; 
            flex-wrap: wrap-reverse;
            text-decoration-style: dotted;
            background: whitesmoke;
     }
</style>

    </div>
</body>
</html>
