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

     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  

    <title>Productos</title>
</head>
<body>

         <style>  
            #div{
                margin: 0%;
                display: none;
            }
                .div{
        display: none;

  }
         section {
            background: whitesmoke;
            padding: 1%;
            border-radius: 15px;
    margin-top: 0.5%;
    margin-right: 2%;
    margin-left: 2%;
  }
            #buscar{
            margin-bottom: 5%;
            margin-left: 2.5%;
            margin-top: 0.5%; 
            background: rgb(5, 65, 114); 
            color: #fff; margin-bottom: 2%; 
            border: rgb(5, 65, 114);
            }
            #buscar:hover{
            background: rgb(9, 100, 175);
            } 
            #buscar:active{
            transform: translateY(5px);
            } 
            .a{
                width: 25%;
            }
            @media (max-width: 952px){
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
          <font color="white"> <h1 style=" text-align: center;margin-top: 2%">Solicitud de Compra</h1> </font>
<section>
<?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?>
     <form style="background: transparent;" method='POST' action="form_compra2.php">

<?php include ('../../Buscador_ajax/Consultas/Consulta1.php') ?>
</form>
</section>
</body>
</html>