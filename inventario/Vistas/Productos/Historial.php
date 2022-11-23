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
?><?php include ('../../templates/menu1.php') ?>
<?php include ('../../Model/conexion.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Historial</title>
</head>
<body>
  <section  style="background: rgba(255, 255, 255, 0.9);margin: 7%1%1%1%;padding: 1%; border-radius: 15px;">
<h2  class="text-center">Historial de Productos</h2>
<br>

 <div  style="position: initial;" class="btn-group mb-3 my-3  mx-2" role="group" aria-label="Basic outlined example">
         <form method="POST" action="../../Plugin/Imprimir/Producto/productos.php" target="_blank">
         	<input type="hidden" name="usuario" value="<?php echo $cliente ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Productos/pdf_productos.php" target="_blank" class="mx-1">
         	<input type="hidden" name="usuario" value="<?php echo $cliente ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
                 <form  method="POST" action="../../Plugin/Excel/Productos/Historial.php" >
                 	<input type="hidden" name="usuario" value="<?php echo $cliente ?>">
                <button type="submit" class="btn btn-outline-primary" name="Historial" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
</div>
         <table class="table  table-striped" id="examp" style=" width: 100%;">
                   <thead>
             <tr id="tr">
                     <th style="width:7%"  id="th">Código</th>
                     <th style="width:7%"  id="th">Cod. Catálogo</th>
                     <th style="width: 27%;" id="th"> Descripción Completa</th>
                     <th style="width:8%"  id="th">U/M</th>
                     <th style="width:8%"  id="th">Cantidad</th>
                     <th style="width:10%"  id="th">Costo Unitario</th>
                     <th style="width:10%"  id="th">Fecha Registro</th>
                    <th id="th" style="width:9%">Categoría</th>
                
            </tr>
           
     </thead>
    <?php

    $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE usuario='$cliente' GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY fecha_registro DESC ";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){
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
           
        $cod=$productos['cod'];
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
		echo'
		 
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
		';} ?> 
           </tbody>
        </table>
    </div>
    </div>

  </section>

        <script type="text/javascript">
            $(document).ready(function () {

       $('#examp').DataTable({
            rowGroup: {
            dataSrc: 1
        },
            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            lengthMenu: [[10, -1], [10,"Todos"]],
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
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
let linkDelete =document.querySelectorAll("delete");
</script>
</section>
</body>
</html>