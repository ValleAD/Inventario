<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

if (isset($_POST['submits'])) {
 
    $departamento = $_POST['departamento'];
    $numero_vale = $_POST['numero_vale'];
    $codigo= $_POST['cod'];
    $descripcion= $_POST['desc'];
    $unidadmedida= $_POST['um'];
    $stock = $_POST['cant'];
    $precio= $_POST['cu'];
    

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

         //CRUD que trae los productos seleccionados por el id de 'tb_productos' y los captura y los inserta en la nueva tabla llamada
         //detalle_bodega
         if($result){
        $sql  = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio')";
        $result = mysqli_query($conn, $sql);
        
         }
    }  
        


?>
