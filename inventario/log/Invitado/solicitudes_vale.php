<?php require '../../Model/conexion.php';
$tipo_usuario=0;
include ('menu.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Productos</title>
</head>

<body>
        <style>
            #div{
                margin: 0%;
                display: none;
            }
    h1 {
  color: white;
  text-shadow: 1px 1px 5px black;
}
#ssas{
    display: none;
}

    </style>
    <br><br><br>
    <center><h1 style="margin-top:5px">Solicitudes Vale</h1></center><br>
     <div  class="mx-3 p-2 mb-1" style="background-color: white; border-radius:5px; ">
        <h1 id="td" class=' text-center bg-danger my-4' style=' font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1> 


       <?php include ('../../Buscador_ajax/Cabezeras/cabezeraVale_invitado.php') ?>
             <div  id="x" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
         <form id="ssas" method="POST" class="mx-1" action="../../Plugin/Imprimir/Vale/soli_vale.php" target="_blank">
            <input type="hidden" name="idusuario" value="0">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">    
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="../../Plugin/PDF/Vale/pdf_soli_vale.php" target="_blank" class="mx-1">
            <input type="hidden" name="idusuario" value="0">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
        <form id="ssas" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Vale/Excel.php" target="_blank">
            <input type="hidden" name="idusuario" value="0">
                <button type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>
 <?php if (isset($_POST['Consultar1'])) {$columna=$_POST['columna'];$tipo=$_POST['tipo'];?>
                  <div   class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">

         <form id="ssas" method="POST" class="mx-1" action="../../Plugin/Imprimir/Vale/soli_vale.php" target="_blank">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar">    
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form id="ssas" method="POST" action="../../Plugin/PDF/Vale/pdf_soli_vale.php" target="_blank" class="mx-1">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
             <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Consultar" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
        <form id="ssas" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Vale/Excel.php" target="_blank">
            <input type="hidden" name="columna" value="<?php echo $columna ?>">
            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
                <button type="submit" class="btn btn-outline-primary" name="Consultar" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
 </div>
 
  <?php } include ('../../Buscador_ajax/Tablas/Invitado/tablaVale_invitado.php') ?>
  <div id="x">
        <table class="table" id="div">
            <thead>
              <tr id="tr">
                <th style="width: 10%;"><strong>Código de Vale</strong></th>
                <th style="width: 20%"><strong>Departamento Solicitante</strong></th>
                <th style="width: 20%;"><strong>Encargado</strong></th>
                <th style="width: 15%"><strong>Fecha</strong></th>
                <th style="width: 14%;"><strong>Estado</strong></th>
                <th style="width: 20%;"><strong>Detalles</strong></th>  
            </tr>
            
     </thead>
 </table>
<div id="div" style = " max-height: 442px; overflow-y:scroll;">
    <table class="table">
        <tbody>     
            
    <?php
   
    
    $sql = "SELECT * FROM tb_vale WHERE idusuario=0 Order by codVale DESC";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){

        $des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
                 if ($tipo_usuario==0) {
            $u='Invitado';
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
            <td style="width: 10%;min-width: 100%;" data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?></td>
            <td style="width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>
            <td style="width: 30%;min-width: 100%;" data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
           <td style="width: 20%;min-width: 100%;"  data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td style="width: 20%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td style="width: 20%;min-width: 100%;"  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">  
                

                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
              
            
          
        
                 
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
                     
            </form> 
        </div>
            </td>


           </tr>
    <?php }?>   
           </tbody>
        </table>
    </div>
</div>

    </div>

    
</body>
</html>