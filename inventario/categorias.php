
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


<form action="Controller/Desabilitar-categorias.php" method="POST" style="background: transparent; ">
  <h3 align="center">Actualizar Categorias</h3>
    <div class="container" style="background: rgba(100, 100, 100, 0.6); width: 70%; margin: auto; border-radius: 9px; color:#fff; font-weight: bold;">
        <div class="row">
            <div class=" col-sm-12" style="position: initial; margin: auto; margin-top: 2%"><p class="small mb-1"><font color="black"><b>La Categoria que has Seleccionado:</b></font> <?php echo $categoria['categoria']?></p>
                <input type="hidden" name="id" value="<?php  echo $categoria['id']; ?>">
                <label id="label" class="small mb-1" for="">Habilitado</label><br> 
                    <select  class="form-control" name="Habilitado" id="categoria" style="cursor: pointer" required>
                        <option selected disabled value="">[Seleccione]</option>
                        <option>Si</option>
                        <option>No</option>
                        
                    </select>
            </div>
         </div>

        <hr>
        <div class="row">
            <div class=" col-sm-12" style="position: initial; margin-left: 20%; margin-bottom: 2%;">
                <button type="submit" name="Update_categorias" class ="btn btn-primary" style="background:rgb(12, 139, 8); margin-right: 1%; border: none">Guardar Cambios</button>
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
?><br>
        <h2 class="text-center ;" style="color:black;">Categorias</h2>
    <section style="margin:2%;background: rgba(255, 255, 255, 0.9);padding: 1%;border-radius: 1%; position: initial; ">
<?php if($tipo_usuario == 1) { ?>
    <button class="btn btn-success" data-toggle="modal" data-target="#Usuarios" style="float: left;margin-top: 1%; color: white;margin-bottom: 1%;">Nueva Categoria</button>

    <a href="dependencias.php" class="btn btn-success" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Dependencias</a>
    <a href="departamentos.php" class="btn btn-primary" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Departamentos</a>
     
<!-- Delete -->
<div class="modal fade" id="Usuarios" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: hsla(0.5turn , 100% , 0.1% , 0.5 );color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Nueva Categorias</h5>
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
         <table class="table table-responsive table-striped" id="example" style=" width: 100%">
                  
        <thead>
              <tr id="tr">
                <th>#</th>
                <th style=" width: 50%">Categoria</th>
                <th style="width: 50%;">Habilitado</th><?php if($tipo_usuario == 1) { ?>
                <th> Cambiar Habilitado</strong></th>
                <th>Eliminar</th><?php } ?>
                
            </tr>
            
     </thead>
            <tbody>
            
    <?php
    include 'Model/conexion.php';
    $sql = "SELECT * FROM selects_categoria ORDER BY `id` DESC  ";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
   
</style>
        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Categoria" style="text-align:left;"><?php  echo $solicitudes['categoria']; ?></td>

 <td>
            <input  <?php
                if($solicitudes['Habilitado']=='Si') {
                    echo ' style="background-color:blueviolet ;width:33%; border-radius:100px;text-align:center; color: white;margin-top: .2%"';
                    $c='Categoría Disponible';
                } elseif ($solicitudes['Habilitado']  == 'No') {
               
                    echo ' style="background-color:red;width:33%; border-radius:100px;text-align:center;color: white;margin-top: .2%"';
                    $c='Categoría no Disponible';
                }
            ?>
 type="text" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=   $c ?>"  name="Habilitado" style="width:100%;border:none; background: transparent; text-align: center;"  value="<?=   $c ?>"></td>
            <?php if($tipo_usuario == 1) { ?>
            <td align="center">
                 <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="categorias.php">             
          <input type='hidden' name='id' value="<?php  echo $solicitudes['id']; ?>">             
          <button name='editar' class='btn btn-info btn-sm'  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
            

<!--**********************************************************************************************************************************************************************************-->
  <!--Botones para actualizar y eliminar-->

            <td  align="center">
                <form action="Controller/Delete-categorias.php" method="POST" style="background:transparent;">
                    <input type="hidden" name="id" value="<?php  echo $solicitudes['id']; ?>">
                    <input type="hidden" name="Habilitado" value="<?php  echo $solicitudes['Habilitado']; ?>">
                    <?php if ($solicitudes['Habilitado']=="No") {
                        echo '<button  onclick="return confirmaion()" name="eliminar_categorias" class="btn btn-danger btn-sm" type="submit">ELiminar</button>';
                    }else if ($solicitudes['Habilitado']=="Si") {
                        echo '<button disabled style="cursor: not-allowed;" class="btn btn-danger btn-sm" type="submit">ELiminar</button>';
                    }?>
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

  
</body>
</html>
