         
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
                <th style="width: 10%;"><strong>Código de Vale</strong></th>
                <th style="width: 20%"><strong>Departamento Solicitante</strong></th>
                <th style="width: 20%;"><strong>Encargado</strong></th>
                <th style="width: 15%"><strong>Fecha</strong></th>
                <th style="width: 14%;"><strong>Estado</strong></th>
                <th style="width: 20%;"><strong>Detalles</strong></th>  
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_vale  Order by $columna $tipo";
        $result = mysqli_query($conn, $sql);
       
 while ($solicitudes = mysqli_fetch_array($result)){
        
        $idusuario = $solicitudes['idusuario'];
         $des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
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
         <td style="width: 10%;min-width: 100%;" data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?>
                  
            </td>
            <td style="width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>

             <td style="width: 30%;min-width: 100%;" data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
           <td style="width: 20%;min-width: 100%;" data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td style="width: 20%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td style="width: 20%;min-width: 100%;"  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">  
                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente" || $solicitudes['estado']=="Rechazado") {?>
                
                <form method="POST" action="Controller/Delete_producto.php">
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>
            </form>
        </div>
    </td>
</tr>
   <?php  } } ?>
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
                <th style="width: 10%;"><strong>Código de Vale</strong></th>
                <th style="width: 20%"><strong>Departamento Solicitante</strong></th>
                <th style="width: 20%;"><strong>Encargado</strong></th>
                <th style="width: 15%"><strong>Fecha</strong></th>
                <th style="width: 14%;"><strong>Estado</strong></th>
                <th style="width: 20%;"><strong>Detalles</strong></th>  
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_vale where idusuario='$idusuario'   Order by $columna $tipo";
        $result = mysqli_query($conn, $sql);
       
 while ($solicitudes = mysqli_fetch_array($result)){
        
        $idusuario = $solicitudes['idusuario'];
         $des=$solicitudes['departamento'];
                if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
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
         
            <td style="width: 10%;min-width: 100%;" data-label="Código" class="delete"><?php  echo $solicitudes['codVale']; ?>
                  
            </td>
            <td style="width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>

             <td style="width: 30%;min-width: 100%;" data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
           <td style="width: 20%;min-width: 100%;" data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
            <td style="width: 20%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" value="<?php echo $solicitudes['estado'] ?>"></td></td>
            <td style="width: 20%;min-width: 100%;"  data-label="Detalles">
                <div style="position: initial;">  
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_vale.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codVale']; ?>">  
                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente" || $solicitudes['estado']=="Rechazado") {?>
                
                <form method="POST" action="Controller/Delete_producto.php">
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
                </form>
            </form>
        </div>
    </td>
</tr>
   <?php  }} ?>
    </tbody>
</table>
</div>
</div>
<?php } ?>