<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
  <!--  <link rel="stylesheet" href="styles/estilos.css" type="text/css"> -->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Materiales a Almacen</title>
</head>
<body>
  
    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Almacen de medicamentos, insumos medicos, papeleria y otros articulos</h3>
    

    <form action="dt_sol_almacen.php" method="POST">
        <label for="cod">CÓDIGO</label>
        <input type="number" name="cod" id="cod"><br>  
        <label for="um">U/M</label>
        <input type="text" name="um"><br>
        <label for="name">NOMBRE DEL ARTICULO</label>
        <input type="text" name="name" id="name"><br>
        <label for="cantSol">CANTIDAD SOLICITADA</label>
        <input type="number" name="cantSol" id="cantSol"><br>
        <label for="cantDes">CANTIDAD DESPACHADA</label>
        <input type="number" name="cantDes" id="cantDes"><br>
        <label for="cu">COSTO UNITARIO</label>
        <input type="text" name="cu"><br>
        <label for="depto">DEPARTAMENTO QUE SOLICITA</label>
        <input type="text" name="depto" id="depto"><br>
        <input type="submit" value="Aceptar">
        </form>'

</body>
</html>