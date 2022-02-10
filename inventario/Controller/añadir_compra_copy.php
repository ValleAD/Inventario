<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

     for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria        = $_POST['cat'][$i];
        $catalogo         = $_POST['catalogo'][$i];
      //  $nombre_articulo  = $_POST['nombre'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cost             = $_POST['cost'][$i];
      $cant_aprobada    = $_POST['cant_aprobada'][$i];
     // $campo            = $_POST['form_compra'][$i];
       $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, descripcion, unidad_medida, stock, precio) VALUES ('$codigo_producto', '$categoria', '$catalogo','$Descripción', '$u_m', '$cant_aprobada', '$cost' )";
      $query = mysqli_query($conn, $insert);
      if ($query)  {
        echo "<script> alert('Su producto fue registrado correctamente')
        location.href = '../solicitudes_compra.php';
        </script>
        ";
        }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito')
        location.href = '../dt_compra_copy.php';
        </script>
        ";
        }
    }
?>
