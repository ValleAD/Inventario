 <style type="text/css">.og{display: none;}</style>
  <input type="hidden" name="dia" id="dia">
    <input type="hidden" name="mes" id="mes">
        <input type="hidden" name="año" id="ano">
<table class="table" id="exam" style=" width: 100%">
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
 
    $id= $_POST['id'][$i];
    $codigo= $_POST['cod'][$i];
    
    $sql = "SELECT cod, codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE cod='$id' AND codProductos='$codigo' GROUP BY precio, codProductos";
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
               <td data-label="Codigo"><?php echo $productos['codProductos'] ?></td>
                <input  type="hidden" class="form-control" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>">
                <input  type="hidden" class="form-control" readonly name="cod1[]" value ="<?php  echo $productos['cod']; ?>">
               <input type="hidden" name="desc[]" value="<?php  echo $productos['descripcion']; ?>">
               <input  type="hidden" name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>">
               <input  type="hidden" name="cat[]" value ="<?php  echo $productos['catalogo']; ?>">
               <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                </td>
               <td style="min-width: 100%;" data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
               <td data-label="Unidad De Medida"><?php echo $productos['unidad_medida'] ?>
                <input type="hidden"  name="stock[]"  value ="<?php  echo $stock; ?>">
                <input  type="hidden" name="cu[]" value ="<?php  echo $precio ?>">
               </td>
               <td data-label="Productos Disponibles"><?php  echo $stock; ?></td>
               <td data-label="Cantidad">
                
                <input id="og1" required style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" step="0.01" min="0.00"  type="number" name="cant[]"  class="form-control">

                <input id="og" required style="background:transparent; border: solid 0.1px; width: 100%; color: gray;" disabled placeholder ="No Disponible" type="text" class="form-control">
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
            dom: 'lrti',
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
window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
var limpiar = document.getElementById('dia'); limpiar.value = dia
var limpiar1 = document.getElementById('mes'); limpiar1.value = mes;
var limpiar4 = document.getElementById('ano'); limpiar4.value = ano;


}
</script>