<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

$departamento = $_POST['departamento'];
      $odt = $_POST['odt'];

      //crud para guardar los productos en la tabla tb_vale
      $sql = "INSERT INTO tb_bodega (codBodega, departamento) VALUES ('$odt', '$departamento')";
        $result = mysqli_query($conn, $sql); 
        if ($result) {
            echo "<script> alert('Su solicitud fue guardada correctamente');
            location.href = '../dt_bodega.php';
            </script>
            "; 
          }else {
            echo "<script> alert('UUPS!! Algo no fue mal escrito');
            location.href = '../form_bodega.php';
            </script>
            ";
         }
         
for($i = 0; $i < count($_POST['cod']); $i++)

    {
    $codigo= $_POST['cod'][$i];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $odt_bodega = $_POST['odt'];

      $insert = "INSERT INTO detalle_bodega (codigo,descripcion,unidad_medida,stock,precio,odt_bodega) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$odt_bodega')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../dt_bodega.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
        location.href = '../form_bodega.php';
        </script>
        ";
      }

      
      

         //CRUD que trae los productos seleccionados por el id de 'tb_productos' y los captura y los inserta en la nueva tabla llamada
         //detalle_bodega
    }  
    

?>