
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" type="text/css" href="../../../styles/estilo_men.css">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
     <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
      <link rel="icon" type="image/png" sizes="32x32"  href="../../../img/log.png"> 
    <title>Productos</title>
</head>
<body>
                <style type="text/css">
        #a:hover{
   text-decoration: none;
   color: lawngreen;
}
 #b:hover{
   text-decoration: none;
   color:whitesmoke;
}
.children{
background:burlywood;
}
#section{
    margin: 2%;
    padding: 1%;
    border-radius: 15px;
    background:whitesmoke ;
}
 </style>

<?php

if(isset($_POST['detalle'])){

    $total = 0;
    $final = 0;
    $total1 = 0;
    $final1 = 0;
    $cod_vale = $_POST['id'];
    
       include '../../Model/conexion.php';include 'menu.php';

        $sql = "SELECT * FROM tb_vale WHERE codVale = $cod_vale";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
    
     echo'   
    <section id="section" style="margin:2%">
    <form method="POST" action="" style="color:black">
             
          
            <div class="row">
          
              <div class="col-6 col-sm-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">N° de Vale:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codVale']. '" name="vale">
              </div>
    
            <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
              </div>
              <div class="col-8 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>';?>
              <input <?php
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $productos1['estado'] ?>"><br>
            
              
          </div>
            </div>
          
            <br>
          </form>
              <form method="POST" action="../../Plugin/pdf_vale.php" target="_blank">

                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro']))?>" name="fech">
              </div>
            <table class="table table-responsive table-striped" id="example" style=" width: 100%">
                
              <thead>
                <tr id="tr">
                  <th style="width: 10%;">Código</th>
                  <th style="width: 40%;">Descripción</th>
                  <th style="width: 10%;">Unidad de Medida</th>
                  <th style="width: 10%;">Cantidad Solicitada</th>
                  <th style="width: 10%;">Cantidad Depachada</th>
                  <th style="width: 10%;">Costo unitario</th>
                  <th >Total</th>
                </tr>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>
         <?php            
    
    $num_vale = $productos1['codVale'];
    }
     $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];


       $precio1=number_format($precio, 2,".",",");
      $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");

      $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 2, ".",",");
        
      ?>
       <style type="text/css"> #td{display: none;} </style> 

       <tr>
        <td  data-label="Código"><input style="width: 100%; background:transparent; border: none; "  name="cod[]" readonly value="<?php echo $codigo ?>"></td>
        <td  data-label="Descripción"><textarea style="width: 100%; background:transparent; border: none; text-align: left; height: 100%;"  name="desc[]" readonly><?php echo $descripcion ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="width: 100%; background:transparent; border: none; " name="um[]" readonly value="<?php echo $um ?>"></td>
        <td  data-label="Cantidad"><input style="width: 100%; background:transparent; border: none; " type="decimal" step="0.01"  name="cant[]" readonly value="<?php echo $stock ?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%; " type="decimal" readonly required  name="cantidad_despachada[]" required value="<?php echo $productos['cantidad_despachada'] ?>"></td>
        <td  data-label="Costo unitario"><input style="width: 100%; background:transparent; border: none; "  name="cost[]" step="0.01"  readonly value="$<?php echo $precio1 ?>"></td>
        <td  data-label="total"><input style="width: 100%; background:transparent; border: none; "  name="tot[]" readonly step="0.01" value="$<?php echo $total1 ?>"></td>
      </tr>

      <?php } ?> 
    <tr>
        <th colspan="5"></th>
     <th >SubTotal</th>
          <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="<?php echo $final1 ?>" ></td>
          
      </tr>

</tbody>
        </table>

    <input id="pdf" type="submit" class="btn btn-lg" value="Exportar a PDF" name="pdf">
        <?php } ?>
      <style>
        #pdf{
        margin-left: 38%; 
        background: rgb(175, 0, 0); 
        color: #fff; margin-bottom: 2%; 
        border: rgb(0, 0, 0);
        }
        #pdf:hover{
        background: rgb(128, 4, 4);
        } 
        #pdf:active{
        transform: translateY(5px);
        } 
      </style>

</form>  
  </body>
  </html