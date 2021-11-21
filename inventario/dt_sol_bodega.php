<!DOCTYPE html>
<html lang="es">
<?php Require("menu.php")?>
<head>
    <meta charset="UTF-8">
     <!--  <link rel="stylesheet" href="styles/estilos.css" type="text/css"> -->
     <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Bodega</title>
</head>
<body>

    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>

      
     <?php
    if(isset($_POST['cod'])) {
        
    $codigo = $_POST['cod'];
    $des = $_POST['desc'];
    $um = $_POST['um'];
    $cantidad = $_POST['cant'];
    $cost = $_POST['cu'];

    $total = $cost * $cantidad;

    echo 
    '
      <form style="position: all; width: 70%; height: 100%; style="position: all; width: 70%; height: 100%;margin-bottom: 5%;" >
         <h3 align="center">Solicitud de materiales</h3>
            <section>
                <label>Fecha:</label>
                <input type="datetime" value="">
                <label>Depto. o Servicio:</label>
                <input type="text" value="">
            </section> 

       <section>
      <div align="right">
          <label style="margin-right: 135px;">VALE No.</label>
          <div class="col-md-2">
          <input name="orden" class="form-control" type="number" style="margin-right: 10px;margin-bottom: -15%;margin-top: -25%;" required>
        </div>
        </div>
        <br>
         <br>

      <div class="table-responsive">
  <table class="table">
    <tr>
      <td><strong>Código</strong></td>
      <td><strong>Descripción</strong></td>
      <td><strong>U/M</strong></td>
      <td><strong>Cantidad</strong></td>
      <td><strong>Costo unitario</strong></td>
      <td><strong>Total</strong></td>
    </tr>
    
    <tr>
      <td>' .$codigo. '</td>
      <td>' .$des. '</td>
      <td>' .$um. '</td>
      <td>' .$cantidad. '</td>
      <td>$' .$cost. '</td>
      <td>$' .$total. '</td>
    </tr>

    </table>
     <div class="container">
  <div class="row">
    <div class="col">
    <p>  SOLICITA:  </p>
    </div>
    <div class="col-6">
     <p style="margin-left: 210px;">  ENTREGA:</p>
    </div>
      </div>
</div>
            <p  style=" width:35%; margin: 5%; width: 30%; height: 10%;margin-top: 15% margin-bottom: 5%;">AUTORIZA:</p>
     </section>
          
    </form>
    ';
}
?>    
</body>
</html>


