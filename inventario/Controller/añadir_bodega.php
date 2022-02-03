<?php

include ('../Model/conexion.php');
     


    $departamento = $_POST['departamento'];
    $orden_trabajo = $_POST['odt'];
    $usuario = $_POST['usuario'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario) VALUES ('$orden_trabajo', '$departamento','$usuario')";
    $result = mysqli_query($conn, $sql); 
      
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
       location.href = '../dt_bodega.php';
        </script>
        ";
      }if ($result) {
        
      }else {
        echo "<script> alert('¡Error! algo salió mal');
       location.href = '../form_bodega.php';
        </script>
        ";
      }
    }

    
for ($i=0; $i < count($_POST['cod']) ; $i++) {

  $codigo= $_POST['cod'][$i];
  $stocks =$_POST['stock'][$i];   
  $stock_obtenido =$_POST['cant'][$i];
  $stock_descontado=$stocks - $stock_obtenido;
   
//sql
$count = "SELECT codProductos, SUM(stock), fecha_registro FROM tb_productos GROUP BY codProductos";
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE codProductos ='$codigo'" ;
$result = mysqli_query($conn, $sql1);
}
if ($query) {
  echo "<script> alert('Valores descontados correctamente');
 location.href = '../dt_bodega.php';
  </script>
  ";
}if ($result) {
  
}else {
  echo "<script> alert('¡Error! algo salió mal');
 location.href = '../form_bodega.php';
  </script>
  ";
}
for($i = 0; $i < count($_POST['cod']); $i++)
    {
      $codigo_producto  = $_POST['cod'][$i];
      $categoria        = $_POST['categoria'][$i];
      $catalogo         = $_POST['cat'][$i];
      $nombre_articulo  = $_POST['nombre'][$i];
      $Descripción      = $_POST['desc'][$i];
      $u_m              = $_POST['um'][$i];
      $cantidad         = $_POST['cant'][$i];
      $cost             = $_POST['cu'][$i];
      $campo            = $_POST['form_bodega'][$i];
       $insert = "INSERT INTO tb_productos (codProductos, categoria, catalogo, nombre, descripcion, unidad_medida, stock, precio,campo) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$nombre_articulo', '$Descripción', '$u_m', '$cantidad', '$cost','$campo')";
      $query = mysqli_query($conn, $insert);

    }
?>