<?php 

include 'conexion.php';



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
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM usuarios WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname' AND email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO usuarios (username,firstname,lastname, email, password)
					VALUES ('$username','$firstname', '$lastname', '$email', '$password')";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				/*while ($row=mysqli_fetch_array($result)) {
					echo '<script type="text/javascript">alert("You are login successfully and you are logined as '.$row['usertype'].'")</script>';
				}if (mysqli_num_rows($result)>0) {
					
				}*/
				echo "<script>alert('Wow! User Registration Completed.') </script>";
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
				        alert("Woops! Email or Password is Wrong.");
				        window.location ="signup.php";
				        session_destroy();  
				                </script>
	';
			}
		} else {
			 echo '
    <script>
        alert("Woops! Email or Password is Wrong.");
        window.location ="signup.php";
        session_destroy();  
                </script>
	';
		}
		
	} else {
		 echo '
    <script>
        alert("Woops! Email or Password is Wrong.");
        window.location ="signup.php";
        session_destroy();  
                </script>
	';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/log.css" > 
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
	<title>Register</title>
</head>
<body>
<div id="head">  
        <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>

    </div>
<img id="img1" src="img/" alt="vacancy">
	<div style="position: all; width: 70%; height: 110%;margin-top: 7%" class="container">

		<form  style="position: all; width: 70%; height: 110%;margin-top: 7%"action="" method="POST" style="position: all; width: 70%; height: 110%;margin-top: 1%">
		<center><img src="img/register.png" alt="logo" style="height: 25%;width: 25%;margin-top: 5%"></center>
<center>
			<div style="position: all; width: 70%; height: 110%;margin-top: 1%;">
			<label style="margin-left: -68%">Nombre de usuario</label><br>
				<input class="form-control" type="text"  name="username" value="<?php echo $username; ?>" required>
			
			<label style="margin-left: -85%">Nombre</label><br>
				<input class="form-control" type="text"  name="firstname" value="<?php echo $firstname; ?>" required>
			
			<label style="margin-left: -85%">Apellido</label><br>
				<input class="form-control" type="text"  name="lastname" value="<?php echo $lastname; ?>" required>
			
			<label style="margin-left: -88%">Correo</label><br>
				<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required>
			
			<label style="margin-left: -80%">Contraseña</label><br>
				<input class="form-control" type="password"  name="password" value="<?php echo $_POST['password']; ?>" required>
          
			<label style="margin-left: -62%">Confirmar Contraseña</label><br>
				<input class="form-control" type="password"  name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
</center>
			<div>
			<button style="margin-left: 22.5%; margin-bottom: 5%;" class="submit" name="submit" class="login">Registrarse</button>
			</div>
			<p class="account text-center">¿Ya tienes una cuenta? <a id="a" class="nav-link text-center" href="signin.php">Inicar Sesión</a></p>
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
	<footer style="margin-top:  14%;">

  <div align="center">
  <img src="img/log_1.png" alt="" width="" height="150px">
  </div>

</footer>
</body>
</html>