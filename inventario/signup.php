<?php 

include 'Model/conexion.php';
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
$ejecutar = mysqli_query($conn,$query);
	if ($password == $cpassword) {
		$sql = "SELECT * FROM tb_usuarios WHERE firstname='$firstname' AND lastname='$lastname' username='$username' AND email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO tb_usuarios (firstname,lastname, username, email, password)
					VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
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
				                </script>
	';
			}
		} else {
			 echo '
    <script>
        alert("!Error¡ Correo o contraseña incorrectos.");
        window.location ="signup.php";
        session_destroy();  
                </script>
	';
		}
		
	} else {
		 echo '
    <script>
        alert("!Error¡ Correo o contraseña incorrectos.");
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
    <link rel="stylesheet" href="Plugin/bootstrap/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32"  href="img/log.png">
	<title>Register</title>
</head>
<body>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		#head{
		height: 9%;
		margin-top: -7%;
	}
	button{
		max-width:100%;
		margin-top:  5%;
		margin-bottom: 2%;
		width: 40%;
	}
	label{
		margin-left: 5%;
	}
		@media (max-width: 952px){
	img{
		min-width: 70%;
	}
	
	#head{
		height: 5%;
		margin-top: -7%;
		
	}
    h1{
    	max-width:100%;
    	margin-top: 2%;
        font-size: 80%;
       
    }
button{
		max-width:100%;
		margin-top:  5%;
		margin-bottom: 2%;
		width: 50%;
	}
  .container-fluid{
  	margin-right: 30%;
  	margin-top: 15%;
  }
  p{
  	 font-size: 1em;
  }
  </style>
<div id="head">  
        <h1>Hospital Nacional Santa Teresa de Zacatecoluca</h1>

    </div>

	<div style="position: all; width: 70%; height: 110%;margin-top: 7%" class="container-fluid">

		<form id="form" style="position: all; width: 70%; height: 110%;margin-top: 7%"action="" method="POST" style="position: all; width: 70%; height: 110%;margin-top: 1%">
		<center><img src="img/register.png" alt="logo" style="height: 25%;width: 25%;margin-top: 5%"></center>

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
		<center><button name="submit" class="btn btn-secondary">Registrarse</button></center>
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