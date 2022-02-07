
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

<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT * FROM tb_usuarios  WHERE  id = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
?>


<form action="Controller/Desabilitar-Empleado.php" method="POST" style="background: transparent; ">
  <h3 align="center">Actualizar Producto</h3>
    <div class="container" style="background: rgba(0, 0, 0, 0.6); width: 70%; margin: auto; border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-top: 2%">
                <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <label for="">Habilitado</label><br> 
                    <select  class="form-control" name="estado" id="categoria" style="cursor: pointer">
                        <option>[Seleccione]</option>
                        <option>Si</option>
                        <option>No</option>
                        
                    </select>
            </div>
         </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-bottom: 2%;">
                <button type="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="Empleados.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
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
        <h2 class="text-center " >Empleados Del Sistema</h2>

        <table class="table">
<?php if($tipo_usuario == 1) { ?>

    <button class="btn btn-secondary" data-toggle="modal" data-target="#Usuarios" style="float: left; color: white;margin-bottom: 1%;">Nuevo Integrante</button>

    <a href="categorias.php" class="btn btn-info" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; ">Categorias</a> 
    <a href="dependencias.php" class="btn btn-success" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Dependencias</a>
    <a href="departamentos.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Departamentos</a>

    

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
              <div class="row">
                    <div class="col-md-6" style="position: initial">
                       <label class="small mb-1">Nombre de usuario</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" type="text"  name="usuario"  required>
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Nombre</label><br>
                        <input pattern="[A-Za-z0-9_- ]{1,}" class="form-control" type="text"  name="nombre" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6" style="position: initial">
                     <label class="small mb-1">Apellido</label><br>
                        <input pattern="[A-Za-z0-9- ]{1,}" class="form-control" type="text"  name="Apellido"  required>
                        
                                                
                                        
                     
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Establecimiento</label><br>
                       <select class="form-control" name="Establecimientos">
                <option selected disabled >Seleccionar</option>
                <option>Hospital Nacional Zacatecoluca PA "Santa Tereza"</option>
            </select>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Contraseña</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" id="show" type="password"  name="password"  required>
                      <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick="myFuntion();" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Mostrar Contraseña</label></div>
                  </div>
                  <div class="col-md-6" style="position: initial">
                      <label class="small mb-1">Confirmar Contraseña</label><br>
                        <input pattern="[A-Za-z0-9_-]{1,}" class="form-control" id="show1" type="password"  name="cpassword" required>
                        <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick=" myFuntion1();" id="PasswordCheck" type="checkbox" /><label class="custom-control-label" for="PasswordCheck">Mostrar Contraseña</label></div>
                  </div>
                </div>
                <br>
                <div class="row">
                    
                    <div class="col-md-6" style="position: initial">
                        <label  class="small mb-1">Unidad ó Departamento</label><br>
            <select class="form-control" name="Unidad">
                <option selected disabled >Seleccionar</option>
                   <?php  
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ 
      echo'  <option>'.$productos['departamento'].'</option>
  ';   
 }?>
            </select>
                </div>
                <div class="col-md-6" style="position: initial">
                                                <label class="small mb-1">Tipo de Usuarios (Roles De Usuario)</label>
                                                <select class="form-control" name="tipo_usuario" required>
                                                    <option selected disabled>Selecione</option>
                                                    <option value="1">Admistrador</option>
                                                    <option value="2">Tenico</option>
                                               </select>
                        </div>
                    </div>
                <div>
                    <div class="form-group" style="margin-top: 2%;">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </div>

                    </div>
                     <style type="text/css">
                    label{
                    color: white;
                 }
                    </style>
                
                </form> 
        </div>
    </div>
</div><?php } ?>
        <thead>
              <tr id="tr">
                <th style="width: 12%"><strong>Nombre</strong></th>
                <th style="width: 12%"><strong>Apellidos</strong></th>
                <th style="width: 15%"><strong>Establecimiento</strong></th>
                <th style="width: 15%"><strong>Unidad</strong></th>
                <th  style="width: 8%; text-align:center;" ><strong>Habilitado</strong></th><?php if($tipo_usuario == 1) { ?>
                <th style="width: 10%;margin-left: 5%;"><strong style="text-align: center;"> Cambiar Habilitado</strong></th>
                <th style="width: 10%">Eliminar</th><?php } ?>
                
            </tr>
            <tr>
            <td id="td" colspan="7" style="background: red;"><h4 align="center">No se encontraron ningun  resultados 😥</h4></td>
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
    $sql = "SELECT * FROM tb_usuarios ORDER BY `id` LIMIT $empieza,$por_pagina";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_assoc($result)){?>
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
            
 <td align="center">
            <input  <?php
                if($solicitudes['Habilitado']  =='Si') {
                    echo ' style="background-color:blueviolet ;max-width:39%;font-size: 12px; border-radius:100px;text-align:center; color: white;"';
                } elseif ($solicitudes['Habilitado']  == 'No') {
                    // code...
                } {
                    echo ' style="background-color:red;max-width:39%;font-size: 12px; border-radius:100px;text-align:center;color: white;"';
                }
            ?>
 type="text" class="btn"  name="Habilitado" style="width:100%;border:none; background: transparent; text-align: center;"  value="<?=   $solicitudes['Habilitado']; ?>"></td>
            <?php if($tipo_usuario == 1) { ?>
            <td align="center">
                 <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Empleados.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">             
          <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
            

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->

            <td align="center">
                <a href="Controller/Delete_Empleados.php?id=<?php  echo $solicitudes['id']; ?>" onclick="return confirmaion()" class="btn btn-danger swal2-styled.swal2-confirm">Eliminar</a>
            </td></td><?php } ?>
        </tr>
      

 <?php } ?> 
           </tbody>
        </table>
         <p style="margin-top: 2%;"></p>
        <?php 
 $sql = "SELECT * FROM tb_usuarios";
    $result = mysqli_query($conn, $sql);
$total_registro = mysqli_num_rows($result);
$total_pagina = ceil($total_registro / $por_pagina);

echo "<nav aria-label='Page navigation example'>
  <ul class='pagination justify-content-end'><li class='page-item '><a class='page-link' href='Empleados.php?pagina= 1'>".'Primera'."</a><li>";
for ($i=1; $i <=$total_pagina; $i++) { 
    echo "<li class='page-item '><a class='page-link ' href='Empleados.php?pagina=".$i."'>".$i."</a></li>";
}
echo "<li class='page-item'><a class='page-link' href='Empleados.php?pagina=$total_pagina'>".'Ultima'."</a><li></ul></nav>";
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
<script type="text/javascript">
                    function myFuntion() {
                        var show = document.getElementById('show');
                        if (show.type=='password') {
                            show.type='text';
                        }
                        else{
                            show.type='password';
                        }

                    }
                </script>
                <!--Es para la Contraseña Confirmacion-->
                <script type="text/javascript">
                    function myFuntion1() {
                        var show = document.getElementById('show1');
                        if (show.type=='password') {
                            show.type='text';
                        }
                        else{
                            show.type='password';
                        }

                    }
                </script>
</body>
</html>
