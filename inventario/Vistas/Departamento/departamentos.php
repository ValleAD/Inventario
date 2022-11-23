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
    <title>Departamentos</title>
</head>
<body>
<style>
    section{
        padding: 1%;
    }

    #form{margin: 1%;}
    #div{
        margin: 0%;
    }
 @media (max-width: 952px){
   #form{
        margin: -15%6%1%1%;
        width: 98%;
    }
       section{
        margin: -15%6%1%1%;
        width: 98%;
    }
</style>
<br><br><br>
<?php      

if (isset($_POST['editar'])){       
    $id = $_POST['id'];       
   
  
 
$sql = "SELECT * FROM selects_departamento  WHERE  id = '$id'";
$result = mysqli_query($conn, $sql);


    while ($productos = mysqli_fetch_array($result)){

?>

<style type="text/css">section{display: none;}</style>
<form id="form" action="../../Controller/Departamento/Desabilitar-departamentos.php" method="POST" style="background: transparent; ">

    <div class="container-fluid" style="background: rgba(0, 0, 0, 0.5); margin: auto;padding-top: 1%; border-radius: 9px; color:#fff; font-weight: bold; margin: auto;">
  <h3 align="center">Actualizar Departamentos Habilitadas </h3>
        <div class="row">
            <div class="col-md-12" style="position: initial;margin: auto;"><p class="small mb-1"><font color="black"><b>EL Departamento que has Seleccionado:</b></font> <?php echo $productos['departamento']?></p>
                <input type="hidden" name="id" value="<?php  echo $productos['id']; ?>">
                <label for="" style="color:white;" class=" mb-1">Habilitado</label><br> 
                <?php if ($productos['Habilitado']=="No") {?>
                    <input  id="input" type="radio" name="Habilitado" value="Si" style="" required> <label  style="color: white;" id="label1" for="input" > Habilitar  Departamento</label>
                <?php }if ($productos['Habilitado']=="Si") {?>
                 
                  <input  id="input1" type="radio" name="Habilitado" value="No" style="" required> <label style="color: white;" id="label1" for="input1" > Desbilitar  Departamento</label><br>
              <?php } ?>
            </div>
         </div>
        <hr style="background: white;">
        <div class="row">
            <div class="col-md-12" style="position: initial; margin-bottom: 2%;">
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
    <section style="margin:1%;padding: 1%; border-radius: 5px; background: white; ">
        <div class="card">
<div class="card-body">
        <h2 class="text-center " >Departamentos del Sistema</h2><br>

    <a href="../Categoria/categorias.php" class="btn btn-info" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; ">Categorias</a> 
    <a href="../Dependencia/dependencias.php" class="btn btn-success" style="float: right;margin-top: 1%; color: white;margin-bottom: 1%; margin-right: 15px;">Dependencias</a>
<?php if($tipo_usuario == 1) { ?>
    <button class="btn btn-success" data-toggle="modal" data-target="#Usuarios" style="float: left;margin-top: 1%; color: white;margin-bottom: 1%;">Nuevo Departamento</button>
<!-- Delete -->
<div class="modal fade" id="Usuarios" style="background: rgba(0, 0, 0, 0.3);" id="form" data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: hsla(0.5turn , 100% , 0.1% , 0.5 );color: white; position: initial; z-index: 1000px;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white;">Nuevo Departameto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
              <div class="modal-body">
                <form id="form" action="../../Controller/Departamento/añadir-departamentos.php" method="POST">
            <label id="label">Nombres</label>              
            <input class="form-control" name="departamentos" type="text" required>
            
            </div>
            <style type="text/css">
                #label{
                    color: white;
                }
                 @media (max-width: 952px){
                #label{
                    margin-top: 15%;
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
 <div id="aq" style="position: initial;" class="btn-group mb-3 my-3  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/U_D_D_C/U_D_D_C.php" target="_blank">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="departamento">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/U_D_D_C/U_D_D_C_pdf.php" target="_blank" class="mx-1">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="departamento" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form id="form2" method="POST" action="../../Plugin/Excel/Departamento/Excel.php" >
                <button type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
  <table class="table table-striped" id="examp" style=" width: 100%">
                  
        <thead>
             <tr id="tr">
                <?php if($tipo_usuario == 1) { ?>
                <th style="width: 10%;">#</th>
                <th  style=" width: 10%">Departamentos</th>
                <th  style=" width: 10%">Habilitado</th>
                <th  style=" width: 10%"> Cambiar Habilitado</th>
                <th  style=" width: 10%">Eliminar</th><?php } ?>
                <?php if($tipo_usuario == 2) { ?>
                <th style="width: 60%;">#</th>
                <th  style=" width: 60%">Departamentos</th>
                <th  style="width: 60%">Habilitado</th>
                <th></th>
                <?php } ?>
                
            </tr>
      
     </thead>
     <tbody>    
    <?php

    $sql = "SELECT * FROM selects_departamento ORDER BY `id` DESC";
    $result = mysqli_query($conn, $sql);
    $n=0;
    while ($solicitudes = mysqli_fetch_array($result)){
        $n++;
        $r=$n+0;
        ?>
        <style>#td{display: none;}</style>
        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Departamento" ><?php  echo $solicitudes['departamento']; ?></td>

            <td data-label="Habilitado">
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
               <form action="../../Controller/Departamento/Delete-departamentos.php" method="POST" style="background:transparent;">
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
                        $(document).ready(function () {

       $('#examp').DataTable({
            rowGroup: {
            dataSrc: 2
        },
            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'flrtip',
            lengthMenu: [[10, -1], [10,"Todos"]],
            scrollCollapse: true,
                    language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },

    });
}); 
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
