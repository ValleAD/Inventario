<?php
session_start();
if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
    window.location ="../../log/signin.php";
    session_destroy();  
    </script>
    die();

    ';
    
}

?>
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../styles/estilo.css" > 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Compra</title>
</head>
<body>
    <style>  
        #NoGuardar, #og,#jus1, .m-0{
            display: none;
        }
        #div{margin: 0%}
        section{background: whitesmoke;border-radius: 15px;margin: 1%;padding: 1%;}
               @media (min-width: 1028px){
           #section{
                margin: 5%6%6%1%;
                width: 97%;
            } #section1{
                margin: 5%6%6%1%;
                width: 97%;
            } 
        }
        @media (max-width: 800px){
            #ver{
                margin-top: 2%;
            }
            #section{
                margin: -10%6%6%1%;
                width: 97%;
            }#section1{
                margin: -10%6%6%1%;
                width: 97%;
            }

            th{
                width: 25%;
            }
            #p{
                margin-top: 5%;
                margin-left: 7%;
            }

        }
            </style>
            <br><br><br>
            <section id="section" class="section">
                <?php
                $verificar =mysqli_query($conn, "SELECT nSolicitud FROM tb_compra ");
                if (!mysqli_num_rows($verificar)>0) {
                    echo "<script>window.location.href='../../Vistas/Compra/solicitudes_compra.php'; </script>";
                }
                $total = 0;
                $final = 0;
                $final1 = 0;
                $final2 = 0;
                $final3 = 0;
                $final4 = 0;
                $final5 = 0;
                $final6 = 0;
                $final7 = 0;
                $final8 = 0;
                $final9 = 0;
                if(isset($_GET['detalle'])){

                    $cod_compra = $_GET['id'];
                }
                if(isset($_POST['detalle'])){

                    $cod_compra = $_POST['id'];
                }
                $sql = "SELECT * FROM tb_compra WHERE nSolicitud = '$cod_compra'";
                $result = mysqli_query($conn, $sql);
                while ($productos1 = mysqli_fetch_array($result)){
                    $estado=$productos1['estado'];
                    if ($productos1['justificacion']=="") {
                        $jus = 'Sin justificacion por el momento';

                    }else{
                        $jus = $productos1['justificacion'];
                    }
                    echo'   

                    <div class="card">
                    <div class="card-body">
                    <div class="row">

                    <div class="col-md-3 mb-3" style="position: initial">

                    <label style="font-weight: bold;">Solicitud No.</label><br>
                    '. $productos1['nSolicitud'].'

                    </div>

                    <div class="col-md-3 mb-3" style="position: initial">
                    <label style="font-weight: bold;">Dependencia Solicitante</label><br>
                    ' .$productos1['dependencia']. '
                    </div>

                    <div class="col-md-3 mb-3" style="position: initial">
                    <label style="font-weight: bold;">Plazo y No. de Entregas</label><br>
                    ' .$productos1['plazo']. '
                    </div>

                    <div class="col-md-3 mb-3" style="position: initial">
                    <label style="font-weight: bold;">Unidad Técnica</label><br>
                    ' .$productos1['unidad_tecnica']. '
                    </div>

                    <div class="col-md-3 mb-3" style="position: initial">
                    <label style="font-weight: bold;">Suministro Solicitado</label><br>
                    ' .$productos1['descripcion_solicitud']. '
                    </div>


                    <div class="col-md-3 mb-3" style="position: initial">
                    <label style="font-weight: bold;">Encargado</label><br>
                    ' .$productos1['usuario']. '
                    </div>

                    <div class="col-md-3 mb-3" style="position: initial">
                    <label style="font-weight: bold;">Fecha</label><br>
                    '.date("d-m-Y",strtotime($productos1['fecha_registro'])). '
                    ';?>
                </div>
                <div class="col-md-3" style="position: initial">
                  <label style="font-weight: bold;">Estado</label><br>
                  <br>

                  <div style="position: initial;" class="input-group" style="position:initial;">
                   <label class="input-group-text" for="inputGroupSelect01">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                    </svg>
                </label>
                <input  id="inputGroupSelect01"  <?php
                if($productos1['estado']=='Comprado') {
                   echo ' style="background-color:blueviolet ;width:50%; border-radius:5px;text-align:center;position: initial; color: white;"';
               }
           ?> class="form-control" type="text" name="" value="<?php echo $productos1['estado'] ?>"><br>
           <input  readonly class="form-control" type="hidden" value="<?php echo $productos1['nSolicitud'] ?>" name="sol_compra">
       </div>
   </div>
</div></div>
</div>


<br>


<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">


                <table class="table " id="example">
                    <thead>
                      <tr id="tr">
                        <th>Código</th>
                        <th>Descripción Completa</th>
                        <th>Unidad de Medida</th>
                        <th>Cantidad solicitada</th>
                        <th>Cantidad Depachada</th>

                        <th>Costo unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $num_vale = $productos1['nSolicitud'];

                    
                    $sql = "SELECT codigo,SUM(stock),SUM(cantidad_despachada),precio,descripcion,unidad_medida FROM detalle_compra WHERE solicitud_compra = $num_vale Group by codigo ";
                    
                    $result1 = mysqli_query($conn, $sql);
                    

                    while ($productos = mysqli_fetch_array($result1)){
                       $total = $productos['SUM(stock)'] * $productos['precio'];

                       $final += $total;
                       $total1= number_format($total, 2, ".",",");
                       $final1=number_format($final, 2, ".",",");
                       $codigo=$productos['codigo'];
                       $descripcion=$productos['descripcion'];
                       $um=$productos['unidad_medida'];


                       $precio   =    $productos['precio'];
                       $precio2  =    number_format($precio, 2,".",",");  
                       $cant_aprobada=$productos['SUM(stock)'];
                       $cantidad_despachada=$productos['SUM(cantidad_despachada)'];
                       $stock=number_format($cant_aprobada, 2,".",",");
                       $cantidad_desp=number_format($cantidad_despachada, 2,".",",");

                       $final2 += $cant_aprobada;
                       $final3   =    number_format($final2, 2, ".",",");

                       $final4 += $cantidad_despachada;
                       $final5   =    number_format($final4, 2, ".",",");

                       $final6 += ($cant_aprobada-$cantidad_despachada);
                       $final7   =    number_format($final6, 2, ".",",");

                       $final8 += $precio;
                       $final9   =    number_format($final8, 2, ".",",");?>
                       <style type="text/css">
                           #td{
                            display: none;
                        }


                    </style> 
                    <tr>
                     <td  data-label="Código"><?php echo $productos['codigo'] ?></td>
                     <td  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
                     <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
                     <td  data-label="Cantidad"><?php echo $stock ?></td>
                     <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
                     <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
                     <td  data-label="total"><?php echo $total1 ?></td>
                 </tr>

             <?php }

             ?> 
         </tbody>

     </table>
 </div>
