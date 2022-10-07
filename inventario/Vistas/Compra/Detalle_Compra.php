
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
<?php include ('../../templates/menu1.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle_Compra</title>
   
      <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
    table thead{
    background: linear-gradient(to right, #4A00E0, #8E2DE2); 
    color:white;
    }
    </style>
</head>
<body>
            <style>  
                #div{
                    margin: 0%;
                }
         section{
            margin: 2%;
            padding: 1%;
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
        width: 97%;
    }
    #form{
        margin: -15%6%6%1%;
        padding: 2%;
        width: 97%;
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
        <br><br><br><br>
      <?php 
       if(isset($_POST['detalle'])){


$total = 0;
$final = 0;
$total1 = 0;
$final1 = 0;
$final2= 0;
$cod_compra = $_POST['id'];
$tipo_usuario = $_SESSION['iduser'];
    $sql = "SELECT * FROM tb_compra WHERE nSolicitud = '$cod_compra'";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){
 $solicitud =$productos1['nSolicitud'] ?>

    <div id="form"class=" p-3 mx-3" style="background-color: white; border-radius: 5px;">
     <form  method="POST" action="../../Plugin/PDF/Compra/pdf_compra.php" >
        <div class="row">
            <div class="col-md-3" style="position: initial">
        
                <label style="font-weight: bold;">Solicitud No.</label>
                  <p><?php echo $productos1['nSolicitud'] ?></p>
  
            </div>
  
            <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Dependencia Solicitante</label>
                <p><?php echo $productos1['dependencia']?></p>
            </div>
  
          <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Plazo y No. de Entregas</label>
                <p><?php echo $productos1['plazo']?></p>
          </div>
  
          <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Unidad Técnica</label>
                <p><?php echo $productos1['unidad_tecnica']?></p>
          </div>
  
          <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Suministro Solicitado</label>
                <p><?php echo $productos1['descripcion_solicitud']?> </p>
          </div>

          <div class="col-md-3" style="position: initial">
              <label style="font-weight: bold;">Encargado</label>
                <p><?php echo $productos1['usuario']?></p>
          </div>

          <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Fecha</label>
              <p><?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?></p>
          </div>
 <div class="col-md-3" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
             <div style="position: initial;" class="input-group mb-3">
                 <label class="input-group-text" for="inputGroupSelect01">
                    
                    <?php if($productos1['estado']=='Comprado') { ?>
                        <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#check-circle-fill"/>
                
            <?php } ?>
                 </label>
              <input  <?php if($productos1['estado']=='Comprado') {
              echo ' style="background-color:blueviolet ;position: initial;width:70%; border-radius:5px;text-align:center; color: white;"'; }?> class="form-control" type="text" name="estado" readonly value="<?php echo $productos1['estado'] ?>"><br>

          </div>
            </div>
        </div>
              <input readonly class="form-control" type="hidden" value="<?php echo $productos1['nSolicitud'] ?>" name="sol_compra">
    <table class="table" id="div">
            <div style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
                
            <form method="POST" action="../../Plugin/PDF/Compra/pdf_compra.php">
                     
 <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="sol_compra">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['dependencia']?>" name="dependencia">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['plazo']?>" name="plazo">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['unidad_tecnica']?>" name="unidad">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['descripcion_solicitud']?>" name="suministro">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['estado']?>" name="estado">
                <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">
<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="aprobado">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>

                </button>
            </form>
            <form method="POST" action="../../Plugin/Imprimir/Compra/compra.php" target="_blank">

                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['nSolicitud']?>" name="sol_compra">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['dependencia']?>" name="dependencia">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['plazo']?>" name="plazo">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['unidad_tecnica']?>" name="unidad">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['descripcion_solicitud']?>" name="suministro">
                <input readonly class="form-control"  type="hidden" value="<?php echo $productos1['usuario']?>" name="usuario">
                <input type="hidden" readonly class="form-control"  type="text" value="<?php echo $productos1['estado']?>" name="estado">
                <input readonly class="form-control"  type="hidden" value="<?php echo date("d-m-Y",strtotime($productos1['fecha_registro'])) ?>" name="fech">

                <?php

                $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $solicitud";
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

      $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",".");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",".");
       ?>

        <input type="hidden" name="cod[]" value="<?php echo $productos['codigo'] ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio1 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total1 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final1 ?>" >
        <?php } ?>
           <?php  $sql = "SELECT * FROM tb_compra ORDER BY justificacion DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){ ?>
    <textarea style="display: none;" name="jus" ><?php echo $datos['justificacion'] ?></textarea> <?php } ?>
<button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="../../Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>

            </form>

</div>
            <thead>
              <tr id="tr">
                <th>Código</th>
                <th style="width: 35%;">Descripción</th>
                <th>Unidad de Medida</th>
                <th>Cantidad</th>
                <th >Cantidad Depachada</th>

                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                <td id="td" colspan="7"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
       </table>
<div id="div" style = " max-height: 442px; overflow-y:scroll;"> 
           <table class="table" id="div">
            <tbody>
                <?php 

}
  $total = 0;
  $final = 0;
  $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $solicitud";
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
        $stock=number_format($cant_aprobada, 2,".");
        $cantidad_desp=number_format($cantidad_despachada, 2,".");?>
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
        <td style="width: 35%;;min-width: 100%;"  data-label="Descripción"><?php echo $productos['descripcion'] ?></td>
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
        <td colspan="6"style="text-align: left;font-size: 14px; font-weight: bold;">Subtotal</td>
        <td style="color: red;font-size: 14px; font-weight: bold;"><?php echo $final2 ?></td>
    </tfoot>
    </table>
         <?php 

                       
        $sql = "SELECT * FROM tb_compra WHERE nSolicitud='$solicitud'  ORDER BY justificacion ASC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($datos = mysqli_fetch_array($result)){
 if ($datos['justificacion']=="") {
    $jus = 'Sin observacion por el momento';
        
    }else{
    $jus = $datos['justificacion'];
      }
  ?><br>
    <div class="form-group" style="position: all;border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;">Observaciones (En qué se ocupará el bien entregado)</p>
                <hr style=" border: 1px solid #ccc;border-collapse: collapse;">
                <p style="padding-left: 1%;"><?php echo $jus ?></p>
    <textarea style="display: none;" name="jus" ><?php echo $datos['justificacion'] ?></textarea> 

            </div>
<?php } ?>

     </form>    
    
     <?php } ?>  
          <style>
        #pdf{
        margin-top:2%;
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

</body>
</html>