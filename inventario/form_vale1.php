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
if (isset($_POST['miForm'])) {
    echo $_POST['employee'];
}
?>
<?php include ('templates/menu.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/sweetalert2.min.css">
  

    <title>Productos</title>
</head>
<body>

         <style>  
            .btn-group{
                font-size: 12px;
                float: right;
                position: initial;
            }

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
        </style>
        <br><br><br>       
          <font color="white"> <h1 style=" text-align: center;margin-top: 2%;">Solicitud de Vale</h1> </font>
<section>


<?php include ('Buscador_ajax/cabezera.php') ?>

     <form name="f1" style="background: transparent;" method='POST' action="form_vale2.php">
 
 <button onclick = "return Validate()" style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class=" btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button><br class="div">


        <?php include ('Buscador_ajax/Consulta1.php') ?>
</form>
</section>

<script src="Plugin/bootstrap/js/jquery-latest.js"></script>
<script src="Plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
</body>
</html>