</div>
</div>
<div class="col-md-3  mb-3 " >

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
                        <form method="POST" action="../../Plugin/Imprimir/Compra/compra.php" target="_blank">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="sol_compra">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['dependencia']?>" name="dependencia">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['plazo']?>" name="plazo">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['unidad_tecnica']?>" name="unidad">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['descripcion_solicitud']?>" name="suministro">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['usuario']?>" name="usuario">
                           <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['estado']?>" name="estado">
                           <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">

                           <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
                           <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
                           <input type="hidden" name="um[]" value="<?php echo $um ?>">
                           <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
                           <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
                           <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
                           <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
                           <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >

                           <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

                           <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                            </svg>

                        </button>
                    </form>
                    <form method="GET" action="../../Plugin/PDF/Compra/pdf_compra.php" target="_blank" class="mx-1">
                       <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="sol_compra">

                       <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

                       <button style="position: initial;" type="submit" class="btn btn-outline-primary" >
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>

                    </button>
                </form>
                <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" >
                    <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="compra">
                   <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
                   <button type="submit" class="btn btn-outline-primary" name="dt_compra" target="_blank">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                    </svg>
                </button>
            </form>
            <form class="ml-1" style="" method="POST" action=""  >
                <input type="hidden" name="cod" value="<?php echo $productos1["nSolicitud"] ?>">
                <button type="button" class="btn btn-outline-primary " style="font-size: 13.5px;" data-toggle="modal" data-target="#new">➕</button>
            </form>
        </div>
        <hr>
        <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
        <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

        <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
        <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
        <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p> 
    </div>

</div>

</div>

</div>
<div class="card mt-3">
  <div class="card-body">
      <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
        <p style="padding-left: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
        <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
        <p style="padding-left: 1%;"><?php echo $jus ?></p>
    </div>
    <button class="btn btn-success as">Solicitudes Compra</button>

