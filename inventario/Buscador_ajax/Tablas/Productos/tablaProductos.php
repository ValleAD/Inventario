<table class="table  table-striped" id="exam" style=" width: 100%">
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th >Descripción</th>
                <th>U/M</th>
                <th >Productos Disponibles</th>
                <th>Cantidad</th>
                <th>Costo unitario</th>
               
              </tr>
              
            </thead>

            <tbody>

    <?php 
         for($i = 0; $i < count($_POST['id']); $i++){
 
    $codigo= $_POST['id'][$i];
    
    
    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE codProductos='$codigo' GROUP BY precio, codProductos";
    $result = mysqli_query($conn, $sql);

    while ($productos = mysqli_fetch_array($result)){

      $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];

        $stock=number_format($cantidad, 2,".",",");
      ?>

       
               


<style type="text/css">

    #td{
        display: none;
    }
   th{
       width: 100%;
   }
</style>
    <tr>
               <td data-label="Codigo"><?php echo $productos['codProductos'] ?>
                <input  type="hidden" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <input type="hidden" name="desc[]" value="<?php  echo $productos['descripcion']; ?>">
               <input  type="hidden" name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>">
               <input  type="hidden" name="cat[]" value ="<?php  echo $productos['catalogo']; ?>">
                </td>
               <td style="min-width: 100%;" data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
               <td data-label="Unidad De Medida"><?php echo $productos['unidad_medida'] ?>
                <input type="hidden"  name="stock[]"  value ="<?php  echo $stock; ?>">
                <input  type="hidden" name="cu[]" value ="<?php  echo $precio ?>">
               </td>
               <td data-label="Productos Disponibles"><?php  echo $stock; ?></td>
               <td data-label="Cantidad">
                <input  style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" type="number" step="0.01" min="0.00" max="<?php echo $stock ?>"  class="form-control"  name="cant[]" required>
            </td>
               <td data-label="Precio"><?php  echo $precio1 ?></td> 
              
            </tr>
<?php }} ?> 

            </tbody>
        </table>
<script>
$(document).ready(function () {
    var table = $('#exam').DataTable({
    lengthMenu: [[ -1], ["Todos los registros"]],
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
 
    $('#buscar1').click(function () {
        var data = table.$('input').serialize();
        
    });
});
</script>