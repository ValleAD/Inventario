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
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Solicitud de Circulante</title>
</head>
<body>
    <style type="text/css">
        form{
            margin: auto;
        }
              @media (max-width: 952px){
   #section{
        margin-top: 5%;
        margin-left: 15%;
        width: 75%;
        padding: 2%;
    }
    
    </style>
<?php
    
    if ( isset($_POST["cod"]) ) { 

        for($i = 0; $i < count($_POST['cod']); $i++) 
    {
         $cod  = $_POST['cod'][$i];
      $descripcion  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['soli'][$i];
      $costo             = $_POST['costo'][$i];

      $insert = "INSERT INTO tb_circulante(codigo,descripcion, unidad_medida, cantidad_solicitada, costo) VALUES ('$cod','$descripcion','$u_m', '$soli', '$costo')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        </script>
        ";
      }else{
         echo "<script> alert('No se pudo Registrar');
         //location.href = 'form_circulante.php';
        </script>
        ";
      }
    }


      $final = 0;

      echo 
      '
<form id="section"  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: 1%;background: #white;">
    <div class="container-fluid" style="margin:1%" >
        <div align="right">
            <label style="font-weight: bold; margin-right: 20px;">No. de Solicitud</label>
            <div class="col-md-2">
            <input style="background:transparent;" required class="form-control" type="text" value="'.$cod.'" style="margin-right: 10px;margin-bottom: -25%;margin-top: -25%;" required>
            </div>
        </div>
        <br>
        <br>
        <div class="table-responsive container-fluid">
      <table class="table table-bordered">
          <tr>

            <td><strong>Descripción de los materiales</strong></td>
            <td><strong>Unidad de Medida</strong></td>
            <td><strong>Cantidad Solicitada</strong></td>
            <td><strong>Costo Estimado</strong></td>
            <td><strong>Total</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['cod']); $i++)
    {
        $cod = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['soli'][$i];
        $cost = $_POST['costo'][$i];

        $total[$i] = $cost * $cantidad;
        $final = $final + $total[$i];
      
      
  echo'  
      <tr >
        <td>' .$des. '</td>
        <td>' .$um. '</td>
        <td>' .$cantidad. '</td>
        <td>$' .$cost. '</td>
        <td>$' .$total[$i]. '</td>
      </tr>'; 
}
      echo'
        <tr>
          
          <td colspan="4"><strong>Costo estimado a realizar</strong></td>
          <td style="color:red;">$ '.$final.'</td>
        </tr>
      </table>   
   </div></div>
</form>
      ';
  }
?>
  </body>
  </html>


