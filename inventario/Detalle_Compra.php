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
<?php include ('templates/menu.php');
      include ('Model/conexion.php') ?>
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
    <title>Detalle de la Compra</title>
</head>


<body>
<?php
if(isset($_POST['detalle'])){

$total = 0;
$final = 0;

$cod_compra = $_POST['id'];

   include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_compra WHERE nSolicitud = $cod_compra";
    $result = mysqli_query($conn, $sql);
 while ($productos1 = mysqli_fetch_array($result)){

 echo'   
<section id="section">
<form method="POST" action="Exportar_PDF/pdf_compra.php" target="_blank">
         
      
        <div class="row">
      
          <div class="col-6 col-sm-3" style="position: initial">
      
              <label style="font-weight: bold;">Solicitud No.</label>
              <input readonly class="form-control"  type="text" value="' .$productos1['nSolicitud']. '" name="sol_compra">

          </div>

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Dependencia Solicitante</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['dependencia']. '" name="dependencia">
          </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Plazo y No. de Entregas</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['plazo']. '" name="plazo">
        </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Unidad Técnica</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['unidad_tecnica']. '" name="unidad">
        </div>

        <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Suministro Solicitado</label>
            <input readonly class="form-control"  type="text" value="' .$productos1['descripcion_solicitud']. '" name="suministro">
        </div>

        <div class="col-6 col-sm-3" style="position: initial">
          <label style="font-weight: bold;">Encargado</label>
          <input readonly class="form-control"  type="text" value="' .$productos1['usuario']. '" name="usuario">
        </div>

          <div class="col-6 col-sm-3" style="position: initial">
            <label style="font-weight: bold;">Fecha</label>
              <input readonly class="form-control"  type="text" value="'.date("d-m-Y",strtotime($productos1['fecha_registro'])). '" name="fech">
          </div>
        </div>
      
        <br>
          
        <table class="table" style="margin-bottom:3%">
            
            <thead>
              <tr id="tr">
                <th>Categoría</th>
                <th>Código</th>
                <th>Cod. Catálogo</th>
                <th style="width: 35%;">Descripción Completa</th>
                <th>U/M</th>
                <th>Cantidad</th>
                <th>Costo Unitario (estimado)</th>
                <th>Monto Total (estimado)</th>
              </tr>
                <td id="td" colspan="8"><h4>No se encontraron resultados 😥</h4></td>
           </thead>
            <tbody>';

$cod_compra = $productos1['nSolicitud'];
}
 $sql = "SELECT * FROM detalle_compra WHERE solicitud_compra = $cod_compra";
    $result = mysqli_query($conn, $sql);
while ($productos = mysqli_fetch_array($result)){
      
      $total = $productos['stock'] * $productos['precio'];
      $final += $total;
  echo' 
    <style type="text/css">
     #td{
        display: none;
    }
    
   
</style> 
      <tr>
      <td  data-label="Categoría"><input style="background:transparent; border: none; width: 100%;"  name="categoria[]" readonly value="' .$productos['categoria']. '"></td>
        <td  data-label="Código"><input style="background:transparent; border: none; width: 100%;"  name="cod[]" readonly value="' .$productos['codigo']. '"></td>
        <td  data-label="Cod. Catálogo"><input style="background:transparent; border: none; width: 100%;"  name="catalogo[]" readonly value="' .$productos['catalogo']. '"></td>
        <td  data-label="Descripción"><textarea style="background:transparent; border: none; width: 100%;"  name="desc[]" readonly style="border: none">'.$productos['descripcion']. '</textarea></td>
        <td  data-label="Unidada de Medida"><input  style="background:transparent; border: none; width: 100%;" name="um[]" readonly value="'.$productos['unidad_medida']. '"></td>
        <td  data-label="Cantidad"><input style="background:transparent; border: none; width: 100%;"  name="cant[]" readonly value="'.$productos['stock']. '"></td>
        <td  data-label="Costo unitario"><input style="background:transparent; border: none; width: 100%;"  name="cost[]" readonly value="$'.$productos['precio']. '"></td>
        <td  data-label="total"><input style="background:transparent; border: none; width: 100%;"  name="tot[]" readonly value="$'.$total. '"></td>
        
      </tr>';

}

    echo'
    <tr>
      <th colspan="7">Subtotal</th>
      <td data-label="Subtotal"><input style="background:transparent; border: none; width: 100%; color: red; font-weight: bold;"  name="tot_f" readonly value="$'.$final.'" ></td></tr>
    </tr>
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
</section>';
}
?>            
</body>
</html>