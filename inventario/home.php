<?php
session_start();
if (!isset($_SESSION['signin']) && !isset($_SESSION['habilitado'] ) ) {
    # code...
    echo '
    <script>
       window.location ="../../log/signin.php";
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
            h1:hover{
                font-size: 2.7rem;
            }

          @media screen and (max-width: 952px){

       #h1{ 
            margin-top: 5%;
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

    <br><br><br><br>
    <center>
        <img src="img/log.png" width="200x200">
    <h1 id="h1">Bienvenidos al Sistema de Inventario del
      <br>Hospital de Zacatecoluca</h1>
    </center>


     
      
  </body>
</html>