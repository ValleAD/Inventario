
<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="../../log/signin.php";
        session_destroy();  
                </script>
die();

    ';
}
?>
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
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
        .table1 tbody td{text-align: left;}
        .table1 tbody #td1{text-align: center;}
        #Empleados{display: none;}
    section{
        padding: 1%;
        margin: 1%;
    }
    #form{
        margin: 1%;
    }
    h2,h3{
        margin-bottom:  2%
    }
     @media (max-width: 800px){
        #Empleados{display: block;}
 .table1{display: none;}
     

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
    #d{
        margin-left: 22%;
    }
    #dh{
        margin-left: 22%;
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
    <style type="text/css">section, h2{display: none;}</style>
<?php if ($tipo_usuario==2) {?>
<form id="form" action="../../Controller/Empleados/Desabilitar-Empleado.php" method="POST" style="background: transparent;  ">
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

<form id="form" action="../../Controller/Empleados/Desabilitar-Empleado.php" method="POST" style="background: transparent;  ">
    <div class="container" style="background: rgba(100, 100, 100, 0.6); border-radius: 9px; color:#fff; font-weight: bold;">
  <h3 align="center">Actualizar Informacion del Empleado</h3>
        <div class="row">
            <div class=" col-md-12" style="position: initial; "><p class="small mb-1"><font color="black"><b>Usuario que a Seleccionado:</b></font> <?php echo $productos['username']?></p>
                    <div class="row">
                    <div class="col-md-6" style="position: initial">
                        
                       <label id="label" class="small mb-1">Nombre (No es obligatorio)</label><br>
                        <input  class="form-control" type="text"  name="Nombres" value="<?php echo $productos['lastname'] ?>">
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Apellido (No es obligatorio)</label><br>
                        <input  class="form-control" type="text"  name="Apellidos" value="<?php echo $productos['firstname'] ?>">
                    </div>
                </div>
            
                <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <label id="label" class="small mb-1">Habilitado (Obligatorio) </label><br> 
                    <select required class="form-control" name="Habilitado" id="categoria" style="cursor: pointer">
                        <option value="">[Seleccione]</option>
                        <option value="Si">Si, Podra Ingresar al Sistema</option>
                        <option value="No">No, Se le Bloqueará el Acceso al Sistema</option>
                        
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
    <section  style=" border-radius: 5px; background: white; ">
       <h2 class="text-center " >Empleados Del Sistema</h2>

 <table width="100%" >
    <td width="30%"><button class="btn btn-secondary" data-toggle="modal" data-target="#Usuarios" style="float: left; color: white;margin-top: 1%;">Nuevo Integrante</button>
     <?php if ($tipo_usuario==1) {?>
       <div style="position: initial;" class="btn-group mt-1 mx-2 " role="group" aria-label="Basic outlined example">
         <form id="well" class="well" method="POST" action="../../Plugin/Imprimir/Empleados/Empleados.php" target="_blank">
             
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Empleados">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="well" class="well" method="POST" action="../../Plugin/PDF/Empleados/pdf_Empledos.php" target="_blank">
            
             <button  style="position: initial;"type="submit" class="btn btn-outline-primary mx-1" name="user" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form id="well"  method="POST" action="../../Plugin/Excel/Empleados/Excel.php" >
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>
<?php } ?>
<?php  if ($tipo_usuario==2) {   
    $sql = "SELECT * FROM tb_usuarios WHERE id='$idusuario' ORDER BY `id` ";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){?>
<div style="position: initial;" class="btn-group mt-1 mx-2 " role="group" aria-label="Basic outlined example">
         <form id="well" class="well" method="POST" action="../../Plugin/Imprimir/Empleados/Empleados.php" target="_blank">
             <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos['username']?>" name="user1">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="user2">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
     <?php } $sql = "SELECT * FROM tb_usuarios WHERE id='$idusuario' ORDER BY `id` ";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ ?>
         <form id="well" class="well" method="POST" action="../../Plugin/PDF/Empleados/pdf_Empledos.php" target="_blank">
             <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos['username']?>" name="user1">               
             <button  style="position: initial;"type="submit" class="btn btn-outline-primary mx-1" name="user2" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form id="form2" method="POST" action="../../Plugin/Excel/Empleados/Excel.php" target="_blank">
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>  
 <?php } }?> 
