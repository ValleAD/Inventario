<?php

include ('../Model/conexion.php');
     

<<<<<<< HEAD

for ($i=0; $i < count($_POST['cod']) ; $i++) { 
  $departamento = $_POST['departamento'];
=======
      $departamento = $_POST['departamento'];
>>>>>>> b63062aae6c096b35da757cd91e10e948e33bdc6
      $odt = $_POST['numero_vale'];
      $usuario = $_POST['usuarios'][$i];

      //crud para guardar los productos en la tabla tb_vale
      $sql = "INSERT INTO tb_vale (codVale, departamento,usuario) VALUES ('$odt', '$departamento','$usuario')";
      $result = mysqli_query($conn, $sql); 
}
      
        
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

  $stocks =$_POST['stock'][$i];   
  $stock_obtenido =$_POST['cant'][$i];
  $stock_descontado=$stocks - $stock_obtenido;
   
//sql
$sql1="UPDATE tb_productos SET stock='$stock_descontado' WHERE stock='$stocks'" ;
$result = mysqli_query($conn, $sql1);
}
if ($query) {
  echo "<script> alert('Valores descontados correctamente');
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
?>