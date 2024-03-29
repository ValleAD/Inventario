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
<link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <title>Solicitudes De Almacen</title>
</head>

<body>
<style>

    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}


        @media (min-width: 1028px){
           #section{
                margin: 5%6%6%1%;
                width: 97%;
            } 
        }
        @media (max-width: 800px){
            #ver{
                margin-top: 2%;
            }
            #section{
                margin: -10%6%6%1%;
                width: 97%;
            }

            th{
                width: 25%;
            }
            #p{
                margin-top: 5%;
                margin-left: 7%;
            }

        }
    </style>
    <br><br><br>
<section id="section" class="mx-3 p-2" style="background-color:white; border-radius:5px;margin-bottom: 3%;">      
            <h1 class="text-center mg-t" >Solicitudes de Almacen</h1><br>
<?php include '../../Include/Almacen/almacen.php';?>
<?php include '../../Include/Almacen/Exportar_almacen.php'; ?>
<table class="table " id="exam" style=" width: 100%">
          <thead>
              <tr id="tr">
                <th style=" width: 10%">No. de Solici1eeetud</th>
                <th style=" width: 20%" >Departamento Solicitante</th>
                <th style=" width: 15%">Usuario</th>
                <th style="width: 15%">Fecha de solicitud</th>
                <th style="width: 2%">Estado</th>
                <th style="width: 15%" >Detalles</th>
                
            </tr>
            </thead>
            <tbody>
   
    <?php
    if ($tipo_usuario==1) {
    $sql = "SELECT * FROM tb_almacen ORDER BY codAlmacen DESC  ";
    }else{
    $sql = "SELECT * FROM tb_almacen WHERE  idusuario='$idusuario' ORDER BY fecha_solicitud  ";
    }
    $result = mysqli_query($conn, $sql);
 
    while ($datos_sol = mysqli_fetch_assoc($result)){
    
        if ($datos_sol['idusuario']==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        ?>
        <style>
            #td{
                display: none;
            }
            #ssas{
                display: block;
            }
            #div{
                display: block;
            }
        </style>
        <tr>
            
            <td  align="center" style=" width: 7%;min-width: 100%;" data-label="No. solicitud" class="delete"><?php  echo $datos_sol['codAlmacen']; ?></td>
            <td  align="center" style=" width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $datos_sol['departamento']; ?></td>
            <td align="center"  style=" width: 20%;min-width: 100%;" data-label="Usuario" class="delete"><?php  echo $datos_sol['encargado']; ?></td>
            <td align="center"  data-label="Fecha de solicitud" class="delete"><?php  echo date("d - m - Y",strtotime($datos_sol['fecha_solicitud'])) ?></td>
              <td data-label="Estado" align="center"><input  <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;pointer-events: none;border: none;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;pointer-events: none;border: none;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;pointer-events: none;border: none;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $datos_sol['estado'] ?>"></td>
            <td align="center"  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Almacen.php">             
                <input type='hidden' name='id' value="<?php  echo $datos_sol['codAlmacen']; ?>">     
         <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
        
            </form> 
            </td>
        </tr>
 <?php } ?>

           </tbody>
        </table>

</section>
  <style>
                 #ver{
                margin-left: 2%; 
                background: rgba(0,123,255,.5); 
                color: #fff; margin-bottom: 2%;  
                border: rgb(5, 65, 114);
                border-radius: 4px;
                padding: 6% 12px;
               }
               #ver:hover{
                transition: 1s;
                color: lawngreen;
                transform: translateY(2px);
               } 
            </style>
            <script>
       $(document).ready(function () {
    $('#exam').DataTable({

            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
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
</script>
</body>
</html>