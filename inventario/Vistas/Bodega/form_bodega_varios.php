<?php
session_start();
if (!isset($_SESSION['signin'])>0) {
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
<?php include ('../../templates/menu1.php')?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
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
        section {
            background: whitesmoke;
            padding: 1%;
            border-radius: 15px;
            margin-top: 0.5%;
            margin-right: 2%;
            margin-left: 2%;
        }

        @media (min-width: 1028px){
         #section{
            margin: 5%6%6%1%;
            width: 97%;
        } 
    }
    @media (max-width: 800px){
        #ver{
            margin-top: 2%;
        }
        #section{
            margin: -10%6%6%1%;
            width: 97%;
        }

        th{
            width: 25%;
        }
        #p{
            margin-top: 5%;
            margin-left: 7%;
        }

    }
</style>
<br><br><br>

<section id="section">
    <!-- <?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?> -->
    <form id="frm-example" style="margin: 0%;position: 0; background: transparent;" method='POST' action="form_bodega_info.php">
     <h1 style=" text-align: center;">Solicitud de Bodega</h1>


     <div id="tabla_resultado">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
        <?php include('../../Buscador_ajax/Consultas/consulta2.php') ?>

    </div> 
</form>
</section>
</body>
</html>