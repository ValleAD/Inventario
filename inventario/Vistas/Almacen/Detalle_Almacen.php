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
    <title>Solicitudes Almacén</title>
</head>
<body>
<body>
        <style>  
         section{
            margin: 1%;
            padding: 1%;
            background: whitesmoke;
            border-radius: 15px;
            }
            form{
                background: transparent;
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
        margin: -15%6%6%2%;
        width: 96%;
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
if(isset($_POST['submit'])){

    $a=$_POST['num_sol'];

   
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$a' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos_sol = mysqli_fetch_array($result)){

 echo'   

    <section >
<form  method="POST" action="../../Controller/Almacen/añadir_almacen_copy.php" >
         
      <div class="card">
            <div class="card-body">
        <div class="row">  

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="hidden" value="' .$datos_sol['codAlmacen']. '" name="num_sol">
            <p>'.$datos_sol['codAlmacen'].'</p>
          </div>

          <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
            <p>'.$datos_sol['codAlmacen'].'</p>
          </div>

        
        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <p>'.$datos_sol['codAlmacen'].'</p>
        </div>

          
          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
            <p>' .date("d-m-Y",strtotime($datos_sol['fecha_solicitud'])). '</p>
          </div>';?>
          
      </div></div></div>
        <br>

<div class="row">

    <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body">
       <table class="table " id="exam" style=" width: 100%;">
            
        <thead>
              <tr id="tr">
                <th style="width: 10%;">#</th>
                <th style="width: 40%;">Código</th>
                <th style="width: 50%;">Descripción</th>
                <th style="width: 40%;">U/M</th>
                <th style="width: 40%;">Cantidad Soli.</th>
                <th style="width: 40%;">Cantidad Despa.</th>
                <th style="width: 40%;">Precio</th>
                <th style="width: 40%;">Total</th>
              </tr>
                
           </thead>
            <tbody>
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
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp= number_format($cant_aprobada, 2,".",",");
        

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
            <input type="hidden" name="cod1[]" value="<?php echo $productos['codigoalmacen']?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['nombre'] ?>"></td>
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>"></td>

        <td  data-label="Nombre del Artículo"><?php echo $productos['nombre'] ?></td>
        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>

        <td  data-label="Cantidad Despachada"><input type="number" step="0.01" min="0.00" max="<?php echo $cantidad_desp ?>"  class="form-control" style="background:transparent; border: 1 solid #000;  width: 100%; text-align: center" name="cantidad_despachada[]" required ></td>

        <td  data-label="Costo Unitario"><?php echo $precio2 ?></td>

        <td  data-label="total"><?php echo $total2 ?></td>
      </tr>
        
  <?php }?>

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
  <label style="font-weight: bold;">Estado:</label><br>* Requerido para este Formulario.
            <input  id="input" type="radio" name="estado" value="Aprobado" required> <label class="btn btn-outline-primary" id="label1" for="input" > Aprobar Producto</label><br>No Requerido para este Formulario.
               <a class="btn btn-outline-primary" type="hidden" onclick="return confirmaion2()"href="../../Controller/Almacen/añadir_almacen_copy.php?almacen=<?php echo $datos_sol['codAlmacen']?>&estado1=Rechazado">Rechazar Producto</a> 
                    </div>
                    <div class="col-md-12">
                        <label style="font-weight: bold;">Sub Total:</label>
                  <p style="float: right;"><?php echo $final2?></p>
              </div><br>



    <button id="buscar1" type="submit" class="btn btn-lg my-1 btn-success" name="detalle_almacen">Guardar Estado
        <svg class="bi" width="20" height="20" fill="currentColor">
        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#save"/>
        </svg>
    </button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
</form>
<?php
    }
}
if(isset($_POST['detalle'])){


$num_sol = $_POST['id'];

   
    $sql = "SELECT * FROM tb_almacen WHERE codAlmacen='$num_sol' ORDER BY fecha_solicitud DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){
    $estado= $productos1['estado'];
     echo'   
<section id="section" >

         
      <div class="card">
            <div class="card-body">
        <div class="row">  

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">N° de Solicitud:</label>
            <input readonly class="form-control"  type="hidden" value="' .$productos1['codAlmacen']. '" name="num_sol">
            <input readonly class="form-control"  type="hidden" value="' .$productos1['encargado']. '" name="encargado">
            <input readonly class="form-control"  type="hidden" value="' .$productos1['departamento']. '" name="depto">
            <input type="hidden" readonly class="form-control"  type="text" value="'.$productos1['estado'].'" name="estado">
            <input readonly class="form-control"  type="hidden" value="' .date("d-m-Y",strtotime($productos1['fecha_solicitud'])). '" name="fech">
            <p>'.$productos1['codAlmacen'].'</p>
          </div>

          <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Depto. o Servicio:</label>
            <p>'.$productos1['departamento'].'</p>
          </div>

        
        <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Encargado:</label>
            <p>'.$productos1['encargado'].'</p>
        </div>

          
<div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <div style="position:initial;" class="input-group mb-3">';?>
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
            ?> class="form-control" type="text" name="estado" readonly value="<?php echo $productos1['estado'] ?>">
          </div>
            </div>
         </div>
        </div>
      
        <br>
 <div class="row">

    <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body">

                
        <table class="table table-striped" id="exam">
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th>Descripción Completa</th>
                <th>Unidad de Medida</th>
                <th>Cantidad solicitada</th>
                <th >Cantidad Depachada</th>

                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
           </thead>
            <tbody>
                <?php 

$num_almacen = $productos1['codAlmacen'];

 $sql = "SELECT * FROM detalle_almacen WHERE tb_almacen = $num_almacen";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
        if ($estado="Pendiente") {
        
    $total = $productos['cantidad_solicitada'] * $productos['precio'];
    }if ($estado=="Aprobado") {
        
    $total = $productos['cantidad_despachada'] * $productos['precio'];
    }
       $final += $total;
       $total1= number_format($total, 2, ".",",");
      $final1=number_format($final, 2, ".",",");
   $codigo=$productos['codigo'];
     $descripcion=$productos['nombre'];
     $um=$productos['unidad_medida'];
      

        $precio   =    $productos['precio'];
        $precio2  =    number_format($precio, 2,".",",");  
        $cant_aprobada=$productos['cantidad_solicitada'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,",");
        $cantidad_desp=number_format($cantidad_despachada, 2,",");?>
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
       <td  data-label="Código"><?php echo $productos['codigo'] ?></td>
        <td  data-label="Descripción"><?php echo $descripcion ?></td>
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

            <form  method="POST" action="../../Plugin/Imprimir/Almacen/almacen.php" target="_blank">
                
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_solicitud']))?>" name="fech">

    <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" >

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/PDF/Almacen/pdf_almacen.php" target="_blank" class="mx-1">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_solicitud']))?>" name="fech">  
                       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary ">

                        <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                        </svg>
                </button>
            </form>
            <form method="POST" action="../../Plugin/Excel/Detalles_dt/Excel.php">

                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['departamento']?>" name="depto">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['encargado']?>" name="encargado">
                <input type="hidden" readonly class="form-control" value="<?php echo $productos1['estado']?>" name="estado">
                <input type="hidden" readonly class="form-control" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_solicitud']))?>" name="fech">
                       <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $descripcion ?>">
            <input type="hidden" name="um[]" value="<?php echo $um ?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="<?php echo $final1 ?>" >
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="dt_almacen">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-earmark-excel-fill"/>
                </svg>
                </button>
            </form>
                  <?php if($tipo_usuario==1){ ?>
        <form method="POST" action="" style="">
               <button id="buscar1" type="submit" name="submit" <?php
                if($productos1['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($productos1['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger" name="estado" title=" Cambiar Estado">
            <svg class="bi" width="20" height="20" fill="currentColor">
            <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#upload"/>
            </svg>
            </button>
            <input type="hidden" readonly class="form-control"  value="<?php echo $productos1['codAlmacen']?>" name="num_sol">
        </form><?php } ?>
                  </div>
                    <div class="col-md-12"><label style="font-weight: bold;">Sub Total:</label>
                  <p style="float: right;"><?php echo $final1?></p>
              </div>
                          <button class="btn btn-success as">Solicitudes Almacen</button>

                </div>
        
              </div>

          </div>

    </div>
   
        
    
</div>
<?php } } ?>
<script>
       $(document).ready(function () {
        $('.as').click(function() {
            window.location.href="solicitudes_almacen.php";
        });
    $('#exam').DataTable({
dom: 'lrtip',
responsive: true,
autoWidth:false,

            deferRender: true,
            scroller: true,
            scrollY: 400,
            scrollCollapse: true,
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
</script>  
</section>        
  </body>
  </html>