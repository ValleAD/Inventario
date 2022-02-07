<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
         window.location ="../log/signin.php";
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
    <title>Solicitudes Bodega</title>
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

if(isset($_POST['detalle'])){

    $total = 0;
    $final = 0;

    $odt = $_POST['id'];
    
       include 'Model/conexion.php';
        $sql = "SELECT * FROM tb_bodega WHERE codBodega = $odt";
        $result = mysqli_query($conn, $sql);
     while ($productos1 = mysqli_fetch_array($result)){
    
     echo'   
    <section id="section">
    <form method="POST" action="Exportar_PDF/pdf_bodega.php" target="_blank">
             
          
            <div class="row">
          
              <div class="col-6 col-sm-3" style="position: initial">
          
                  <label style="font-weight: bold;">Depto. o Servicio:</label>
                  <input readonly class="form-control"  type="text" value="' .$productos1['departamento']. '" name="depto">
    
              </div>
    
              <div class="col-6 col-sm-3" style="position: initial">
                <label style="font-weight: bold;">O. de T. No.</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['codBodega']. '" name="odt">
              </div>
    
            <div class="col-6 col-sm-3" style="position: initial">
                <label style="font-weight: bold;">Encargado:</label>
                <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
            </div>
    
              
              <div class="col-6 col-sm-3" style="position: initial">
                <label style="font-weight: bold;">Fecha:</label>
                  <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
              </div>
            </div>
          
            <br>
              
            <table class="table" style="margin-bottom:3%">
                
                <thead>
                  <tr id="tr">
                    <th ">Código</th>
                    <th ">Descripción</th>
                    <th ">Unidad de Medida</th>
                    <th ">Cantidad</th>
                    <th ">Costo <br> unitario</th>
                    <th style="text-align:center;">Estado</th>';
                     if($tipo_usuario == 1) { ?>
                    <th style="text-align:center;width:8%">Editar</th>
                      <?php } ?>   
                    <th style="width: 6%;">Total</th>
                  </tr>
                    <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
               </thead>
                <tbody>
                    <?php 
    
    $odt = $productos1['codBodega'];
    }
     $sql = "SELECT * FROM detalle_bodega WHERE odt_bodega = $odt";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
      $codigo=$productos['codigo'];
      $descripcion=$productos['descripcion'];
      $um=$productos['unidad_medida'];
      $stock=$productos['stock'];
      $precio=$productos['precio'];
      $estado=$productos['estado'];
      $fecha=$productos['fecha_registro'];
      ?>
       <style type="text/css"> #td{display: none;} </style> 

      <tr>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="<?php echo $codigo ?>"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none"><?php echo $descripcion ?></textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="<?php echo $um ?>"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="<?php echo $stock ?>"></td>
        
        <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" readonly value="$<?php echo $precio ?>"></td>
    <td align="center">
            <input  <?php
                if($estado=='Pendiente') {
                    echo ' style="background-color:green ;width:61%; border-radius:100px;text-align:center; color: white;"';
                }else if($estado=='Aprobado') {
                     echo ' style="background-color:blueviolet ;width:60%; border-radius:100px;text-align:center; color: white;"';
                }else if($estado=='Rechazado') {
                     echo ' style="background-color:red ;width:65%; border-radius:100px;text-align:center; color: white;"';
                }
            ?>
 type="text" class="btn"  name="estado[]" style="width:100%;border:none; background: transparent; text-align: center;"  value="<?=   $productos['estado']; ?>">
  <?php if($tipo_usuario == 1) { ?>
 <td align="center" ><a class="btn btn-info" href="cambiar_estado_bodeda.php?id=<?php  echo $productos['odt_bodega']; ?>">Editar</a></td><?php } ?>

        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="<?php echo $total ?>"></td>
      </tr>



  <?php } }?> 

   <?php if($tipo_usuario == 1) { ?> 
        <th colspan="7">SubTotal</th>
        <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="<?php echo $final ?>" ></td></tr>
      <?php } ?>

     <?php if($tipo_usuario == 2) { ?>
      <th colspan="6">SubTotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="<?php echo $final ?>" ></td></tr> 
      <?php } ?>

      <?php if($tipo_usuario == 1) { ?>
        <p><b>Nota Importante: </b>Cuando Actualizen el Estado se van a Actualizar todos los registros que se muestran en esta tabla </p>
        <?php } ?>

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
      
       
  </body>
  </html>