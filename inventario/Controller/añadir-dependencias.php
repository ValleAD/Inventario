    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../Plugin/bootstrap/css/bootstrap.css">
    <script src="../Plugin/bootstrap/js/sweetalert2.all.min.js"></script>
    <script src="../Plugin/bootstrap/js/jquery-latest.js"></script>
    <script src="../Plugin/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body><?php 
include ('../Model/conexion.php');
	$username = $_POST['dependencia'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM  selects_dependencia WHERE dependencia ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
echo "<script>
    Swal.fire(
      'NOTA IMPORTANTE:',
      'Esta dependencias ya fue registrado anteriormente, intentelo con otra dependencias',
      'warning'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dependencias.php';                               
               }
                });

        </script>";

exit();
}
	$sql = "INSERT INTO  selects_dependencia (dependencia, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    	 echo "<script>
    Swal.fire(
      'Registrado',
      'Dependencia Creada',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dependencias.php';                               
               }
                });

        </script>";
} else {
echo "<script>
    Swal.fire(
      'ERROR',
      'No se pudo crear la Dependencia',
      'error'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../dependencias.php';                               
               }
                });

        </script>";
   
}
	

	
 ?>
</body>
</html>