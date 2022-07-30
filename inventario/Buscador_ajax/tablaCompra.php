         
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
                <th style="width: 10%;">No. Solicitud</th>
                <th style="width: 10%;">Dependencia</th>
                <th style="width: 10%;">Plazo y No. de Entregas</th>
                <th style="width: 10%;">Unidad Técnica</th>
                <th style="width: 10%;">Descripción Solicitud</th>
                <th style="width: 10%;">Encargado</th>
                <th style="width: 10%;">Fecha de Registro</th>
                <th style="width: 10%;">Estado</th>
                <th style="width: 10%;">Detalles</th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_compra  Order by $columna $tipo";
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
          <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="width: 11%;min-width: 100%;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="width: 10%;min-width: 100%;" data-label="Descripción" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>

            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario']; ?></td>
            <td data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            <td data-label="Estado" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Comprado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Compra.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['nSolicitud']; ?>">             
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
                <th style="width: 10%;">No. Solicitud</th>
                <th style="width: 10%;">Dependencia</th>
                <th style="width: 10%;">Plazo y No. de Entregas</th>
                <th style="width: 10%;">Unidad Técnica</th>
                <th style="width: 10%;">Descripción Solicitud</th>
                <th style="width: 10%;">Encargado</th>
                <th style="width: 10%;">Fecha de Registro</th>
                <th style="width: 10%;">Estado</th>
                <th style="width: 10%;">Detalles</th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_compra where idusuario='$idusuario'   Order by $columna $tipo";
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
         
            <td data-label="No. Solicitud" class="delete"><?php  echo $solicitudes['nSolicitud']; ?></td>
            <td style="width: 11%;min-width: 100%;" data-label="Dependencia" class="delete"><?php  echo $solicitudes['dependencia']; ?></td>
            <td data-label="Plazo y No. de Entregas" class="delete"><?php  echo $solicitudes['plazo']; ?></td>
            <td data-label="Unidad Técnica" class="delete"><?php  echo $solicitudes['unidad_tecnica']; ?></td>
            <td style="width: 10%;min-width: 100%;" data-label="Descripción" class="delete"><?php  echo $solicitudes['descripcion_solicitud']; ?></td>

            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario']; ?></td>
            <td data-label="Fecha" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_registro'])) ?></td>
            <td data-label="Estado" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Comprado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Compra.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['nSolicitud']; ?>">             
                <input type="submit" name='detalle' class="btn btn-primary" value="Ver Detalles">           
            </form> 
            </td>
</tr>
   <?php  } ?>
    </tbody>
</table>
</div>
</div>
<?php } ?>