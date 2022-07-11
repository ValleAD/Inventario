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
    <title>Vale</title>
</head>
<body>
        <style>  
            form{
                background: transparent;
            }
         section{
            margin: 1%;
            padding: 1%;
            background: whitesmoke;
            border-radius: 15px;
            }
            #buscar{
            margin-bottom: 5%;
            margin-left: 2.5%;
            margin-top: 0.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #buscar:hover{
            background: rgb(9, 100, 175);
            } 
            #buscar:active{
            transform: translateY(5px);
            } 
            .a{
                width: 25%;
            }
            @media (max-width: 952px){
   section{
        margin: -5%6%6%7%;
        width: 89%;
    }
    #form{
        margin: -15%6%6%7%;
        padding: 2%;
    }
    th{
        width: 25%;
    }
    #p{
        margin-top: 5%;
        margin-left: 7%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }
    #lo-que-vamos-a-copiar{
        width: 120px;
    }
    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        margin-left: 10%;
    }
  }
        </style>
        <br><br><br>
<?php

    $total = 0;
    $final = 0;
    $total1 = 0;
    $final1 = 0;
    $final2 = 0;
if(isset($_POST['detalle'])){
    
    $cod_vale = $_POST['id'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_vale WHERE codVale = $cod_vale";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
        $num_vale = $productos1['codVale'];
    
     echo'   
    <section style="background: rgba(555, 555, 555, 1);border-radius:15px;">
    <form method="POST" action="" style="background:transparent" >

<div class="row">
          
              <div class="col-md-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <p>' .$productos1['departamento']. '</p>
    
              </div>
    
              <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">N° de Vale:</label>
                <input readonly class="form-control"  type="hidden" value="' .$productos1['codVale']. '" name="vale">
               <p>' .$productos1['codVale']. '</p>
              </div>
    
            <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
               <p>' .$productos1['usuario']. '</p>
            </div>
    
              
              <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                 <p>' .$productos1['fecha_registro']. '</p>
              </div>
              <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <div style="position: initial;" class="input-group mb-3">';?>
                 <label class="input-group-text" for="inputGroupSelect01">
                    <?php  if($productos1['estado']=='Pendiente') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#question-octagon-fill"/>
                </svg>
                    <?php } elseif($productos1['estado']=='Aprobado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                </svg>
                    <?php } elseif($productos1['estado']=='Rechazado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x-square-fill"/>
                </svg>
            <?php } ?>
                 </label>
              <input <?php
                if($productos1['estado']=='Pendiente') {
                    echo ' style="background-color:green ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="background-color:red ;style="position: initial;width:70%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="" readonly value="<?php echo $productos1['estado'] ?>"><br>
            <?php if($tipo_usuario==1){ ?>
               <button id="buscar1" type="submit" name="submit" <?php
                if($productos1['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }


            ?> style="float: right;" class="btn btn-danger my-3" name="estado" > Cambiar estado
            <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#upload"/>
            </svg>
            </button><?php } ?>
          </div>
            </div>
        </div>
          
            <br>


            <!--Vista solo para ver lo detallado del informe-->
          </form>
            <form style="margin-top: -7%;" method="POST" action="Plugin/pdf_vale.php" target="_blank" style="background: transparent;">

                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['fecha_registro']?>" name="fech">
              </div>
              <?php
               if ($productos1['estado']=="Aprobado") {?><br>
               <table class="table " style="width: 100%;">
                    <div style="position: initial;" class="btn-group  my-4 mx-2" role="group" aria-label="Basic outlined example">
            <form method="POST" action="Plugin/pdf_vale.php">
                       <?php  
                       $num_vale = $productos1['codVale'];
        $sql = "SELECT * FROM tb_vale WHERE codVale='$num_vale'  ORDER BY observaciones ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['observaciones']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $datos['observaciones'];
      }
  ?>
  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
<?php } ?>

<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="Plugin/vale.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['fecha_registro']?>" name="fech">
           
                <?php

                
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

      $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
       ?>
       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>
       <?php  
        $sql = "SELECT * FROM tb_vale WHERE codVale='$num_vale'  ORDER BY observaciones ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['observaciones']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $datos['observaciones'];
      }
  ?>
  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
<?php } ?>
<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">

                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>

                
                    <thead>
                        <tr id="tr">
                  <th >Códigosss</th>
                  <th >Descripción</th>
                  <th >Unidad de Medida</th>
                  <th >Cantidad Solicitada</th>
                  <th >Cantidad Depachada</th>
                  <th >Costo unitario</th>
                  <th >Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
          </table>
          <div id="div" style = " max-height: 442px; overflow-y:scroll;"> 
            <table class="table">
                <tbody>
                    <?php 

 $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['cantidad_despachada'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");  
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,",");
        $cantidad_desp=number_format($cantidad_despachada, 2,",");?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> 
  </tbody>
</table>
</div>
<table class="table">
     <tfoot>
            <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $final2 ?></td>
    </tfoot>
    </table>
             <?php 

                       
        $sql = "SELECT * FROM tb_vale WHERE codVale='$num_vale'  ORDER BY observaciones ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['observaciones']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $datos['observaciones'];
      }
  ?>
    <div class="form-group my-3" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
                <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
                <input type="hidden" name="jus" value="<?php echo $jus ?>">
            </div>
