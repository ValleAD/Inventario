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


<?php include ('../Model/conexion.php');

$tabla="";
$query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY fecha_registro DESC ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE 
        codProductos LIKE '%".$q."%' GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY codProductos,fecha_registro desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
         $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
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
            <form id="form1" style=" margin-top:5%" method="POST" action="Plugin/productos.php" target="_blank">';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

                echo '
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
            ';} echo '
                <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form><br>
            <form id="form2" style="margin-top:5%;margin-left: 2.6%;" method="POST" action="Plugin/pdf_productos.php" target="_blank">
              ';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
echo'             
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
            ';} echo'
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
    </div>
    ';}echo '
	<table class="table table-responsive  table-striped" id="div" style=" width: 100%;">
	 
                <thead>
                     <tr id="tr">';if($tipo_usuario==2){ 
                        echo '
                     <th style="width:1%" id="th">Código</th>
                     <th style="width:10%" id="th">Cod. Catálogo</th>
                     <th style="width:23% " id="th" >Descripción Completa</th>
                     <th style="width:6%" id="th">U/M</th>
                     <th style="width:6%" id="th">Cantidad</th>
                     <th style="width:6%" id="th">Costo Unitario</th>
                     <th style="width:6%" id="th">Fecha Registro</th>
                     <th id="th" style="width:20%">Categoría</th>
                    ';}if($tipo_usuario==1){ 
                        echo '
                     <th style="width:7%"  id="th">Código</th>
                     <th style="width:7%"  id="th">Cod. Catálogo</th>
                     <th style="width: 24%;" id="th"> Descripción Completa</th>
                     <th style="width:8%"  id="th">U/M</th>
                     <th style="width:7%"  id="th">Cantidad</th>
                     <th style="width:10%"  id="th">Costo Unitario</th>
                     <th style="width:10%"  id="th">Fecha Registro</th>
                    <th id="th" style="width:8%">Categoría</th>

                    
                     <th style="width:10%" id="th">Editar</th>
                     <th style="width:10%" id="th">Eliminar</th>
                 '; } echo'
                   </tr>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody>';
                $n=0;
	while($productos= $buscarAlumnos->fetch_assoc())
	{
                $categoria=$productos['categoria'];
                $des=$productos['descripcion'];
                if ($productos['unidad_medida']=="") {
                    $unidad=" Sin Unidad";
                }else{
                   $unidad=$productos['unidad_medida']; 
                }
                if ($des=="") {
                    $des="DESCRIPTION NO DISPONIBLE";
                }else{
                   $des=$productos['descripcion']; 
                }
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
            
		 $n++;
        $r=$n+0;
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
		$tabla.='
		 ';if ($tipo_usuario ==2) {echo'
         <style> #td{display: none;}</style>
		<tr>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width: 47%;min-width: 100%;" id="th" data-label="Descripción">'.$des.'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$unidad.'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width: 20%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width: 30%;min-width: 100%;" id="th" data-label="Categoría">'.$categoria.'</td>
			</tr>
		';} if ($tipo_usuario ==1) {
				echo '<tr>
			<td style="width:7%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width:30%;min-width: 100%;" id="th" data-label="Descripción">'.$productos['descripcion'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$productos['unidad_medida'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width:11%;min-width: 100%;" id="th" data-label="Categoría">'.$categoria.'</td>
			
           <td style="width:10%;min-width: 100%;" id="th"  data-label="Editar">
            <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="vistaProductos.php">             
                <input type="hidden" name="id" value="'.$productos['codProductos'] .'">               
                <button  id="th" name="editar" class="btn btn-success btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form>  
            </td>
            <td style="width:10%;min-width: 100%;" id="th"  data-label="Eliminar">
            ' ;
            if ($productos['SUM(stock)']==0) {?>
                <form method="POST" action="Controller/Delete_producto.php">
                    <input type="hidden" name="cod" value="<?php echo $productos['cod'] ?>">
                    <input type="hidden" name="id" value="<?php echo $productos['SUM(stock)'] ?>">
                    <button   id="th" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" onclick="return confirmaion()">Eliminar</button>
                </form>
           <?php  };
            if ($productos['SUM(stock)']!=0) {
                 echo'
            <button   id="th" style="cursor: not-allowed;background: rgba(255, 0, 0, 0.5); border: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm text-white">Eliminar</button>
            ';
            }
           echo'
               
            </td>
        
		 </tr>
		';
	}
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
     