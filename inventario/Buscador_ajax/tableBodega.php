         
 <?php 
         if (isset($_POST['Consultar'])) { 
        $columna=$_POST['columna'];
        $tipo=$_POST['tipo']; ?>
        <style>
            #x{
                display: none;
            }
        </style>    
        <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 10%;"><strong>O. de T. No.</strong></th>
                <th style="width: 10%;"><strong>Departamento Solicitante</strong></th>
                <th style="width: 10%;"><strong>Encargado</strong></th>
                <th style="width: 10%;"><strong>Fecha</strong></th>
                <th style="width: 10%;"><strong>Estado</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
 $sql = "SELECT * FROM tb_bodega Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);

    while ($solicitudes = mysqli_fetch_array($result)){ 
        $idusuario=$solicitudes['idusuario'];
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
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
    #ssas{
        display: block;
    }
   #div{
    display: block;
   }
</style>

        <tr>
            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $des ?></td>
            <td data-label="Encargado" class="delete"><?php  echo $solicitudes['usuario'],"<br> ","(",$u,")"; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo $solicitudes['fecha_registro']; ?></td>
               <td><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $solicitudes['estado'] ?>"></td>
             <td  data-label="Detalles">
                <div style="position: initial;">  
                <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Bodega.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codBodega']; ?>">  
                                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>        
                     <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 

          <?php } if ($solicitudes['estado']=="Rechazado") {?>
                   
           <button disabled id="ver" style="cursor: not-allowed;"  type="submit" name="detalle" >Ver Detalles</button> 
        
           <?php  } ?>  
            </form> 
        </div>
            </td>
        </tr>

    <?php }?>   
           
           </tbody>
        </table>

</div>
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
               <th style="width: 10%;"><strong>O. de T. No.</strong></th>
                <th style="width: 10%;"><strong>Departamento Solicitante</strong></th>
                <th style="width: 10%;"><strong>Encargado</strong></th>
                <th style="width: 10%;"><strong>Fecha</strong></th>
                <th style="width: 10%;"><strong>Estado</strong></th>
                <th style="width: 10%;"><strong>Detalles</strong></th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
   $sql = "SELECT * FROM tb_bodega  where idusuario='$idusuario'   Order by $columna $tipo";
    $result = mysqli_query($conn, $sql);
$n=0;
    while ($solicitudes = mysqli_fetch_array($result)){ 
         $des=$solicitudes['departamento'];
if ($des=="") {
                    $des="Departamentos No disponible";
                }else{

                   $des=$solicitudes['departamento']; 
                }
        ?>
        <style type="text/css">
     #td{
        display: none;
    }
    #ssas{
        display: block;
    }
    
   #div{
    display: block;
   }
</style>

        <tr>

            <td data-label="Código" class="delete"><?php  echo $solicitudes['codBodega']; ?></td>
            <td data-label="Departamento Solicitante" class="delete"><?php  echo $des; ?></td>
            <td data-label="Fecha de solicitud" class="delete"><?php  echo date("d/m/Y",strtotime($solicitudes['fecha_registro'])); ?></td>
               <td><input readonly <?php
                if($solicitudes['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($solicitudes['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $solicitudes['estado'] ?>"></td>
            <td  data-label="Detalles">
            <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="Detalle_Bodega.php">             
                <input type='hidden' name='id' value="<?php  echo $solicitudes['codBodega']; ?>">  
                                <?php  if ($solicitudes['estado']=="Aprobado" || $solicitudes['estado']=="Pendiente") {?>        
                     <button  type="submit" name='detalle' class="btn btn-primary">Ver Detalles</button> 

          <?php } if ($solicitudes['estado']=="Rechazado") {?>
                   
           <button disabled id="ver" style="cursor: not-allowed;"  type="submit" name="detalle" >Ver Detalles</button> 
        
           <?php  } ?>  
            </form> 
            </td>
        </tr>
    <?php } ?>
           </tbody>
        </table>
</div>
</div>
<?php } ?>