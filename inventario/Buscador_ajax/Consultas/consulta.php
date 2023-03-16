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
$tipo_usuario = $_SESSION['tipo_usuario'];?>


<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock),Mes,Año, precio, fecha_registro FROM tb_productos  GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY fecha_registro DESC ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['consulta']))
{
    $q=$conn->real_escape_string($_POST['consulta']);
    $query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos  WHERE 
        codProductos LIKE '%".$q."%' or descripcion LIKE '%".$q."%' GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY codProductos,fecha_registro desc ";
        $result = mysqli_query($conn, $query);
         while ($productos = mysqli_fetch_array($result)){
         $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
    }
    ?>

    <?php 
}

$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	 echo '
    <div class="card productos q">
    <div class="card-body">

	<table class=" table display " id="example" style=" width: 100%;">
	 
                <thead>
                     <tr id="tr">
                     <th title="Codigo del productos">Cód.</th>
                     <th title="Codigo del Catálogo">Catál.</th>
                     <th title="Descripción Completa">Desc.</th>
                     <th title="Unidad de Medida">U/M</th>
                     <th title="Cantidad (Stock)">Cant.</th>
                     <th title="Costo Unitario">Precio</th>
                     <th title="Fecha de registro">Fecha</th>

                        ';if($tipo_usuario==1){ 
                        echo '
                    
                     <th title="Editar Producto">Editar</th>
                     <th title="Eliminar Producto">Delete</th>
                 '; } echo'
                   </tr>
                   </thead>
                   <tbody>

';
                $n=0;
	while($productos= $buscarAlumnos->fetch_assoc()){
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
                        $mes=$productos['Mes'];
                            if ($mes==1)  { $mes="Enero";}
                            if ($mes==2)  { $mes="Febrero";}
                            if ($mes==3)  { $mes="Marzo";}
                            if ($mes==4)  { $mes="Abril";}
                            if ($mes==5)  { $mes="Mayo";}
                            if ($mes==6)  { $mes="Junio";}
                            if ($mes==7)  { $mes="Julio";}
                            if ($mes==8)  { $mes="Agosto";}
                            if ($mes==9)  { $mes="Septiembre";}
                            if ($mes==10) { $mes="Octubre";}
                            if ($mes==11) { $mes="Noviembre";}
                            if ($mes==12) { $mes="Diciembre";}
                }
            
		 $n++;
        $r=$n+0;
        $cod=$productos['cod'];
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
		$tabla.='
		 
         <style> #td{display: none;}</style>
         
		<tr>
            <td data-label="Código">'.$productos['codProductos'].'</td>
            <td data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td data-label="Descripción">'.$des.'</td>
            <td data-label="Unidad de Medida">'.$unidad.'</td>
            <td data-label="Cantidad">'.$stock.'</td>
            <td data-label="Precio">'.$precio1.'</td>
            <td data-label="Fecha">'.date("d",strtotime($productos['fecha_registro'])).' '.$mes.' '.$productos['Año'].'</td>
		
		';
        if ($tipo_usuario==1) {
            $tabla.='
			<td data-label="Editar">
            <a title="Editar Producto" class="btn btn-success btn-sm"  href="vistaProductos.php?id='.$productos['codProductos'] .'">
                <svg class="bi" width="18" height="18" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#pencil-square"/>
                        </svg></a>   
            </td>
            <td data-label="Eliminar">
            ';
                        if ($productos['SUM(stock)']==0) {
               
                   
              $tabla.='  <a  data-bs-toggle="tooltip" style="" data-bs-placement="top" title="Eliminar Producto" class="btn btn-danger btn-sm btn-del" onclick="return Eliminar()" id="'.$productos['codProductos'] .'" href="../../Controller/Productos/Delete_producto.php?cod='.$productos['cod'].'&id='. $productos['SUM(stock)'] .'&codProductos='. $productos['codProductos'] .'">
              <svg class="bi" width="18" height="18" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#trash-fill"/>
                        </svg></a>';
            
                
            };
                        if ($productos['SUM(stock)']!=0) {
               $tabla.='
            <button   id="th" style="cursor: not-allowed;background: rgba(255, 0, 0, 0.5); border: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="En este momento no se Puede Eliminar este Producto" class="btn btn-danger btn-sm text-white">
            <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#trash-fill"/>
                        </svg></button>
            ';
            }
        }?>
        </td>     
        
		 </tr>
               
		
	
<?php 
	}
	$tabla.='</tbody></table></div><p id="respa1"></p></div>';
} else
	{
		$tabla="
        <style>#OcultarDiv{display:none}</style>
        <h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1>  
        ";
	}


echo $tabla;
?>     


<script type="text/javascript">
    $(document).ready(function () {
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href=$(this).attr('href');
        const cod=$(this).attr('id');
            Swal.fire({
      title:'IMPORTANTE',
      html: 'Realmente deseas Eliminar este registro<br><br><b>El Código a Eliminar es: </b>'+cod,
      icon:'warning',
      showCancelButton:true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor:'#d33',
      confirmButtonText: 'Eliminar',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {

    $.ajax({
        url : href,
        type : 'POST',
        data : href,
        success:function(resp) {

             $('#respa1').html(resp);
            
}
      });
        // document.location.href= href;                               
               }
                });
    })
   
    var table =$('#example').DataTable({

        lengthMenu: [[10, -1], [10,"Todos"]],
            responsive: true,
            autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
});   $(document).ready(function () {
    $('#example1').DataTable({

lengthMenu: [[10, -1], [10,"Todos"]],
responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
   $(document).ready(function () {
    $('#example2').DataTable({

lengthMenu: [[10, -1], [10,"Todos"]],
responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
});   $(document).ready(function () {
    $('#example3').DataTable({

lengthMenu: [[10, -1], [10,"Todos"]],
responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
});   $(document).ready(function () {
    $('#example4').DataTable({

lengthMenu: [[10, -1], [10,"Todos"]],
responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
});   $(document).ready(function () {
    $('#example5').DataTable({

lengthMenu: [[10, -1], [10,"Todos"]],
responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
});   $(document).ready(function () {
    $('#example6').DataTable({

lengthMenu: [[10, -1], [10,"Todos"]],
responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            dom: 'lrtip',
            "searching": false,
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
