         
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
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 20%" >Departamento Solicitante</th>
                <th style=" width: 15%">Encargado</th>
                <th style="width: 15%">Fecha de solicitud</th>
                <th style="width: 2%">Estado</th>
                <th style="width: 15%" >Detalles</th>
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_almacen  Order by $columna $tipo";
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
          <td style=" width: 7%;min-width: 100%;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style=" width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style=" width: 20%;min-width: 100%;" data-label="Usuario" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            <td data-label="Estado" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" readonly type="text" name="" value="<?php echo $solicitudes['estado'] ?>"><br>
              </td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Almacen.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codAlmacen']; ?>">             
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 
         
         <?php } ?></tr>
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
                <th style=" width: 10%">No. de Solicitud</th>
                <th style=" width: 20%" >Departamento Solicitante</th>
                <th style=" width: 15%">Encargado</th>
                <th style="width: 15%">Fecha de solicitud</th>
                <th style="width: 2%">Estado</th>
                <th style="width: 15%" >Detalles</th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
        $sql = "SELECT * FROM tb_almacen where idusuario='$idusuario'   Order by $columna $tipo";
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
         
             <td style=" width: 7%;min-width: 100%;" data-label="No. solicitud" class="delete"><?php  echo $solicitudes['codAlmacen']; ?></td>
            <td style=" width: 30%;min-width: 100%;" data-label="Departamento Solicitante" class="delete"><?php  echo $solicitudes['departamento']; ?></td>
            <td style=" width: 20%;min-width: 100%;" data-label="Encargado" class="delete"><?php  echo $solicitudes['encargado']; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d-m-Y",strtotime($solicitudes['fecha_solicitud'])) ?></td>
            <td data-label="Estado" class="delete"><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" readonly type="text" name="" value="<?php echo $solicitudes['estado'] ?>"><br>
              </td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Almacen.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codAlmacen']; ?>">             
             
                   <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button>          
</tr>
<?php } ?>
    </tbody>
</table>
</div>
</div>
<?php } ?>