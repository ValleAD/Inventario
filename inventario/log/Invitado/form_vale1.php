<?php require '../../Model/conexion.php';$tipo_usuario=0;
include ('menu.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Productos</title>
</head>

<body>

         <style>  
            #div{
                margin: 0;
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
  #vale{display: none;}
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
#vale{display: block;}

   section{
        margin: -5%6%6%3%;
        padding: 2%;
        width: 95%;
    }
    #form{
        margin: -15%6%6%7%;
        padding: 2%;
    }
    h1{
        margin-top: -15%;
        padding-bottom: 5%;
    }
    #div{
        margin: 2%;
        margin-bottom: 5%;
    }

  }
        </style>
        <br><br><br>       
<section>
        <?php include ('../../Buscador_ajax/Cabezeras/cabezera.php') ?>
<center><h1 style="margin-top:5px">Solicitudes Vale</h1></center><br>
<form name="f1" id="frm-example" style="background: transparent;" method='POST' action="form_vale2.php">

<?php include ('../../Buscador_ajax/Consultas/Consulta1.php') ?>

</form>
</section>
</body>
</html>