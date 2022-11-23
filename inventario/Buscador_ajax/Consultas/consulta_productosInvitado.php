


<?php include ('../../Model/conexion.php');

$tabla="";
$query="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY codProductos,precio HAVING COUNT(*) ORDER BY fecha_registro DESC ";

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
    $tabla.= '         <style>

         </style>'; echo '
    <div class="card productos q">
    <div class="card-body">

    <table class=" table display   table-striped" id="example" style=" width: 100%;">
     
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
                   <tbody>

';
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
        $cod=$productos['cod'];
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $tabla.='
         
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
        
        ';
        if ($tipo_usuario==1) {
            $tabla.='
            <td>
                <form style="margin: 0%;position: 0;float:right; background: transparent;" method="POST" action="vistaProductos.php">             
                <input type="hidden" name="id" value="'.$productos['codProductos'] .'">               
                <button  id="th" name="editar" class="btn btn-success btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">Editar</button>             
            </form> </td>
            <td>
            ';
                        if ($productos['SUM(stock)']==0) {
               
                   
              $tabla.='  <a  data-bs-toggle="tooltip" style="float:right;" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm btn-del" id="'.$productos['codProductos'] .'" href="../../Controller/Productos/Delete_producto.php?cod='.$productos['cod'].'&id='. $productos['SUM(stock)'] .'">Eliminar</a>';
            
                
            };
                        if ($productos['SUM(stock)']!=0) {
               $tabla.='
            <button   id="th" style="cursor: not-allowed;float:right;background: rgba(255, 0, 0, 0.5); border: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm text-white">Eliminar</button>
            ';
            }
        }?>
        </td>     
        
         </tr>
               
        
    
<?php 
    }
    $tabla.='</tbody></table></div></div>';
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
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href=$(this).attr('href');
        const cod=$(this).attr('id');
            Swal.fire({
      title:'IMPORTANTE',
      html: 'Realmente deseas Eliminar este registro<br><br><b>El código a Eliminar es: </b>'+cod,
      icon:'warning',
      showCancelButton:true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor:'#d33',
      confirmButtonText: 'Eliminar',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        document.location.href= href;                               
               }
                });
    })
   
   $(document).ready(function () {
    $('#example').DataTable({
            rowGroup: {
            dataSrc: 6
        },
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
