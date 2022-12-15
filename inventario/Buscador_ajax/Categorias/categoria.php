<?php

if (isset($_POST['categorias'])){$categoria=$_POST['cat'];  ?> 
<style>.productos{
display: none;
}
.row{margin: 0}</style>

 <div class="card">
    <div class="card-body">
        <h4 class="text-center">Exportar Categorias</h4>

 
    <table class=" table table-responsive" id="example1" style=" width: 100%;">
    <thead>
         <tr id="tr">
                <th style="width:9%">Categoría</th>
                <th >Código</th>
                <th >Cod. Catálogo</th>
                <th style="width: 30%;"> Descripción Completa</th>
                <th >U/M</th>
                <th >Cantidad</th>
                <th >Costo Unitario</th>
                <th >Fecha Registro</th>
                </tr>
    </thead>


            <tbody>
                <?php
         $sql="SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos WHERE categoria='$categoria' GROUP BY codProductos,precio,stock HAVING COUNT(*) ORDER BY fecha_registro DESC";
            $result = mysqli_query($conn, $sql);
    while ($productos = mysqli_fetch_array($result)){
$total = $productos['SUM(stock)'] * $productos['precio'];

       $final += $total;
        $total1= number_format($total, 2, ".",",");
      $finalc1=number_format($final, 2, ".",",");
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['SUM(stock)'];
        $stock=number_format($cant_aprobada, 2,".",",");?>
                <tr>
                    <td data-label="Categoría"><?php  echo $categoria ?></td>
            <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario"><?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
</table>
</div>
</div>




  <?php   }?>
