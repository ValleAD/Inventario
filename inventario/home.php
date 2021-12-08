<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
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
    <link rel="stylesheet" type="text/css" href="styles/style.css">
     

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Inicio</title>
</head>
<body>

      <center> <h1 style="margin-top: -31%">Bienvenidos al Sistema de Inventario del
       <br> 
      Hospital Nacional Santa Teresa de Zacatecoluca</h1></center>
<footer style="margin-top:  13%;">

  <div align="center">
  <img src="../img/log_1.png" alt="" width="320px" height="150px">
  </div>

</footer>
          
</body>
</html>