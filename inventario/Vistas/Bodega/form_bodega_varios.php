<?php
session_start();
 if (!isset($_SESSION['signin'])>0) {
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
<?php include ('../../templates/menu1.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/estilos_tablas.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  

    <title>Solicitud Bodega</title>
</head>
<body>
<style>
    #div{
        display: none;
    }
    .div{
        display: none;

  }
        #ver{
            margin-top: 2%;
            margin-right: 1%; 
            background: rgb(5, 65, 114); 
            color: #fff; 
            margin-bottom: 0.5%;  
            border: rgb(5, 65, 114);
        }
        #ver:hover{
            background: rgb(9, 100, 175);
        } 
        #ver:active{
        transform: translateY(5px);
        } 
         #act {
            background: whitesmoke;
            padding: 1%;
            border-radius: 15px;
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
   @media (max-width: 800px){
   section{
        margin: 5%6%6%3%;
        padding: 2%;
        width: 95%;
    }
    #form{
        margin: -1%6%6%7%;
        padding: 2%;
    }
    h1{
        margin-top: -9%;
    }
    #div{
        margin: 0%;
        display: none;
    }
        .div{
        display: block;

  }
   }
    </style>
<br><br><br>
           <h1 style="color: white; text-align: center;margin-top: 2%">Solicitud de Bodega</h1>

<section id="act">
    <?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?>
     <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="form_bodega_info.php">

    
 <?php include ('../../Buscador_ajax/Consultas/Consulta1.php') ?>
</form>
</section>
</body>
</html>