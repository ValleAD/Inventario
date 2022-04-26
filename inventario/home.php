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
    <br>
    <br>
    <br>
    <br>

    <font color="white"><center>
        <h1 id="h1" style="margin-top: 10.1%;">Bienvenidos al Sistema de Inventario del 
            <br>
            Hospital de zacatecoluca
        </h1>
    </center></font>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      </script>
      
      
  </body>
</html>