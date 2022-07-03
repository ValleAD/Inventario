<?php

include ('../Model/conexion.php');
     $fecha=date("d-m-Y");
if (isset($_POST['form_bodega'])) {


    $departamento = $_POST['depto'];
    $orden_trabajo = $_POST['odt'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
      $verificar_bodega =mysqli_query($conn, "SELECT * FROM detalle_bodega WHERE odt_bodega ='$orden_trabajo' ");

if (mysqli_num_rows($verificar_bodega)>0) {
  echo '
    <script>
    alert("El codigo ingresado debe se diferente al registrado");
     window.location ="../form_bodega.php"; 
  </script>
  ';
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,fecha_registro,estado) VALUES ('$orden_trabajo', '$departamento','$usuario','$idusuario' '$fecha','Pendiente')";
    $result = mysqli_query($conn, $sql); 
      
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo','$fecha')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
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
}
if (isset($_POST['solicitar'])) {
      $departamento = $_POST['depto'];
    $orden_trabajo = $_POST['odt'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
      $verificar_bodega =mysqli_query($conn, "SELECT * FROM detalle_bodega WHERE odt_bodega ='$orden_trabajo' ");

if (mysqli_num_rows($verificar_bodega)>0) {
  echo '
    <script>
    alert("El codigo ingresado debe se diferente al registrado");
     window.location ="../form_bodega_varios.php"; 
  </script>
  ';
exit();
}
    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,fecha_registro,estado) VALUES ('$orden_trabajo', '$departamento','$usuario','$idusuario','$fecha','Pendiente')";
    $result = mysqli_query($conn, $sql); 
      
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $orden_trabajo = $_POST['odt'];

  
      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega,fecha_registro) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$orden_trabajo','$fecha
        ')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
       location.href = '../dt_bodega.php';
        </script>
        ";
      }if ($result) {
        
      }else {
        echo "<script> alert('¡Error! algo salió mal');
       location.href = '../form_bodega_varios.php';
        </script>
        ";
      }
    }

}
    

?>