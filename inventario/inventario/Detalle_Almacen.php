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
<?php include ('templates/menu.php');
      include ('Model/conexion.php') ?>
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
    <title>Solicitudes Almacén</title>
</head>
<body>
<body>
    <style type="text/css">
   textarea{
            width: 100%; background:transparent; border: none;text-align: left;
        }
        input {
            width: 100%; background:transparent; border: none;
        }
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
        #section{
            margin: 2%;
            padding:0%;
            border-radius: 15px;
            background: white;
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
    $a=$_POST['num_sol'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$a' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   

    <section id="section" >
<form id="form" method="POST" action="Controller/añadir_almacen_copy.php" >
         
      
        <div class="row">  

          <div class="col-6 col-sm-2" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codAlmacen']. '" name="num_sol">
          </div>

          <div class="col-6 col-sm-2" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$datos_sol['departamento']. '" name="depto">
          </div>

        
        <div class="col-6 col-sm-2" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control" required  type="text" value="' .$datos_sol['encargado']. '" name="encargado">
        </div>

          
          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">';?>
          </div>
          <div class="col-8 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['codAlmacen']?>" name="id"> 
                <select  class="form-control"  type="text"  name="estado" required>
                <option disabled selected value="">Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select><br>
              
          </div>
        <br><br>
          
       <table class="table table-responsive " id="example1" style=" width: 100%;margin: 2%;">
            
        <thead>
              <tr id="tr">
                <th style="width: 10%;">#</th>
                <th style="width: 10%;">Código</th>
                <th style="width: 50%;text-align: left;">Descripción</th>
                <th style="width: 10%;">Unidad de Medida</th>
                <th style="width: 10%;">Cantidad Solicitada</th>
                <th style="width: 10%;">Cantidad Despachada</th>
                <th style="width: 10%;">Costo Unitario (estimado)Actual</th>
                <th style="width: 10%;">Nuevo Costo Unitario (estimado)</th>
                <th style="width: 10%;">Total</th>
              </tr>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>
<?php 
$num_almacen = $datos_sol['codAlmacen'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,",");
        

 ?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td data-label="#"><?php  echo $r ?></td>
        <td  data-label="Código">
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="cod1[]" value="<?php echo $productos['codigoalmacen']?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" ></td>

        <td  data-label="Nombre del Artículo"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>

        <td  data-label="Cantidad Despachada"><input type="number" step="0.01" class="form-control" style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" name="cantidad_despachada[]" required ></td>

        <td  data-label="Costo Unitario">$<?php echo $precio2 ?></td>
        <td  data-label="Costo Unitario"><input type="number" step="0.01" class="form-control" style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" name="cantidad_despachada[]" required ></td>

        <td  data-label="total">$<?php echo $total2 ?></td>
      </tr>
        
  <?php }?>
      <tfoot>
        <th colspan="6"></th>
            <th >SubTotal</th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final2?></td>
        </tfoot>
        </tbody>
    </table>

    
  <button id="pdf" name="detalle_almacen" type="submit" class="btn btn-lg my-3">Guardar Estado</button>
</form>
</section><?php
    }
if(isset($_POST['detalle'])){
$total = 0;
$final = 0;
$total1 = 0;
$final1 = 0;

$num_sol = $_POST['id'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$num_sol' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
 <section id="section">
<form id="form" method="POST" action="" >
         
      
        <div class="row">  

          <div class="col-6 col-sm-2" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codAlmacen']. '" name="num_sol">
          </div>

          <div class="col-6 col-sm-3" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$datos_sol['departamento']. '" name="depto">
          </div>

        
        <div class="col-6 col-sm-2" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['encargado']. '" name="encargado">
        </div>

          
          <div class="col-6 col-sm-2" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
          </div>
          <div class="col-8 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>';?>
              <input <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $datos_sol['estado'] ?>"><br>
            <?php if($tipo_usuario==1){ ?>
               <button type="submit" name="submit" <?php
                if($datos_sol['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger" name="estado" href="dt_compra_copy.php"> Cambiar estado</button><?php } ?>
          </div>
         
        </div></div>
      </form>
        <form  method="POST" action="Plugin/pdf_almacen.php" target="_blank">
             <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
              <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['departamento']?>" name="depto">
              <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?>" name="fech">

        <table class="table table-responsive m-1" style="margin-bottom:3%;width: 100%;">
                        <div class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_compra.php">
                <button type="submit" class="btn btn-outline-primary" name="Fecha"><i class="bi bi-file-pdf-fill"></i></button>
            </form>
            <form method="POST" action="Plugin/almacen.php">
             <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
              <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['departamento']?>" name="depto">
              <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?>" name="fech">
<?php
$num_almacen = $datos_sol['codAlmacen'];
                 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");
        $total1   =    number_format($total, 2, ".",",");
        $final1   =    number_format($final, 2, ".",",");
        
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".");
        $cantidad_desp=number_format($cantidad_despachada, 2,".");
       
        ?>
        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="nombre[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" ></td>
        <?php } ?>
                <button type="submit" class="btn btn-outline-primary" name="pdf"><i class="bi bi-printer"></i></button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th style="width: 10%;">#</th>
                <th style="width: 10%;">Código</th>
                <th style="width: 50%;text-align: left;">Descripción</th>
                <th style="width: 10%;">Unidad de Medida</th>
                <th style="width: 10%;">Cantidad Solicitada</th>
                <th style="width: 10%;">Cantidad Despachada</th>
                <th style="width: 10%;">Costo unitario</th>
                <th style="width: 20;">Total</th>
              </tr>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>
<?php 
$num_almacen = $datos_sol['codAlmacen'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");
        $total1   =    number_format($total, 2, ".",",");
        $final1   =    number_format($final, 2, ".",",");
        
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".");
        $cantidad_desp=number_format($cantidad_despachada, 2,".");
       
        ?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td data-label="#"><?php  echo $r ?></td>
        <td  data-label="Código"><?php echo $productos['codigo'] ?>
        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="nombre[]" value="<?php echo $productos['nombre'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" ></td>

        <td  data-label="Nombre del Artículo"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo Unitario">$<?php echo $precio1 ?></td>
        <td  data-label="total">$<?php echo $total1 ?></td>
      </tr>

      <?php }?>
      <tfoot>
        <th colspan="6"></th>
            <th >SubTotal</th>
            <td style=" color: red; font-weight: bold;" data-label="Subtotal"><?php echo $final1?></td>
        </tfoot>
        </tbody>
    </table>
<?php } ?>


</form>  
</section>        
  </body>
  </html>