
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
    <title>Dependencias</title>
</head>


<body>

<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT * FROM selects_dependencia  WHERE  id = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
?>


<form action="Controller/Desabilitar-dependencias.php" method="POST" style="background: transparent; ">
  <h3 align="center">Actualizar Dependencias Habilitadas </h3>
    <div class="container" style="background: rgba(0, 0, 0, 0.6); width: 70%; margin: auto; border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-top: 2%">
                <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <label for="">Habilitado</label><br> 
                    <select  class="form-control" name="Habilitado" id="categoria" style="cursor: pointer">
                        <option disabled selected>[Seleccione]</option>
                        <option>Si</option>
                        <option>No</option>
                        
                    </select>
            </div>
         </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-bottom: 2%;">
                <button type="submit" name="Update_Dependencias" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="dependencias.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
            </div>
        </div>
    </div>
</form>

<style>
  #act {
    margin-top: 0.5%;
  }
</style>
<?php 
  }
} 
?>
    <section style="margin:2%;background: transparent; ">
        <h2 class="text-center " >Dependencias Del Departamento</h2>

        <table class="table">
<?php if($tipo_usuario == 1) { ?>
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
            <label>Tipo de Usuario</label>
            <select class="form-control" name="tipo">
                <option selected disabled >Seleccionar</option>
                <option value="1">Administrador</option>
                <option value="2">Técnico</option>
            </select>
            <label>Password</label>
            <input class="form-control" name="Password" type="password"> 
            
               
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
</div><?php } ?>
        <thead>
             <tr id="tr">
                <th class="table-info text-dark"><strong>Dependencia</strong></th>
                <th class="table-info text-dark text-center"><strong>Habilitado</strong></th><?php if($tipo_usuario == 1) { ?>
                <th class="table-info text-dark text-center"><strong> Cambiar Habilitado</strong></th>
                <th style="text-align:center;">Eliminar</th><?php } ?>
                
            </tr>
            <tr>
            <td id="td" colspan="7" style="background: red;"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
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
    $sql = "SELECT * FROM selects_dependencia LIMIT $empieza,$por_pagina";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Nombres" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="cod" value="<?php  echo $solicitudes['dependencia']; ?>"></td>

            <td ><input type="text"  name="Habilitado" style="width:100%;border:none;background: transparent; text-align: center;"  value="<?php  echo $solicitudes['Habilitado']; ?>"></td><?php if($tipo_usuario == 1) { ?>
            <td align="center">
                 <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="dependencias.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">             
          <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
            

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->

            <td align="center">
               <form action="Controller/Delete-dependencia.php" method="POST">
                    <input type="hidden" name="id" value="<?php  echo $solicitudes['id']; ?>">
                    <input type="hidden" name="Habilitado" value="<?php  echo $solicitudes['Habilitado']; ?>">
                    <button  onclick="return confirmaion()" name="eliminar_dependencias" class="btn btn-danger" type="submit">ELiminar</button>
                </form>
            </td></td><?php } ?>
        </tr>
      

 <?php } ?> 
           </tbody>
        </table>
         <p style="margin-top: 2%;"></p>
        <?php 
 $sql = "SELECT * FROM selects_dependencia";
    $result = mysqli_query($conn, $sql);
$total_registro = mysqli_num_rows($result);
$total_pagina = ceil($total_registro / $por_pagina);

echo "<nav aria-label='Page navigation example'>
  <ul class='pagination justify-content-end'><li class='page-item '><a class='page-link' href='dependencias.php?pagina= 1'>".'Primera'."</a><li>";
for ($i=1; $i <=$total_pagina; $i++) { 
    echo "<li class='page-item '><a class='page-link ' href='dependencias.php?pagina=".$i."'>".$i."</a></li>";
}
echo "<li class='page-item'><a class='page-link' href='dependencias.php?pagina=$total_pagina'>".'Ultima'."</a><li></ul></nav>";
?>
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
</body>
</html>
