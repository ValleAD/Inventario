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
    <div class=" container table-responsive" >
        <h2 class="text-center mg-t" style=" margin-top: -0.5%;">Solicitudes Circulante</h2>
        <p style="margin-top: 5%;" ></p>
        <table class="table">
        
        <thead>
              <tr id="tr">
                <th class="table-info text-dark"><strong>Código</strong></th>
                <th class="table-info text-dark"><strong>Nombre</strong></th>
                <th class="table-info text-dark"><strong>Unidad de Medida</strong></th>
                <th class="table-info text-dark"><strong>Cantidad Solicitada</strong></th>
                <th class="table-info text-dark"><strong>Precio</strong></th>
                <th class="table-info text-dark"><strong>Fecha Registro</strong></th>
                <th></th>
                
            </tr>
            <tr>
            <td id="td" colspan="7" style="background: red;"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
            </tr>
     </thead>
            <tbody>
            
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_circulante ORDER BY fecha_registro DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Codigo" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="cod" value="<?php  echo $solicitudes['codigo']; ?>"></td>

            <td data-label="Descripción" class="delete"><textarea readonly name="desc" style="width:100%;border:none;background: transparent;"><?php  echo $solicitudes['descripcion']; ?></textarea></td>

            <td data-label="Unidad De Medida" class="delete"><input readonly style="width:100%;border:none;background: transparent;" name="um" type="text"  value="<?php  echo $solicitudes['unidad_medida']; ?>"></td>

            <td data-label="Cantidad Solicitada" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="soli" value="<?php  echo $solicitudes['cantidad_solicitada']; ?>"></td> 

            <td data-label="Costo Unitario" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="number" name="costo" value="<?php  echo $solicitudes['costo']; ?>"></td>

            <td data-label="Eliminar" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="fecha" value="<?php  echo $solicitudes['fecha_registro']; ?>"></td>


<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->
            <td>
                <a href="Detalle_circulante.php?id=<?php  echo $solicitudes['codigo']; ?>" class="btn btn-primary swal2-styled.swal2-confirm">Ver detalles</a>
            </td>
        </tr>
            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
   
        </div>
 <?php } ?> 
           </tbody>
        </table>
    </form>
    </div>
</body>
</html>
