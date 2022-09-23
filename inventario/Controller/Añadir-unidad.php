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
	$username = $_POST['unidad'];
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM selects_unidad_medida WHERE unidad_medida ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
		 echo "<script>
    Swal.fire({
      title:'NOTA IMPORTANTE:',
      text:'Esta Unidad de Medida ya fue registrado anteriormente, intentelo con otra Unidad de Medida',
      allowOutsideClick: false,
      icon:'warning'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../unidad_medidad.php';                               
               }
                });

        </script>";

exit();
}
	$sql = "INSERT INTO selects_unidad_medida (unidad_medida, Habilitado)
				VALUES ('$username','Si')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
    
 echo "<script>
    Swal.fire({
      title:'Realizado',
      text:'La Unidad de Medida fué realizada correctamente',
      allowOutsideClick: false,
      icon:'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../unidad_medidad.php';                               
               }
                });

        </script>";
      }else {
        echo "<script>
    Swal.fire({
      title:'ERROR',
      text:'No se pudo crear la unidad',
      allowOutsideClick: false,
      icon:'error'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../unidad_medidad.php';                               
               }
                });

        </script>";
}
	

	
 ?>
</body>
</html>