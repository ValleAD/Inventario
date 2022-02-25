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

    <section style="margin:1%;padding: 1%; border-radius: 5px; background: white; ">
<form id="form" method="POST" action="Controller/añadir_almacen_copy.php" target="_blank">
         
      
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
          
        <table class="table" style="margin-bottom:3%;margin-top: 1%;">
            
        <thead>
              <tr id="tr">
                <th style="width: 25%;">Código</th>
                <th style="width: 95%;">Nombre del Artículo</th>
                <th style="width: 35%;">Unidad de Medida</th>
                <th style="width: 35%;">Cantidad Solicitada</th>
                <th style="width: 35%;">Cantidad depachada</th>
                <th style="width: 35%;">Costo unitario</th>
                <th style="width: 35%;">Total</th>
              </tr>
                <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>
<?php 
$num_almacen = $datos_sol['codAlmacen'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");

  echo' 
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="' .$productos['codigo']. '">
        <input type="hidden" style="background:transparent; border: none; width: 100%; text-align: center"  name="cod1[]" readonly value="' .$productos['codigoalmacen']. '"></td></td>
        <td  data-label="Nombre del Artículo"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none">'.$productos['nombre']. '</textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
        <td  data-label="Cantidad Solicitada"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="'.$productos['cantidad_solicitada']. '"></td>

        <td  data-label="Cantidad Solicitada"><input class="form-control" style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" name="cantidad_despachada[]" required ></td>

        <td  data-label="Costo Unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" step="0.01"  readonly value="$'.$precio2. '"></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly step="0.01"  value="$'.$total2. '"></td>
      </tr>';

}

      echo'
      <th colspan="6">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;" step="0.01"  name="tot_f" readonly value="$'.$final2.'" ></td></tr>
  
         </tbody>
        </table>

    
  
    <input id="pdf" type="submit" class="btn btn-lg" value="Guardar Estado" name="detalle_almacen">
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
</section>';
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
<form id="form" method="POST" action="" target="_blank">
         
      
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
            <input readonly class="form-control"  type="text" value="' .$datos_sol['encargado']. '" name="encargado">
        </div>

          
          <div class="col-6 col-sm-3" style="position: initial">
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
               <button type="submit" name="submit" <?php
                if($datos_sol['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger" name="estado" href="dt_compra_copy.php"> Cambiar estado</button>
          </div>
         
        </div></div>
      </form>
        <form  method="POST" action="Plugin/pdf_almacen.php" target="_blank">
             <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['codAlmacen']?>" name="num_sol">
              <input readonly class="form-control"  type="hidden" value="<?php echo $datos_sol['departamento']?>" name="depto">
              <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])) ?>" name="fech">

        <table class="table" style="margin-bottom:3%">
            
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th style="width: 35%;">Nombre del Artículo</th>
                <th>Unidad de Medida</th>
                <th>Cantidad Solicitada</th>
                <th>Cantidad Despachada</th>
                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>
<?php 
$num_almacen = $datos_sol['codAlmacen'];
}
 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['cantidad_solicitada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio1  =    number_format($precio, 2,".",",");
        $total1   =    number_format($total, 2, ".",",");
        $final1   =    number_format($final, 2, ".",",");?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="cod[]" readonly value="<?php echo $productos['codigo'] ?>"></td>
        <td  data-label="Nombre del Artículo"><textarea style="background:transparent; border: none; width: 100%;"  name="nombre[]" readonly style="border: none"><?php echo $productos['nombre'] ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%; text-align: center" name="um[]" readonly value="<?php echo $productos['unidad_medida'] ?>"></td>
        <td  data-label="Cantidad Solicitada"><input required style="background:transparent; border: none; width: 100%; text-align: center"  name="cant[]" readonly value="<?php echo $productos['cantidad_solicitada'] ?>"></td>
        <td  data-label="Cantidad Solicitada"><input required style="background:transparent; border: none; width: 100%; text-align: center"  name="cantidad_despachada[]" readonly value="<?php echo $productos['cantidad_despachada'] ?>"></td>
        <td  data-label="Costo Unitario"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="cost[]" readonly value="$<?php echo $precio1 ?>"></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="tot[]" readonly value="$<?php echo $total1 ?>"></td>
      </tr>

      <?php }?>
      <th colspan="6">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold; text-align: center"  name="tot_f" readonly value="$<?php echo $final1 ?>" ></td></tr>

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
        } form{
            border-radius: 0px;
            margin:0% 2%;
            border-radius:0px 0px 10px 10px
        }  #form{
            border-radius: 0px;
            margin:0% 2%;
            border-radius:10px 10px 0px 0px
        }
      </style>
</form>          
  </body>
  </html>