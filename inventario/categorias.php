
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
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title>Categorias</title>
</head>


<body>

<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT * FROM   selects_categoria  WHERE  id = '$id'";
$result = mysqli_query($conn, $sql);


    while ($categoria = mysqli_fetch_array($result)){
?>


<form action="Controller/Desabilitar-categoria.php" method="POST" style="background: transparent; ">
  <h3 align="center">Actualizar Categorias</h3>
    <div class="container" style="background: rgba(0, 0, 0, 0.6); width: 70%; margin: auto; border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-top: 2%">
                <input type="hidden" name="id" value="<?php  echo $categoria['id']; ?>">
                <label id="label" for="">Habilitado</label><br> 
                    <select  class="form-control" name="Habilitado" id="categoria" style="cursor: pointer">
                        <option>[Seleccione]</option>
                        <option>Si</option>
                        <option>No</option>
                        
                    </select>
            </div>
         </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-4" style="position: initial; margin: auto; margin-bottom: 2%;">
                <button type="submit" name="Update_categorias" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="categorias.php" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
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
        <h2 class="text-center " >Categorias</h2>
    <section style="margin:2%;background: white;padding: 1%;border-radius: 1%; position: initial; ">
<?php if($tipo_usuario == 1) { ?>
    <button class="btn btn-success" data-toggle="modal" data-target="#Usuarios" style="float: left;margin-top: 1%; color: white;margin-bottom: 1%;">Nueva Categoria</button>

    <a href="dependencias.php" class="btn btn-success" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Dependencias</a>
    <a href="departamentos.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Departamentos</a>
     
<!-- Delete -->
<div class="modal fade" id="Usuarios" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: hsla(0.5turn , 100% , 0.1% , 0.5 );color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Información de Categorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
              <div class="modal-body">
                <form action="Controller/añadir-categoria.php" method="POST" style="margin:0;background: transparent;">
                <label id="label">Nombre</label>              
            <input class="form-control" name="categoria" type="text" required>
                      
               
            </div>
            <style type="text/css">
                #label{
                    color: white;
                }
            </style>
            <div class="modal-footer">
        <button name="submit" type="submit" id="Update" class="btn btn-danger" >Agregar</button> 
      </div>
           </form> 
        </div>
    </div>
</div><?php } ?> <br><br><br>
        <table class="table" id="example" style="width:100%">

        <thead>
              <tr id="tr">
                <th style="width:100%">Categoria</th>
                <th style="width:100%">Habilitado</th><?php if($tipo_usuario == 1) { ?>
                <th style="width:100%"> Cambiar Habilitado</strong></th>
                <th style="width:100%">Eliminar</th><?php } ?>
                
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
    $sql = "SELECT * FROM selects_categoria ORDER BY `id` DESC  LIMIT $empieza,$por_pagina ";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td data-label="Nombres" class="delete"><input readonly style="width:100%;border:none;background: transparent;" type="text" name="cod" value="<?php  echo $solicitudes['categoria']; ?>"></td>

 <td style="width:100%" align="center">
            <input  <?php
                if($solicitudes['Habilitado']  =='Si') {
                    echo ' style="background-color:blueviolet ;width:14%; border-radius:100px;text-align:center; color: white;"';
                } elseif ($solicitudes['Habilitado']  == 'No') {
                    // code...
                } {
                    echo ' style="background-color:red;width:14%; border-radius:100px;text-align:center;color: white;"';
                }
            ?>
 type="text" class="btn"  name="Habilitado" style="width:100%;border:none; background: transparent; text-align: center;"  value="<?=   $solicitudes['Habilitado']; ?>"></td>
            <?php if($tipo_usuario == 1) { ?>
            <td align="center">
                 <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="categorias.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">             
          <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
            

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->

            <td style="width:100%" align="center">
                <form action="Controller/Delete-categorias.php" method="POST" style="background:transparent;">
                    <input type="hidden" name="id" value="<?php  echo $solicitudes['id']; ?>">
                    <input type="hidden" name="Habilitado" value="<?php  echo $solicitudes['Habilitado']; ?>">
                    <button  onclick="return confirmaion()" name="eliminar_categorias" class="btn btn-danger" type="submit">ELiminar</button>
                </form>
                
            </td></td><?php } ?>
        </tr>
      

 <?php } ?> 
           </tbody>
        </table>

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
