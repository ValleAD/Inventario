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
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
      <!-- Bootstrap CSS -->

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    h1 {
  color: white;
}
 @media (max-width: 952px){
   #div{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    </style>
    <title>Solicitudes De Vale</title>
</head>
<body >
    <center><h1 style="margin-top:5%">Solicitudes Vale</h1></center><br>
          <?php if ($tipo_usuario==1) {?>  
     <div id="div" class="mx-5 p-2 mb-5" style="background-color: white; border-radius:5px;">

     
        <table class="table table-responsive"  style="width:100%">
            <thead>
              <tr id="tr">
                <th>#</th>
                <th style="width:30%" ><strong>Código de Vale</strong></th>
                <th style="width:50%"><strong>Departamento Solicitante</strong></th>
                <th style="width:10%"><strong>Encargado</strong></th>
                <th style="width:50%"><strong>Estado</strong></th>
                <th style="width:10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width:10%"><strong>Detalles</strong></th> 
            </tr>
            
     </thead>
        <tbody>     
    <?php
    include 'Model/conexion.php';

  if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $articulos=mysqli_query($conn,"SELECT * FROM tb_vale;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros= '10';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
            $busqueda=mysqli_query($conn,"SELECT * FROM tb_vale ORDER BY fecha_registro DESC  LIMIT $inicio,$registros;");
            $paginas=ceil($num_registros/$registros);
            
      
    $n=0;
    while ($solicitudes = mysqli_fetch_array($busqueda)){
        $n++;
        $r=$n+0;
        $idusuario = $solicitudes['idusuario'];
        if ($idusuario==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($idusuario==0) {
            $u='Invitado';
        }
        ?>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>

             <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])); ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">             
            </form> 
            </td>
        </tr>

    <?php }?>   
           
           </tbody>
        </table>
        <div class="container-fluid  col-12">
        <ul class="pagination pg-dark " style="float: none;justify-content: right;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='solicitudes_vale.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='solicitudes_vale.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='solicitudes_vale.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='solicitudes_vale.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
  
    <?php } if ($tipo_usuario==2) {?>
    <div class="mx-5 p-2 mb-5" style="background-color: white; border-radius:5px;">

     
        <table class="table table-responsive" id="example" style="width:100%">
            <thead>
              <tr id="tr">
                <th>#</th>
                <th style="width:30%" ><strong>Código de Vale</strong></th>
                <th style="width:50%"><strong>Departamento Solicitante</strong></th>
                <th style="width:10%"><strong>Encargado</strong></th>
                <th style="width:50%"><strong>Estado</strong></th>
                <th style="width:10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width:10%"><strong>Detalles</strong></th> 
            </tr>
            
     </thead>
        <tbody>     
    <?php
    include 'Model/conexion.php';
    $tipo_usuario = $_SESSION['iduser'];
    
  if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
            if($_REQUEST["nume"] == "" ){$_REQUEST["nume"] = "1";}
            $articulos=mysqli_query($conn,"SELECT * FROM tb_vale;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros= '10';
            $pagina=$_REQUEST["nume"];
            if (is_numeric($pagina))
            $inicio= (($pagina-1)*$registros);
            else
            $inicio=0;
            $busqueda=mysqli_query($conn,"SELECT * FROM tb_vale WHERE idusuario='$tipo_usuario' ORDER BY fecha_registro DESC  LIMIT $inicio,$registros;");
            $paginas=ceil($num_registros/$registros);
            
      
    $n=0;
    while ($solicitudes = mysqli_fetch_array($busqueda)){
        $n++;
        $r=$n+0;
        
        ?>

        <tr>
            <td><?php echo $r ?></td>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>

            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])); ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">             
            </form> 
            </td>
        </tr>

    <?php }?>   
           
           </tbody>
        </table>
         <div class="container-fluid  col-12">
        <ul class="pagination pg-dark  pb-2 pt-2 mb-0" style="float: none;justify-content: right;" >
            <li class="page-item">
            <?php
            if($_REQUEST["nume"] == "1" ){
            $_REQUEST["nume"] == "0";
            echo  "";
            }else{
            if ($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='solicitudes_vale.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>"; 
            echo "<li class='page-item '><a class='page-link' href='solicitudes_vale.php?nume=". ($pagina-1) ."' >".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]."</a></li>"; 
            $sigui = $_REQUEST["nume"] + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $_REQUEST["nume"] +1 ){
            $ultima == "";}
            if ($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' href='solicitudes_vale.php?nume=". ($pagina+1) ."'>".$sigui."</a></li>"; 
            if ($pagina<$paginas && $paginas>1)
            echo "
            <li class='page-item'><a class='page-link' aria-label='Next' href='solicitudes_vale.php?nume=". ceil($ultima) ."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
            </li>";
            ?>
        </ul>
    </div>
    
<?php } ?>
       <!-- <a href="Plugin/pdf_soli_vale.php" class="btn btn-danger">Generar Solicidud Vale</a> -->
  

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
                "lengthMenu": "Mostrar _MENU_ registros",
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
    </div>
</body>
</html>