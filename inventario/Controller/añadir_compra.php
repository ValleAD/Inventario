<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';


  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $catalogo         = $_POST['catal'][$i];
      $Descripción      = $_POST['descr'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];

      $insert = "INSERT INTO detalle_compra (codigo, catalogo, descripcion, unidad_medida, stock, precio) VALUES ('$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad', '$cost')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../vistaProductos.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../form_compra.php';
        </script>
        ";
      }
      if ($query) {
        $insert = "INSERT INTO tb_compra (nSolicitud, dependencia, nombre, descripcion, unidad_medida, stock, precio) VALUES ('$codigo_producto','$catalogo', '$nombre_articulo', '$Descripción', '$u_m', '$cantidad', '$cost')";
        $query = mysqli_query($conn, $insert);
      }
     
    }
?>
