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
	$username = $_POST['usuario'];
	$firstname = $_POST['nombre'];
	$lastname = $_POST['Apellido'];
	$Establecimiento = $_POST['Establecimiento'];
	$unidad = $_POST['Unidad'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$tipo_usuario = ($_POST['tipo_usuario']);
	
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	         echo "<script>
    Swal.fire(
      'NOTA IMPORTANTE:',
      'Este Producto ya esta Registrado, intente con otro diferente',
      'warning'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
exit();
}
	if ($password == $cpassword) {
			$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname'  AND password='$password'";
	    echo "<script>
    Swal.fire(
      'Registrado',
      'Empleado Creado',
      'success'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
	$result1 = mysqli_query($conn, $sql);

	if (!$result1->num_rows > 0) {
		
		$sql = "INSERT INTO tb_usuarios (username,firstname,lastname,Establecimiento,Unidad, password,tipo_usuario,Habilitado)
				VALUES ('$username','$firstname', '$lastname','$Establecimiento','$unidad',  '$password','$tipo_usuario','Si')";
		$result = mysqli_query($conn, $sql);

		if ($result) {

		}else{
			 echo "<script>
    Swal.fire(
      'ERROR',
      'No se pudo Crear el Empleado',
      'error'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
		}
		} 
	}else{
		echo "<script>
    Swal.fire(
      'ERROR',
      'Contraseña Incorrecta',
      'error'
    ).then((resultado) =>{
if (resultado.value) {
        window.location.href='../Empleados.php';                               
               }
                });

        </script>";
	}

 ?>
</body>
</html>