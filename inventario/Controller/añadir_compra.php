<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';


if (isset($_POST['sumbit'])) {

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

        $$nSolicitud = $_POST['nsolicitud'];
        $dependencia = $_POST['dependencia'];
        $plazo = $_POST['plazo'];
        $u_t= $_POST['unidad_tecnica'];
        $descripcion_solicitud = $_POST['descripcion_solicitud'];


        $insert = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud')";
        $result = mysqli_query($conn, $insert);
      if ($result)  {
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
     
    }
  }
?>
