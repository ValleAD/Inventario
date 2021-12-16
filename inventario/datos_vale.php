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
    <link rel="stylesheet" type="text/css" href="styles/estilo.css" > 
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="Plugin/assets/css/bootstrap-theme.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Vale</title>
</head>
<body>

<?php
    
    include 'Model/conexion.php';
    $sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";
    $result = mysqli_query($conn, $sql);

    if ( isset($_POST["cod"]) ) { 

      $Depto =$_POST['depto'];

      $final = 0;

      echo 
      '
<section>
<form method="POST" action="pdf_vale.php">
         
      <section>
        <div class="row">
      
          <div class="col-6 col-sm-3" style="position: initial">
        
              <label style="font-weight: bold;">Depto. o Servicio:</label>
              <input readonly class="form-control"  type="text" value="' .$Depto. '">
    
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
        <td><input value="' .$codigo. '" style="width: 120px; border: none"></td>
        <td><input value="'.$des. '" style="border: none"></td>
        <td><input value="'.$um. '" style="width: 60px; border: none"></td>
        <td><input value="'.$cantidad. '" style="width: 60px; border: none"></td>
        <td><input value="$'.$cost. '" style="width: 90px; border: none"></td>
        <td><input value="$'.$total[$i]. '" style="width: 90px; border: none"></td>
      </tr>'; 
}
      echo'
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><strong>Total</strong></td> 
          <td><input value="$'.$final.'" style="width: 90px; border: none"></td>
        </tr>
      </table>   
    <input type="submit" value="Exportar a PDF" name="pdf">
    </section>
</form>
</section>
      ';
  }
?>            
<?php include ('footer.php');?>
  </body>
  </html>


