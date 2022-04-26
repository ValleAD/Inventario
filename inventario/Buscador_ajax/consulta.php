 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="../styles/estilos_tablas.css">
        <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="Plugin/bootstap-icon/bootstrap-icons.min.css">
      <link rel="stylesheet" href="Plugin/bootstap-icon/fontawesome.all.min.css">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 

    <style> #form2{
                margin-top: 3%;	
    </style> 
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
$tipo_usuario = $_SESSION['tipo_usuario'];
include ('../Model/conexion.php');

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
 <p class="my-7"></p>
<div class="btn-group mb-3 my-7 mx-5"  role="group" aria-label="Basic outlined example">
            <form id="form1" style=" margin-top:5%" method="POST" action="Plugin/productos.php" target="_blank">';
    $sql = "SELECT * FROM tb_productos GROUP BY precio,codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

                echo '
                <input type="hidden" name="consulta" value="'. $ee=$_POST['consulta'].'">
                <input type="hidden" name="cod[]" value="'.$productos['codProductos'].'">
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
                <input type="hidden" name="cod[]" value="'.$productos['codProductos'] .'">
            ';} echo'
                <button type="submit" class="btn btn-outline-primary" name="pdf" target="_blank"><i class="bi bi-file-pdf-fill"></i>
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
    </div>
    ';}echo '
    <div style="position:initial;">
	<table class="table table-responsive table-striped" id="example" style=" width: 100%;">
	 
                <thead>
                     <tr id="tr">
                    <th style="max-width: 5%;">#</th>
                     <th style="max-width: 10%;">Código</th>
                     <th style="max-width: 10%;">Cod. de Catálogo</th>
                     <th style="max-width: 100%;">Descripción Completa</th>
                     <th style="max-width: 10%;">U/M</th>
                     <th style="max-width: 10%;">Cantidad</th>
                     <th style="max-width: 10%;">Costo Unitario</th>
                     <th style="max-width: 40%;">Fecha Registro</th>
                     <th style="max-width: 100%; max-width: 50%;">Categoría</th>
                    ';if($tipo_usuario==1){ 
                    	echo '
                     <th style="max-width: 10%;">Editar</th>
                     <th style="max-width: 10%;">Eliminar</th>
                 '; } echo'
                   </tr>
                </thead>
                <tbody>';
                $n=0;
	while($productos= $buscarAlumnos->fetch_assoc())
	{
		 $n++;
        $r=$n+0;
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
		$tabla.='
		 ';if ($tipo_usuario ==2) {echo'
		<tr>
		<td>'.$r.'</td>
			<td>'.$productos['codProductos'].'</td>
			<td>'.$productos['catalogo'].'</td>
			<td>'.$productos['descripcion'].'</td>
			<td>'.$productos['unidad_medida'].'</td>
			<td>'.$stock.'</td>
			<td>'.$precio1.'</td>
			<td>'.$productos['fecha_registro'].'</td>
			<td>'.$productos['categoria'].'</td>
			</tr>
		';} if ($tipo_usuario ==1) {
				echo '<tr>
			<td>'.$r.'</td>
			<td>'.$productos['codProductos'].'</td>
			<td>'.$productos['catalogo'].'</td>
			<td>'.$productos['descripcion'].'</td>
			<td>'.$productos['unidad_medida'].'</td>
			<td>'.$stock.'</td>
			<td>'.$precio1.'</td>
			<td>'.$productos['fecha_registro'].'</td>
			<td>'.$productos['categoria'].'</td>
			
           <td  data-label="Editar">
            <form style="margin: 0%;position: 0; background: transparent;" method="POST" action="vistaProductos.php?Editar">             
                <input type="hidden" name="id" value="'.$productos['codProductos'] .'">               
                <button name="editar" class="btn btn-info btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form>  
            </td>
            <td  data-label="Eliminar">
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm " class="text-primary" href="Controller/Delete_producto.php?id='.$productos['stock'].'" onclick="return confirmaion()">Eliminar</a>
            </td>
        
		 </tr>
		';
	}
	}

	$tabla.='</tbody></table> </div>';
} else
	{
		$tabla="<h1 class='text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>";
	}


echo $tabla;
?>      
     
    <script>
   $(document).ready(function(){
 $('#example').DataTable({        
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
        //para usar los botones   
        responsive: "true",
        dom: 'rtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
</script> <script>
   $(document).ready(function(){
 $('#example1').DataTable({        
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
        //para usar los botones   
        responsive: "true",
        dom: 'rtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    });     

    });
</script>