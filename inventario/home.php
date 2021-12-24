<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
    # code...
    echo '
    <script>
        alert("Por favor debes de iniciar sesión");
        window.location ="log/signin.php";
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
    <style type="text/css">
        h2{
                margin-top: 14.2%;
                max-height: 100%;
            }
          @media (max-width: 952px){
    
       #h1{
                
                font-size: 2em;
            }
            nav{
                max-width: 100%;
            }
            h2{
                margin-top: 44%;
            }
        }
    </style>
    
      <center> <h1 id="h1" style="margin-top: 13%">Bienvenidos al Sistema de Inventario del
       <br> 
      Hospital Nacional Santa Teresa de Zacatecoluca</h1></center>
      
<h2></h2>
<?php include('footer.php') ?>      
</body>
</html>