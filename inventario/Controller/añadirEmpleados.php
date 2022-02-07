<?php 
include ('../Model/conexion.php');
	$username = $_POST['Usuario'];
	$firstname = $_POST['Nombres'];
	$lastname = $_POST['Apellidos'];
	$Establecimiento = $_POST['Establecimientos'];
	$unidad = $_POST['Unidad'];
	$password = $_POST['Password'];
	$cpassword = $_POST['cpassword'];
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Este Usuario ya esta Registrado, intente con otro diferente");
		 window.location ="../Empleados.php"; 
	</script>
	';
exit();
}
	if ($password == $cpassword) {
	$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname' AND email='$email' AND password='$password'";
	
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO tb_usuarios (username,firstname,lastname, email, password,tipo_usuario,Habilitado)
				VALUES ('$username','$firstname', '$lastname', '$email', '$password','$tipo_usuario','Si')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
				echo '
				 <script>
				        alert("!Error¡ Correo o contraseña incorrectos.");
				        window.location ="../Empleados.php"";
				        session_destroy();  
				</script>';
				$username = "";
				$firstname = "";
				$lastname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				 echo '
				    <script>
				        alert("!Error¡ Correo o contraseña incorrectos.");
				        window.location ="signup.php";
				        session_destroy();  
				                </script>';
				}
		} 
	}
	

	
 ?>