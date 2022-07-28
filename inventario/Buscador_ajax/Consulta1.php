 <?php 
         if(isset($_POST['consulta'])){?>

        <style>
            #x{
                display: none;
            }
        </style>
      <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 5%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 17%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
                <th style="width: 10%;" align="center"><button id="div" style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class="btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button>
                  </th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody><?php 
         $q=$conn->real_escape_string($_POST['q']);
    $query="SELECT * FROM tb_productos WHERE 
        codProductos LIKE '%".$q."%'";
        $result = mysqli_query($conn, $query);
            while ($productos = mysqli_fetch_array($result)){
                $categoria=$productos['categoria'];
                $des=$productos['descripcion'];
                if ($productos['unidad_medida']=="") {
                    $unidad=" Sin Unidad";
                }else{
                   $unidad=$productos['descripcion']; 
                }

                if ($des=="") {
                    $des="DESCRIPTION NO DISPONIBLE";
                }else{
                   $des=$productos['descripcion']; 
                }
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
            
         
         $precio=$productos['precio'];
        $precio1=number_format($precio, 2,".",",");
        $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2,".",",");
        echo'
        <tr>
              
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width:20%;min-width: 100%;" id="th" data-label="Descripción">'.$productos['descripcion'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$unidad.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width:11%;min-width: 100%;" id="th" data-label="solicitar">
            ';?>
            <?php 
            if($productos['codProductos']==1) {
                   echo 'Sin Productos';
                }if ($stock!= 0.00) {
                echo'
                 <input   id="'.$productos["cod"] .'" type="checkbox" name="id[]" value="'.$productos["cod"] .'"> <label  id="l" for="'.$productos["cod"] .'" > </label>  
           
         </tr>
        ';
    }
    }

    echo'</tbody></table></div>';
            }
        ?>     
<?php 
         if (isset($_POST['Consultar'])) { 
        $columna=$_POST['columna'];
        $tipo=$_POST['tipo'];
        
        echo '
        <style>
            #x{
                display: none;
            }
        </style>
               
        <table class="table  table-responsive  table-striped" id="div" style=" width: 100%;">
     
                <thead>
                     <tr id="tr">
                <th style="width: 5%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 17%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
                <th style="width: 10%;" align="center"><button id="div" style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class="btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button>
                  </th> 
                   </tr>
</thead>
</table>
<div id="div" style = " max-height: 442px;  overflow-y:scroll;overflow-x:none;">
    <table class="table">
    <tbody>';
        $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY precio, codProductos Order by $columna $tipo";
        $result = mysqli_query($conn, $sql);
            while ($productos = mysqli_fetch_array($result)){
                $categoria=$productos['categoria'];
                $des=$productos['descripcion'];
                if ($productos['unidad_medida']=="") {
                    $unidad=" Sin Unidad";
                }else{
                   $unidad=$productos['descripcion']; 
                }

                if ($des=="") {
                    $des="DESCRIPTION NO DISPONIBLE";
                }else{
                   $des=$productos['descripcion']; 
                }
                if ($categoria=="") {
                    $categoria="Sin categorias";
                
                }else{
                $categoria=$productos['categoria'];
                }
            
         


        $precio=$productos['precio'];
       $precio1=number_format($precio, 2,".",",");
       $cantidad=$productos['SUM(stock)'];
        $stock=number_format($cantidad, 2,".",",");
        echo'
        <tr>
              
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código">'.$productos['codProductos'].'</td>
            <td style="width:7%;min-width: 100%;" id="th" data-label="Código del Catálogo">'.$productos['catalogo'].'</td>
            <td style="width:20%;min-width: 100%;" id="th" data-label="Descripción">'.$productos['descripcion'].'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Unidad de Medida">'.$unidad.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Cantidad">'.$stock.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Precio">'.$precio1.'</td>
            <td style="width:10%;min-width: 100%;" id="th" data-label="Fecha">'.$productos['fecha_registro'].'</td>
            <td style="width:11%;min-width: 100%;" id="th" data-label="solicitar">
            ';?>
            <?php 
            if($productos['codProductos']==1) {
                   echo 'Sin Productos';
                }if ($stock!= 0.00) {
                echo'
                 <input   id="'.$productos["cod"] .'" type="checkbox" name="id[]" value="'.$productos["cod"] .'"> <label  id="l" for="'.$productos["cod"] .'" > </label>  
           
         </tr>
        ';
    }
    }

    echo'</tbody></table></div>';
            }
        ?>
<div id="x">
       <table class="table  table-striped" id="div" style=" width: 100%">
            <thead>
              <tr id="tr">
               
                
                <th style="width: 5%;">Código</th>
                <th style="width: 10%;">Catálogo</th>
                <th style="width: 17%;">Descripción Completa</th>
                <th style="width: 10%;">U/M</th>
                <th style="width: 10%;">Cantidad</th>
                <th style="width: 10%;">Costo Unitario</th>
                <th style="width: 10%;">Fecha Registro</th>
                <th style="width: 10%;" align="center"><button id="div" style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class='btn btn-success btn-sm text-center'  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button>
                </th>
               
              </tr>

            </thead>
</table>
  <div id="div" style = "max-height: 442px; overflow-y:scroll;">
<table class="table">
            <tbody>

 <?php
    include 'Model/conexion.php';


    //    $sql = "SELECT * FROM tb_productos";
    $sql = "SELECT cod,codProductos, categoria, catalogo, descripcion, unidad_medida, SUM(stock), precio, fecha_registro FROM tb_productos GROUP BY precio, codProductos";
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
   #div{
    display: block;
   }
</style>
    <tr id="tr">

      <td style="width: 5%;min-width: 100%" data-label="Codigo"><?php  echo $productos['codProductos']; ?></td>
      <td style="width: 10%;min-width: 100%" data-label="Codificación de catálogo"><?php  echo $productos['catalogo']; ?></td>
      <td style="width: 25%;min-width: 100%" data-label="Descripción Completa"><?php  echo $productos['descripcion']; ?></td>
      <td data-label="Unidad De Medida"><?php  echo $productos['unidad_medida']; ?></td>
      <td data-label="Cantidad"><?php  echo $stock; ?></td>
      <td data-label="Costo Unitario">$<?php  echo $precio1?></td>
      <td data-label="Fecha Registro"><?php  echo $productos['fecha_registro']; ?></td>

      <td data-label="solicitar">
           <?php if ($stock==0.00) {?>
                  Sin Productos
              <?php  } if ($stock!= 0.00) {?>
                 <input   id="<?php echo $productos['cod'] ?>" type="checkbox" name="id[]" value="<?php echo $productos['cod'] ?>"> <label  id="l" for="<?php echo $productos['cod'] ?>" > </label>  
         
             <?php  }?>
      </td>
     
<?php } ?> 
</tr>
            </tbody>
        </table>
    </div>
    </div>