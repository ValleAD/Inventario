<?php

include ('../Model/conexion.php');
     
    $departamento = $_POST['departamento'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];


    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,campo) VALUES ('$odt', '$departamento','$usuario','Solicitud Vale')";
    $result = mysqli_query($conn, $sql); 
      
        
     for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $estado= $_POST['estado'][$i];
    $numero_vale = $_POST['numero_vale'];

  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale,estado) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale','$estado')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
       location.href = '../datos_vale.php';
        </script>
        ";
      }if ($result) {
        
      }else {
        echo "<script> alert('¡Error! algo salió mal');
       location.href = '../form_vale.php';
        </script>
        ";
      }
    }

    
for ($i=0; $i < count($_POST['cod']) ; $i++) {

  $codigo= $_POST['cod'][$i];
  $stocks =$_POST['stock'][$i];   
  $stock_obtenido =$_POST['cant'][$i];
  $precio= $_POST['cu'][$i];
  $stock_descontado=$stocks - $stock_obtenido;
   
//sql
$count = "SELECT codProductos, SUM(stock), fecha_registro FROM tb_productos GROUP BY codProductos";
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE codProductos ='$codigo' && precio = '$precio'" ;
$result = mysqli_query($conn, $sql1);
}

 // for($i = 0; $i < count($_POST['cod']); $i++)
 //    {
 //      $codigo_producto  = $_POST['cod'][$i];
 //      $categoria        = $_POST['categoria'][$i];
 //      $catalogo         = $_POST['cat'][$i];
 //      $nombre_articulo  = $_POST['nombre'][$i];
 //      $Descripción      = $_POST['desc'][$i];
 //      $u_m              = $_POST['um'][$i];
 //      $cantidad         = $_POST['cant'][$i];
 //      $cost             = $_POST['cu'][$i];
 //      $campo            = $_POST['form_vale'][$i];
 //       $insert = "INSERT INTO reporte_articulos (codProductos, categoria, catalogo, nombre, descripcion, unidad_medida, stock, precio,campo) VALUES ('$codigo_producto', '$categoria', '$catalogo', '$nombre_articulo', '$Descripción', '$u_m', '$cantidad', '$cost','$campo')";
 //      $query = mysqli_query($conn, $insert);

 //    }
?>