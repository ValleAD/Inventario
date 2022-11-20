

<?php 
if (isset($_POST['categorias'])){$categoria=$_POST['cat'];  ?>  <br> 
<style>.productos{
display: none;</style>
 <div class="card" style="margin-top:-3%">
    <div class="card-body">
        <h4 class="text-center">Exportar Categorias</h4>
<div class="mx-2  r-5" id="hidden" style="background-color: transparent; border-radius: 5px;">
                   
        
         <form method="POST" action="../../Plugin/Imprimir/Categoria/categorias.php" target="_blank">
            <a href="" class="btn btn-success" name="categorias" type="submit">Ver Productos</a>
              <div  style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
             <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button  style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/PDF/Categoria/pdf_categoria.php" target="_blank">
            <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button style="position: initial;"  type="submit" class="btn btn-outline-primary mx-1" name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
             </button>
         </form>
         <form method="POST" action="../../Plugin/Excel/Productos/Categorias.php" target="_blank">
            <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
             <button style="position: initial;"  type="submit" class="btn btn-outline-primary " name="pdf" target="_blank">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
             </button>
         </form>

 </div>

 
    <table class=" table display   table-striped" id="example1" style=" width: 100%;">
    <thead>
         <tr id="tr">
                <th id="th" style="width:9%">Categoría</th>
                <th style="width:7%"  id="th">Código</th>
                <th style="width:7%"  id="th">Cod. Catálogo</th>
                <th style="width: 27%;" id="th"> Descripción Completa</th>
                <th style="width:8%"  id="th">U/M</th>
                <th style="width:8%"  id="th">Cantidad</th>
                <th style="width:10%"  id="th">Costo Unitario</th>
                <th style="width:10%"  id="th">Fecha Registro</th>
                </tr>
    </thead>


            <tbody>
                <?php
                $sql = "SELECT * FROM tb_productos WHERE categoria='$categoria' ";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                             $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");

        $cantidad=$productos['stock'];
        $stock=number_format($cantidad,  2,".",","); ?>
                <tr>
                    <td data-label="Categoría"><?php  echo $categoria ?></td>
            <td data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
           <td  data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
           <td  data-label="Descripción Completa" ><?php  echo $productos['descripcion']; ?></td>
           <td  data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
           <td  data-label="Cantidad" ><?php  echo $stock ?></td>
           <td  data-label="Costo Unitario">$<?php  echo $precio1 ?></td>
           <td  data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
</table>
            </div>

        </div>
  <?php   }?>
