<style type="text/css">
     #submit{
          margin: 0;
     }
</style>
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
    $tabla.= '         <style>
             #ssas{display: block;}
             #td{display: none;}
             #div{display: block;}
             .well{display:block;}
         </style>';  if(isset($_POST['consulta'])){
                echo ' <style>#well{display:none;}

            #x{
                display: block;
            }
            #y{
                display: none;
            }
        </style>


    ';}echo '
<div class="card">
     <div class="card-body">
          <div class="row">
               <div class="col-4">
                    <h3>Seleccione los Productos</h3>
               </div>
               <div class="col-8">
                    
            <button id="submit" style="width: 20%; float: right;font-size: 16px"   type="submit" name="solicitar" class=" form-control btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button>
               </div>
          </div>
     </div>
</div>
<div class="card mt-3">
     <div class="card-body">
    <table class="table table-responsive  table-striped" id="tblElecProducts" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 5%;"></th>
                <th style="width: 5%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 25%;">Descripción Completa</th>
                <th style="width: 15%;">U/M</th>
                <th style="width: 15%;">Cantidad</th>
                <th style="width: 15%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
                   

                  </th> 
                   </tr>
</thead>
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
            
        $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        $tabla.='
        <tr id="tr">
        <td style="width:7%;min-width: 100%;"></td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width:20%;min-width: 100%;" id="th" data-label="Descripción">'.$productos['descripcion'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$productos['unidad_medida'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
           '?>
            

                 
           
         </tr>
<?php 
    
    }
    $tabla.='</tbody></table> </div></div> ';
} else
    {
        $tabla="
        <h1 class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda. <a href='' style='font-size: 30px' class='close'>&times;</a></h1> 

        ";
    }


echo $tabla;
?>      
<script>
   var table = $('#tblElecProducts').DataTable( {
    columnDefs: [ {
        orderable: false,
        className: 'select-checkbox',
        targets:   0
    } ],
        select: {
        style:    'multi'
    },
    lengthMenu: [[10, -1], [10,"Todos los registros"]],
    responsive: true,
autoWidth:false,
            deferRender: true,
            scroller: true,
            scrollY: 400,
            scrollCollapse: true,
        rowGroup: {
            dataSrc: 7
        },
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
    $('#submit').on('click', function (event) {

  
  $('#frm-example').find('input[type="hidden"]').remove();
  var seleccionados = table.rows({ selected: true });
  
  if(!seleccionados.data().length){
    alert("No ha seleccionado ningún producto");
      event.preventDefault();
  }
  
  else{
    seleccionados.every(function(key,data){
      console.log(this.data());

      $('<input>', {
          type: 'block',
          value: this.data()[1],
          name: 'id[]'
      }).appendTo('#frm-example');
      
      $("#frm-example").submit(); //submiteas el form
    });
  }
});
</script>
     <script src="../../Plugin/bootstrap/js/validarInput.js"></script>