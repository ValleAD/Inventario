<?php

include ('../Model/conexion.php');
     
    $departamento = $_POST['depto'];
    $odt = $_POST['numero_vale'];
    $usuario = $_POST['usuario'];


    //crud para guardar los productos en la tabla tb_vale
    $sql = "INSERT INTO tb_vale (codVale, departamento,usuario,campo,estado) VALUES ('$odt', '$departamento','$usuario','Solicitud Vale','Pendiente')";
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

    


?>