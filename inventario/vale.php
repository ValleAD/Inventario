<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
  <!--  <link rel="stylesheet" href="styles/estilos.css" type="text/css"> -->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
</head>
<body>
  
    <section id="body">
      <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
        <h3>Departamento de mantenimiento</h3>
        
            <form method="post">
            <div align="right">
                <label name="orden" style="margin-right: 75px;">Vale No.</label>
                <br>
                <input type="number" name="ord" style="margin-right: 10px">
            </div>
                
              <h3 align="center">Solicitud de materiales</h3>
            <section>
                <label for="">Fecha:</label>
                <input type="time" name="fech">
                <label for="">Depto. o Servicio:</label>
                <input type="text" name="depto">
                <input type="submit" value="Aceptar">
            </section> 
          
            </form>
            <br>
            <form action="select_vale.php" method="post">
              <label for="" name="cod" value="cod">CÓDIGO</label>
              <input type="number"><br>
              <label for="" name="desc">DESCRIPCIÓN</label>
              <input type="text"> <br>      
              <label for="" name="um">U/M</label>
              <input type="number"><br>
              <label for="" name="cant">CANTIDAD</label>
              <input type="number"><br>
              <label for="" name="cu">COSTO UNITARIO</label>
              <input type="text"><br>
              <input type="submit" value="Aceptar">
            </form>
    </section>
    
</body>
</html>