<?php 
require '../Model/conexion.php';
//conversion
 $id = $_POST['id'];
 $No =$_POST['Habilitado'];


      //sql


      $sql="UPDATE selects_departamento SET Habilitado = '$No' WHERE id='$id'" ;
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo'
          <script>
             alert("Los datos fueron Actualizados");
               window.location ="../departamentos.php"; 
                      </script>
                      ';
      }
      else {
        echo '
          <script>
              alert("No se pudo actualizar");
                window.location ="../departamentos.php"; 
                      </script>
                      ';
      }
 ?>