
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
     <link rel="stylesheet" type="text/css" href="styles/estilos_menu.css" >
     <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title>Empleados</title>
</head>
<body id="body">
    <style type="text/css">
    section{
        padding: 1%;
        margin: 1%;
    }
    #form{
        margin: 1%;
    }
    h2,h3{
        color: white;
        text-shadow: 1px 1px 5px black;
    }
 @media (max-width: 952px){
   #form{
        margin: -15%6%1%1%;
        width: 98%;
    }
       section{
        margin: 0%6%1%1%;
        width: 98%;
    }
    #div{
        padding: 2%;
    }
    .card{
        margin-top: 5%;
    }
    #d{
        margin-left: 22%;
    }
    #dh{
        margin-top: -20%;
        margin-left: 22%;
    }
    #p{
        margin-left: 5%;
    }
</style>
<br><br><br>
    </style>
<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT * FROM tb_usuarios  WHERE  id = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
?>
<?php if ($tipo_usuario==2) {?>
<form id="form" action="Controller/Desabilitar-Empleado.php" method="POST" style="background: transparent;  ">
  <h3 align="center">Actualizar Informacion del Empleado</h3>
    <div class="container-fluid" style="background: rgba(100, 100, 100, 0.6);  border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class=" col-md-12" style="position: initial;"><p class="small mb-1"><font color="black"><b>Usuario que a Seleccionado:</b></font> <?php echo $productos['username']?></p>
                 <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <div class="row">
                    <div class="col-md-6" style="position: initial">
                        
                       <label id="label" class="small mb-1">Nombre</label><br>
                        <input  class="form-control" type="text"  name="Nombres"  required>
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Apellido</label><br>
                        <input  class="form-control" type="text"  name="Apellidos" required >
                    </div>
                </div>
            
            </div>
         </div>
        <hr>
        <div class="row">
            <div class="col-md-12" style="position: initial; margin: auto; margin-bottom: 2%;">

                <button type="submit" name="submit" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="Empleados.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
            </div>
        </div>
    </div>
</form>
<?php  } if ($tipo_usuario==1) {?>
<form id="form" action="Controller/Desabilitar-Empleado.php" method="POST" style="background: transparent;  ">
  <h3 align="center">Actualizar Informacion del Empleado</h3>
    <div class="container" style="background: rgba(100, 100, 100, 0.6); border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class=" col-md-12" style="position: initial; "><p class="small mb-1"><font color="black"><b>Usuario que a Seleccionado:</b></font> <?php echo $productos['username']?></p>
                    <div class="row">
                    <div class="col-md-6" style="position: initial">
                        
                       <label id="label" class="small mb-1">Nombre (No es obligatorio)</label><br>
                        <input  class="form-control" type="text"  name="Nombres" >
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Apellido (No es obligatorio)</label><br>
                        <input  class="form-control" type="text"  name="Apellidos" >
                    </div>
                </div>
            
                <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <label id="label" class="small mb-1">Habilitado (Obligatorio) </label><br> 
                    <select required class="form-control" name="Habilitado" id="categoria" style="cursor: pointer">
                        <option value="">[Seleccione]</option>
                        <option>Si</option>
                        <option>No</option>
                        
                    </select>
            </div>
         </div>
        <hr>
        <div class="row">
            <div class="col-md-12" style="position: initial; margin: auto; margin-bottom: 2%;">
                <button type="submit" name="info" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
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
} 
?>
        <font color="black"><h2 class="text-center " >Empleados Del Sistema</h2></font>
    <section id="" style=" border-radius: 5px; background: white; ">
    <button class="btn btn-secondary" data-toggle="modal" data-target="#Usuarios" style="float: left; color: white;margin-top: 1%;">Nuevo Integrante</button>

    <a href="categorias.php" class="btn btn-info" style="float: right;margin-top: 1%; color: white; ">Categorias</a> 
    <a href="dependencias.php" class="btn btn-success" style="float: right;margin-top: 1%; color: white; margin-right: 15px;">Dependencias</a>
    <a href="departamentos.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white; margin-right: 15px;">Departamentos</a>
   
<br><br><br>
 
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
                       <label id="label" class="small mb-1">Nombre de usuario</label><br>
                        <input  class="form-control" type="text"  name="usuario"  required>
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Nombre</label><br>
                        <input pattern="[A-Za-z0-9_- ]{1,}" class="form-control" type="text"  name="nombre" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6" style="position: initial">
                     <label id="label" class="small mb-1">Apellido</label><br>
                        <input pattern="[A-Za-z0-9- ]{1,}" class="form-control" type="text"  name="Apellido"  required>
                        
                                                
                                        
                     
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Establecimiento</label><br>
                       <select class="form-control" name="Establecimientos">
                <option selected disabled >Seleccionar</option>
                <option>Hospital Nacional Zacatecoluca PA "Santa Tereza"</option>
            </select>
                     
                    </div>
                </div>
                <div class="row">
                    <div id="label" class="col-md-6" style="position: initial">
                      <label class="small mb-1">Contraseña</label><br>
                        <input  class="form-control" id="show" type="password"  name="password"  required>
                      <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick="myFuntion();" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Mostrar Contraseña</label></div>
                  </div>
                  <div class="col-md-6" style="position: initial">
                      <label id="label"  class="small mb-1">Confirmar Contraseña</label><br>
                        <input  class="form-control" id="show1" type="password"  name="cpassword" required>
                        <div class="custom-control custom-checkbox"><input class="custom-control-input" onclick=" myFuntion1();" id="PasswordCheck" type="checkbox" /><label class="custom-control-label" for="PasswordCheck">Mostrar Contraseña</label></div>
                  </div>
                </div>
                <br>
                <div class="row">
                    
                    <div class="col-md-6" style="position: initial">
                        <label id="label"  class="small mb-1">Departamento</label><br>
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
                                                <label id="label" class="small mb-1">Tipo de Usuarios (Roles De Usuario)</label>
                                                <select class="form-control" name="tipo_usuario" required>
                                                    <option selected disabled>Selecione</option>
                                                    <option value="1">Admistrador</option>
                                                    <option value="2">Cliente</option>
                                               </select>
                        </div>
                    </div>
                <div>
                    <div class="form-group" style="margin-top: 7%;">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </div>

                    </div>
                     <style type="text/css">
                    #label{
                    color: white;
                 }
                    </style>
                
                </form> 
        </div>
    </div>
