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
<div class="btn-group"  role="group" aria-label="Basic outlined example">
            <form id="form1" style=" margin-top:3%" method="POST" action="../../Plugin/productos.php" target="_blank">';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

                echo '
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">

            ';} echo '
                <button type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form><br>
            <form id="form2" style="margin-top:5%;margin-left: 2.6%;" method="POST" action="../../Plugin/pdf_productos.php" target="_blank">
              ';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
echo'             
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
                
            ';} echo'
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
    </div>
    ';}echo '
	<table class="table table-responsive table-striped" id="example2" style=" width: 100%;">
	 
                <thead>
                     <tr id="tr">
                    <th style="width: 5%;">#</th>
                     <th style="width: 10%;">Código</th>
                     <th style="width: 10%;">Cod. de Catálogo</th>
                     <th style="width: 100%;">Descripción Completa</th>
                     <th style="width: 10%;">U/M</th>
                     <th style="width: 10%;">Cantidad</th>
                     <th style="width: 10%;">Costo Unitario</th>
                     <th style="width: 10%;">Fecha Registro</th>
                     <th style="width: 10%; width: 50%;">Categoría</th>
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
		 
		<tr>
		<td>'.$r.'</td>
			<td>'.$productos['codProductos'].'</td>
			<td>'.$productos['catalogo'].'</td>
			<td>'.$productos['descripcion'].'</td>
			<td>'.$productos['unidad_medida'].'</td>
			<td>'.$stock.'</td>
			<td>'.$precio1.'</td>
			<td>'.$productos['fecha_registro'].'</td>
			<td>'.$categoria.'</td>
			</tr>
		';
            
	}

	$tabla.='</tbody></table> ';
} else
	{
		$tabla="<h1 class='text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>";
	}


echo $tabla;
?>      