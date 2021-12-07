<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vale</title>
</head>
<body>

<form action="prueba.php" method="post">
    <label for="">Cuantos productos desea buscar</label>
    <input type="number" name="cantidad" value="1">
    <input type="submit" value="Aceptar" name="aceptar">
</form>
<?php
    if(isset($_POST['cantidad'])){
        $cantidad = $_POST['cantidad'];
        for($x = 1; $x <= $cantidad; $x++){

            echo'
            <form action="prueba.php" method="post">
            <input type="number" name="codigo[]" id="codigo" placeholder="Ingrese el código del Producto">
            ';
        }
        echo'
        <input type="submit" value="Buscar" name="buscar" id="buscar">
        </form>';
    }
?>
     
<?php  
include 'conexion.php';
if(isset($_POST['codigo'])){

    echo'
    <br>
    <form action="datos_vale.php" method="post">
        
      
            <label>Departamento</label>   
            <input class="form-control" type="text" name="depto" id="como2" required>
  
    
            <label>Fecha</label> 
            <input class="form-control" type="date" name="fech" id="como3" required>
       
        <br><br>
       <table>
                <td><strong>Código</strong></td>
                <td><strong>Descripción</strong></td>
                <td><strong>U/M</strong></td>
                <td><strong>Cantidad</strong></td>
                <td><strong>Costo unitario</strong></td>
              </tr>';


    for($i = 0; $i < count($_POST['codigo']); $i++){

    
    $codigo = $_POST['codigo'][$i];
    
$sql = "SELECT * FROM tb_productos WHERE codProductos = '$codigo'";
$result = mysqli_query($conn, $sql);

    
    while ($productos = mysqli_fetch_array($result)){ ?>

    
    <tr>
               <td><input type="number" readonly name="cod[]" value ="<?php  echo $productos['codProductos']; ?>"></td>
               <td><input type="text" readonly name="desc[]" value ="<?php  echo $productos['Descripcion']; ?>"></td>
               <td><input type="text" readonly name="um[]" value ="<?php  echo $productos['unidad_medida']; ?>"></td>
               <td><input type="number" readonly name="cant[]" required></td>
               <td><input type="number" readonly name="cu[]" value ="<?php  echo $productos['precio']; ?>"></td><br>
    </table>
   
<?php        }
    }

    echo '<input type="submit" value="Enviar">
    </form>';
}
?>


</body>
</html>