<?php

include ('../Model/conexion.php');
     if (isset($_POST['form_vale'])) {

    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];


    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,idusuario,campo,estado) VALUES ('$odt', '$departamento','$usuario','$idusuario','Solicitud Vale','Pendiente')";
    $result = mysqli_query($conn, $sql); 
      
        
     for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];

  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
       location.href = '../datos_vale.php';
        </script>
        ";
      }else {
        echo "<script> alert('¡Error! algo salió mal');
       location.href = '../form_vale.php';
        </script>
        ";
      }
    }
}
         if (isset($_POST['form_vale2'])) {

    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];
    $jus = $_POST['jus'];


    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,idusuario,campo,estado,observaciones) VALUES ('$odt', '$departamento','$usuario','$idusuario','Solicitud Vale','Pendiente','$jus')";
    $result = mysqli_query($conn, $sql); 
      
        
     for($i = 0; $i < count($_POST['cod']); $i++)

    {
 
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];

  
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);

      if ($result || $query) {
        echo "<script> alert('Su solicitud fué realizada correctamente');
       location.href = '../datos_vale.php';
        </script>
        ";
      }else {
        echo "<script> alert('¡Error! algo salió mal');
       location.href = '../form_vale2.php';
        </script>
        ";
      }
    }
}


?>