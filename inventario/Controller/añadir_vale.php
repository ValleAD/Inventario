<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

for($i = 0; $i < count($_POST['cod']); $i++)

    {
      $codigo= $_POST['cod'][$i];
      $descripcion= $_POST['desc'][$i];
      $unidadmedida= $_POST['um'][$i];
      $stock = $_POST['cant'][$i];
      $precio= $_POST['cu'][$i];

        $total[$i] = $precio * $stock;
        $final = $final + $total[$i];
        $tot =  $total[$i];

      $numero_vale = $_POST['numero_vale'];
      $departamento = $_POST['departamento'];

      //crud para guardar los productos en la tabla tb_vale
      $sql = "INSERT INTO tb_vale (codVale, departamento) VALUES ('$numero_vale', '$departamento')";
        $result = mysqli_query($conn, $sql); 
        if ($result) {
            echo "<script> alert('Su solicitud fue guardada correctamente');
            location.href = '../datos_vale.php';
            </script>
            ";
          }else {
            echo "<script> alert('UUPS!! Algo no fue mal escrito');
            location.href = '../form_vale.php';
            </script>
            ";
         }
         
      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio, total, tot_final, numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$tot','$final','$numero_vale')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
        location.href = '../datos_vale.php';
        </script>
        ";
      }else {
        echo "<script> alert('¡Error!');
        location.href = '../form_vale.php';
        </script>
        ";
      }

      
     

         //CRUD que trae los productos seleccionados por el id de 'tb_productos' y los captura y los inserta en la nueva tabla llamada
         //detalle_bodega
    }  

?>