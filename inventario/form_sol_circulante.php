<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="styles/estilos.css" type="text/css"> 
     <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de  Fondo Circulante</title>
</head>
<body>

    <h1>Hospital Nacional "Santa Teresa" de Zacatecoluca</h1>
    <h3>Fondo Circulante de Monto Fijo</h3>

        <div>
        <label name="orden">Solicitud No.:</label>
            <input value="">
        </div>
<br>
        <h5> Encargado del Fondo Circulante de Monto Fijo Recursos Propios</h5>
        <h5> Hospital Nacional "Santa Teresa" de Zacatecoluca</h5>
        <br>
    
        <h5> Atentamente solicito a usted la compra Urgente de los materiales y/o servicios que se detallan</h5>
        <h5> a continuación, a traves del Fondo Circulante de Monto Fijo</h5>
        <br>
  
        <form action="dt_sol_circulante.php" method="POST">
        <label for="no">No.</label>
        <input type="number" name="cod" id="cod"><br>  
        <label for="desc">Descripcion de los Materiales y/o servicios Solicitados</label>
        <input type="text" name="desc"><br>
        <label for="um">Unidad de Medida</label>
        <input type="text" name="um" id="um"><br>
        <label for="cantSol">Cantidad solicitada</label>
        <input type="number" name="cantSol" id="cantSol"><br>
        <label for="cantes">Cantidad Estimada</label>
        <input type="number" name="cantes" id="cantes"><br>
        <input type="submit" value="Aceptar">
        </form>'
        <br>
        <h5> Todo lo anteriormente detallado, es indispensable para desarrollar nuestras funciones.</h5>

</body>
</html>
