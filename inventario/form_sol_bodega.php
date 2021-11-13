<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
  <!--  <link rel="stylesheet" href="styles/estilos.css" type="text/css"> -->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Bodega</title>
</head>
<body>
  
    <section>
      <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
        <h3>Departamento de mantenimiento</h3>
        
            <form action="form_sol_bodega.php" method="POST">
            <div align="right">
                <label name="orden" style="margin-right: 75px;">Vale No.</label>
                <br>
                <input type="number" style="margin-right: 10px" name="vale" id="vale" required>
            </div>
                
              <h3 align="center">Solicitud de materiales</h3>
            <section>
                <label for="fech">Fecha:</label>
                <input type="datetime" name="fech" id="fech" required>
                <label for="depto">Depto. o Servicio:</label>
                <input type="text" name="depto" id="depto" required>
                <input type="submit" value="Aceptar">
            </section> 
          
            </form>
            <br>  
<?php echo FormBodega();
?>
            
    </section>
    
</body>
</html>

<?php 
 
  function FormBodega(){

    if(isset($_POST["fech"])){

      $fecha = $_POST['fech'];

      echo'
      <form action="dt_sol_bodega.php" method="POST">
      <label for="cod">CÓDIGO</label>
      <input type="number" name="cod" id="cod"><br>
      <label for="desc">DESCRIPCIÓN</label>
      <input type="text" name="desc"><br>      
      <label for="um">U/M</label>
      <input type="text" name="um"><br>
      <label for="cant">CANTIDAD</label>
      <input type="number" name="cant"><br>
      <label for="cu">COSTO UNITARIO</label>
      <input type="text" name="cu"><br>
      <input type="submit" value="Aceptar">
      </form>';
      }
 }
?>
