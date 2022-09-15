
<?php include ('../Model/conexion.php');
$tabla="";

$query="SELECT * FROM tb_vale GROUP BY codVale HAVING COUNT(*)";


///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT * FROM tb_vale  WHERE 
        codVale LIKE '%".$q."%' GROUP BY codVale HAVING COUNT(*)";
        $result = mysqli_query($conn, $query);
         
}


$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
    $tabla.= '';  if(isset($_POST['consulta'])){
                echo ' ';}echo '
    <table class="table table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 10%;"><strong>N° Vale</strong></th>
                <th style="width: 25%"><strong>Departamento Solicitante</strong></th>
                <th style="width: 20%;"><strong>Encargado</strong></th>
                <th style="width: 19%"><strong>Fecha</strong></th>
                <th style="width: 30%;"><strong>Estado</strong></th>
                <th style="width: 30%;"><strong>Detalles</strong></th>  
                  
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody>';
                $n=0;
    while($productos= $buscarAlumnos->fetch_assoc())
    {
        $idusuario = $productos['idusuario'];
         $des=$productos['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$productos['departamento']; 
                }
        if ($idusuario==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($idusuario==0) {
            $u='Invitado';
        }
        $tabla.='
         <style>
          #x{
                display: block;
            }
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
        <tr>';?>
              
         <td style="width: 10%;min-width: 100%;" data-label="Código" class="delete"><?php  echo $productos['codVale']; ?>
                  
            </td>
            <td style="width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>

             <td style="width: 30%;min-width: 100%;" data-label="Encargado" class="delete"><?php  echo $productos['usuario'],"<br> ","(",$u,")"; ?></td>
           <td style="width: 20%;min-width: 100%;" data-label="Fecha de solicitud" class="delete"><?php  echo $productos['fecha_registro']; ?></td>
            <td style="width: 20%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($productos['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $productos['estado'] ?>"></td></td>
            <td style="width: 20%;min-width: 100%;"  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $productos['codVale']; ?>">  
                <?php  if ($productos['estado']=="Aprobado" || $productos['estado']=="Pendiente" || $productos['estado']=="Rechazado") {?>
                
                <form method="POST" action="Controller/Delete_producto.php">
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>
            </form>
        </div>
    </td>
         </tr>
        <?php } echo'  
        ';
    }

    $tabla.='</tbody></table></div> ';
} else
    {
        $tabla="
        <h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1> 

        ";
    }


echo $tabla;
?>      
     