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

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 


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
} 

.a{
    width: 25%;
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
    <center><h1 style="margin-top:5px">Solicitudes Vale</h1></center><br>
    <form name="f1" id="frm-example" style="background: transparent;" method='POST' action="form_vale2.php">

               <div id="tabla_resultado">
            <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
 <?php include('../../Buscador_ajax/Consultas/consulta2.php') ?>

        </div> 

    </form>
</section>


</body>
</html>