</div>
</div>
</div>


</div>


<?php } ?>
</section>
<?php if(isset($_POST['submit'])){


    $cod_vale = $_POST['vale'];
    
    $sql = "SELECT * FROM tb_compra WHERE nSolicitud = $cod_vale";
    $result = mysqli_query($conn, $sql);
    while ($productos1 = mysqli_fetch_array($result)){
       if ($productos1['Justificacion']=="") {
        $jus = 'Sin observación por el momento';
        
    }else{
        $jus = $productos1['justificacion'];
    }
    echo'   
    <style type="text/css">.section{display: none;}</style>
    <section>

    <form method="POST" action="../../Controller/Vale/añadir_vale_copy.php">
    <div class="card">
    <div class="card-body">
    <div class="row">

    <div class="col-md-3" style="position: initial">

    <label style="font-weight: bold;">Depto. o Servicio:</label>
    <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="nSolicitud">
    <p>' .$productos1['departamento']. '</p>
    </div>

    <div class="col-md-3" style="position: initial">
    <label style="font-weight: bold;">N° de O.D.T.</label>
    <input readonly class="form-control"  type="hidden" value="' .$productos1['nSolicitud']. '" name="vale">
    <p>' .$productos1['nSolicitud']. '</p>
    </div>

    <div class="col-md-3" style="position: initial">
    <label style="font-weight: bold;">Encargado:</label>
    <input readonly class="form-control"  type="hidden" value="' .$productos1['usuario']. '" name="usuario">
    <p>' .$productos1['usuario']. '</p>
    </div>     
    <div class="col-md-3" style="position: initial">
    <label style="font-weight: bold;">Fecha:</label>
    <input readonly class="form-control"  type="hidden" value="'.$productos1['fecha_registro']. '" name="fech">
    <p>' .date("d-m-Y",strtotime($productos1['fecha_registro'])).  '</p>
    </div>';?>

</div>
</div>
</div>


<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['nSolicitud']?>" name="vale">
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['usuario']?>" name="usuario">
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['fecha_registro']?>">
</div>
</div>
</div>

<br>
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <table class="table" id="example">

                  <thead>
                    <tr id="tr">
                      <th>Código</th>
                      <th style="width:25%">Descripción</th>
                      <th>Unidad de Medida</th>
                      <th>Cantidad Solicitada</th>
                      <th>Cantidad Depachada</th>
                      <th>Costo Unitario</th>
                      <!-- <th>Nuevo Costo Unitario (estimado)</th>-->
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
               <?php            

               $num_vale = $productos1['nSolicitud'];

               $sql = "SELECT * FROM detalle_compra WHERE nSolicitud = $num_vale Group by codigo";
               $result = mysqli_query($conn, $sql);
               while ($productos = mysqli_fetch_array($result)){

                  $total = $productos['SUM(stock}'] * $productos['precio'];
                  $final += $total;
                  $codigo=$productos['codigo'];
                  $descripcion=$productos['descripcion'];
                  $um=$productos['unidad_medida'];
                  $precio=$productos['precio'];
                  $precio1=number_format($precio, 2,".",",");
                  $total1= number_format($total, 2, ".",",");
                  $final1=number_format($final, 2, ".",",");
                  $cantidad=$productos['SUM(stock}'];
                  $stock=number_format($cantidad, 2, ".",",");

                  $final2 += $stock;
                  $final3   =    number_format($final2, 2, ".",",");

                  $final8 += $precio;
                  $final9   =    number_format($final8, 2, ".",",");
                  ?>
                  <style type="text/css"> #td{display: none;} </style> 

                  <tr>
                    <td  data-label="Código"><?php echo $codigo ?>
                    <input type="hidden" name="cod_vale[]" readonly value="<?php echo $productos['codigodetallevale'] ?>">
                    <input type="hidden"  name="cod[]" readonly value="<?php echo $codigo ?>">
                    <input type="hidden"  name="numero_vale" readonly value="<?php echo $num_vale ?>">
                    <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: left; height: 100%;"  name="desc[]" readonly value="<?php echo $descripcion ?>">
                    <input type="hidden" name="um[]" readonly value="<?php echo $um ?>">
                    <input type="hidden" type="decimal" step="0.01"  name="cant[]" readonly value="<?php echo $stock ?>">
                    <input type="hidden"  name="cost[]" step="0.01"  readonly value="<?php echo $precio1 ?>">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                    <input type="hidden" name="año" id="dia">
                    <input type="hidden" name="mes" id="mes">
                    <input type="hidden" name="año" id="ano">
                </td>
                <td  data-label="Descripción"><?php echo $descripcion ?></td>
                <td  data-label="Unidada de Medida"><?php echo $um ?></td>
                <td  data-label="Cantidad"><?php echo $stock ?></td>
                <td  data-label="Cantidad"><input style="background:transparent; border: 1px solid #000;  width: 100%; text-align: center" class="form-control"  required type="number" step="0.01" min="0.00" max="<?php echo $stock ?>"  name="cantidad_despachada[]"  value=""></td>
                <td  data-label="Costo unitario"><?php echo $precio1 ?></td>
                <td  data-label="total"><?php echo $total1 ?></td>
            </tr>

        <?php } ?> 

    </tbody>
</table>
</div>
</div>
</div>
<div class="col-md-3 " >
    <div class="card">
        <div class="card-body">


          <label style="font-weight: bold;">Estado:</label><br>* Requerido para este Formulario.
          <input  id="input" type="radio" name="estado" value="Aprobado" required> <label class="btn btn-outline-primary" id="label1" for="input" > Aprobar Producto</label><br>No Requerido para este Formulario.
          <a class="btn btn-outline-primary mb-3" type="hidden" onclick="return confirmaion2()" href="../../Controller/Vale/añadir_vale_copy.php?vale=<?php echo $productos1['nSolicitud']?>&estado=Rechazado">Rechazar Producto</a> 

          <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
          <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
          <p align="right" class="my-4"><b style="float: left;">SubTotal: </b><?php echo $final1?></p>
      </div>
  </div>

  <br>
  <div class="card">
    <div class="card-body">
      <label>Justificacion (En qué se ocupará el bien entregado)</label>
      <textarea rows="7"  class="form-control" name="jus"  required><?php echo $jus ?> </textarea><br>


      <button id="buscar1" type="submit" class="btn btn-lg btn-success" style="width: 49%;float: left; margin-right: 1%;font-size: 1.4em; text-align: center;" name="detalle_vale">Guardar</button>
  </form>
  <form method="POST" action="" style="margin:0;">

    <button class="btn btn-danger btn-lg" id="" style="width: 50%;" name="detalle">Cancelar</button>
    <input type="hidden" name="id" value="<?php echo $num_vale ?>">
</form>
</div>
</div> 
</div>
</div>
</div>

</form>
<?php }}?>
<div class="modal fade" id="new" style="background: rgba(0, 0, 0, 0.3)"  data-backdrop="static"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content" style="background:  rgba(255, 255, 255, 1); position: initial;">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black;">Información del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                      <svg class="bi text-danger" width="30" height="30" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#backspace-fill"/>
                    </svg>
                </span>
            </button>
        </div>

        <div class="modal-body ">
            <form id="frm-example" method="post" action="">
                <?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?>
                <input type="" style="display: none;" readonly class="form-control"  value="<?php echo $num_vale?>" name="bodega">
                <div id="tabla_resultado" style="margin: 0">
                    <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->

                </div>

            </form>
        </div>
    </div>
