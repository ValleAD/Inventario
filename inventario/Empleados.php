
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
    <title>Empleados</title>
</head>


<body>
    <section style="margin:5%;background: transparent; ">
        <h2 class="text-center mg-t" style=" margin-top: -0.5%;">Empleados Del Sistema</h2>

        <table class="table">

    <button class="btn btn-success" data-toggle="modal" data-target="#Usuarios" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%;">Nuevo Integrantes</button>
<!-- Delete -->
<div class="modal fade" id="Usuarios" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: hsla(0.5turn , 100% , 0.1% , 0.5 );color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Información del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
              <div class="modal-body">
                <form action="Controller/añadirEmpleados.php" method="POST">
                <label>Usuario</label>              
            <input class="form-control" name="Usuario" type="text">
            <label>Nombres</label>              
            <input class="form-control" name="Nombres" type="text">
            <label>Apellidos</label>
            <input class="form-control" name="Apellidos" type="text">
            <label>Establecimientos</label>
            <select class="form-control" name="Establecimientos">
                <option selected disabled >Seleccionar</option>
                <option>Hospital Nacional Zacatecoluca PA "Santa Tereza"</option>
            </select>
            <label>Unidad</label>
            <select class="form-control" name="Unidad">
                <option selected disabled >Seleccionar</option>
                <option>Departamento Mantenimiento Local</option>
                <option>Sección Equipo Básico</option>
                <option>Sección Planta Física y Mobiliario</option>
                <option>Sección Equipo Médico</option>
            </select>
            <label>Password</label>
            <input class="form-control" name="Password" type="password"> 
             <label for="">Tipo De Usuario</label><br> 
                    <select  class="form-control" name="tipo_usuario" id="Tipo" required style="cursor: pointer">
                        <option selected disabled >Seleccionar</option>
                       <option value="2">Administrador</option>
                    </select>
               
            </div>
            <style type="text/css">
                label{
                    color: white;
                }
            </style>
            <div class="modal-footer">
        <button name="submit" type="submit" id="Update" class="btn btn-danger" >Agregar</button> 
      </div>
           </form> 
        </div>
    </div>
</div>
        <thead>
              <tr id="tr">
                <th class="table-info text-dark"><strong>Nombre</strong></th>
                <th class="table-info text-dark"><strong>Apellidos</strong></th>
                <th class="table-info text-dark"><strong>Establecimiento</strong></th>
                <th class="table-info text-dark"><strong>Unidad</strong></th>
                <th style="text-align:center;">Eliminar</th>
                
            </tr>
            <tr>
            <td id="td" colspan="5" style="background: red;"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
            </tr>
     </thead>
            <tbody>
            
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_usuarios";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Nombres" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="cod" value="<?php  echo $solicitudes['firstname']; ?>"></td>

            <td data-label="Apellidos" class="delete"><input readonly name="desc" style="width:100%;border:none;background: transparent;" value="<?php  echo $solicitudes['lastname']; ?>"></td>

            <td data-label="Establecimiento" class="delete"><input data-bs-toggle="tooltip" data-bs-placement="top" title="<?php  echo $solicitudes['Establecimiento']; ?>" readonly style="width:100%;border:none;background: transparent;" name="um" type="text"  value="<?php  echo $solicitudes['Establecimiento']; ?>"></td>

            <td data-label="unidad" class="delete"><input readonly style="width:100%;border:none;background: transparent;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php  echo $solicitudes['unidad']; ?>" type="text" name="soli" value="<?php  echo $solicitudes['unidad']; ?>"></td> 


<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->

            <td align="center">
                <a href="Controller/Delete_Empleados.php?id=<?php  echo $solicitudes['id']; ?>" onclick="return confirmaion()" class="btn btn-danger swal2-styled.swal2-confirm">Eliminar</a>
            </td>
        </tr>
          
 <?php } ?> 
           </tbody>
        </table>
  </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
let linkDelete =document.querySelectorAll("delete");
</script>
</body>
</html>
