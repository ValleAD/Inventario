<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql

include '../Model/conexion.php';

    $solicitud_no     = $_POST['nsolicitud'];
    $departamento     = $_POST['depto'];
    $usuario          = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
      $verificar_almacen =mysqli_query($conn, "SELECT * FROM detalle_almacen WHERE tb_almacen ='$solicitud_no' ");

if (mysqli_num_rows($verificar_almacen)>0) {
  echo '
    <script>
    alert("El codigo ingresado debe se difernte al registrado");
     window.location ="../form_almacen.php"; 
  </script>
  ';
exit();
}
    //crud para guardar los productos en la tabla tb_vale
     $sql = "INSERT INTO tb_almacen (codAlmacen, departamento,encargado,estado,idusuario) VALUES ('$solicitud_no', '$departamento','$usuario','Pendiente','$idusuario')";
    $result = mysqli_query($conn, $sql); 

for($i = 0; $i < count($_POST['cod']); $i++) 
    {
      $codigo_producto  = $_POST['cod'][$i];
      $nombre_articulo  = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $soli             = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $num_sol          = $_POST['nsolicitud'];

      $insert = "INSERT INTO detalle_almacen(codigo, nombre, unidad_medida, cantidad_solicitada, tb_almacen, precio) VALUES ('$codigo_producto', '$nombre_articulo','$u_m', '$soli', '$num_sol', '$cost')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
        location.href = '../dt_almacen.php';
        </script>
        ";
      }else {
        echo "<script> alert('¡Error! algo salió mal');
        location.href = '../form_almacen.php';
        </script>
        ";
      }
    }
  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i]+1;
      $Descripción      = $_POST['desc'][$i];
      $catalogo         = $_POST['cat'][$i];
      $cat               =$_POST['cate'][$i];
      $u_m             = $_POST['um'][$i];
      $cantidad      = $_POST['cant'][$i];
      $cost            = $_POST['cu'][$i];

      $insert1 = "INSERT INTO tb_productos (codProductos, catalogo, descripcion, unidad_medida, stock, precio,categoria) VALUES ('$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad', '$cost', '$cat')";
      $query1 = mysqli_query($conn, $insert1);
    }
    
?>
