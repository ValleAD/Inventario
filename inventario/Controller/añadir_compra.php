<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';
 
$nSolicitud = $_POST['nsolicitud'];
$dependencia = $_POST['dependencia'];
$plazo = $_POST['plazo'];
$u_t= $_POST['unidad_tecnica'];
$descripcion_solicitud = $_POST['descripcion_solicitud'];
$usuario = $_POST['usuario'];
$idusuario = $_POST['idusuario'];
$jus = $_POST['jus'];


$insert = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud, usuario,estado,idusuario,justificacion) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud', '$usuario','Comprado','$idusuario','$jus')";
$result = mysqli_query($conn, $insert);



  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria  = $_POST['categoria'][$i];
      $catalogo         = $_POST['cat'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $solicitud        = $_POST['nsolicitud'];;

      $insert = "INSERT INTO detalle_compra (codigo,categoria, catalogo, descripcion, unidad_medida, stock,cantidad_despachada, precio, solicitud_compra) VALUES ('$codigo_producto','$categoria','$catalogo', '$Descripción', '$u_m', '$cantidad',0, '$cost', '$solicitud')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../dt_compra.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../form_compra.php';
        </script>
        ";
      }

    }  

    if(isset($_POST['detalle_compra'])){
      include '../Model/conexion.php';
$nSolicitud=$_POST['sol_compra'];
$estado =$_POST['estado'];
$sql="UPDATE  tb_compra SET estado = '$estado' WHERE nSolicitud='$nSolicitud'" ;

$result = mysqli_query($conn, $sql);

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
      $cant_aprobada    = $_POST['cant_aprobada'][$i];
       $campo            = $_POST['form_compra'][$i];
       $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, descripcion, unidad_medida, stock, precio) VALUES ('$codigo_producto', '$categoria', '$catalogo','$Descripción', '$u_m', '$cant_aprobada', '$cost' )";
      $query = mysqli_query($conn, $insert);
      if ($result || $query)  {
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
    }
?>
