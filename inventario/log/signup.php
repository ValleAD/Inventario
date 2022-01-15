<?php 

include '../Model/conexion.php';
session_start();
error_reporting(0);

if (isset($_SESSION['signup'])) {
    header("Location: signin.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);
	$verificar_usuario =mysqli_query($conn, "SELECT * FROM tb_usuarios WHERE username ='$username'");

if (mysqli_num_rows($verificar_usuario)>0) {
	echo '
		<script>
		alert("Este Usuario ya esta Registrado, intente con otro diferente");
		window.location ="signup.php"
	</script>
	';
exit();
}

if ($password == $cpassword) {
	$sql = "SELECT * FROM tb_usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname' AND email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO tb_usuarios (username,firstname,lastname, email, password)
				VALUES ('$username','$firstname', '$lastname', '$email', '$password')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
				/*while ($row=mysqli_fetch_array($result)) {
					echo '<script type="text/javascript">alert("You are login successfully and you are logined as '.$row['usertype'].'")</script>';
				}if (mysqli_num_rows($result)>0) {
					
				}*/
				echo "<script>alert('Resgitro completado exitosamente.') </script>";
				$username = "";
				$firstname = "";
				$lastname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
 		header("Location: signin.php");
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
}

?>

<!DOCTYPE html>
<html lang="en">
<head></head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles/log.css" > 
	<link rel="stylesheet" type="text/css" href="../styles/estilo_men.css">
    <link rel="stylesheet" href="../Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="../img/log.png">
	<title>Register</title>
</head>
<body style="background-image: url(../img/bg3.jpg)">
<div style="position: all; width: 70%; height: 110%;margin-top: 7%" class="container-fluid">

<form id="form" style="position: all; width: 70%; height: 110%;margin-top: 7%"action="" method="POST" style="position: all; width: 70%; height: 110%;margin-top: 1%">
<center>
<h2 align="center">Registro de Usuario</h2><img src="../img/register.png" alt="logo" style="height: 25%;width: 25%;margin-top: 5%"></center>

	<div class="container" style="position: all;">
	<label>Nombre de usuario</label><br>
		<input class="form-control" type="text"  name="username" value="<?php echo $username; ?>" required>
	
	<label>Nombre</label><br>
		<input class="form-control" type="text"  name="firstname" value="<?php echo $firstname; ?>" required>
	
	<label>Apellido</label><br>
		<input class="form-control" type="text"  name="lastname" value="<?php echo $lastname; ?>" required>
	
	<label>Correo</label><br>
		<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required>
	
	<label>Contraseña</label><br>
		<input class="form-control" type="password"  name="password" value="<?php echo $_POST['password']; ?>" required>
  
	<label>Confirmar Contraseña</label><br>
		<input class="form-control" type="password"  name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
	</div>

	<div>
<center><button type="submit" name="submit" class="btn btn-secondary">Registrarse</button></center>
	</div>
	<p class="account text-center">¿Ya tienes una cuenta? <a id="a" href="signin.php" style="margin-left:1%;">Inicar Sesión</a></p>
	<style type="text/css">
			#a{
				width: 20%;
				margin-left: 40%;
			}
			#a:hover{
				text-decoration-line: underline;
			}
		</style>
</form>
</div>
</body>
</html>