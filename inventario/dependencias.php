
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/estilo_men.css">
    <title>Dependencias</title>
</head>


<body>
<style>
    section{
        padding: 1%;
    }
    #form{
        margin: 1%;
    }
    #div{
        margin: 0%;
    }
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
        margin: -15%6%1%1%;
        width: 98%;
</style>
<br><br><br>
<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT * FROM selects_dependencia  WHERE  id = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){
?>


<form id="form" action="Controller/Desabilitar-dependencias.php" method="POST" style="background: transparent; ">
  <h3 align="center">Actualizar Dependencias Habilitadas </h3>
    <div class="container" style="background: rgba(100, 100, 100, 0.6);  border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class="col-sm-12" style="position: initial; margin: auto; margin-top: 2%"><p class="small mb-1"><font color="black"><b>La Dependencia que has Seleccionado:</b></font> <?php echo $productos['dependencia']?></p>
                <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <label for="" style="color:white;" class=" mb-1">Habilitado</label><br> 
                 <input  id="input" type="radio" name="Habilitado" value="Si" style="" required> <label  style="color: white;" id="label1" for="input" > Habilitar  Categoria</label>
                  <input  id="input1" type="radio" name="Habilitado" value="No" style="" required> <label style="color: white;" id="label1" for="input1" > Desbilitar  Categoria</label><br>

            </div>
         </div>
        <hr style="background: white;">
        <div class="row">
            <div class="col-sm-12" style="position: initial; margin: auto; margin-bottom: 2%;">
                <button type="submit" name="Update_Dependencias" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
                <a href="" class ="btn btn-primary" style="background:rgb(184, 8, 8); border: none">Cancelar</a>
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

            <h2 class="text-center " >Dependencias Del Departamento</h2><br>
    <section style="margin:1%;padding: 1%; border-radius: 5px; background: white; ">

    <a href="categorias.php" class="btn btn-info" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; ">Categorias</a>
    <a href="departamentos.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Departamentos</a>
<?php if($tipo_usuario == 1) { ?>
    <button class="btn btn-success" data-toggle="modal" data-target="#Usuarios" style="float: left;margin-top: 1%; color: white;margin-bottom: 1%;">Nueva Dependencia</button>
<!-- Delete -->
<div class="modal fade" id="Usuarios" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: hsla(0.5turn , 100% , 0.1% , 0.5 );color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Nueva Dependencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
              <div class="modal-body">
                <form action="Controller/añadir-dependencias.php" method="POST" style="margin:0;background: transparent;">

            <label id="label">Nombres</label>              
            <input class="form-control" name="dependencia" type="text" required>
           
            </div>
            <style type="text/css">
                #label{
                    color: white;
                }
                 @media (max-width: 952px){
                #label{
                    margin-top: 1%;
                }
            }
            </style>
            <div class="modal-footer">
        <button name="submit" type="submit" id="Update" class="btn btn-danger" >Agregar</button> 
      </div>
           </form> 
        </div>
    </div>
</div><?php } ?>
 <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="Plugin/U_D_D_C.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="dependencia">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="Plugin/U_D_D_C_pdf.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="dependencia" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
</div>
          <table class="table   table-striped" id="div" style=" width: 100%">
                   <thead>
             <tr id="tr">
                <?php if($tipo_usuario == 1) { ?>
                <th style="width: 10%;">#</th>
                <th  style=" width: 10%">Dependencia</th>
                <th  style=" width: 10%">Habilitado</th>
                <th  style=" width: 10%"> Cambiar Habilitado</th>
                <th  style=" width: 10%">Eliminar</th><?php } ?>
                <?php if($tipo_usuario == 2) { ?>
                <th style="width: 60%;">#</th>
                <th  style=" width: 60%">Dependencia</th>
                <th  style="width: 60%">Habilitado</th>
                <th></th>
                <?php } ?>
                
            </tr>
           
     </thead>
 </table>
 <div id="div" style = " max-height: 442px;  overflow-y:scroll;">
    <table class="table">
            <tbody>
             <tr>
         <td  colspan="7" id="td" ><h4 align="center">No se encontraron ningun  resultados 😥</h4></td></tr>
    <?php
    include 'Model/conexion.php';

    $sql = "SELECT * FROM selects_dependencia  ORDER BY `id` DESC ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td style="width: 10%;min-width: 100%;" data-label="#"><?php echo $r ?></td>
            <td style="width: 30%;min-width: 100%;" data-label="Dependencia"><?php  echo $solicitudes['dependencia']; ?></td>

            <td style="width: 60%;min-width: 100%;" data-label="Habilitado" align="center">
            <p <?php
                if($solicitudes['Habilitado']=='Si') {
                    echo ' style="background-color:blueviolet ;max-width:100%; border-radius:5px;text-align:center; color: white;"';
                    $c='Unidad Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    echo ' style="background-color:red;max-width:100% border-radius:5px;text-align:center;color: white;"';
                    $c='Unidad no Disponible';
                }
            ?>
 type="text" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=   $c ?>"  name="Habilitado" style="width:100%;border:none; background: transparent; text-align: center;"><?=   $c ?></p></td><?php if($tipo_usuario == 1) { ?>
            <td style="width: 10%;min-width: 100%;" data-label="Editar">
                 <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">             
          <button name='editar' class='btn btn-success' style="width: 50%;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
            

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->

            <td style="width: 10%;min-width: 100%;"  data-label="Eliminar" >
               <form action="Controller/Delete-dependencia.php" method="POST" style="background:transparent;">
                    <input type="hidden" name="id" value="<?php  echo $solicitudes['id']; ?>">
                    <input type="hidden" name="Habilitado" value="<?php  echo $solicitudes['Habilitado']; ?>">
                   <?php if ($solicitudes['Habilitado']=="No") {
                        echo '<button  onclick="return confirmaion()" class="btn btn-danger  w-40" type="submit">ELiminar</button>';
                    }else if ($solicitudes['Habilitado']=="Si") {
                        echo '<button type="button"  id="th" style="cursor: not-allowed;background: rgba(255, 0, 0, 0.5); border: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger  text-white w-40">Eliminar</button>';
                    }?>
                </form>
            </td></td><?php } ?>
        </tr>
      

 <?php } ?> 
           </tbody>
        </table>
</div>
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

   
</body>
</html>
