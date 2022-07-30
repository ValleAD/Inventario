         
 <?php 
         if (isset($_POST['Consultar'])) { 
        $columna=$_POST['columna'];
        $tipo=$_POST['tipo'];?>
        <style>
            #x{
                display: none;
            }
        </style>    
        <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 10%;"><strong>No. de Solicitud</strong></th>
                <th  style="width: 10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_circulante  Order by $columna $tipo";
        $result = mysqli_query($conn, $sql);
       
 while ($solicitudes = mysqli_fetch_array($result)){
        
        $idusuario = $solicitudes['idusuario'];
        if ($idusuario==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($idusuario==0) {
            $u='Invitado';
        }
        ?>
        <style type="text/css">
            #sass{
                display: block;
            }

            #td{
                display: none;
            }
            #div{
                display: block;
            }
        </style>
         <tr>
            <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_circulante.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codCirculante']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">               
            </form> 
            </td>
</tr>
   <?php  }  ?>
    </tbody>
</table>
</div>
<?php } ?>

<?php 
         if (isset($_POST['Consultar1'])) { 
        $columna=$_POST['columna'];
        $tipo=$_POST['tipo'];?>
        <style>
            #x{
                display: none;
            }
        </style>

           <div id="y">    
        <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 10%;"><strong>No. de Solicitud</strong></th>
                <th  style="width: 10%;"><strong>Fecha de solicitud</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_circulante where idusuario='$idusuario'   Order by $columna $tipo";
        $result = mysqli_query($conn, $sql);
       
 while ($solicitudes = mysqli_fetch_array($result)){
        
        $idusuario = $solicitudes['idusuario'];
        if ($idusuario==1) {
        $u='Administrador';
        }
        else {
            $u='Cliente';
        }
        if ($idusuario==0) {
            $u='Invitado';
        }
        ?>
        <style type="text/css">
            #sass{
                display: block;
            }

            #td{
                display: none;
            }
            #div{
                display: block;
            }
        </style>
         
            <tr>
            <td data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codCirculante']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_circulante.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codCirculante']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">               
            </form> 
            </td>
            </tr>
</tr>
   <?php  } ?>
    </tbody>
</table>
</div>
</div>
<?php } ?>