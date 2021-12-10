<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_producto mysql
require 'Model/conexion.php';

for($i = 0; $i < count($_POST['cod']); $i++)
    {
    $codigo_producto  = $_POST['cod'][$i];
    $catalogo         = $_POST['catal'][$i];
    $nombre_articulo  = $_POST['nombre'][$i];
    $Descripción      = $_POST['descr'][$i];
    $u_m              = $_POST['um'][$i];
    $cantidad         = $_POST['cant'][$i];
    $cost             = $_POST['cu'][$i];

    $insert = "INSERT INTO tb_productos (codProductos, catalogo, nombre, descripcion, unidad_medida, stock, precio) VALUES ('$codigo_producto','$catalogo', '$nombre_articulo', '$Descripción', '$u_m', '$cantidad', '$cost')";
    $query = mysqli_query($conn, $insert);

    if ($query) {
      echo "<script> alert('Su producto fue registrado correctamente');
      location.href = 'VistaProductos.php';
      </script>
      ";
    }else {
      echo "<script> alert('UUPS!! Algo no fue mal escrito');
      location.href = 'regi_producto.php';
      </script>
      ";
    }
    $verificar_codprduct =mysqli_query($conn, "SELECT * FROM tb_productos WHERE codProductos ='$codigo_producto'");

if (mysqli_num_rows($verificar_codprduct)>0) {
  echo '
    <script>
    alert("El Codogo ");
    window.location ="regi_producto.php"
  </script>
  ';
exit();
}
$ejecutar = mysqli_query($conn,$query);
  }
?>
