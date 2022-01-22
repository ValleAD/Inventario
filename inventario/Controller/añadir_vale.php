<?php
include ('../Model/conexion.php');
$stocks =$_POST['cant'];
         $stock_obtenido =$_POST['stock_descontar'];
         $stock_descontado=$stocks - $stock_obtenido;
          
   //sql
   $sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE stock='$stocks'" ;
   $result = mysqli_query($conn, $sql1);
   

   $departamento = $_POST['departamento'];
      $odt = $_POST['numero_vale'];

      //crud para guardar los productos en la tabla tb_vale
      $sql = "INSERT INTO tb_vale (codVale, departamento) VALUES ('$odt', '$departamento')";
        $result = mysqli_query($conn, $sql); 
        
         for($i = 0; $i < count($_POST['cod']); $i++)

    {
    $codigo= $_POST['cod'][$i];
    $usuario = $_POST['usuario'];
    $descripcion= $_POST['desc'][$i];
    $unidadmedida= $_POST['um'][$i];
    $stock = $_POST['cant'][$i];
    $precio= $_POST['cu'][$i];
    $numero_vale = $_POST['numero_vale'];

      $insert = "INSERT INTO detalle_vale (codigo,descripcion,unidad_medida,stock,precio,numero_vale) VALUES ('$codigo','$descripcion','$unidadmedida','$stock','$precio','$numero_vale')";
      $query = mysqli_query($conn, $insert);

      if ($query) {
        echo "<script> alert('Su producto fue registrado correctamente');
       location.href = '../datos_vale.php';
        </script>
        ";
      }else {
        echo "<script> alert('UUPS!! Algo no fue mal escrito');
       // location.href = '../form_vale.php';
        </script>
        ";
      }
    }
?>