</div>

</div>          
    <?php
    include 'Model/conexion.php';

    $sql = "SELECT * FROM tb_usuarios ORDER BY `id` ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_assoc($result)){
if ($solicitudes['tipo_usuario']==1) {
    $u='Administrador';
}else if($solicitudes['tipo_usuario']==2){
$u='Cliente';
} if($solicitudes['Habilitado']=="No"){
    $u='Cuenta Desabilitada';
}
?>
<?php  if ($tipo_usuario==1) { ?>
       
<div class="card mb-3 border-secondary " style="max-width: 100%;min-width: 100%; position: initial">
  <div class="row g-0">
    <div class="col-1" style="position: initial">
                <svg  class="bi bi2 my-4 mx-1 text-primary" width="90" height="90" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                        </svg>
    </div>
    
      <div class="card-body" style="position: initial">
        <p class="card-title"><b>USUARIO:</b> <?php echo $solicitudes['username'] ?></p>
        <div class="row">
        <div class="col-md-7" style="position: initial">
        <p class="card-text"><b>NOMBRE COMPLETO: </b><?php echo $solicitudes['firstname']," ",$solicitudes['lastname']; ?></p>
        <p class="card-text"><b>ESTABLECIMIENTO:</b> <?php echo $solicitudes['Establecimiento']; ?></p>
    </div>
    <div class="row">
    <div class="col-md-12" style="position: initial">
        <p id="p" class="card-text"><b>UNIDAD:</b> <?php echo $solicitudes['unidad']; ?></p>
        <p id="p" class="card-text"><b>CUENTA:</b> <?php echo $u; ?></p>
    </div>
</div>
</div><br>
        <div class="row" style="position: initial">
         
                    <div class="col-md-0" style="position: initial;">
     <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Empleados.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">      
          <button id="d" name='editar' class='btn btn-info swal2-styled.swal2-confirm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form></div>
    <div class="col-md-1" style="position: initial">
                <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Controller/Delete_Empleados.php">
            <input type="hidden" name="id" value="<?php  echo $solicitudes['id']; ?>">
            <input type="hidden" name="idusuario" value="<?php echo $solicitudes['tipo_usuario'] ?>">
            <input id="dh" type="submit"onclick="return confirmaion()" class="btn btn-danger swal2-styled.swal2-confirm" value="Eliminar">
     </form>
   </div>
 
</div>
    </div>
</div>
</div>
     <?php }} ?><?php if($tipo_usuario==2) { ?>
<?php 
    $sql = "SELECT * FROM tb_usuarios WHERE id='$idusuario' ORDER BY `id` ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_assoc($result)){
if ($solicitudes['tipo_usuario']==1) {
    $u='Administrador';
}else if($solicitudes['tipo_usuario']==2){
$u='Cliente';
} if($solicitudes['Habilitado']=="No"){
    $u='Cuenta Desabilitada';
}
?>

       
            
<div class="card mb-3 border-secondary " style="max-width: 100%;min-width: 100%; position: initial">
  <div class="row g-0">
    <div class="col-1" style="position: initial">
                <svg  class="bi bi2 my-4 mx-1 text-primary" width="90" height="90" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                        </svg>
    </div>
    
      <div class="card-body" style="position: initial">
        <p class="card-title"><b>USUARIO:</b> <?php echo $solicitudes['username'] ?></p>
        <div class="row">
        <div class="col-md-7" style="position: initial">
        <p class="card-text"><b>NOMBRE COMPLETO: </b><?php echo $solicitudes['firstname']," ",$solicitudes['lastname']; ?></p>
        <p class="card-text"><b>ESTABLECIMIENTO:</b> <?php echo $solicitudes['Establecimiento']; ?></p>
    </div>
    <div class="row">
    <div class="col-md-12" style="position: initial">
        <p id="p" class="card-text"><b>UNIDAD:</b> <?php echo $solicitudes['unidad']; ?></p>
        <p id="p" class="card-text"><b>CUENTA:</b> <?php echo $u; ?></p>
    </div>
</div>
</div><br>
        <div class="row" style="position: initial">
         
                    <div class="col-md-0" style="position: initial;">
               
                 <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Empleados.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">      
          <button id="d" name='editar' class='btn btn-info swal2-styled.swal2-confirm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
   </div>
</div>
</div>
</div>
</div>

 <?php  } } ?> 


  </section>
   
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  


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
