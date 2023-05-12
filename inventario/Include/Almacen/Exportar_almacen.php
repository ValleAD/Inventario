    <div id="x" class="btn-group mb-3 my-1 mx-2" role="group" aria-label="Basic outlined example" style="position: initial;">
       <form  method="POST" class="mx-1 c" action="../../Plugin/Imprimir/Almacen/soli_almacen.php" target="_blank">
        <?php if ($tipo_usuario==2) {?>
            <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
            <button  data-toggle="tooltip" data-placement="top" title="Imprimir" style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1">    
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
            </button>
        <?php }if ($tipo_usuario==1) {?>
           <button  data-toggle="tooltip" data-placement="top" title="Imprimir" style="position: initial;" type="submit" class="btn btn-outline-primary" name="id">    
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
            </svg>
        </button>
    <?php } ?>
</form>

<form  method="POST" action="../../Plugin/PDF/Almacen/pdf_soli_almacen.php" target="_blank" class="mx-0 c">
    <?php if ($tipo_usuario==2) {?>
        <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
        <button  data-toggle="tooltip" data-placement="top" title="Exportar en PDF" style="position: initial;" type="submit" class="btn btn-outline-primary" name="id1" target="_blank">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
            </svg>
        </button>
    <?php }if ($tipo_usuario==1) {?>

       <button  data-toggle="tooltip" data-placement="top" title="Exportar en PDF" style="position: initial;" type="submit" class="btn btn-outline-primary" name="id" target="_blank">
        <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
        </svg>
    </button>
<?php } ?>
</form>
<form  style="margin-left: 2.6%;" method="POST" action="../../Plugin/Excel/Almacen/Excel.php" class="mr-1 c">
    <?php if ($tipo_usuario==2) {?>
        <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
        <button  data-toggle="tooltip" data-placement="top" title="Exportar en Excel" type="submit" class="btn btn-outline-primary" name="almacen1" target="_blank">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
            </svg>
        </button>
    <?php }if ($tipo_usuario==1) {?>
        <button  data-toggle="tooltip" data-placement="top" title="Exportar en Excel" type="submit" class="btn btn-outline-primary" name="almacen" target="_blank">
            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
            </svg>
        </button>
    <?php } ?>
</form>
<form method="POST" action="form_vale1.php" >
   <button  data-toggle="tooltip" data-placement="top" title="Nueva solicitud" style="position: initial;" type="submit" class="btn btn-outline-primary" name="vale1" target="_blank">➕</button>
</form>
</div>    