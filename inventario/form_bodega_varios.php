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
<?php include ('templates/menu.php')?>

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
           <h1 style=" text-align: center;">Solicitud de Bodega</h1>

<section id="act">
    <h1 id="td" class=' text-center bg-danger my-4' style='font-size:1.5em; padding:3%; border-radius:5px;color :white;'>No se encontraron coincidencias con sus criterios de búsqueda.</h1>
    <?php include ('Buscador_ajax/cabezera.php') ?>
     <form style="margin: 0%;position: 0; background: transparent;" method='POST' action="form_bodega_info.php">

 <button style=" float: right;margin-bottom: 1%;" type="submit" name="solicitar" class=" div btn btn-success btn-sm text-center"  data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitar">Solicitar</button><br class="div"><br class="div">
 <?php include ('Buscador_ajax/Consulta1.php') ?>
</form>
</section>
<<<<<<< HEAD
 <script>
    $(obtener_registros());

function obtener_registros(consulta)
{
    $.ajax({
        url : 'Buscador_ajax/consulta_bodega.php',
        type : 'POST',
        dataType : 'html',
        data : { consulta: consulta },
        })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    var valorBusqueda=$(this).val();
    if (valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
        {
            obtener_registros();
        }
});

</script>

<script type="text/javascript">
function confirmaion(e) {
    if (confirm("¿Estas seguro que deseas Eliminar este registro?")) {
        return true;
    } else {
        return false;
        e.preventDefault();
    }
}
</script>
=======
>>>>>>> 9d52e5d86dbc0dcee84dcf507d09d851da396162
</body>
</html>