<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        window.location ="signin.php";
        session_destroy();  
                </script>
die();

    ';
}
    
?>
<?php include ('menu.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>

 

<?php
    
    if ( isset($_POST["cod"]) ) { 

      $fecha =$_POST['fech'];
      $Depto =$_POST['depto'];

      $final = 0;

      echo 
      '
<form  style="position: all; width: 70%; height: 100%;margin-bottom: 5%;margin-top: -40%;">
         
      <section>
        <div class="row">
          <div class="col-6">
        
              <label style="font-weight: bold;">Fecha:</label>
              <input class="form-control"  type="text" value="' .$fecha. '">
      
          </div>
          <div class="col">
        
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input class="form-control"  type="text" value="' .$Depto. '">
    
          </div>
        </div>
      
        <br>
        <br>
        <div class="table-responsive">
        <table class="table">
          <tr>
            <td><strong>Código</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>U/M</strong></td>
            <td><strong>Cantidad</strong></td>
            <td><strong>Costo unitario</strong></td>
            <td><strong>Total</strong></td>
          </tr>';

      for($i = 0; $i < count($_POST['cod']); $i++)
    {
       
        $codigo = $_POST['cod'][$i];
        $des = $_POST['desc'][$i];
        $um = $_POST['um'][$i];
        $cantidad = $_POST['cant'][$i];
        $cost = $_POST['cu'][$i];

        $total[$i] = $cost * $cantidad;
        $final = $final + $total[$i];
      
      
  echo'  
      <tr >
        <td>' .$codigo. '</td>
        <td>' .$des. '</td>
        <td>' .$um. '</td>
        <td>' .$cantidad. '</td>
        <td>$' .$cost. '</td>
        <td>$' .$total[$i]. '</td>
      </tr>'; 
}
      echo'
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><strong>Total</strong></td>
          <td>$ '.$final.'</td>
        </tr>
      </table>   
    </section>
</form>
      ';
  }
?>            
<?php include ('footer.php');?>
  </body>
  </html>


