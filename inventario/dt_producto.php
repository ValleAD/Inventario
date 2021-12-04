<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_producto mysql
require 'conexion.php';

    $codigo_producto = $_POST['cod'];
    $catalogo=$_POST['catal'];
    $nombre_articulo = $_POST['nombre'];
    $Descripción = $_POST['descr'];
    $u_m = $_POST['um'];
    $cantidad = $_POST['cant'];
    $cost=$_POST['cu'];

    $insert = "INSERT INTO tb_productos (codProductos, catalogo, nombre, descripcion, unidad_medida, stock, precio) VALUES ('$codigo_producto','$catalogo', '$nombre_articulo', '$Descripción', '$u_m', '$cantidad', '$cost')";
    $query = mysqli_query($conn, $insert);

    if ($query) {
      echo "<script> alert('Su producto fue registrado correctamente');
      location.href = 'reg_producto.php';
      </script>
      ";
    }else {
      echo "<script> alert('UUPS!! Algo no fue mal escrito');
      location.href = 'reg_producto.php';
      </script>
      ";
    }
    
?>
