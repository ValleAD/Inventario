<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
$fecha=date("d-m-Y");
for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria        = $_POST['categoria'][$i];
      $catalogo         = $_POST['catal'][$i];
      $Descripción      = $_POST['descr'][$i];
      $u_m              = $_POST['um'][$i];
      $cost             = $_POST['cu'][$i];

          $sql = "SELECT * FROM tb_productos WHERE codProductos='$codigo_producto' AND catalogo='$catalogo' ";
    $result = mysqli_query($conn, $sql);
    $codigo=0;
    while ($productos = mysqli_fetch_array($result)){
      $codigo=$productos['codProductos'];
    }
      if ($codigo_producto==$codigo) {
        echo '    <script>
    alert("No puede haber campos repetidos");
     window.location ="../regi_producto.php"; 
  </script>';
  exit();

      }if ($codigo_producto!=$codigo) {

$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_productos WHERE codProductos ='$codigo_producto'");

if (mysqli_num_rows($verificar_usuario)>0) {
  echo '
    <script>
    alert("Este Producto ya esta Registrado, intente con otro diferente");
     window.location ="../regi_producto.php"; 
  </script>
  ';
exit();
}
      $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, descripcion, unidad_medida,  precio,fecha_registro) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$Descripción', '$u_m', '$cost','$fecha')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../vistaProductos.php';
        </script>";
      }
  }
}
?>