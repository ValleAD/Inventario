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
    <style type="text/css">
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 10%;
        width: 80%;
    }

    
    </style>
<?php

$total = 0;
$final = 0;

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_vale ORDER BY fecha_registro DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

 echo'   
<section id="section" style="margin:2%">
<form method="POST" action="Exportar_PDF/pdf_vale.php" target="_blank">
         

        <div class=" container">
            
        
        <div class="row">
      

           <table class="table" style="width; 100%;margin-bottom: 3%;">
            <h1 class="text-center mg-t" style="margin-top: -0.5%;">Detalles De la Compra</h1>
          <thead>
              <tr id="tr">
            <td style="width:100%"><strong>Código</strong></td>
            <td style="width:100%"><strong>Catalogo</strong></td>
            <td style="width:100%"><strong>Descripción</strong></td>
            <td style="width:100%"><strong>U/M</strong></td>
            <td style="width:100%"><strong>Cantidad</strong></td>
            <th style="width: 30%;">Cantidad depachada</th>
            <td style="width:100%"><strong>Costo unitario</strong></td>
            <td style="width:100%"><strong>solicitud compra</strong></td>
            <td style="width:100%"><strong>Total</strong></td>
               
            </tr>
            <tr>
                  <td id="td" colspan="9">
                    <h4>No se encontraron resultados 😥</h4></td>
            </tr>
            </thead>
            <tbody>     
             <style type="text/css">
     #td{
        display: none;
    }
   
</style>';


}
 $sql = "SELECT * FROM detalle_compra";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
        $total    =    $productos['stock'] * $productos['precio']+$productos['solicitud_compra'];
        $final    +=   $total;
        $precio   =    $productos['precio'];
        $cantidad=$productos['stock'];
        $precio2  =    number_format($precio, 2,".",",");
        $total2   =    number_format($total, 2, ".",",");
        $final2   =    number_format($final, 2, ".",",");
        $stock=number_format($cantidad, 0,",");
  echo'  
      <tr >
        <td data-label="Código"><input  style="background:transparent; border: none; width: 100%;"   name="cod[]" readonly value="' .$productos['codigo']. '"></td>
        <td data-label="Nombre"><input  name="desc[]" readonly value="'.$productos['catalogo']. '"  style="background:transparent; border: none; width: 100%;"  ></td>
        <td data-label="Descripción"><input name="desc[]" readonly value="'.$productos['descripcion']. '"  style="background:transparent; border: none; width: 100%;"  ></td>
        <td data-label="Unidad De Medida"><input  name="um[]" readonly value="'.$productos['unidad_medida']. '"  style="background:transparent; border: none; width: 100%;"  ></td>
        <td data-label="Cantidad"><input  name="cant[]" readonly value="'.$stock. '"  style="background:transparent; border: none;width: 100%;"  ></td>
         <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%; text-align: center" type="text" readonly required  name="cantidad_despachada[]" required value="'.$productos['cantidad_despachada'] .'"></td>
        <td data-label="Costo unitario"><input  name="cost[]" readonly value="$'.$precio2.'"  style="background:transparent; border: none; width: 100%;"  >
        </td>
        <td data-label="solicitud compra"><input name="cost[]" readonly value="$'.$productos['solicitud_compra']. '"  style="background:transparent; border: none; width: 100%;" step="0.01"  ></td>
        <td data-label="Total"><input name="tot[]" readonly value="$'.$total2. '" step="0.01"  style="background:transparent; border: none; width: 100%;" ></td>
      </tr>';

}

      echo'
        <tr>
          
          <td colspan="6"><strong>SubTotal</strong></td> 
          <td colspan="2"><input step="0.01"  name="tot_f" readonly value="$'.$final2.'"  style="background:transparent; border: none; width: 100%; color: rgb(168, 8, 8); font-weight: bold;"></td>
        </tr>
            </tbody>
        </table>
</div>
</div>


    <input id="pdf" type="submit" class="btn" value="Exportar a PDF" name="pdf">
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
?>            
<?php include ('templates/footer.php');?>
  </body>
  </html>


