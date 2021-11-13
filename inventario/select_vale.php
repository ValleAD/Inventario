<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/estilos.css" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
</head>
<body>

<?php
    if(isset($_POST['submit'])) {
    $codigo = $_POST['cod'];
    $des = $_POST['desc'];
    $um = $_POST['um'];
    $cantidad = $_POST['cant'];
    $cost = $_POST['cu'];

    $total = $cost * $cantidad;

    echo "saludos";
}
    
?>

          
            <br>
            <pre><p>SOLICITA:                                                                                      ENTREGA:</p></pre>
            <p style="margin-left: 210px;">AUTORIZA:</p>
    
</body>
</html>