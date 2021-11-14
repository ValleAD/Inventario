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

    <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>
    <h3>Departamento de mantenimiento</h3>

        <div align="right">
        <label name="orden" style="margin-right: 75px;">Vale No.</label>
        <br>
        <input value="">
        </div>

        <h3 align="center">Solicitud de materiales</h3>
            <section>
                <label>Fecha:</label>
                <input type="datetime" value="'">
                <label>Depto. o Servicio:</label>
                <input type="text" value="">
            </section> 
<?php
    if(isset($_POST['cod'])) {
        
    $codigo = $_POST['cod'];
    $des = $_POST['desc'];
    $um = $_POST['um'];
    $cantidad = $_POST['cant'];
    $cost = $_POST['cu'];

    $total = $cost * $cantidad;

    echo 
    '<table style="border-collapse: collapse;
    border: 2px solid;">
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
    ';
}
?>            
            <br>
            <pre><p>SOLICITA:                                                                                      ENTREGA:</p></pre>
            <p style="margin-left: 210px;">AUTORIZA:</p>
            <a href="form_sol_bodega.php">Volver</a>
    
</body>
</html>


