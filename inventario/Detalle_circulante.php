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
                <style>  
         section{
            margin: 1%;
            padding: 1%;
            background: whitesmoke;
            border-radius: 15px;
            }
            form{
                background: transparent;
                margin: 0%;
            }
            #wew{
                margin:1%;
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
        width: 97%;
    }
    #inp1{
        margin-top: 5%;
    }#buscar{
        width: 100%;
        margin: auto;
    }#buscar1{
        width: 100%;
        margin: auto;
    }
    #lo-que-vamos-a-copiar{
        width: 100%;
    }
    #Registro{
        width: 100%;
        margin: 0%;
    }
    #btn-agregar{
        width: 100%;
        margin-top: -7%;
        margin-left: 10%;
    }
    #wew{
        margin: 4%;
    }
  }
        </style>
        <br><br><br>
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
<section >
<form method="POST" action="" >
         
      
        <div class="row">  

          <div class="col-md-4" style="position: initial">
            <label style="font-weight: bold;">N?? de Solicitud:</label>
            <input readonly class="form-control"  type="text" value="' .$datos_sol['codCirculante']. '" name="num_sol">
          </div>

          <div class="col-md-4" style="position: initial">
            <label style="font-weight: bold;">Fecha:</label>
              <input readonly class="form-control"  type="text" value="' .($datos_sol['fecha_solicitud']). '" name="fech">
          </div>';?>
           <!-- <div class="col-8 col-sm-4" style="position: initial">
            <label style="font-weight: bold;">Estado:</label>
              <input <?php
                if($datos_sol['estado']=='Pendiente') {
                    echo ' style="background-color:green ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="background-color:red ;width:100%; border-radius:5px;text-align:center; color: white;"';
                }
            ?> class="form-control" type="text" name="estado" readonly value="<?php echo $datos_sol['estado'] ?>"><br>
            <?php if($tipo_usuario==1){ ?>
               <button type="submit" name="submit" <?php
                if($datos_sol['estado']=='Aprobado') {
                     echo ' style="display:none"';
                }else if($datos_sol['estado']=='Rechazado') {
                     echo ' style="display:none"';
                }
            ?> style="float: right;" class="btn btn-danger" name="estado" href="dt_compra_copy.php"> Cambiar estado</button><?php } ?>
          </div> -->
        </div>
      
        <br>
    </form>
           <form method="POST" style="margin-top: -3.5%" action="Plugin/pdf_circulante.php" target="_blank">
<table class="table">
                        <div style="position: initial;" style="position: initial;" class="btn-group mb-3 my-3 mx-2" role="group" aria-label="Basic outlined example">
            <form style="position: initial;" method="POST" action="Plugin/pdf_circulante.php">
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['codCirculante']?>" name="num_sol">
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['fecha_solicitud']?>" name="fech">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="Fecha">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#file-pdf-fill"/>
                </svg>
                </button>
            </form>
            <form method="POST" action="Plugin/Circulante.php">
                               <?php 
$num_circulante = $datos_sol['codCirculante'];

 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;
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
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");?>
        <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
            <?php } ?>
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['codCirculante']?>" name="num_sol">
            <input type="hidden" readonly class="form-control" value="<?php echo $datos_sol['fecha_solicitud']?>" name="fech">
                <button style="position: initial;" type="submit" class="btn btn-outline-primary" name="pdf">
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="Plugin/bootstrap-icons-1.8.1/bootstrap-icons.svg#printer"/>
                </svg>
                </button>
            </form>

</div>
            <thead>
              <tr id="tr">
                <th>#</th>
                <th>Codigo</th>
                <th style="width: 35%;">Descripci??n del Art??culo</th>
                <th>Unidad de Medida</th>
                <th>Cantidad Solicitada</th>
                <th>Cantidad Despachada</th>
                <th>Costo unitario</th>
                <th>Total</th>
              </tr>
                
           </thead>
       </table>
       <div id="div" style = " max-height: 442px; overflow-y:scroll;"> 
        <table class="table">
            <tbody><tr id="td" ><td colspan="6"><h4 style="text-align: center;">No se encontraron resultados ????</h4></td></tr>
                <?php 
$num_circulante = $datos_sol['codCirculante'];
}
 $sql = "SELECT * FROM detalle_circulante WHERE tb_circulante = $num_circulante";
    $result = mysqli_query($conn, $sql);
    $n=0;
while ($productos = mysqli_fetch_array($result)){
      $n++;
        $r=$n+0;

        $precio   =    $productos['precio'];
        $codigo   =    $productos['codigo'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $cant_aprobada=$productos['stock'];
        $cantidad_despachada=$productos['cantidad_despachada'];
        $stock=number_format($cant_aprobada, 2,".",",");
        $cantidad_desp=number_format($cantidad_despachada, 2,".",",");?>
    <style type="text/css">
     #td{
        display: none;
        text-align:center;
    }
    
   
</style> 
      <tr>
      <td data-label="#"><?php echo $r ?> </td>
       <td  data-label="C??digo"><?php echo $codigo ?>
           <input type="hidden" name="cod[]" value="<?php echo $codigo ?>">
            <input type="hidden" name="desc[]" value="<?php echo $productos['descripcion'] ?>">
            <input type="hidden" name="um[]" value="<?php echo $productos['unidad_medida']?>">
            <input type="hidden" name="cant[]" value="<?php echo $stock ?>">
            <input type="hidden" name="cantidad_despachada[]"  value="<?php echo $cantidad_desp ?>">
            <input type="hidden" name="cost[]" value="$<?php echo $precio2 ?>">
            <input type="hidden" name="tot[]" value="$<?php echo $total2 ?>">
            <input type="hidden" name="tot_f" value="$<?php echo $final2 ?>" >
       </td>
        <td style="width: 35%;min-width: 100%;"  data-label="Descripci??n del Art??culo"><?php echo $productos['descripcion'] ?></td>

        <td  data-label="Unidada de Medida"><?php echo $productos['unidad_medida'] ?></td>
        <td  data-label="Cantidad Solicitada"><?php echo $stock ?></td>
        <td  data-label="Cantidad"><?php echo $cantidad_desp ?></td>
         <td data-label="Costo unitario"><?php echo $precio2 ?></td>
        <td  data-label="Total"><?php echo $total2 ?></td>
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
        </tbody>
    </table>
  </form>
</section>
<?php
}
?>            
  </body>
  </html>


