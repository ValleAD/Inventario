<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria        = $_POST['categoria'][$i];
      $catalogo         = $_POST['catal'][$i];
      $Descripción      = $_POST['descr'][$i];
      $u_m              = $_POST['um'][$i];
      $cost             = $_POST['cu'][$i];

      $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, descripcion, unidad_medida,  precio,solicitudes) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$Descripción', '$u_m', '$cost','Registro de Producto')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../vistaProductos.php';
        </script>";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../regi_producto.php';
        </script>
        ";
      }
    }
?>
