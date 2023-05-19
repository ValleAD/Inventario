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
    <title>Detalle Almacen</title>
</head>
<body>
    <style>  
        #NoGuardar, #og,#jus1, .m-0{
            display: none;
        }
        #div{margin: 0%}
        section{background: whitesmoke;border-radius: 15px;margin: 1%;padding: .5%;}
        form{background: transparent;padding: 1%;}
        @media (min-width: 1028px){
         #section{
            margin: 5%6%6%1%;
            width: 97%;
        }  #section1{
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
        }  #section1{
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

    $total = '0.00';
    $final = '0.00';
    $final1 = '0.00';
    $final2 = '0.00';
    $final3 = '0.00';
    $final4 = '0.00';
    $final5 = '0.00';
    $final6 = '0.00';
    $final7 = '0.00';
    $final8 = '0.00';
    $final9 = '0.00';
    $verificar =mysqli_query($conn, "SELECT codAlmacen FROM tb_almacen ");
    if (!mysqli_num_rows($verificar)>0) {
        echo "<script>window.location.href='../../Vistas/Almacen/solicitudes_almacen.php'; </script>";
    }
    if(isset($_GET['detalle'])){

        $cod_compra = $_GET['id'];
    }
    if(isset($_POST['detalle'])){

        $cod_compra = $_POST['id'];

    }
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen = '$cod_compra'";
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
        <label style="font-weight: bold;">N° de Almacen:</label>
        <p>' .$productos1['codAlmacen']. '</p>
        </div>

        <div class="col-md-3" style="position: initial">
        <label style="font-weight: bold;">Encargado:</label>
        <p>' .$productos1['encargado']. '</p>
        </div>


        <div class="col-md-2" style="position: initial">
        <label style="font-weight: bold;">Fecha:</label>
        <p>' .date("d-m-Y",strtotime($productos1['fecha_solicitud'])).  '</p>
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

                    $num_vale = $productos1['codAlmacen'];

                    $sql = "SELECT codigo,SUM(cantidad_solicitada),SUM(cantidad_despachada),precio,nombre,unidad_medida FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen WHERE tb_almacen = $num_vale Group by codigo";

                    
                    $result1 = mysqli_query($conn, $sql);

                    while ($productos = mysqli_fetch_array($result1)){
                        if ($estado="Pendiente") {  
                            $total = $productos['SUM(cantidad_solicitada)'] * $productos['precio'];
                        }if ($estado="Rechazado") {

                            $total = $productos['SUM(cantidad_solicitada)'] * $productos['precio'];
                        }if ($estado=="Aprobado") {

                            $total = $productos['SUM(cantidad_despachada)'] * $productos['precio'];
                        }
                        $final += $total;
                        $total1= number_format($total, 2, ".",",");
                        $final1=number_format($final, 2, ".",",");
                        $codigo=$productos['codigo'];
                        $nombre=$productos['nombre'];
                        $um=$productos['unidad_medida'];


                        $precio   =    $productos['precio'];
                        $precio2  =    number_format($precio, 2,".",",");  
                        $cant_aprobada=$productos['SUM(cantidad_solicitada)'];
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
                       <td  data-label="Descripción"><?php echo $productos['nombre'] ?></td>
                       <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
                       <td  data-label="Cantidad"><?php echo $stock ?></td>
                       <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
                       <td  data-label="Costo unitario"><?php echo $precio2 ?></td>
                       <td  data-label="total"><?php echo $total1 ?></td>
                   </tr>

                   <?php 
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
                    <div style="position: initial;" class="btn-group my-3 mx-2" role="group" aria-label="Basic outlined example">

                        <form method="POST" action="../../Plugin/Imprimir/Almacen/almacen.php" target="_blank">
                            <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">

                            <input type="hidden" name="cod" value="<?php echo $codigo ?>">

                            <textarea style="display: none;" name="jus" ><?php echo $jus ?></textarea>

                            <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                                </svg>

                            </button>
                        </form>
                        <form method="GET" action="../../Plugin/PDF/Almacen/pdf_almacen.php" target="_blank" class="">
                            <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">


                            <button style="position: initial;" type="submit" class="btn btn-outline-primary" >
                                <svg class="bi" width="20" height="20" fill="currentColor">
                                    <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                                </svg>

                            </button>
                        </form>
                        <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php" class="">
                            <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codAlmacen']?>" name="almacen">

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
                            <input type="hidden" readonly class="form-control"  value="<?php echo $productos1['codAlmacen']?>" name="bodega">
                        </form>
                    <?php } ?>
                    <form class="" style="" method="POST" action="" style="margin: 0px;" >
                        <input type="hidden" name="cod" value="<?php echo $productos1["codAlmacen"] ?>">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" style="font-size: 13.5px;" data-target="#new">➕</button>
                    </form>
                </div>
                <hr>
                <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
                <p align="right"><b style="float: left;">Cantidad Despachada: </b><?php echo $final5 ?></p>

                <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
                <p align="right"><b style="float: left;">SubTotal</b><?php echo $final1?></p>

                <button class="btn btn-success as">Solicitudes Almacen</button>
            </div>

        </div>

    </div>

</div>



