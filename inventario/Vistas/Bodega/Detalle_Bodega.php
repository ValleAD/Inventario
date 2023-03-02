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
    <title>Detalle Bodega</title>
</head>
<body>
    <style>  
        #NoGuardar, #og,#jus1, .m-0{
            display: none;
        }
        #div{margin: 0%}
        section{background: whitesmoke;border-radius: 15px;margin: 1%;padding: .5%;}
        form{background: transparent;padding: 1%;}
        @media (max-width: 800px){

            .col-md-3{
                margin-top: 2%;
            }
            section{margin: -15%0%5%4%;width: 93%;}
            form{padding: 1%;}
            label{
                margin-top: 3%;}}
            </style>
            <br><br><br>
            <section id="section" class="section">
                <?php

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
             $sql = "SELECT * FROM tb_bodega WHERE codBodega = '$cod_compra'";
             $result = mysqli_query($conn, $sql);
             while ($productos1 = mysqli_fetch_array($result)){
                $estado=$productos1['estado'];

                echo'   


                <div class="card">
                <div class="card-body">
                <div class="row">

                <div class="col-md-3" style="position: initial">


                <label style="font-weight: bold;">Depto. o Servicio:</label>
                <p>' .$productos1['departamento']. '</p>

                </div>

                <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">N° de Bodega:</label>
                <p>' .$productos1['codBodega']. '</p>
                </div>

                <div class="col-md-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <p>' .$productos1['usuario']. '</p>
                </div>


                <div class="col-md-2" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                <p>' .date("d-m-Y",strtotime($productos1['fecha_registro'])).  '</p>
                </div>';?>
                <div class="col-md-2" style="position: initial">
                    <label style="font-weight: bold;">Estado:</label>
                    <div style="position:initial;" class="input-group">
                     <label class="input-group-text" for="inputGroupSelect01">
                        <?php  if($productos1['estado']=='Pendiente') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#question-octagon-fill"/>
                            </svg>
                        <?php } elseif($productos1['estado']=='Aprobado') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                            </svg>
                        <?php } elseif($productos1['estado']=='Rechazado') { ?>
                            <svg class="bi" width="20" height="20" fill="currentColor">
                                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#x-square-fill"/>
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
             ?> class="form-control" type="text" name="estado" readonly value="<?php echo $productos1['estado'] ?>"><br>

         </div>
     </div>
 </div>
</div>  </div>
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

                    $num_vale = $productos1['codBodega'];

                    if ($tipo_usuario==1) {
                        $sql = "SELECT codigo,stock,cantidad_despachada,precio,descripcion,unidad_medida FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE odt_bodega = $num_vale";
                    }
                    if ($tipo_usuario==2) {
                        $sql = "SELECT codigo,stock,cantidad_despachada,precio,descripcion,unidad_medida FROM `detalle_bodega` D JOIN `tb_bodega` V ON D.odt_bodega=V.codBodega WHERE V.idusuario='$idusuario' and odt_bodega='$num_vale' ";
                    }
                    $result1 = mysqli_query($conn, $sql);
                    if (!$result1) {?>
                        <style>div{
                            display: none;
                        }</style>
                        <?php 
                    }else{
                        while ($productos = mysqli_fetch_array($result1)){
                            if ($estado="Pendiente") {  
                                $total = $productos['stock'] * $productos['precio'];
                            }if ($estado="Rechazado") {

                                $total = $productos['stock'] * $productos['precio'];
                            }if ($estado=="Aprobado") {

                                $total = $productos['cantidad_despachada'] * $productos['precio'];
                            }
                            $final += $total;
                            $total1= number_format($total, 2, ".",",");
                            $final1=number_format($final, 2, ".",",");
                            $codigo=$productos['codigo'];
                            $descripcion=$productos['descripcion'];
                            $um=$productos['unidad_medida'];


                            $precio   =    $productos['precio'];
                            $precio2  =    number_format($precio, 2,".",",");  
                            $cant_aprobada=$productos['stock'];
                            $cantidad_despachada=$productos['cantidad_despachada'];
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
               }
               ?> 
           </tbody>

       </table>
   </div>
</div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div style="position: initial;" class="btn-group my-3 mx-2" role="group" aria-label="Basic outlined example">

                        <form method="POST" action="../../Plugin/Imprimir/Bodega/bodega.php" target="_blank">
                            <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">

                            <input type="hidden" name="cod" value="<?php echo $codigo ?>">

                            <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

                            <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                                </svg>

                            </button>
                        </form>
                        <form method="GET" action="../../Plugin/PDF/Bodega/pdf_bodega.php" target="_blank" class="ml-1">
                            <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">                        

                            <button style="position: initial;" type="submit" class="btn btn-outline-primary" >
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                                </svg>

                            </button>
                        </form>
                        <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" class="ml-1">
                            <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">

                            <input type="hidden" name="cod" value="<?php echo $codigo ?>">
                            <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>
                            <button type="submit" class="btn btn-outline-primary" name="DT" target="_blank">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                                </svg>
                            </button>
                        </form>
                        <?php if($tipo_usuario==1){ ?>
                            <form method="POST" action="">
                                <?php
                                if($productos1['estado']=='Pendiente') {
                                 ?>  
                                 <button  type="submit" name="submit"class="btn btn-danger" name="estado" title=" Cambiar Estado">
                                     <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#upload"/>
                                    </svg>
                                </button>
                            <?php } ?>
                            <input type="hidden" readonly class="form-control"  value="<?php echo $productos1['codBodega']?>" name="bodega">
                        </form>
                    <?php } ?>
                    <form class="ml-1" style="" method="POST" action="" style="margin: 0px;" >
                        <input type="hidden" name="cod" value="<?php echo $productos1["codBodega"] ?>">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#new">➕</button>
                    </form>
                </div>
                <hr>
                <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

                <p align="right"><b style="float: left;">Cant. Soli. - Cant. Despa.: </b><?php echo $final7 ?></p>
                <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
                <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>

                <button class="btn btn-success as">Solicitudes Bodega</button>
            </div>

        </div>

    </div>

</div>

</div>
</div>


<?php } ?>
</section>
<?php if(isset($_POST['submit'])){


    $cod_vale = $_POST['bodega'];
    
    $sql = "SELECT * FROM tb_bodega WHERE codBodega = $cod_vale";
    $result = mysqli_query($conn, $sql);
    while ($productos1 = mysqli_fetch_array($result)){
        echo'   
        <style type="text/css">.section{display: none;}</style>
        <section>

        <form method="POST" action="../../Controller/bodega/añadir_bodega_copy.php">
        <div class="card">
        <div class="card-body">
        <div class="row">

        <div class="col-md-3" style="position: initial">

        <label style="font-weight: bold;">Depto. o Servicio:</label>
        <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="departamento">
        <p>' .$productos1['departamento']. '</p>
        </div>

        <div class="col-md-3" style="position: initial">
        <label style="font-weight: bold;">N° de O.D.T.</label>
        <input readonly class="form-control"  type="hidden" value="' .$productos1['codBodega']. '" name="codBodega">
        <p>' .$productos1['codBodega']. '</p>
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
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codBodega']?>" name="bodega">
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

                 $num_vale = $productos1['codBodega'];

                 $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $num_vale ";
                 $result = mysqli_query($conn, $sql);
                 while ($productos = mysqli_fetch_array($result)){

                  $total = $productos['stock'] * $productos['precio'];
                  $final += $total;
                  $codigo=$productos['codigo'];
                  $descripcion=$productos['descripcion'];
                  $um=$productos['unidad_medida'];
                  $precio=$productos['precio'];
                  $precio1=number_format($precio, 2,".",",");
                  $total1= number_format($total, 2, ".",",");
                  $final1=number_format($final, 2, ".",",");
                  $cantidad=$productos['stock'];
                  $stock=number_format($cantidad, 2, ".",",");

                  $final2 += $stock;
                  $final3   =    number_format($final2, 2, ".",",");

                  $final8 += $precio;
                  $final9   =    number_format($final8, 2, ".",",");
                  ?>
                  <style type="text/css"> #td{display: none;} </style> 

                  <tr>
                    <td  data-label="Código"><?php echo $codigo ?>
                    <input type="hidden" name="cod1[]" readonly value="<?php echo $productos['codigodetallebodega'] ?>">
                    <input type="hidden"  name="cod[]" readonly value="<?php echo $codigo ?>">
                    <input type="hidden"  name="cod_bodega[]" readonly value="<?php echo $codigo ?>">
                    <input type="hidden"  name="odt_bodega" readonly value="<?php echo $num_vale ?>">
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
          <a class="btn btn-outline-primary mb-3" type="hidden" onclick="return confirmaion2()" href="../../Controller/Vale/añadir_vale_copy.php?vale=<?php echo $productos1['codBodega']?>&estado=Rechazado">Rechazar Producto</a> 

          <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
          <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
          <p align="right" class="my-4"><b style="float: left;">SubTotal: </b><?php echo $final1?></p>
          
          <button id="buscar1" type="submit" class="btn btn-lg btn-success" style="width: 49%;float: left; margin-right: 1%;font-size: 1.4em; text-align: center;" name="detalle_bodega">Guardar

          </button>
      </form>
      <form method="POST" action="" style="margin:0;">

        <button class="btn btn-danger btn-lg" id="" style="width: 50%;" name="detalle">Cancelar</button>
        <input type="hidden" name="id" value="<?php echo $num_vale ?>">
    </form>

</div>
</div>
</div>
</div>

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
<section>
    <form style="background: transparent;" method="POST" action="../../Controller/Bodega/añadir_bodega.php">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4" style="position: initial">
                    <label id="inp1"><b>Departamento que solicita</b></label>   
                    <div class="div d" > 

                     <?php  
                     $sql = "SELECT * FROM selects_departamento";
                     $result = mysqli_query($conn, $sql);
                     while ($productos = mysqli_fetch_array($result)){ ?>  
                       <input class="p2" required  id="<?php echo $productos['id'] ?>" type="radio" name="depto" value="<?php echo $productos['departamento'] ?>"> <label  style="width: 100%;" id="label1" for="<?php echo $productos['id'] ?>" > <?php echo $productos['departamento'] ?></label><br>
                   <?php }?>
               </div>   
               <br>  
               <p id="tr" align="right" class="p">Mostrar todos
                <svg class="bi" width="20" height="20" fill="currentColor">
                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-down-fill"/></svg></p>
                    <p id="tr" align="right" class="p1">Ocultar
                        <svg class="bi" width="20" height="20" fill="currentColor">
                            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#caret-up-fill"/></svg></p>
                        </div>
                        <div class="col-md-4" style="position: initial">
                            <label id="inp1"><b>Vale N°</b></label>   
                            <input id="busq"class="form-control" readonly  type="number" name="odt" value="<?php echo $cod ?>" required >
                            <section id="resultado" style="margin: 0px;background: transparent;width: 100%;"></section>
                        </div>
                        <div class="col-md-4" style="position: initial">
                            <label id="inp1"><b>Nombre de la persona</b></label>
                            <?php     $cliente =$_SESSION['signin'];
                            $data =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username = '$cliente'");
                            while ($consulta =mysqli_fetch_array($data)) {
                               ?>
                               <label><b>Encargado</b></label>
                               <input style="cursor: not-allowed; color: black;"  class="form-control" type="text" name="usuario" id="como3" required readonly value="<?php  echo $consulta['firstname']?> <?php  echo $consulta['lastname']?>">
                               <input style="cursor: not-allowed; color: black;"  class="form-control" type="hidden" name="idusuario" id="como4" required readonly value="<?php  echo $consulta['id']?>"/>
                               <br>
                           <?php }?> 

                       </div>
                   </div>
               </div>
           </div>

           <br>

           <div class="card">
            <div class="card-body">
              <?php include('../../Buscador_ajax/Tablas/Productos/tablaProductos.php') ?>
          </div>
      </div>
      <br>

      <div class="row">

        <div class="col-md-4">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success btn-lg" id="Guardar"style="width: 100%;"  name="NuevaSoli">Guardar</button>
        </form>
    </div>
    <div class="col-md-2">

        <form method="POST" action="" style="margin:0">

            <button class="btn btn-danger btn-lg" id="" style="width: 100%;" name="detalle">Cancelar</button>
            <input type="hidden" name="id" value="<?php echo $cod ?>">
        </form>
    </div>
</div>  


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
            window.location.href="solicitudes_vale.php";
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