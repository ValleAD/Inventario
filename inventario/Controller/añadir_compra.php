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


$insert = "INSERT INTO tb_compra (nSolicitud, dependencia, plazo, unidad_tecnica, descripcion_solicitud, usuario,estado) VALUES ('$nSolicitud','$dependencia', '$plazo', '$u_t', '$descripcion_solicitud', '$usuario','Pendiente')";
$result = mysqli_query($conn, $insert);

if ($result)  {
echo "<script> alert('Solicitud realizada correctamente')
location.href = '../dt_compra.php';
</script>
";
}else {
echo "<script> alert('UUPS!! Algo no fue mal escrito')
location.href = '../form_compra.php';
</script>
";
}



  for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $categoria        = $_POST['categoria'][$i];
      $codigo_producto  = $_POST['cod'][$i];
      $catalogo         = $_POST['cat'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $estado             = $_POST['estado'][$i];
      $solicitud        = $_POST['nsolicitud'];;

      $insert = "INSERT INTO detalle_compra (categoria, codigo, catalogo, descripcion, unidad_medida, stock, precio, estado, solicitud_compra) VALUES ('$categoria', '$codigo_producto','$catalogo', '$Descripción', '$u_m', '$cantidad', '$cost','$estado', '$solicitud')";
      $query = mysqli_query($conn, $insert);

    for ($i=0; $i < count($_POST['cod']) ; $i++) {

  $codigo= $_POST['cod'][$i];
  $stocks =$_POST['stock'][$i];   
  $stock_obtenido =$_POST['cant'][$i];
  $stock_descontado=$stocks + $stock_obtenido;
   }
//sql
$count = "SELECT codProductos, SUM(stock), fecha_registro FROM tb_productos GROUP BY codProductos";
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE codProductos ='$codigo'" ;
$result = mysqli_query($conn, $sql1);

    }  
     for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria        = $_POST['categoria'][$i];;
      $catalogo         = $_POST['cat'][$i];
      $nombre_articulo  = $_POST['nombre'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];;
      $cantidad         = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $campo            = $_POST['form_compra'][$i];
       $insert = "INSERT INTO reporte_articulos (codProductos, categoria, catalogo, nombre, descripcion, unidad_medida, stock, precio,campo) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$nombre_articulo', '$Descripción', '$u_m', '$cantidad', '$cost','$campo')";
      $query = mysqli_query($conn, $insert);

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
    }
?>
