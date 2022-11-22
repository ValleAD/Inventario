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
$tipo_usuario = $_SESSION['tipo_usuario'];?>


<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT * FROM tb_usuarios";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT * FROM tb_usuarios  WHERE username LIKE '%".$q."%' or firstname LIKE '%".$q."%' or lastname LIKE '%".$q."%' ";
        $result = mysqli_query($conn, $query);
         while ($solicitudes = mysqli_fetch_array($result)){
        
    }
}

$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= '         <style>
             #ssas{display: block;}
            
             #div{display: block;}
             .well{display:block;}
         </style>';  if(isset($_POST['consulta'])){
                echo ' <style>#well{display:none;}</style>

<div style="position: initial;" class="btn-group mb-3"  role="group" aria-label="Basic outlined example">
            <form id="form1" style=" margin-top:5%" method="POST" action="../../Plugin/Imprimir/Empleados/Empleados.php" target="_blank">
                <input type="hidden" name="user1" value="'. $ee=$_POST['consulta'].'">
                <button type="submit" class="btn btn-outline-primary" name="user2">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form><br>
            <form id="form2" style="margin-top:5%;margin-left: 2.6%;" method="POST" action="../../Plugin/PDF/Empleados/pdf_Empledos.php" target="_blank">           
                <input type="hidden" name="user1" value="'. $ee=$_POST['consulta'].'">
            
                <button type="submit" class="btn btn-outline-primary" name="user2" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
        <form id="form2" style="margin-top:5%;margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Empleados/Buscador_Excel.php" target="_blank">
          
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
    </div> <div id="div" style = " max-height: 550px;width: 100%; overflow-y:scroll;overflow-x: hidden;padding-right: 1%  ;">  
    ';}
                $n=0;
	while($solicitudes= $buscarAlumnos->fetch_assoc())
	{
if ($solicitudes['tipo_usuario']==1) {
    $u='Administrador';
}else if($solicitudes['tipo_usuario']==2){
$u='Cliente';
} if($solicitudes['Habilitado']=="No"){
    $u='Cuenta Desabilitada';
}
		$tabla.='
        <div class="card" style="font-size: 12px;margin-bottom: 1%;position: initial;">
      <div class="card-body" style="position: initial">
        <table class="table1" style="width:100%">
            <tr><td rowspan="2" id="td1" style="width: 20%;">
                <svg  class="bi bi2 my-4 mx-1 text-primary" width="90" height="90" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#person-circle"/>
                        </svg></td></tr>
            <tr>
            <td style="width: 60%;"> 
                <p class="card-title"><b>USUARIO:</b> '. $solicitudes['username'] .'</p>
                <p class="card-text"><b>NOMBRE COMPLETO: </b>'. $solicitudes['firstname']." ".$solicitudes['lastname'].'</p>
                <p class="card-text"><b>ESTABLECIMIENTO:</b> '. $solicitudes['Establecimiento'] .'</p></td>
           
            
            <td><p  class="card-text"><b>UNIDAD:</b> '. $solicitudes['unidad'] .'</p>
                <p  class="card-text"><b>CUENTA:</b> '. $u .'</p>
                <div style="position: initial;" class="btn-group m-2 " role="group" aria-label="Basic outlined example">
                     <form style="margin: 0%;background: transparent;" method="POST" action="Empleados.php">             
          <input type="hidden" name="id" value="'.$solicitudes["id"].'">      
          <button id="d" name="editar" class="btn btn-info swal2-styled.swal2-confirm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
        <form style="margin: 0%;background: transparent;margin-left: .5em; " method="POST" action="Controller/Delete_Empleados.php">
            <input type="hidden" name="id" value="'.$solicitudes['id'].'">
            <input type="hidden" name="idusuario" value="'.$solicitudes['tipo_usuario'] .'">
            <input id="dh" type="submit"onclick="return confirmaion()" class="btn btn-danger swal2-styled.swal2-confirm" value="Eliminar">
        </form>
        </div>
            </td>
 
        </tr>
        </table>
             <div id="Empleados">
                <p class="card-title"><b>USUARIO:</b> '. $solicitudes['username'] .' </p>
                <p class="card-text"><b>NOMBRE COMPLETO: </b>'. $solicitudes['firstname']." ".$solicitudes['lastname'].'</p>
                <p class="card-text"><b>ESTABLECIMIENTO:</b> '. $solicitudes['Establecimiento'] .'</p>
                <p  class="card-text"><b>UNIDAD:</b> '. $solicitudes['unidad'] .'</p>
                <p  class="card-text"><b>CUENTA:</b> '. $u .'</p>
                                <div style="position: initial;" class="btn-group  " role="group" aria-label="Basic outlined example">
     <form style="margin: 0%;background: transparent;" method="POST" action="Empleados.php">             
          <input type="hidden" name="id" value="'.$solicitudes['id'].'">      
          <button id="d" name="editar" class="btn btn-info swal2-styled.swal2-confirm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
        </form>
        <form style="margin: 0%;background: transparent;margin-left: .5em; " method="POST" action="Controller/Delete_Empleados.php">
            <input type="hidden" name="id" value="'.$solicitudes['id'].'">
            <input type="hidden" name="idusuario" value="'.$solicitudes['tipo_usuario'].'">
            <input id="dh" type="submit"onclick="return confirmaion()" class="btn btn-danger swal2-styled.swal2-confirm" value="Eliminar">
        </form>
        </div>
    </div>
</div>
</div>

';
	
	}

	$tabla.='</tbody></table></div></div> ';
} else
	{
		$tabla="
        <style>#OcultarDiv{display:none}</style>
         <style>#well{display:none;}</style>
        <h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1>  
        ";
	}


echo $tabla;
?>      

     