<?php }  ?>
<!-- Aqui Termina La vista de Detalles sin Modificar -->



<!-- Aqui Comienza Para cambiar el estado de pendiente al cual se le fue otrogado-->
</form>
        <?php } if ($productos1['estado']=="Pendiente") {?>
            <table class="table ">
            <div style="position: initial;" class="btn-group mb-3 my-5 mx-2" role="group" aria-label="Basic outlined example" style="margin-top:5%">
            <form method="POST" action="Plugin/pdf_vale.php">
            <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="Plugin/vale.php" target="_blank">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codVale']?>" name="vale">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['fecha_registro']?>" name="fech">

          
                <?php

                
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

      $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");
       ?>
       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>
       <?php  
        $sql = "SELECT * FROM tb_vale WHERE codVale='$num_vale'  ORDER BY observaciones ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['observaciones']=="") {
    $jus = "Sin observacion por el momento";
        
    }else{
    $jus = $datos['observaciones'];
      }
  ?>
  <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
<?php } ?>
<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>

            <thead>
              <tr id="tr">
                <th >Código</th>
                <th >Descripción</th>
                <th >Unidad de Medida</th>
                <th >Cantidad Solicitada</th>
                <th >Cantidad Depachada</th>
                <th >Costo unitario</th>
                <th >Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
          </table>
          <div id="div" style = " max-height: 442px; overflow-y:scroll;"> 
          <table class="table">
                <tbody>
                <?php 


 
 $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['stock'] * $productos['precio'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");  
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,",");
        $cantidad_desp=number_format($cantidad_despachada, 2,",");?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><?php echo $productos['codigo'] ?>
            <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
        </td>
        <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
        <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>

      <?php } ?> 
  </tbody>
</table>
</div>
<table class="table">
            <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $final2 ?></td>
    </tfoot>
    </table>
    <br>
         <?php 

                       
        $sql = "SELECT * FROM tb_vale WHERE codVale='$num_vale'  ORDER BY observaciones ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['observaciones']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $datos['observaciones'];
      }
  ?>
    <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
                <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
                <input type="hidden" name="jus" value="<?php echo $jus ?>">
            </div>
<?php }  ?>

</form>
             <?php  }?>

             <?php  
           
} }

