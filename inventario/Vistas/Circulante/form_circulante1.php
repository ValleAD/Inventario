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
            #div{
                margin: 0%;
                display: none;
            }
                .div{
        display: none;

  }
         #section {
            background: whitesmoke;
            padding: 1%;
            border-radius: 15px;

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
          <h1 style=" text-align: center;margin-top: 2%">Solicitud de Circulante</h1>
<?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?>

     <form id="frm-example" style="background: transparent;" method='POST' action="form_circulante2.php">
         <button style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class=" div btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button><br class="div"><br class="div">

<?php include ('../../Buscador_ajax/Consultas/Consulta1.php') ?>
</form>
</section>

</body>
</html>