</div>
</div>
</section>
<?php  if(isset($_POST['solicitar'])){$cod=$_POST['bodega']?>
<style type="text/css">#section{display: none;}</style>
<section id="section1">
 <form style="background: transparent;" method="POST" action="../../Controller/Compra/añadir_compra.php">
   <?php     $sql = "SELECT * FROM tb_compra WHERE nSolicitud = $cod";
   $result = mysqli_query($conn, $sql);
   while ($productos1 = mysqli_fetch_array($result)){
       if ($productos1['justificacion']=="") {
        $jus = 'Sin observación por el momento';

    }else{
        $jus = $productos1['justificacion'];
    }
    echo' <div class="card">
    <div class="card-body">
    <div class="row">
    <div id="w" class="col-md-4" style="position: initial">

    <label id="inp1">Solicitud N°</label>  

    <input id="busq" class="form-control" type="number" name="nsolicitud"  required value="'.$cod .'" readonly> 

    </div>

    <div id="w" class="col-md-4" style="position: initial">
    <font color="black"><label id="inp1">Dependencia que Solicita</label></font>   
    <input type="text"  class="form-control" name="dependencia" id="um" required style="color: black;" value="Mantenimiento" readonly>

    </div>
    <div id="w" class="col-md-4" style="position: initial">
    <font color="black"><label id="inp1">Plazo y Numero de Entregas</label></font> 
    <input  style=" color: black;" class="form-control n1" type="text" name="plazo" id="como3" required readonly value="'.$productos1['plazo'] .'">
    <br>
    </div>
    <div id="w" class="col-md-4" style="position: initial">
    <label >Unidad Tecnica</label>
    <input style=" color: black;"  class="form-control n1" type="text" name="unidad_tecnica" id="como3" required readonly value="'.$productos1['unidad_tecnica']  .'">
    <br>
    </div>
    <div id="w" class="col-md-4" style="position: initial">
    <label >Suministros Solicita</label> 
    <input style=" color: black;"  class="form-control n1" type="text" name="descripcion_solicitud" id="como3" required readonly value="'.$productos1['descripcion_solicitud']  .'">
    <br>
    </div>
    <div id="w" class="col-md-4" style="position: initial">';?>
<?php    }  $cliente =$_SESSION["signin"];
$data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
while ($consulta =mysqli_fetch_array($data)) {
 ?>
 <label >Encargado</label> 
 <input style="cursor: initialowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
 <input style="cursor: initialowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>">
 <br>
<?php }?>
</div>
</div>
</div>
</div>
<br>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
              <?php include('../../Buscador_ajax/Tablas/Productos/tablaProductos.php') ?>
          </div>
      </div>
  </div>
  <div class="col-md-3">
     <div class="card">
        <div class="card-body">   


         <div class="form-floating mb-3 my-2" >
            <label>Justificacion (En qué se ocupará el bien entregado)</label>
            <textarea rows="7" class="form-control" name="jus"  placeholder="" required id="floatingTextarea"></textarea>
        </div>
        <button id="buscar1" type="submit" class="btn btn-lg btn-success" style="width: 49%;float: left; margin-right: 1%;font-size: 1.4em; text-align: center;" name="NuevaSoli">Guardar

        </button>
    </form>
    <form method="POST" action="" style="margin:0;">

        <button class="btn btn-danger btn-lg" id="" style="width: 50%;" name="detalle">Cancelar</button>
        <input type="hidden" name="id" value="<?php echo $cod ?>">
    </form>


</div>
</div>
</div>
</div>
</form>
</section>

<?php 
}  ?>


