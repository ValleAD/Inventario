<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
         window.location ="log/signin.php";
        session_destroy();  
                </script>
die();

    ';
    
}
    
?>
<?php include ('templates/menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap-theme.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitudes Bodega</title>
</head>
<body>
    <style type="text/css">
      #section{
        margin: 2%;
      }
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
    }
    th{
        width: 25%;
    }
  }
    </style>

<?php
if(isset($_POST['submit'])){
$total = 0;
$final = 0;
$total2 = 0;
$final2 = 0;
$a=$_POST['odt'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_bodega WHERE  codBodega='$a' ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

  echo'   
  <section id="section">
  <form method="POST"  action="Controller/añadir_bodega_copy.php"  style="background-color:white;padding:1%">
           
        
          <div class="row">
          <div class="col-6 col-sm-2" style="position: initial;width:100%">
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
          </div>
    
          <div class="col-6 col-sm-2" style="position: initial;width:100%">
                <label style="font-weight: bold;">O. de T. No.</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codBodega']. '" name="odt">
          </div>
    
          <div class="col-6 col-sm-3" style="position: initial;width:100%">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
          </div>
    
              
            <div class="col-6 col-sm-2" style="position: initial;width:100%">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
            </div>
              <div class="col-8 col-sm-3" style="position: initial;width:100%">
            <label style="font-weight: bold;">Estado:</label>';?>
              <input readonly class="form-control"  type="hidden" value="' .$datos['nSolicitud']. '" name="id"> 
                <select  class="form-control"  type="text"  name="estado" required>
                <option disabled selected value="">Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select>
          </div>
            </div>
        
          <br>
            
<table class="table table-responsive  table-striped" id="example" style=" width: 100% ">
              
              <thead>
                <tr id="tr">
                  <th style="width: 20%;">Código</th>
                  <th style="width:50%;">Descripción Completa</th>
                  <th style="width:5%;">U/M</th>
                  <th style="width: 15%;">Cantidad Solicitada</th>
                  <th style="width: 15%;">Cantidad Despachada</th>
                  <th style="width: 15%;">Costo Unitario (estimado)Actual</th>
                 <!-- <th style="width: 15%;">Nuevo Costo Unitario (estimado)</th>-->
                  <th style="width: 15%;">Monto Total (estimado)
                  
                
             </thead>
              <tbody><?php 
  $odt = $productos1['codBodega'];
  }
   $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
      $result = mysqli_query($conn, $sql);
  while ($productos = mysqli_fetch_array($result)){
        
         $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $codigo1=$productos['codigodetallebodega'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];
      $precio2=number_format($precio, 2,".",",");
      $total2= number_format($total, 2, ".",",");
      $final2=number_format($final, 2, ".",",");
      $stock=number_format($cantidad, 1,".");
      ?>
  
      <style type="text/css">
       #td{
          display: none;
      }
      
     
  </style> 
        <tr>
       <td  data-label="Código"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="cod[]" readonly value="<?php echo $codigo ?>">
        <input type="hidden" style="background:transparent; border: none; width: 100%; text-align: center"  name="cod1[]" readonly value="<?php echo $codigo1 ?>"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;  height: 75px; text-align: left"  name="desc[]" readonly style="border: none"><?php echo $descripcion ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="<?php echo $um ?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="<?php echo $stock ?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" class="form-control" type="number" required  name="cantidad_despachada[]" required value=""></td>
        <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;" step="0.01"  readonly value="$<?php echo $precio2 ?>"></td>

   <!--<td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%;" class="form-control" type="number" required step="0.01"  name="cost[]" required value=""></td>-->

 
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;" step="0.01"   name="tot[]" readonly value="$<?php echo $total2 ?>"></td>
      </tr>



  <?php } ?>
      <th colspan="7">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" step="0.01"  readonly value="$<?php echo $final2 ?>" ></td></tr> 

         </tbody>
        </table>
    
      <input id="ver" type="submit" class="btn btn-success btn-lg" value="Guardar Estado" name="detalle_bodega">
       
  </form>
  </section>



<br>
    <style>
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            text-align: center;
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } input{
          text-align: center;
        }
    </style>
</table>
</div>
 <?php 
}
if(isset($_POST['detalle'])){

    $total = 0;
    $final = 0;
    $total1 = 0;
    $final1 = 0;

    $odt = $_POST['id'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_bodega WHERE codBodega = $odt";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
    
     echo'   
    <section id="section">
    <form method="POST" action="Detalle_Bodega.php" >
             
          
            <div class="row">
          
              <div class="col-6 col-sm-2" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">O. de T. No.</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codBodega']. '" name="odt">
              </div>
    
            <div class="col-6 col-sm-2" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-3" style="position: initial">
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
            <?php if($tipo_usuario==1){ ?>
               <button type="submit" name="submit" <?php
                if($productos1['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger" name="estado" href="dt_compra_copy.php"> Cambiar estado</button><?php } ?>
          </div>
            </div>
            <br></form><?php echo '
              <form action="Plugin/pdf_bodega.php" method="POST" target="_blank">
              <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="depto">
                <input readonly class="form-control"  type="hidden" value="' .$productos1['codBodega']. '" name="odt">
                <input readonly class="form-control"  type="hidden" value="' .$productos1['usuario']. '" name="usuario">
                  <input readonly class="form-control"  type="hidden" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">'?>
             
            <table class="table" style="margin-bottom:3%;text-align: center;">
                
            <thead>
                <tr id="tr">
                  <th style="width: 45%;">Código</th>
                  <th style="width: 175%;">Descripción</th>
                  <th style="width: 45%;">Unidad de Medida</th>
                  <th style="width: 25%;">Cantidad</th>
                  <th style="width: 25%;">Cantidad Despachada</th>
                  <th style="width: 30%;">Costo unitario</th>
                  <th style="width: 30%;">Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>
                <?php    
    
    $odt = $productos1['codBodega'];
    }
     $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $cantidad_despachada=$productos['cantidad_despachada'];
      $precio=$productos['precio'];
      $fecha=$productos['fecha_registro'];
        $precio2=number_format($precio, 2,".",",");
        $total2= number_format($total, 2, ".",",");
        $final2=number_format($final, 2, ".",",");$cantidad=$productos['stock'];
        $stock=number_format($cantidad, 1,",");
      ?>
       <style type="text/css"> #td{display: none;} </style> 

      <tr>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="<?php echo $codigo ?>"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;  height: 75px; text-align: left"  name="desc[]" readonly style="border: none"><?php echo $descripcion ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="<?php echo $um ?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="<?php echo $stock ?>"></td><td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cantidad_despachada[]" readonly value="<?php echo $cantidad_despachada ?>"></td>
        
        <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" readonly step="0.01" value="$<?php echo $precio2 ?>"></td>
   

 
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$<?php echo $total2 ?>"></td>
      </tr>



  <?php } ?> 

      <th colspan="6">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$<?php echo $final2 ?>" ></td></tr> 

         </tbody>
        </table>

    
  
    <input id="pdf" type="submit" class="btn btn-lg" value="Exportar a PDF" name="pdf">
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
        } input{
          text-align: center;
        }
      </style>
</form>
</section>
      <?php }?>
      
  </body>
  </html>