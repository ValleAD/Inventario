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
$query="SELECT * FROM tb_productos ORDER BY codProductos";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
	$q=$conn->real_escape_string($_POST['consulta']);
	$query="SELECT * FROM tb_productos WHERE 
		codProductos LIKE '%".$q."%' OR
		descripcion LIKE '%".$q."%' OR
		categoria LIKE '%".$q."%' OR
		unidad_medida LIKE '%".$q."%' OR
		stock LIKE '%".$q."%' OR
		fecha_registro LIKE '%".$q."%' OR
		catalogo LIKE '%".$q."%' ";
}

$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= '';  if(isset($_POST['consulta'])){
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
	<table class="table  table-striped" id="example" style=" width: 100%;">
	 
                <thead>
                     <tr id="tr">
                    <th>#</th>
                     <th>Código</th>
                     <th>Cod. de Catálogo</th>
                     <th>Descripción Completa</th>
                     <th>U/M</th>
                     <th>Cantidad</th>
                     <th>Costo Unitario</th>
                     <th>Fecha Registro</th>
                     <th>Categoría</th>
                    ';if($tipo_usuario==1){ 
                    	echo '
                     <th>Editar</th>
                     <th>Eliminar</th>
                 '; } echo'
                   </tr>
                </thead>
                <tbody>';
                $n=0;
	while($productos= $buscarAlumnos->fetch_assoc())
	{
                $categoria=$productos['categoria'];
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
            
		 $n++;
        $r=$n+0;
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
		$tabla.='
		 ';if ($tipo_usuario ==2) {echo'
		<tr>
		<td data-label="N°">'.$r.'</td>
			<td data-label="Código">'.$productos['codProductos'].'</td>
			<td data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
			<td data-label="Descripción">'.$productos['descripcion'].'</td>
			<td data-label="Unidad de Medida">'.$productos['unidad_medida'].'</td>
			<td data-label="Cantidad">'.$stock.'</td>
			<td data-label="Precio">'.$precio1.'</td>
			<td data-label="Fecha">'.$productos['fecha_registro'].'</td>
			<td data-label="Categoría">'.$categoria.'</td>
			</tr>
		';} if ($tipo_usuario ==1) {
				echo '<tr>
            <td data-label="N°">'.$r.'</td>
			<td data-label="Código">'.$productos['codProductos'].'</td>
            <td data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td data-label="Descripción">'.$productos['descripcion'].'</td>
            <td data-label="Unidad de Medida">'.$productos['unidad_medida'].'</td>
            <td data-label="Cantidad">'.$stock.'</td>
            <td data-label="Precio">'.$precio1.'</td>
            <td data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td data-label="Categoría">'.$categoria.'</td>
			
           <td  data-label="Editar">
            <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="vistaProductos.php?Editar">             
                <input type="hidden" name="id" value="'.$productos['codProductos'] .'">               
                <button name="editar" class="btn btn-info btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form>  
            </td>
            <td  data-label="Eliminar">
            ' ;
            if ($productos['stock']==0) {?>
                <form method="POST" action="Controller/Delete_producto.php">
                    <input type="hidden" name="cod" value="<?php echo $productos['cod'] ?>">
                    <input type="hidden" name="id" value="<?php echo $productos['stock'] ?>">
                    <button  data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" onclick="return confirmaion()">Eliminar</button>
                </form>
           <?php  };
            if ($productos['stock']!=0) {
                 echo'
            <button disabled style="cursor: not-allowed;" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm text-white">Eliminar</button>
            ';
            }
           echo'
               
            </td>
        
		 </tr>
		';
	}
	}

	$tabla.='</tbody></table> ';
} else
	{
		$tabla="<h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.<a class='btn btn-outline-success' href='' style='float: right;'>x</a></h1> 
        ";
	}


echo $tabla;
?>      
     