if(isset($_POST['submit'])){


    $cod_vale = $_POST['vale'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_vale WHERE codVale = $cod_vale";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
    
     echo'   
    <section>
    <form method="POST" action="Controller/añadir_vale_copy.php">
    
                 
          
            <div class="row">
          
            <div class="col-md-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="depto">
                  <p>' .$productos1['departamento']. '</p>
    
              </div>
    
              <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">N° de O.D.T.</label>
                <input readonly class="form-control"  type="hidden" value="' .$productos1['codVale']. '" name="bodega">
                <p>' .$productos1['codVale']. '</p>
              </div>
    
            <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="hidden" value="' .$productos1['usuario']. '" name="usuario">
                <p>' .$productos1['usuario']. '</p>
            </div>
    
              
              <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="hidden" value="'.$productos1['fecha_registro']. '" name="fech">
                  <p>' .$productos1['fecha_registro']. '</p>
              </div>
              <div class="col-md-2" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>';?>
           <select  class="form-control"  type="text" name="estado" required>
                <option disabled selected value="">Selecione</option>
                <option>Aprobado</option>
                <option>Rechazado</option>
                </select><br>
              
          </div>
            </div>
<br>
            <table class="table" style="margin-bottom:3%">
                
              <thead>
                <tr id="tr">
                  <th>Código</th>
                  <th style="width:30%">Descripción</th>
                  <th>Unidad de Medida</th>
                  <th>Cantidad Solicitada</th>
                  <th>Cantidad Depachada</th>
                <th>Costo Unitario (estimado)Actual</th>
               <!-- <th>Nuevo Costo Unitario (estimado)</th>-->
                  <th>Total</th>
                </tr>
                <td id="td" colspan="6"><h4>No se encontraron resultados 😥</h4></td>
              </thead>
                <tbody>
         <?php            
    
    $num_vale = $productos1['codVale'];
    }

     $sql = "SELECT * FROM detalle_vale WHERE numero_vale = $num_vale";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['cantidad_despachada'] * $productos['precio'];
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
      // $stock=round($stock);
      ?>
       <style type="text/css"> #td{display: none;} </style> 

       <tr>
        <td  data-label="Código"><?php echo $codigo ?>
        <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: center"  name="cod_vale[]" readonly value="<?php echo $productos['codigodetallevale'] ?>">

            <input type="hidden"  name="cod[]" readonly value="<?php echo $codigo ?>">

            <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: left; height: 100%;"  name="desc[]" readonly value="<?php echo $descripcion ?>">

            <input type="hidden" name="um[]" readonly value="<?php echo $um ?>">

            <input type="hidden" type="decimal" step="0.01"  name="cant[]" readonly value="<?php echo $stock ?>">

            <input type="hidden"  name="cost[]" step="0.01"  readonly value="$<?php echo $precio1 ?>">

            <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: center"  name="tot[]" readonly step="0.01" value="$<?php echo $total1 ?>">

            <input type="hidden"  step="0.01"   name="tot_f" readonly value="$<?php echo $final1 ?>" >
    </td>
    <td  data-label="Descripción"><?php echo $descripcion ?></td>
        <td  data-label="Unidada de Medida"><?php echo $um ?></td>
        <td  data-label="Cantidad"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" class="form-control" type="decimal" required  name="cantidad_despachada[]" required value=""></td>
        <td  data-label="Costo unitario"><?php echo $precio1 ?></td>
        <td  data-label="total"><?php echo $total1 ?></td>

        
        
      </tr>

      <?php } ?> 
            <tfoot style="width: 100%;border: 1px solid #ccc;border-collapse: collapse;margin: 0;padding: 0;color: black;table-layout: fixed; ">
        <td colspan="6"style="text-align: left;font-size: 12px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 12px; font-weight: bold;"><?php echo $final1 ?></td>
    </tfoot>
        </tbody>
    </table>
<?php 

      $sql = "SELECT * FROM tb_vale where codVale = $cod_vale ORDER BY fecha_registro DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      while ($datos = mysqli_fetch_array($result)){
        $observaciones = $datos['observaciones'];


      ?>
      <div class="form-group" style="position: all;">

                      <label>Observaciones (En qué se ocupará el bien entregado)</label>
                    <textarea rows="7"  class="form-control" name="jus"  required><?php echo $observaciones ?> </textarea><br>
                  </div>

      <?php
      }
      ?>
    <button id="buscar1" type="submit" class="btn btn-lg my-1 btn-success" name="detalle_vale">Guardar Estado
        <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
        </svg>
    </button>
        <?php } ?>
</form>
</section>
      
       
  </body>
  </html>