</td>
         <?php if ($tipo_usuario==1) {?>
    <td width="30%"> 
                <div style="position: initial;" class="input-group" >
                 
            <input type="text" style="position: initial;" name="busqueda" class="form-control"  id="busqueda" placeholder="Buscar Usuario, Nombre ó Apellidos">
                      <label onclick="return validar1()" class="input-group-text input" for="inputGroupSelect01">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x"/>
                </svg>
                 </label>
                 </div> </td>
             <?php } ?>
     <td align="right">
        <a href="../Categoria/categorias.php" class="btn btn-info" style="margin-top: 1%; color: white; ">Categorias</a>
        <a href="../Dependencia/dependencias.php" class="btn btn-success" style="margin-top: 1%;margin-left: 1%; color: white; margin-right: 15px;">Dependencias</a>
        <a href="../Departamento/departamentos.php" class="btn btn-primary" style="margin-top: 1%; color: white; margin-right: 15px;">Departamentos</a></td>
 </table>  
     
    

 
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
                <form action="../../Controller/Empleados/añadirEmpleados.php" method="POST" autocomplete="off">
              <div class="row">
                    <div class="col-md-6" style="position: initial">
                       <label id="label" class="small mb-1">Nombre de usuario</label><br>
                        <input  class="form-control" type="text" autocomplete="off"  name="usuario"  required>
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Nombre</label><br>
                        <input pattern="[A-Za-z0-9_- ]{1,}" class="form-control" autocomplete="off" type="text"  name="nombre" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6" style="position: initial">
                     <label id="label" class="small mb-1">Apellido</label><br>
                        <input pattern="[A-Za-z0-9- ]{1,}" class="form-control" type="text"  name="Apellido"  required>
                        
                                                
                                        
                     
                    </div>
                    <div class="col-md-6" style="position: initial">
                      <label id="label" class="small mb-1">Establecimiento</label><br>
                       <input class="form-control" readonly name="Establecimiento" value='Hospital Nacional Zacatecoluca PA "Santa Tereza"'>
            </select>
                     
                    </div>
                </div>
                <div class="row">
                    <div id="label" class="col-md-6" style="position: initial">
                      <label class="small mb-1">Contraseña</label><br>
                        <input  class="form-control" id="show" type="password"  name="password"  required>
                      <input id="e"  onclick="myFuntion();" type="checkbox" name="id[]"> <label style="margin-top: 1.5%;"  id="h" for="e" ></label>
                  </div>
                  <div class="col-md-6" style="position: initial">
                      <label id="label"  class="small mb-1">Confirmar Contraseña</label><br>
                        <input  class="form-control" id="show1" type="password"  name="cpassword" required>
                       <input id="s"  onclick="myFuntion1();" type="checkbox" name="id[]"> <label style="margin-top: 1.5%;"  id="h" for="s" ></label>
                  </div>
                </div>
                <br>
                <div class="row">
                    
                    <div class="col-md-12" style="position: initial">
                        <label id="label"  class="small mb-1">Departamento</label><br>
                         
               <div id="div" style = " max-height: 150px; overflow-y:scroll;margin-bottom: 5%;"> 
                
                   <?php  
   $sql = "SELECT * FROM selects_departamento";
    $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){ ?>  
                             <input required  id="<?php echo $productos['id'] ?>" type="radio" name="Unidad" value="<?php echo $productos['departamento'] ?>"> <label style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
 <?php }?>
                         </div>
 
          
                </div>
                <br>
                <div class="col-md-12" style="position: initial">
                 <label id="label" class="small mb-1">Tipo de Usuarios (Roles De Usuario)</label>
             <br>
            <input required id="input" type="radio" name="tipo_usuario" value="1"> <label id="label1" for="input" > Admistrador</label>
            <input required id="input1" type="radio" name="tipo_usuario" value="2"> <label id="label1" for="input1"> Cliente</label> 

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
<?php if ($tipo_usuario==1) {?>

               <section id="tabla_resultado" >
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

        </section>
<?php } ?>

     <?php if($tipo_usuario==2) { ?><br>
<?php 
    $sql = "SELECT * FROM tb_usuarios WHERE id='$idusuario' ORDER BY `id` ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_assoc($result)){
if ($solicitudes['tipo_usuario']==1) {
    $u='Administrador';
}else if($solicitudes['tipo_usuario']==2){
$u='Cliente';
} if($solicitudes['Habilitado']=="No"){
    $u='Cuenta Desabilitada';} ?>

       
            
<div class="card" style="font-size: 12px;margin-bottom: 1%;position: initial;">
      <div class="card-body" style="position: initial">
        <table class="table1" style="width:100%">
            <tr><td rowspan="2" id="td1" style="width: 20%;">
                <svg  class="bi bi2 my-4 mx-1 text-primary" width="90" height="90" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                        </svg></td></tr>
            <tr>
            <td style="width: 60%;"> 
                <p class="card-title"><b>USUARIO:</b> <?php echo $solicitudes['username'] ?></p>
                <p class="card-text"><b>NOMBRE COMPLETO: </b><?php echo $solicitudes['firstname']," ",$solicitudes['lastname']; ?></p>
                <p class="card-text"><b>ESTABLECIMIENTO:</b> <?php echo $solicitudes['Establecimiento']; ?></p></td>
           
            
            <td><p  class="card-text"><b>UNIDAD:</b> <?php echo $solicitudes['unidad']; ?></p>
                <p  class="card-text"><b>CUENTA:</b> <?php echo $u; ?></p>
                <div style="position: initial;" class="btn-group m-2 " role="group" aria-label="Basic outlined example">
     <form style="margin: 0%;background: transparent;" method='POST' action="Empleados.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">      
          <button id="d" name='editar' class='btn btn-info swal2-styled.swal2-confirm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
        
        </div></td>
        </tr>
        </table>
             <div id="Empleados">
                <p class="card-title"><b>USUARIO:</b> <?php echo $solicitudes['username'] ?> </p>
                <p class="card-text"><b>NOMBRE COMPLETO: </b><?php echo $solicitudes['firstname']," ",$solicitudes['lastname']; ?></p>
                <p class="card-text"><b>ESTABLECIMIENTO:</b> <?php echo $solicitudes['Establecimiento']; ?></p>
                <p  class="card-text"><b>UNIDAD:</b> <?php echo $solicitudes['unidad']; ?></p>
                <p  class="card-text"><b>CUENTA:</b> <?php echo $u; ?></p>
                <div style="position: initial;" class="btn-group  " role="group" aria-label="Basic outlined example">
     <form style="margin: 0%;background: transparent;" method='POST' action="">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">      
          <button id="d" name='editar' class='btn btn-info swal2-styled.swal2-confirm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
       
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
                        $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : '../../Buscador_ajax/Empleados/Consulta_Empleados.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#busqueda').load('../../Buscador_ajax/Consultas/consulta.php');
    });
     var limpiar = document.getElementById('busqueda');
                    function validar1() {
                        limpiar.value = '';
                    }
                </script>

   
</body>
</html>
