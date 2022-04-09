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
    <title>Fondo Circulante</title>
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
$a=$_POST['num_sol'];
   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_circulante WHERE codCirculante='$a' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
<section id="section">
<form method="POST" action="Controller/añadir_circulante_copy.php" >
         
      
        <div class="row">  

          <div class="col-6 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codCirculante']. '" name="num_sol">
          </div>

          <div class="col-6 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
          </div>
           <div class="col-8 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>';?>
             <select  class="form-control"  type="text"  name="estado" required>
                <option disabled selected value="">Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select><br>
               
          </div>
        </div>
      
        <br>
         
         <table class="table table-responsive table-striped" id="example1" style=" width: 100%;margin-bottom:2%">

            
            <thead>
              <tr id="tr">
                <th>Codigo</th>
                <th style="width: 10%;">Nuevo Codigo</th>
                <th style="width: 35%;">Descripción del Artículo</th>
                <th style="width: 10%;">Unidad de Medida</th>
                <th style="width: 10%;">Cantidad Solicitada</th>
                <th style="width: 10%;">Cantidad Despachada</th>
                <th style="width: 10%;">Costo Unitario (estimado)Actual</th>
                <th style="width: 10%;">Nuevo Costo Unitario (estimado)</th>
               
                <th style="width: 10%;">Total</th>
              </tr>
                <td align="center" id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>
<?php 
$num_circulante = $datos_sol['codCirculante'];
}
 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['stock'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $codigo   =    $productos['codigo'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cantidad=$productos['stock'];
        $stock=number_format($cantidad, 1,".");
         $stock=round($stock);
  echo' 
    <style type="text/css">
     #td{
    text-align:center;
        display: none;
    }
    
   
</style> 
      <tr>
      <td  data-label="Código"><input style="width: 100%; background:transparent; border: none; text-align: center"  readonly value="'.$codigo.'"><input type="hidden" style="width: 100%; background:transparent; border: none; text-align: center"  name="cod1[]" readonly value="'.$productos['codigodetallecirculante'] .'">
      <td  data-label="Código"><input style="background:transparent;border: 1 solid #000; width: 100%;" type="number" background:transparent; border: none; text-align: center"  name="codn[]" class="form-control"  value="">
        </td>
        <td  data-label="Descripción del Artículo"><textarea style="background:transparent; border: none; width: 100%; text-align: left"  name="desc[]" readonly style="border: none">'.$productos['descripcion']. '</textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%; text-align: center" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
        <td  data-label="Cantidad Solicitada"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="cant[]" readonly value="'.$stock. '"></td>
         <td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" class="form-control" type="number" required  name="cantidad_despachada[]" required value=""></td>

          <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%; text-align: center"  type="text" step="0.01"  required readonly  value="$'.$precio2.'"></td>

          <td  data-label="Costo unitario"><input class="form-control" type="number" style="background:transparent;border: 1 solid #000; width: 100%;" required step="0.01" name="cost[]"></td>
         
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="tot[]" readonly step="0.01"  value="$'.$total2. '"></td>
      </tr>';

}

      echo'
      <th colspan="8">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold; text-align: center" step="0.01"   name="tot_f" readonly value="$'.$final2.'" ></td></tr>
  
         </tbody>
        </table>

    
  
    <input id="pdf" type="submit" class="btn btn-lg" value="Guardar Estado" name="detalle_circulante">
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
</section>
      ';
}
?>
<?php

if(isset($_POST['detalle'])){

$total = 0;
$final = 0;
$total2 = 0;
$final2 = 0;
   include 'Model/conexion.php';

$id=$_POST['id'];
    $sql = "SELECT * FROM tb_circulante  WHERE codCirculante='$id' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   
<section id="section">
<form method="POST" action="" >
         
      
        <div class="row">  

          <div class="col-6 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codCirculante']. '" name="num_sol">
          </div>

          <div class="col-6 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '" name="fech">
          </div>
           <div class="col-8 col-sm-4" style="position: initial">
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
        </div>
      
        <br>
    </form>
           <form method="POST" action="Plugin/pdf_circulante.php" target="_blank">
        <table class="table" style="margin-bottom:3%">
            
            <thead>
              <tr id="tr">
                <th>Codigo</th>
                <th style="width: 35%;">Descripción del Artículo</th>
                <th>Unidad de Medida</th>
                <th>Cantidad Solicitada</th>
                <th>Cantidad Despachada</th>
                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>
                <?php 
$num_circulante = $datos_sol['codCirculante'];
}
 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['stock'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $codigo   =    $productos['codigo'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
           echo' 
    <style type="text/css">
     #td{
        display: none;
        text-align:center;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><input style="width: 100%; background:transparent; border: none; text-align: center"   readonly value="'.$codigo.'">
        <td  data-label="Descripción del Artículo"><textarea style="background:transparent; border: none; width: 100%; text-align: left"  name="desc[]" readonly style="border: none">'.$productos['descripcion']. '</textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%; text-align: center" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
        <td  data-label="Cantidad Solicitada"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="cant[]" readonly value="'.$stock. '"></td>
        <td  data-label="Cantidad"> <input readonly style="background:transparent; border: none;  width: 100%; text-align: center"  type="number" required  name="cantidad_despachada[]" required value="'.$cantidad_desp.'"></td>
         <td data-label="Costo unitario"><input  name="cost[]" readonly value="$'.$precio2.'"  style="background:transparent; border: none; width: 100%;"  ></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%; text-align: center"  name="tot[]" readonly step="0.01"  value="$'.$total2. '"></td>
      </tr>';

}

      echo'
      <th colspan="6">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold; text-align: center" step="0.01"   name="tot_f" readonly value="$'.$final2.'" ></td></tr>
  
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
        } 
      </style>
</form>
</section>
      ';
}
?>            
  </body>
  </html>


