<?php

include ('../Model/conexion.php');
     


    $departamento = $_POST['depto'];
    $orden_trabajo = $_POST['odt'];
    $usuario = $_POST['usuario'];
    $idusuario = $_POST['idusuario'];

    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_bodega (codBodega, departamento,usuario,idusuario,estado) VALUES ('$orden_trabajo', '$departamento','$usuario','$idusuario','Pendiente')";
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

    

?>