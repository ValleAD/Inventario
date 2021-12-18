<?php

//CRUD para guardar datos enviados
// de re_producto.php y se guarde en la tabla tb_productos mysql
include '../Model/conexion.php';

if (isset($_POST['submits'])) {
    $departamento = $_POST['departamento'];
    $odt = $_POST['odt'];
    $cantidad = $_POST['cant'];

    $sql = "SELECT * FROM tb_productos WHERE coProductos AND descripcion AND unidad_medida AND stock AND precio";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "INSERT INTO detalle_vale (codigo, descricion, unidad_medida, stock, precio)".
        "SELECT coProductos AND descripcion AND unidad_medida AND stock AND precio FROM tb_productos WHERE codProductos";
        $result = mysqli_query($conn, $sql); 
        if ($result) {
            echo "<script> alert('Su solicitud fue guardada correctamente');
            location.href = '../home.php';
            </script>
            ";
          }else {
            echo "<script> alert('UUPS!! Algo no fue mal escrito');
            location.href = '../form_vale.php';
            </script>
            ";
          }
        }
}

/* 

if ($query1) {
        $insertar1 = "INSERT INTO tb_vale (departamento, odt) VALUES ('$departamento', '$odt')";
   $query1 = mysqli_query($conn, $insertar1); 




      }

$insertar = "INSERT INTO detalle_vale(`codigo`, `descripcion`, `unidad_medida`, `stock`, `precio`)"
        ."SELECT `codProductos`, `descripcion`, `unidad_medida`, `stock`, `precio` * FROM tb_productos WHERE codProductos" ;
        $query = mysqli_query($conn, $insertar); 

        if ($query) {
            echo "<script> alert('Su solicitud fue guardada correctamente');
            location.href = '../form_vale.php';
            </script>
            ";
          }else {
            echo "<script> alert('UUPS!! Algo no fue mal escrito');
            location.href = '../form_vale.php';
            </script>
            ";
          } 

*/
?>
