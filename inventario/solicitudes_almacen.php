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
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    <title>Solicitudes De Almacen</title>
</head>

<body>
<style>
    h1 {
  color: white;
}
    </style>
            <h1 class="text-center mg-t" style="margin-top: -0.5%;" >Solicitudes de Almacen</h1><br>
<section class="mx-5 p-2" style="background-color:white; border-radius:5px">

<table class="table table-responsive table-striped" id="example" style=" width: 100%">
          <thead>
              <tr id="tr">
             
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 30%" >Departamento Solicitante</th>
                <th style=" width: 20%">Encargado</th>
                <th style=" width: 20%;">Fecha de solicitud</th>
                <th style=" width: 15%">Estado</th>
                <th style=" width: 10%" >Detalles</th>
                
            </tr>
            </thead>
            <tbody>
   
    <?php
    include 'Model/conexion.php';

    $sql = "SELECT * FROM tb_almacen ORDER BY fecha_solicitud DESC ";
    $result = mysqli_query($conn, $sql);

    while ($datos_sol = mysqli_fetch_assoc($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
    
   
</style>

        <tr>
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
         
</section>
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
                "lengthMenu": "Mostrar _MENU_ registros ",
                "zeroRecords": "No se encontraron resultados 😢",
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