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
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Inicio</title>
</head>
<body>
    <style type="text/css">
        body{
            height: 100%;
        }
        h2{
                margin-top: 14.2%;
                max-height: 100%;
            }
          @media screen and (max-width: 952px){
    form{
        width: 100%;
    }
       #h1{
                
                font-size: 2em;
                padding: 3%;
            }
            nav{
                max-width: 100%;
            }
           
          };
        body{
            max-height: 100%;
        }
    </style>
    
      <center> <h1 id="h1" style="margin-top: 10.1%">Bienvenidos al Sistema de Inventario del
       <br> 
      Hospital Nacional Santa Teresa de Zacatecoluca</h1></center>
      
     
</body>
</html>