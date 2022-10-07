<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE stock!=0 GROUP BY codProductos HAVING COUNT(*) ORDER BY codProductos desc ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE 
        codProductos LIKE '%".$q."%' or descripcion LIKE '%".$q."%' GROUP BY codProductos HAVING COUNT(*) ORDER BY codProductos desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
         $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
    }
}


$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= '<style>
             #td{display: none;}
             #div{display: block;margin: 0%;}
                .well{display:block;}</style>';  if(isset($_POST['consulta'])){
                echo ' <style>#well{display:none;}</style>
<div style="position:initial" class="btn-group mb-3 mx-2"  role="group" aria-label="Basic outlined example">
            <form id="form1" style="  method="POST" action="../../Plugin/productos.php" target="_blank">';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

                echo '
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">

            ';} echo '
                <button style="position:initial" type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form><br>
            <form id="form2" style="" method="POST" action="../../Plugin/pdf_productos.php" target="_blank">
              ';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
echo'             
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
                
            ';} echo'
                <button style="position:initial" type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
            <form id="form2" style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Productos/Buscador_Excel.php" target="_blank">
              ';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
echo'             
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
            ';} echo'
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
    </div>
    ';}echo '
	<table class="table table-striped" id="div" style=" width: 100%; border: 1px solid #ccc;
    border-collapse: collapse;">
	 
                <thead>
                     <tr id="tr">
                     <th style="width:1%" id="th">Código</th>
                     <th style="width:10%" id="th">Cod. Catálogo</th>
                     <th style="width:23%" id="th" >Descripción Completa</th>
                     <th style="width:6%" id="th">U/M</th>
                     <th style="width:6%" id="th">Cantidad</th>
                     <th style="width:6%" id="th">Costo Unitario</th>
                     <th style="width:6%" id="th">Fecha Registro</th>
                     <th id="th" style="width:20%">Categoría</th>
                 </tr>
                </thead>
            </table>
            <div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
            <table class="table">
                <tbody>';
                $n=0;
	while($productos= $buscarAlumnos->fetch_assoc())
	{
                $categoria=$productos['categoria'];
                $des=$productos['descripcion'];
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
		 
		<tr>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width: 47%;min-width: 100%;" id="th" data-label="Descripción">'.$des.'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$productos['unidad_medida'].'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width: 10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width: 20%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width: 30%;min-width: 100%;" id="th" data-label="Categoría">'.$categoria.'</td>
			</tr>
		';
            
	}

	$tabla.='</tbody></table></div> ';
} else
	{
		$tabla="<h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1> ";
	}


echo $tabla;
?>      