<script>
    $('.p1').hide();
    $('.p').click(function(){$(".d").removeClass("div");$('.p').hide();$('.p1').show();});   
    $('.p1').click(function(){$(".d").addClass("div");$('.p1').hide();$('.p').show();});

    var table = $('#tblElecProducts').DataTable( {
      responsive: true,
      autoWidth:false,      
      columnDefs: [ {
        orderable: false,
        className: 'select-checkbox',
        targets:   0
    } ],
      select: {
        style:    'multi'
    },
    lengthMenu: [[10, -1], [10,"Todos los registros"]],

    language: {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing":"Procesando...",
    },
});
    $('#submit').on('click', function (event) {


      $('#frm-example').find('input[type="hidden"]').remove();
      var seleccionados = table.rows({ selected: true });

      if(!seleccionados.data().length){
        alert("No ha seleccionado ningún producto");
        event.preventDefault();
    }

    else{
        seleccionados.every(function(key,data){
          console.log(this.data());

          $('<input>', {
              type: 'hidden',
              value: this.data()[1],
              name: 'id[]'
          }).appendTo('#frm-example');

      $("#frm-example").submit(); //submiteas el form
  });
    }
});
    $(document).ready(function () {
        $('.as').click(function() {
            window.location.href="solicitudes_compra.php";
        });
        $('#ver').click(function() {
            window.location.href="";
        });


        $('#example').DataTable({
            dom: 'lrtip',
            responsive: true,
            autoWidth:false,
            deferRender: true,

            lengthMenu: [[10, -1], [10,"Todos"]],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing":"Procesando...",
            },

        });
    });
    window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
var limpiar = document.getElementById('dia'); limpiar.value = dia
var limpiar1 = document.getElementById('mes'); limpiar1.value = mes;
var limpiar4 = document.getElementById('ano'); limpiar4.value = ano;


}

</script>    
</body>
</html>