<?php
session_start();
if (!isset($_SESSION['signin']) && !isset($_SESSION['habilitado'] ) ) {
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
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Plugin/bootstap-icon/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
    <title>Inicio</title>
</head>
<body>
    <style type="text/css">

        h1{
            color: rgba(555, 555, 555, 1);
            margin: 5% 5% 0% 5%;
            max-height: 100%;
            transition: 5s;
            border-radius: 5px;
            text-shadow: 1px 1px 5px black;
            }

          @media screen and (max-width: 952px){

       #h1{ 
            margin-top: 25%;
            font-size: 1em;
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

    <br><br><br><br>
    <center>
    <h1 id="h1">Bienvenidos al Sistema de Inventario del<br>Hospital de Zacatecoluca</h1>
    </center>


  <script src="Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="Plugin/bootstrap/js/datatables.min.js"></script>
    <script src="Plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
      
  </body>
</html>