<?php } ?>
</section>
<?php if(isset($_POST['submit'])){


    $cod_vale = $_POST['bodega'];
    
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen = $cod_vale";
    $result = mysqli_query($conn, $sql);
    while ($productos1 = mysqli_fetch_array($result)){
        echo'   
        <style type="text/css">.section{display: none;}</style>
        <section id="section">

        <form method="POST" action="../../Controller/Almacen/añadir_almacen_copy.php">
        <div class="card">
        <div class="card-body">
        <div class="row">

        <div class="col-md-3" style="position: initial">

        <label style="font-weight: bold;">Depto. o Servicio:</label>
        <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="codAlmacen">
        <p>' .$productos1['departamento']. '</p>
        </div>

        <div class="col-md-3" style="position: initial">
        <label style="font-weight: bold;">N° de Solicitud.</label>
        <input readonly class="form-control"  type="hidden" value="' .$productos1['codAlmacen']. '" name="num_sol">
        <p>' .$productos1['codAlmacen']. '</p>
        </div>

        <div class="col-md-3" style="position: initial">
        <label style="font-weight: bold;">Encargado:</label>
        <input readonly class="form-control"  type="hidden" value="' .$productos1['encargado']. '" name="usuario">
        <p>' .$productos1['encargado']. '</p>
        </div>     
        <div class="col-md-3" style="position: initial">
        <label style="font-weight: bold;">Fecha:</label>
        <input readonly class="form-control"  type="hidden" value="'.$productos1['fecha_solicitud']. '" name="fech">
        <p>' .date("d-m-Y",strtotime($productos1['fecha_solicitud'])).  '</p>
        </div>';?>

    </div>
</div>
</div>


<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['departamento']?>" name="depto">
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['codAlmacen']?>" name="vale">
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['encargado']?>" name="usuario">
<input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['fecha_solicitud']?>">
</div>
</div>
</div>

<br>
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <table class="table" id="example1">

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

                 $num_vale = $productos1['codAlmacen'];

                 $sql = "SELECT codigoalmacen, codigo,cantidad_solicitada,cantidad_despachada,precio,nombre,unidad_medida FROM `detalle_almacen` D JOIN `tb_almacen` V ON D.tb_almacen=V.codAlmacen WHERE tb_almacen = $num_vale ";
                 $result = mysqli_query($conn, $sql);
                 while ($productos = mysqli_fetch_array($result)){

                  $total = $productos['cantidad_solicitada'] * $productos['precio'];
                  $final += $total;
                  $codigo=$productos['codigo'];
                  $nombre=$productos['nombre'];
                  $um=$productos['unidad_medida'];
                  $precio=$productos['precio'];
                  $precio1=number_format($precio, 2,".",",");
                  $total1= number_format($total, 2, ".",",");
                  $final1=number_format($final, 2, ".",",");
                  $cantidad=$productos['cantidad_solicitada'];
                  $stock=number_format($cantidad, 2, ".",",");

                  $final2 += $stock;
                  $final3   =    number_format($final2, 2, ".",",");

                  $final8 += $precio;
                  $final9   =    number_format($final8, 2, ".",",");
                  ?>
                  <style type="text/css"> #td{display: none;} </style> 

                  <tr>
                    <td  data-label="Código"><?php echo $codigo ?>
                    <input type="hidden" name="cod1[]" readonly value="<?php echo $productos['codigoalmacen'] ?>">
                    <input type="hidden"  name="cod[]" readonly value="<?php echo $codigo ?>">
                    <input type="hidden"  name="tb_almacen" readonly value="<?php echo $num_vale ?>">
                    <input type="hidden" style="width: 100%; background:transparent; border: none; text-align: left; height: 100%;"  name="desc[]" readonly value="<?php echo $nombre ?>">
                    <input type="hidden" name="um[]" readonly value="<?php echo $um ?>">
                    <input type="hidden" type="decimal" step="0.01" id="stock"  name="cant[]" readonly value="<?php echo $stock ?>">
                    <input type="hidden"  name="cost[]" step="0.01"  readonly value="<?php echo $precio1 ?>">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                    <input type="hidden" name="año" id="dia">
                    <input type="hidden" name="mes" id="mes">
                    <input type="hidden" name="año" id="ano">
                </td>
                <td  data-label="Descripción"><?php echo $nombre ?></td>
                <td  data-label="Unidada de Medida"><?php echo $um ?></td>
                <td  data-label="Cantidad"><?php echo $stock ?></td>
                <td  data-label="Cantidad"><input style="background:transparent; border: 1px solid #000;  width: 100%; text-align: center" class="form-control"  required type="number" step="0.01" min="0.00" max="<?php echo $stock ?>"  name="cantidad_despachada[]"  value="" id="c_desp"></td>
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
          <a class="btn btn-outline-primary mb-3" type="hidden" onclick="return confirmaion2()" href="../../Controller/Vale/añadir_vale_copy.php?vale=<?php echo $productos1['codAlmacen']?>&estado=Rechazado">Rechazar Producto</a> 

          <p align="right"><b style="float: left;">Cantidad Solicitada: </b><?php echo $final3 ?></p>
          <p align="right"><b style="float: left;">Total del Precio: </b><?php echo $final9 ?></p>
          <p align="right" class="my-4"><b style="float: left;">SubTotal: </b><?php echo $final1?></p>
          
          <button id="buscar1" type="submit" class="btn btn-lg btn-success es" style="width: 49%;float: left; margin-right: 1%;font-size: 1.4em; text-align: center;" name="detalle_almacen">Guardar

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
<section id="section1">
    <form style="background: transparent;" method="POST" action="../../Controller/Almacen/almacen.php">
        <div class="card">
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4" style="position: initial">
                    <label id="inp1"><b>Departamento que solicita</b></label>   
                    <div class="div d" > 
                        Mantenimiento
                    </div>   
                </div>
                <div class="col-md-4" style="position: initial">
                    <label id="inp1"><b>Vale N°</b></label>   
                    <input id="busq"class="form-control" readonly  type="number" name="nsolicitud" value="<?php echo $cod ?>" required >
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
            window.location.href="solicitudes_almacen.php";
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
        $('#example1').DataTable({
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