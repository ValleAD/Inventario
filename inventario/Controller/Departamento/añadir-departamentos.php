    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../Plugin/bootstrap/css/bootstrap.css">
    <script src="../../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="../../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../../Plugin/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body><?php 
include ('../../Model/conexion.php');
	$username = $_POST['departamentos'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM  selects_departamento WHERE departamento ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	 echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Esta departamentos ya fue registrado anteriormente, intentelo con otro departamentos',
      icon:'warning',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Departamento/departamentos.php';                               
               }
                });

        </script>";

exit();
}
	$sql = "INSERT INTO  selects_departamento (departamento, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
 echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'Su solicitud fué realizada correctamente',
      icon:'success',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Departamento/departamentos.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
      title:'ERROR',
      text:'¡Error! algo salió mal',
      icon:'error',
      allowOutsideClick: false
    }).then((resultado) =>{
if (resultado.value) {
        window.location.href='../../Vistas/Departamento/departamentos.php';                               
               }
                });

        </script>";
      
}
	

	
 ?>
</body>
</html>